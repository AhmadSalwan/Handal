<x-app-layout>
  <div class="max-w-6xl mx-auto py-10 px-6">

    {{-- Sub-navbar --}}
    @include('cms.partials.subnav')

    <h1 class="text-2xl font-bold mb-6">Edit Testimoni</h1>

    <form action="{{ route('landingtestimony.update', $testimony->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label class="block font-medium mb-2">Nama</label>
        <input type="text" name="name" class="w-full border rounded-lg px-3 py-2" value="{{ old('name', $testimony->name) }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Jabatan</label>
        <input type="text" name="position" class="w-full border rounded-lg px-3 py-2" value="{{ old('position', $testimony->position) }}">
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Testimoni</label>
        <textarea name="testimonial" rows="5" class="w-full border rounded-lg px-3 py-2" required>{{ old('testimonial', $testimony->testimonial) }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Foto</label>
        @if($testimony->photo)
            <img src="{{ asset('storage/'.$testimony->photo) }}" class="w-20 h-20 object-cover rounded-full mb-2">
        @endif
        <input type="file" name="photo" accept="image/*">
      </div>

      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Simpan Perubahan</button>
    </form>
  </div>
</x-app-layout>
