<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Sekolah</title>
    @vite('resources/css/app.css')

</head>
<body>
    <x-navbar></x-navbar>
    <section class="bg-gray-100 py-12">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-2xl font-bold text-gray-800 mb-8">Statistik Program</h2>
        
    <!-- Grid Statistik -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
      <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-4xl font-bold text-blue-600">120</p>
        <p class="text-gray-600 mt-2">Sekolah Terdaftar</p>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-4xl font-bold text-green-600">95</p>
        <p class="text-gray-600 mt-2">Kuisioner Selesai</p>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-4xl font-bold text-yellow-600">50</p>
        <p class="text-gray-600 mt-2">Kecamatan Tercover</p>
      </div>
      <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-4xl font-bold text-purple-600">1</p>
        <p class="text-gray-600 mt-2">Ranking Terbaru</p>
      </div>
    </div>
     <!-- Bar Chart -->
    <div class="bg-white shadow-md rounded-lg p-6 w-full flex justify-center">
      <canvas id="schoolChart" class="w-full h-64"></canvas>
    </div>

    <section class="bg-gray-100 py-12">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">
      Data Sekolah & Peringkat
    </h2>

    <!-- Search & Filter -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
      <!-- Search -->
      <input 
        type="text" 
        placeholder="Cari sekolah..." 
        class="w-full md:w-1/3 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:outline-none"
      />

      <!-- Filter -->
      <select 
        class="w-full md:w-1/4 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gray-600 focus:outline-none">
        <option value="">Filter Jenjang</option>
        <option value="SMP">SMP</option>
        <option value="SMA">SMA</option>
        <option value="SMK">SMK</option>
      </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
      <table class="min-w-full table-auto text-left border-collapse">
        <thead class="bg-gray-900 text-white">
          <tr>
            <th class="px-6 py-3">Nama Sekolah</th>
            <th class="px-6 py-3">Jenjang</th>
            <th class="px-6 py-3">Kota/Kabupaten</th>
            <th class="px-6 py-3">Skor</th>
            <th class="px-6 py-3">Ranking</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($schools as $index => $school)
                
          <tr class="hover:bg-gray-100">
            <td class="px-6 py-3 font-semibold">{{ $school['nama'] }}</td>
            <td class="px-6 py-3">{{ $school['jenjang'] }}</td>
            <td class="px-6 py-3">{{ $school->kabupaten }}</td>
            <td class="px-6 py-3">{{ $school->skor ?? '-' }}</td>
            <td class="px-6 py-3 font-bold text-green-600">{{ $index+1 }}</td>
         
       @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

</body>

{{-- Script Chart --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('schoolChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['SD', 'SMP', 'SMA', 'SMK'],
      datasets: [{
        label: 'Jumlah Sekolah',
        data: [40, 25, 30, 25],
        backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
</script>

</html>