<x-evaluasi.template-eval 
    judul="Evaluasi Infrastruktur"
    :backRouteParam="$school->id"

action="{{ route('evaluasi.store') }}">
    <input type="hidden" name="category" value="infrastruktur">
    <input type="hidden" name="school_id" value="{{ $school->id }}">
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '1. Spesifikasi Perangkat Komputer',
        'name' => 'spek_komputer',
        'opsi' => [
            1 => 'Ada komputer, tapi spesifikasinya rendah (misal: RAM < 4GB, HDD < 500GB, CPU < Intel i3)',
            2 => 'Sesuai standar kebutuhan umum (misal: RAM 4GB, HDD 500GB, CPU Intel i3)',
            3 => 'Sesuai rekomendasi kebutuhan umum (misal: RAM 8GB, SSD 256GB, CPU Intel i5)',
            4 => 'Sesuai standar kebutuhan lanjutan (misal: RAM 16GB, SSD 512GB, CPU Intel i7)',
            5 => 'Sesuai rekomendasi kebutuhan tinggi (misal: RAM 32GB, SSD 1TB, CPU Intel i9)'
        ]
    ])
        @include('evaluation.layouts.soal', [
        'pertanyaan' => '2. Perangkat Lainnya (LCD Proyektor, Wifi Extender, Server, CCTV)',
        'name' => 'perangkat_lain',
        'opsi' => [
            1 => 'Tidak ada',
            2 => '1 perangkat ada',
            3 => '2 perangkat ada',
            4 => '3 perangkat ada',
            5 => 'Semua perangkat ada'
        ]
    ])
        @include('evaluation.layouts.soal', [
        'pertanyaan' => '3. Ketersediaan Perangkat Komputer (3.1. Perangkat administrasi 3.2. Cukup untuk Guru 3.3. Cukup untuk Lab 3.4. Tersedia pada ruang kelas 3.5. ada perangkat tambahan)',
        'name' => 'ketersediaan_komputer',
        'opsi' => [
            1 => 'Tidak ada',
            2 => '1 perangkat ada',
            3 => '2 perangkat ada',
            4 => '3 perangkat ada',
            5 => 'Semua perangkat ada'
        ]
    ])
    
        @include('evaluation.layouts.soal', [
        'pertanyaan' => '4. Ketersediaan Internet Stabil',
        'name' => 'ketersediaan_internet',
        'opsi' => [
            1 => 'Tidak ada',
            2 => 'Sering Putus',
            3 => 'Cukup Stabil',
            4 => 'Stabil >70%',
            5 => 'Stabil + backup'
        ]
    ])
    
        @include('evaluation.layouts.soal', [
        'pertanyaan' => '5 Penggunaan LMS (Learning Management System) untuk pembelajaran',
        'name' => 'penggunaan_LMS',
        'opsi' => [
            1 => 'Tidak ada',
            2 => 'Hanya pada 1 Guru/Mapel yang menerapkan dengan inisiatif sendiri',
            3 => 'Beberapa Guru/Mapel yang menerapkan dengan inisiatif sendiri',
            4 => 'Mayoritas Guru/Maper menerapkan LMS',
            5 => 'Kebijakan wajib impelementasi E-Learning pada seluruh mata pelajaran',
        ]   
    ])

    <div class="text-end mt-4">
        <button type="submit" name="next" value="literasi"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
            Next &raquo;
        </button>
    </div>

<!-- </x-evaluasi.template-eval> -->
