<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $judul ?? 'Survei Sekolah Aman Digital' }}</title>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-3xl mx-auto my-10 bg-white p-8 rounded-lg shadow-md">
       <div class="border-b border-gray-200 mb-8">
    <div class="flex justify-start space-x-2 overflow-x-auto">
        <a href="{{ route('evaluasi.start', $backRouteParam) }}"
            class="p-3 whitespace-nowrap font-medium text-gray-500 hover:text-gray-700 transition duration-150">
            ←
        </a>
        {{-- TAB 1: SDM & Literasi Digital --}}
        @if(Route::is('evaluasi.sdm'))
            <span class="p-3 whitespace-nowrap font-semibold text-blue-600 border-b-2 border-blue-600 cursor-default">
                💼 SDM
            </span>
        @else
            <a href="{{ route('evaluasi.sdm', $backRouteParam) }}"
               class="p-3 whitespace-nowrap font-medium text-gray-500 hover:text-gray-700 transition duration-150">
                💼 SDM 
            </a>
        @endif
        
        {{-- TAB 2: Infrastruktur --}}
        @if(Route::is('evaluasi.infrastruktur'))
            <span class="p-3 whitespace-nowrap font-semibold text-blue-600 border-b-2 border-blue-600 cursor-default">
                🖥️ Infrastruktur
            </span>
        @else
            <a href="{{ route('evaluasi.infrastruktur', $backRouteParam) }}"
               class="p-3 whitespace-nowrap font-medium text-gray-500 hover:text-gray-700 transition duration-150">
                🖥️ Infrastruktur
            </a>
        @endif
        {{-- TAB 3: Literasi & Kesadaran Digital --}}
        @if(Route::is('evaluasi.literasi'))
            <span class="p-3 whitespace-nowrap font-semibold text-blue-600 border-b-2 border-blue-600 cursor-default">
                📘 Literasi 
            </span>
        @else
            <a href="{{ route('evaluasi.literasi', $backRouteParam) }}"
               class="p-3 whitespace-nowrap font-medium text-gray-500 hover:text-gray-700 transition duration-150">
                📘 Literasi 
            </a>
        @endif
        
        {{-- TAB 4: Keamanan Digital --}}
        @if(Route::is('evaluasi.keamanan'))
            <span class="p-3 whitespace-nowrap font-semibold text-blue-600 border-b-2 border-blue-600 cursor-default">
                🔒 Keamanan Digital
            </span>
        @else
            <a href="{{ route('evaluasi.keamanan', $backRouteParam) }}"
               class="p-3 whitespace-nowrap font-medium text-gray-500 hover:text-gray-700 transition duration-150">
                🔒 Keamanan Digital
            </a>
        @endif
        
    </div>
</div>
    <h1 class="text-3xl font-bold text-center mb-4">{{ $judul }}</h1>

    <p class="text-center text-gray-600 mb-8">
        {{ $deskripsi ?? 'Isi survei berikut sesuai dengan kondisi sekolah Anda.' }}
    </p>

        {{-- ✅ Pesan Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ❌ Pesan Error Umum --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-800 border border-red-300 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- ⚠️ Error Validasi --}}
    @if ($errors->any())
        <div class="bg-yellow-100 text-yellow-800 border border-yellow-300 p-3 rounded mb-4">
            <strong>Terjadi kesalahan:</strong>
            <ul class="list-disc ml-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ $action }}" method="POST" class="space-y-8">
        @csrf
        {{ $slot }}
        <div class="text-center">
            <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
            Kirim Evaluasi
        </button>      
    </form>
</div>
</body>
</html>
