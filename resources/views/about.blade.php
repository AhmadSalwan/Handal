<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body class="w-full h-full ">
    <x-navbar></x-navbar>
    <div class="container mx-auto px-6 py-12">
    <!-- Judul -->
    <h1 class="text-4xl font-bold text-center text-gray-900 mb-6">Tentang Program</h1>
    <p class="text-lg text-gray-700 leading-relaxed text-center max-w-3xl mx-auto mb-12">
        Program ini dibuat untuk meningkatkan transparansi, kualitas pendidikan, 
        serta memberikan informasi yang bermanfaat bagi sekolah, guru, siswa, dan masyarakat umum.
    </p>

    <!-- Grid konten -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card 1 -->
        <div class="bg-gray-900 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-2xl font-semibold mb-4">Visi</h2>
            <p>
                Menjadi platform terpercaya dalam mendukung peningkatan mutu pendidikan di berbagai jenjang,
                dengan memanfaatkan asesmen yang objektif dan transparan.
            </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-gray-900 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-2xl font-semibold mb-4">Misi</h2>
            <ul class="list-disc pl-5 space-y-2">
                <li>Mendorong partisipasi aktif sekolah dalam asesmen mutu pendidikan.</li>
                <li>Menyediakan data peringkat sekolah yang akurat dan mudah diakses publik.</li>
                <li>Meningkatkan kepercayaan masyarakat terhadap kualitas pendidikan.</li>
            </ul>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-12">
        <a href="{{ route('data') }}" 
           class="inline-block bg-blue-600 hover:bg-blue-800 text-white font-semibold px-6 py-3 rounded-lg transition">
            Lihat Data Sekolah &raquo;
        </a>
    </div>
</div>

</body>
</html>