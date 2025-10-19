    <x-evaluasi.template-eval 
    judul="Evaluasi Literasi"
    :backRouteParam="$school->id"
    action="{{ route('evaluasi.store') }}">
    <input type="hidden" name="category" value="literasi">
    <input type="hidden" name="school_id" value="{{ $school->id }}">
        @include('evaluation.layouts.soal', [
            'pertanyaan' => '1. Kesadaran Cyber bullying',
            'name' => 'cyber_bullying',
            'opsi' => [
                1 => '<20%',
                2 => '40%',
                3 => '60%',
                4 => '70%',
                5 => '>90%'
            ]
        ])
            @include('evaluation.layouts.soal', [
            'pertanyaan' => '2. Kesadaran Jejak Digital',
            'name' => 'jejak_digital',
            'opsi' => [
                1 => '<20%',
                2 => '40%',
                3 => '60%',
                4 => '70%',
                5 => '>90%'
            ]
        ])
            @include('evaluation.layouts.soal', [
            'pertanyaan' => '3. Kesadaran Sosial Media',
            'name' => 'sosial_media',
            'opsi' => [
                1 => '<20%',
                2 => '40%',
                3 => '60%',
                4 => '70%',
                5 => '>90%'
            ]
        ])
        
            @include('evaluation.layouts.soal', [
            'pertanyaan' => '4. Interaksi Digital yang Inklusif dan Toleran',
            'name' => 'interaksi_digital',
            'opsi' => [
                1 => '<20%',
                2 => '40%',
                3 => '60%',
                4 => '70%',
                5 => '>90%'
            ]
        ])
        
            @include('evaluation.layouts.soal', [
            'pertanyaan' => '5 Pemahaman Terkait Berita Hoaks',
            'name' => 'berita_hoaks',
            'opsi' => [
                1 => '<20%',
                2 => '40%',
                3 => '60%',
                4 => '70%',
                5 => '>90%'
            ]   
        ])
        
            @include('evaluation.layouts.soal', [
            'pertanyaan' => '6 Pemahaman Terkait Privasi Digital dan Doxing',
            'name' => 'doxing',
            'opsi' => [
                1 => '<20%',
                2 => '40%',
                3 => '60%',
                4 => '70%',
                5 => '>90%'
            ]   
        ])
</x-evaluasi.template-eval>
