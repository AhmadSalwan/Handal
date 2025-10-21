<x-app-layout>
  <div class="max-w-6xl mx-auto py-10 px-6">

    {{-- Sub-navbar --}}
    @include('cms.partials.subnav')
    
    <h1 class="text-2xl font-bold mb-6">Tambah Testimoni</h1>

    <form action="{{ route('landingtestimony.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-4">
        <label class="block font-medium mb-2">Nama</label>
        <input type="text" name="name" class="w-full border rounded-lg px-3 py-2" value="{{ old('name') }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Jabatan</label>
        <input type="text" name="position" class="w-full border rounded-lg px-3 py-2" value="{{ old('position') }}">
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Testimoni</label>
        <textarea name="testimonial" rows="5" class="w-full border rounded-lg px-3 py-2" required>{{ old('testimonial') }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Foto</label>
        <input type="file" name="photo" accept="image/*">
      </div>

      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Simpan</button>
    </form>
  </div>
</x-app-layout>
