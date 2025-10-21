{{-- Ganti 'survey-layout' dengan nama komponen layout Anda yang sebenarnya --}}
<x-evaluasi.template-kuis 
    judul="Kuisioner SDM & Literasi Digital" 
    deskripsi="Bagian ini mengukur kesiapan Sumber Daya Manusia sekolah Anda dalam aspek digital."
    action="{{ route('evaluasi.store') }}"
>
<x-navbar></x-navbar>


    @include('evaluation.layouts.radio' , [
        'pertanyaan' => 'Apakah sekolah Anda memiliki kebijakan tertulis atau lisan terkait membawa perangkat digital (seperti handphone, laptop, tablet) ke sekolah oleh siswa?',
        'name' => 'q1_kebijakan_perangkat',
        'opsi' => [
            'A' => 'Ya, ada kebijakan tertulis',
            'B' => 'Ya, ada kebijakan lisan',
            'C' => 'Tidak ada kebijakan',
            'D' => 'Tidak tahu'
        ]
        ])
    {{-- Catatan: Tombol "Kirim Evaluasi" sudah ada di dalam survey-layout (di luar slot) --}}

</x-evaluasi.template-kuis>