<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>daftar</title>
    @vite('resources/css/app.css')

</head>
<body>
    <x-navbar></x-navbar>
<div class="min-h-screen bg-gray-100 py-12">
  <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">
    <h1 class="text-2xl font-bold text-gray-900 mb-6 text-center">Formulir Pendaftaran Sekolah</h1>
    <p class="text-gray-600 text-center mb-8">
      Silakan isi data sekolah dengan lengkap. Data akan diverifikasi oleh admin sebelum Anda dapat melanjutkan ke halaman self asesmen.
    </p>

    @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
        {{ session('success') }}
      </div>
    @endif


    <!-- Form -->
    <form action="{{ route('daftar.submit') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
      @csrf

      <!-- Nama Sekolah -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Nama Sekolah</label>
        <input type="text" name="nama" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
          placeholder="Contoh: SMA Negeri 1 Makassar">
      </div>

      <!-- Jenjang -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Jenjang</label>
        <select name="jenjang" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
          <option value="">-- Pilih Jenjang --</option>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="SMK">SMK</option>
        </select>
      </div>

      <!-- Kabupaten/Kota -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Kabupaten/Kota</label>
        <input type="text" name="kabupaten" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="Contoh: Makassar">
      </div>

      <!-- Email Resmi -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">Email Resmi Sekolah</label>
        <input type="email" name="email" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="Contoh: info@sma1makassar.sch.id">
      </div>

      <!-- NPSN -->
      <div>
        <label class="block text-gray-700 font-semibold mb-2">NPSN (Nomor Pokok Sekolah Nasional)</label>
        <input type="text" name="npsn" required
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="Contoh: 40312345">
      </div>

      {{-- Surat Asesmen --}}
    
      <label class="block text-gray-700 font-semibold mb-2">Surat Asesmen</label>
      <div class="flex items-center justify-center w-full">
          <label id="fileInput" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p id="fileName" class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau tarik file ke sini</p>
                  <p class="text-xs text-gray-500">PDF(MAX.2MB)</p>
              </div>
              <input name="assessment_file" id="dropzone-file" type="file" class="hidden" />
          </label>
      </div> 


      <!-- Tombol -->
      <div class="flex justify-center">
        <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
          Daftar Sekolah
        </button>
      </div>
    </form>
  </div>
</div>

</body>
<script>
    const fileInput = document.getElementById('dropzone-file');
    const fileName = document.getElementById('fileName');

    fileInput.addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (file.type !== "application/pdf") {
        alert("Hanya file PDF yang diizinkan.");
        fileInput.value = ""; 
        fileName.value = ""; 
      } else if (file.size > 2 * 1024 * 1024) {
        alert("Ukuran file maksimal adalah 2MB.");
        fileInput.value = "";
        fileName.value = ""; 
      }
    });
    fileInput.addEventListener('change', function () {
        if (this.files && this.files.length > 0) {
            fileName.textContent = this.files[0].name;
        } else {
            fileName.textContent = "Belum ada file dipilih";
        }
    
    });
  </script>
</html>