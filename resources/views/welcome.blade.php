<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class=" text-gray-800 bg-cover bg-center bg-white">
  <x-navbar > </x-navbar>
    <!-- Hero Section -->
    <!-- ====== Hero Section Start -->

    <div id="home" >
    <div
        class="relative overflow-hidden bg-gradient-to-tr from-gray-800 to-gray-700 h-screen w-full">
        <img src="img/Landing_Page.jpg"
            alt="hero"
            class="absolute inset-0 w-full h-full object-cover mix-blend-overlay z-0" />

        <div class="relative z-10 flex flex-col items-center justify-center h-full p-8 text-center">
            <h1 class="text-white font-bold text-6xl sm:text-5xl lg:text-6xl mb-8">
            HANDAL
            </h1>
            <p class="mx-auto mb-9 max-w-[600px] text-base font-medium text-white sm:text-lg sm:leading-[1.44]">
            Sebuah program kerja dari Balai Besar Pengembangan SDM Kominfo Makassar
            </p>
        </div>
    </div>
    {{-- Tentang Program --}}
     <!-- Tentang Program & Visi Misi -->
<div class="container p-4 mx-auto relative" alt="about">
  <div class="mb-8 grid grid-cols-1 lg:grid-cols-2 gap-8 h-full">

    <!-- Tentang Program -->
    <div class="w-full px-4">
      <h2 class="text-black text-4xl font-bold mb-4">Tentang Program</h2>
      <div class="p-4 w-full bg-gray-900 rounded-xl shadow-lg">
        <p class="text-white font-sans">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nam asperiores mollitia aperiam
          deleniti necessitatibus quidem eaque officia velit nobis. Lorem ipsum dolor sit amet, consectetur
          adipisicing elit. Magnam aut molestias totam nihil sint veritatis inventore voluptatum quis, ipsum
          est amet vero distinctio rem ipsa ad ipsam facere voluptas quos!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, eligendi quibusdam earum
          itaque minima sapiente nostrum facilis dicta mollitia numquam dolorum quas unde animi quisquam
          quaerat dolor facere.
        </p>
        <p class="text-white font-sans mt-3 cursor-pointer hover:underline">Selengkapnya &raquo;</p>
      </div>
    </div>

    <!-- Visi Misi -->
    <div class="w-full px-4">
      <h2 class="text-black text-4xl font-bold mb-4">Visi Misi</h2>
      <div class="p-4 w-full bg-gray-900 rounded-xl shadow-lg">
        <p class="text-white font-sans">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nam asperiores mollitia aperiam
          deleniti necessitatibus quidem eaque officia velit nobis. Lorem ipsum dolor sit amet, consectetur
          adipisicing elit. Magnam aut molestias totam nihil sint veritatis inventore voluptatum quis, ipsum
          est amet vero distinctio rem ipsa ad ipsam facere voluptas quos!
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, eligendi quibusdam earum
          itaque minima sapiente nostrum facilis dicta mollitia numquam dolorum quas unde animi quisquam
          quaerat dolor facere.
        </p>
        <p class="text-white font-sans mt-3 cursor-pointer hover:underline">Selengkapnya &raquo;</p>
      </div>
    </div>
  </div>
</div>

         {{-- Fitur  --}}
      <div class="p-12 w-full relative bg-gray-900" alt="Fitur">
  <div class="flex flex-col md:flex-row items-center justify-center relative space-y-6 md:space-y-0 md:space-x-8">
    
    <!-- Card 1 -->
    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white h-full flex flex-col">
      <img class="w-full h-64 object-cover" src="/img/Sekolah.jpg" alt="Sekolah">
      <div class="px-6 py-4 flex-grow">
        <div class="font-bold text-xl mb-2 text-center">Pendaftaran & Asesmen Sekolah</div>
        <p class="text-gray-700 text-base">
          Sekolah dapat mendaftar untuk mengikuti asesmen. Setelah disetujui admin, mereka dapat mengisi kuisioner.
        </p>
      </div>
      <div class="px-3 py-3.5 flex justify-center">
        <a href="/daftar" 
           class="bg-gray-500 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-lg transition">
          Daftar Sekolah &raquo;
        </a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white h-full flex flex-col">
      <img class="w-full h-64 object-cover" src="/img/Rank.jpg" alt="Rank">
      <div class="px-6 py-4 flex-grow">
        <div class="font-bold text-xl mb-2 text-center">Peringkat Sekolah</div>
        <p class="text-gray-700 text-base">
          Publik dapat melihat data ranking sekolah yang diperbarui secara berkala berdasarkan hasil asesmen.
        </p>
      </div>
      <div class="px-3 py-3.5 flex justify-center">
        <a href="/ranking" 
           class="bg-gray-500 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-lg transition">
          Lihat Ranking Sekolah &raquo;
        </a>
      </div>
    </div>
  </div>
</div>

<!--Statistik -->
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

    <!-- Tombol CTA -->
    <a href="/data" 
       class="inline-block bg-blue-600 hover:bg-blue-700 mt-6 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
       📊 Lihat Data Lengkap
    </a>
  </div>
