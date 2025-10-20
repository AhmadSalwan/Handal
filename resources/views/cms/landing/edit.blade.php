<x-app-layout>
  <div class="max-w-6xl mx-auto py-10 px-6">

    {{-- Sub-navbar --}}
    @include('cms.partials.subnav')

    {{-- Page Title --}}
    <h1 class="text-2xl font-bold mb-6">Edit Konten Landing Page</h1>

    {{-- Success Message --}}
    @if(session('success'))
      <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    {{-- Edit Form --}}
    <form action="{{ route('landingcontent.update') }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label class="block font-medium mb-2">Tentang Program</label>
        <textarea name="tentang_program_content" rows="5" 
                  class="w-full border rounded-lg px-3 py-2">{{ old('tentang_program_content', $content->tentang_program_content) }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Visi</label>
        <textarea name="visi_content" rows="5" 
                  class="w-full border rounded-lg px-3 py-2">{{ old('visi_content', $content->visi_content) }}</textarea>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-2">Misi</label>
        <textarea name="misi_content" rows="5" 
                  class="w-full border rounded-lg px-3 py-2">{{ old('misi_content', $content->misi_content) }}</textarea>
      </div>

      <button type="submit" 
              class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Simpan Perubahan
      </button>
    </form>
  </div>
</x-app-layout>
