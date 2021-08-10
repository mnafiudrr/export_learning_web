<div>
    <div class="header mt-5 mb-3">
        <h3>Tambah Soal</h3>
        <hr />
    </div>

    @if($quisContent !== null) @foreach($quisContent as $index => $content)
    <div class="quis-section mb-5" id="quizSection0" data-key="0">
        <div class="form-group">
            <label for="soal" id="soal-label-0">
                <strong class="soal-title-number">
                    Soal {{ $index + 1 }}</strong
                ></label
            >
            <input
                type="text"
                name="questions[{{ $index }}][question]"
                id="soal-0"
                class="form-control question"
                value="{{$content->question}}"
            />
        </div>

        @foreach($content->options as $idx => $ans)
        <div class="form-group row mr-1">
            <label for="jawaban-{{ $idx }}" class="col-3"
                >Pilihan Jawaban {{ $idx + 1 }}</label
            >
            <input
                type="text"
                name="questions[{{ $index }}][answers][]"
                id="jawaban-{{ $idx }}"
                class="form-control col-9 answer-input"
                value="{{$ans->value}}"
            />
        </div>

        @endforeach

        <div class="form-group mt-4">
            <label for="answer-key" class="">Kunci Jawaban</label>
            <input
                type="text"
                name="questions[{{ $index }}][key]"
                id="answer-key"
                class="form-control"
                value="{{$content->key}}"
            />
        </div>
    </div>
    @endforeach @else
    <div class="quis-section mb-5" id="quizSection0" data-key="0">
        <div class="form-group">
            <label for="soal" id="soal-label-0">
                <strong class="soal-title-number"> Soal 1</strong></label
            >
            <input
                type="text"
                name="questions[0][question]"
                id="soal-0"
                class="form-control question"
            />
        </div>

        @for($i ="A" ; $i<="E" ; $i++)
        <div class="form-group row mr-1">
            <label for="jawaban-{{ $i }}" class="col-3"
                >Pilihan Jawaban {{ $i }}</label
            >
            <input
                type="text"
                name="questions[0][answers][]"
                id="jawaban-{{ $i }}"
                class="form-control col-9 answer-input"
            />
        </div>

        @endfor

        <div class="form-group mt-4">
            <label for="answer-key" class="">Kunci Jawaban</label>
            <input
                type="text"
                name="questions[0][key]"
                id="answer-key"
                class="form-control"
            />
        </div>
    </div>

    @endif
    <div class="form-group content" id="quizContent">
        <a
            id="btnAppendQuiz"
            type="button"
            class="
                py-2
                mt-3
                col-12
                d-none d-sm-inline-block
                btn btn-sm btn-primary
                shadow-sm
            "
        >
            <i class="fas fa-plus fa-sm text-white-50"></i>
        </a>
    </div>
</div>