</section>

{{-- Testimoni --}}
    <section class="bg-gray-900 py-12">
      <div class="max-w-3xl mx-auto px-6 text-center relative">
        <h2 class="text-2xl font-bold text-white mb-10">Apa Kata Mereka?</h2>

        <!-- Wrapper -->
        <div class="relative overflow-hidden">
          <!-- Testimoni Items -->
          <div class="flex transition-transform duration-500" id="testimonialItems">
            
            <!-- Testimoni 1 -->
            <div class="min-w-full h-full min-h-[300px] px-6">
              <div class="bg-gray-100 p-6 rounded-xl min-h-[300px] shadow-md flex flex-col items-center">
                <img class="w-16 h-16 rounded-full mb-4 object-cover" src="/img/Foto_profil.png" alt="Kepala Sekolah">
                <p class="text-gray-700 italic mb-4 flex flex-grow">
                  "Program ini sangat membantu kami dalam menilai kualitas sekolah dan meningkatkan mutu pendidikan."
                </p>
                <p class="font-semibold text-gray-900">Ibu Sari</p>
                <p class="text-sm text-gray-500">Kepala Sekolah SMPN 1</p>
              </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="min-w-full h-full min-h-[300px] px-6">
              <div class="bg-gray-100 p-6 rounded-xl min-h-[300px] shadow-md h-full flex flex-col items-center">
                <img class="w-16 h-16 rounded-full mb-4 object-cover" src="/img/Foto_profil.png" alt="Kepala Sekolah">
                <p class="text-gray-700 italic mb-4 flex flex-grow">
                  "Transparansi data ranking membuat orang tua dan masyarakat lebih percaya pada sekolah."
                </p>
                <p class="font-semibold text-gray-900">Pak Andi</p>
                <p class="text-sm text-gray-500">Kepala Sekolah SMA Negeri 2</p>
              </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="min-w-full h-full min-h-[300px] px-6">
              <div class="bg-gray-100 p-6 rounded-xl min-h-[300px] shadow-md flex flex-col items-center">
                <img class="w-16 h-16 rounded-full mb-4 object-cover" src="/img/Foto_profil.png" alt="Kepala Sekolah">
                <p class="text-gray-700 italic mb-4 flex flex-grow">
                  "Dengan asesmen ini, kami bisa tahu posisi sekolah dan berusaha lebih baik lagi."
                </p>
                <p class="font-semibold text-gray-900">Bu Lina</p>
                <p class="text-sm text-gray-500">Kepala Sekolah SMKN 3</p>
              </div>
            </div>

          </div>
        </div>

        <!-- Tombol Navigasi -->
    <!-- Tombol Navigasi di bawah -->
    <div class="flex justify-center space-x-4 mt-6">
      <button id="prevBtn" 
        class="bg-gray-800/70 hover:bg-gray-900 text-white p-3 rounded-full shadow-lg transition transform hover:scale-110">
        <!-- Ikon Panah Kiri -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <button id="nextBtn" 
        class="bg-gray-800/70 hover:bg-gray-900 text-white p-3 rounded-full shadow-lg transition transform hover:scale-110">
        <!-- Ikon Panah Kanan -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>


      </div>
    </section>

    <!-- Footer -->
    <x-footer > </x-footer>

<script>
  const wrapper = document.getElementById("testimonialItems");
  const totalItems = wrapper.children.length;
  let index = 0;

  function showSlide(i) {
    index = (i + totalItems) % totalItems; // looping
    wrapper.style.transform = `translateX(-${index * 100}%)`;
  }

  document.getElementById("nextBtn").addEventListener("click", () => {
    showSlide(index + 1);
    resetAutoPlay();
  });

  document.getElementById("prevBtn").addEventListener("click", () => {
    showSlide(index - 1);
    resetAutoPlay();
  });

  // Autoplay setiap 5 detik
  let autoPlay = setInterval(() => {
    showSlide(index + 1);
  }, 5000);

  // Reset autoplay kalau tombol ditekan
  function resetAutoPlay() {
    clearInterval(autoPlay);
    autoPlay = setInterval(() => {
      showSlide(index + 1);
    }, 5000);
  }

  document.addEventListener("keydown", (event) => {
  if (event.key === "ArrowRight") {
    showSlide(index + 1);
    resetAutoPlay();
  }
  if (event.key === "ArrowLeft") {
    showSlide(index - 1);
    resetAutoPlay();
  }
});
</script>


<script>
  const track = document.getElementById("carouselTrack");
  const totalCards = track.children.length;
  let index = 0;

  function showSlide(i) {
    // Batas geser: hanya sampai (totalCards - 3)
    index = Math.max(0, Math.min(i, totalCards - 3));
    track.style.transform = `translateX(-${index * (100/3)}%)`;
  }

  document.getElementById("nextBtn").addEventListener("click", () => {
    showSlide(index + 1);
  });

  document.getElementById("prevBtn").addEventListener("click", () => {
    showSlide(index - 1);
  });
</script>


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


</body>
</html>
