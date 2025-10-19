<x-evaluasi.template-eval 
    judul="Evaluasi Keamanan"
    :backRouteParam="$school->id"

action="{{ route('evaluasi.store') }}">
 <input type="hidden" name="category" value="keamanan">
    <input type="hidden" name="school_id" value="{{ $school->id }}">
    @include('evaluation.layouts.soal', [
        'pertanyaan' => '1. Kebijakan Pembatasan Penggunaan Perangkat Komputer Sendiri (BYOD)',
        'name' => 'pembatasan_komputer',
        'opsi' => [
            1 => 'Tidak ada kebijakan tertulis',
            
            3 => 'Ada kebijakan tertulis terkait pembatasan BYOD namun tidak diawasi',
            
            5 => 'Ada kebijakan tertulis terkait pembatasan BYOD disertai dengan pengawasan'
        ]
    ])
     @include('evaluation.layouts.soal', [
        'pertanyaan' => '2. Analisa Riwayat Peramban Komputer',
        'name' => 'riwayat_komputer',
        'opsi' => [
            1 => '20% tidak ada konten negatif',
            2 => '40% tidak ada konten negatif',
            3 => '60% tidak ada konten negatif',
            4 => '80% tidak ada konten negatif',
            5 => '90% tidak ada konten negatif'
        ]
    ])
    
     @include('evaluation.layouts.soal', [
        'pertanyaan' => '3. Penerapan Keamanan Lainnya:
        a. Penerapan 2FA pada akun sekolah
        b. Terinstall basic antivirus pada perangkat komputer
        c. Sistem operasi komputer up to date
        d. Firewall diaktifkan pada jaringan sekolah
        e. Penerapan TTE (Tanda Tangan Elektronik) di sekolah
        ',
        'name' => 'penerapan_keamanan',
        'opsi' => [
            1 => 'satu atau tidak ada',
            2 => 'dua',
            3 => 'tiga',
            4 => 'empat',
            5 => 'semua'
        ]
    ])
    
     @include('evaluation.layouts.soal', [
        'pertanyaan' => '4. Backup Data dan Penanganan Insiden',
        'name' => 'backup_data',
        'opsi' => [
            1 => 'Tidak ada sistem backup data',
            2 => 'Terdapat backup, namun hanya berupa backup pribadi',
            3 => 'Terdapat local backup oleh sekolah',
            4 => 'Terdapat local dan cloud backup seluruh sistem sekolah',
            5 => 'Terdapat local dan cloud backup seluruh sistem sekolah & penangan insiden keamanan siber'
        ]
    ])

</x-evaluasi.template-eval>
