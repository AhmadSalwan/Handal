<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Pilih Tema Evaluasi</title>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-2xl mx-auto my-10 bg-white p-8 rounded-lg shadow-md text-center">
    <h1 class="text-3xl font-bold mb-4">Evaluasi Sekolah: {{ $school->nama }}</h1>
    <p class="text-gray-600 mb-8">
        Pilih tema evaluasi yang ingin dilakukan untuk sekolah ini.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <a href="{{ route('evaluasi.sdm', ['school' => $school->id]) }}"
           class="block bg-blue-100 hover:bg-blue-200 text-blue-800 font-semibold py-4 rounded-lg transition">
           💼 SDM 
        </a>

        <a href="{{ route('evaluasi.infrastruktur', ['school' => $school->id]) }}"
           class="block bg-green-100 hover:bg-green-200 text-green-800 font-semibold py-4 rounded-lg transition">
           🖥️ Infrastruktur
        </a>

        <a href="{{ route('evaluasi.literasi', ['school' => $school->id]) }}"
           class="block bg-yellow-100 hover:bg-yellow-200 text-yellow-800 font-semibold py-4 rounded-lg transition">
           📘 Literasi & Kesadaran Digital
        </a>

        <a href="{{ route('evaluasi.keamanan', ['school' => $school->id]) }}"
           class="block bg-red-100 hover:bg-red-200 text-red-800 font-semibold py-4 rounded-lg transition">
           🔒 Keamanan Digital
        </a>
    </div>

   <div class="mt-8">
        <a href="{{ route('evaluation.calculate', $school) }}"
        class="text-blue-600 hover:text-blue-800 font-bold">
            Hitung & Lihat Rating Sekolah 
        </a>
    </div>
        {{-- ✅ Pesan Sukses --}}
    @if(session('success'))
        <div class="inline-block bg-green-100 text-green-800 border border-green-300 p-3 my-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-8">
        <a href="{{ route('schools.index') }}"
           class="text-gray-500 hover:underline">← Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>
