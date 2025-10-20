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
