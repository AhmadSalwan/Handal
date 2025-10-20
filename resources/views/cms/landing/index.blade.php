<x-app-layout>
  <div class="max-w-6xl mx-auto py-10 px-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Kelola Konten & Testimonial Landing Page</h1>
      <a href="{{ route('landingcontent.create') }}" 
         class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        + Tambah Konten
      </a>
    </div>

    @if (session('success'))
      <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-100 border-b">
          <tr>
            <th class="px-6 py-3 text-left">Section</th>
            <th class="px-6 py-3 text-left">Type</th>
            <th class="px-6 py-3 text-left">Content</th>
            <th class="px-6 py-3 text-left">Author</th>
            <th class="px-6 py-3 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($contents as $item)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-3 font-medium">{{ ucfirst(str_replace('_', ' ', $item->section)) }}</td>
            <td class="px-6 py-3">{{ ucfirst($item->type) }}</td>
            <td class="px-6 py-3 text-gray-700 truncate max-w-xs">{{ Str::limit($item->content, 80) }}</td>
            <td class="px-6 py-3">{{ $item->author ?? '-' }}</td>
            <td class="px-6 py-3 text-right">
              <a href="{{ route('landingcontent.edit', $item->id) }}" 
                 class="text-blue-600 hover:text-blue-800 mr-3">Edit</a>
              <form action="{{ route('landingcontent.destroy', $item->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus konten ini?')" 
                        class="text-red-600 hover:text-red-800">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
              Belum ada konten ditambahkan.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>
