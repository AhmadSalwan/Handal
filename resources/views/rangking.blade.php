<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peringkat Sekolah</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">

  <div class="min-h-screen py-12">
    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg p-8">
      <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">🏆 Top 3 Sekolah Terbaik</h1>

      @if($schools->isEmpty())
        <p class="text-center text-gray-500">Belum ada data sekolah yang dinilai.</p>
      @else
        <div class="grid md:grid-cols-3 gap-6">
          @foreach($schools as $index => $school)
            <div class="bg-gray-100 rounded-xl shadow p-6 text-center border border-gray-200">
              <div class="text-5xl font-bold mb-2">
                {{ $index + 1 }}
              </div>
              <h2 class="text-xl font-semibold text-gray-800">{{ $school->nama }}</h2>
              <p class="text-gray-500 mt-1">Skor: <span class="font-semibold text-blue-600">{{ $school->skor }}</span></p>
              <p class="text-gray-500">Rating: 
                <span class="font-semibold text-yellow-500">{{ $school->rating ?? '-' }}</span>
              </p>
            </div>
          @endforeach
        </div>
      @endif

      <div class="text-center mt-10">
        <a href="{{ route('home') }}" 
           class="bg-blue-600 hover:bg-blue-800 text-white font-medium py-2 px-5 rounded-lg transition">
           ← Kembali ke Beranda
        </a>
      </div>
    </div>
  </div>

</body>
</html>