<div>
    <label class="block font-semibold mb-2 ">{{ $pertanyaan }}</label>
    <div class="space-y-2">
        @foreach($opsi as $value => $label)
            <label class="flex items-center">
                <input type="radio" name="{{ $name }}" value="{{ $value }}" class="mr-2 text-blue-600"> {!! $label !!}
            </label>
        @endforeach
    </div>
</div>
