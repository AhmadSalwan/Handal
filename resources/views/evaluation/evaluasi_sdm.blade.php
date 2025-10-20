<x-evaluasi.template-eval 
    judul="Evaluasi SDM"
    :backRouteParam="$school->id"
    action="{{ route('evaluasi.store') }}">
    
    {{-- Hidden fields --}}
    <input type="hidden" name="category" value="sdm">
    <input type="hidden" name="school_id" value="{{ $school->id }}">
    

    {{-- Soal 1 --}}
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '1. Persentase kelulusan peserta mikroskill',
        'name' => 'mikroskill',
        'opsi' => [
            1 => '<20%',
            2 => '40%',
            3 => '60%',
            4 => '80%',
            5 => '>90%'
        ]
    ])

    {{-- Soal 2 --}}
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '2. Partisipasi Lomba Bertemakan Teknologi',
        'name' => 'partisipasi_lomba',
        'opsi' => [
            1 => 'Tidak pernah',
            2 => '1 lomba lokal',
            3 => '≥ 2 lomba lokal',
            4 => '≥ 1 tingkat provinsi',
            5 => '≥ 1 tingkat nasional'
        ]
    ])

    {{-- Soal 3 --}}
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '3. Jumlah SDM dengan latar belakang IT',
        'name' => 'sdm_it',
        'opsi' => [
            1 => 'Tidak ada',
            2 => '1 orang',
            3 => '2 orang',
            4 => '3 orang',
            5 => '≥ 4 orang'
        ]
    ])

    {{-- Soal 4 --}}
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '4. Jumlah komunitas/grup belajar bertema teknologi & digital',
        'name' => 'komunitas_it',
        'opsi' => [
            1 => 'Tidak ada',
            2 => '1 tema',
            3 => '2 tema',
            4 => '3 tema',
            5 => '≥ 4 tema'
        ]
    ])

    {{-- Soal 5 --}}
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '5. Frekuensi pelatihan pengembangan SDM internal di bidang TIK',
        'name' => 'pelatihan_it',
        'opsi' => [
            1 => 'Tidak ada',
            2 => 'Ada namun tidak terjadwal',
            3 => 'Terjadwal tiap semester',
            4 => 'Terjadwal tiap bulan',
            5 => 'Terjadwal tiap pekan'
        ]
    ])

    {{-- Soal 6 --}}
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '6. Ketersediaan tim teknis/dukungan IT',
        'name' => 'dukungan_it',
        'opsi' => [
            1 => 'Tidak ada',
            2 => '1 guru merangkap',
            3 => 'Beberapa guru merangkap tim',
            4 => 'Tim teknis profesional eksternal',
            5 => 'Tim teknis profesional internal'
        ]
    ])

    <div class="text-end mt-4">
        <button type="submit" name="next" value="infrastruktur"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
            Next &raquo;
        </button>
    </div>

<!-- </x-evaluasi.template-eval> -->