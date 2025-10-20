<x-app-layout>
  <div class="max-w-6xl mx-auto py-10 px-6">

    {{-- Sub-navbar --}}
    @include('cms.partials.subnav')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Testimoni</h1>
        <a href="{{ route('landingtestimony.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            Tambah Testimoni
        </a>
    </div>

    @if(session('success'))
      <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left">Foto</th>
                <th class="px-6 py-3 text-left">Nama</th>
                <th class="px-6 py-3 text-left">Jabatan</th>
                <th class="px-6 py-3 text-left">Testimoni</th>
                <th class="px-6 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testimonies as $item)
            <tr class="border-b">
                <td class="px-6 py-3">
                    @if($item->photo)
                        <img src="{{ asset('storage/'.$item->photo) }}" alt="Foto" class="w-16 h-16 object-cover rounded-full">
                    @else
                        <span class="text-gray-500">Tidak ada</span>
                    @endif
                </td>
                <td class="px-6 py-3">{{ $item->name }}</td>
                <td class="px-6 py-3">{{ $item->position }}</td>
                <td class="px-6 py-3">{{ Str::limit($item->testimonial, 80) }}</td>
                <td class="px-6 py-3 flex space-x-2">
                    <a href="{{ route('landingtestimony.edit', $item->id) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg">Edit</a>
                    <form action="{{ route('landingtestimony.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</x-app-layout>
