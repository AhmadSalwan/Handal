<x-app-layout>
  <div class="max-w-3xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Konten / Testimonial</h1>

    <form action="{{ route('landingcontent.store') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label class="block font-medium mb-1">Section</label>
        <input type="text" name="section" value="{{ old('section') }}" 
               class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @error('section')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block font-medium mb-1">Type</label>
        <select name="type" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
          <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
          <option value="testimonial" {{ old('type') == 'testimonial' ? 'selected' : '' }}>Testimonial</option>
        </select>
        @error('type')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block font-medium mb-1">Content</label>
        <textarea name="content" rows="6" 
                  class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('content') }}</textarea>
        @error('content')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block font-medium mb-1">Author (opsional, hanya untuk testimonial)</label>
        <input type="text" name="author" value="{{ old('author') }}" 
               class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @error('author')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-end space-x-3">
        <a href="{{ route('landingcontent.index') }}" 
           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Batal</a>
        <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
</x-app-layout>
