<div>
    <div class="header mt-5 mb-3">
        <h3>Tambah Konten {{ $section }}</h3>
        <hr />
    </div>

    @if(count($contents) > 0)
    <div
        class="content-data-count d-none"
        data-total="{{ $totalContents }}"
    ></div>

    @foreach($contents as $index => $content)
    <label class="" for="">Tipe Konten {{ $index + 1 }}</label>

    <select
        class="
            form-control
            col-6
            dropdown-content-types dropdown-content-types-0
        "
        name="contents[{{ $index }}][content_type]"
        data-key="{{ $index }}"
        id="dropdownContentTypes{{ $index }}"
    >
        <!-- <option value="0" selected>---- Pilih Tipe Konten ----</option> -->

        @foreach($dropdownData as $contentType)
        <option value="{{$contentType->type}} " {{$contentType->
            id === $content->content_type_id ? 'selected' : ''}}>
            {{ucfirst($contentType->desc)}}
        </option>
        @endforeach
    </select>

    @if($content->content_type_id === 1 /* PARAGRAF*/)
    <label
        for="content-value-{{ $index }}"
        id="label-content-value-{{ $index }}"
        class="mt-3 mb-0"
        >Isi Konten {{ $index + 1 }} (Paragraf)</label
    >
    <textarea
        class="form-control my-3"
        name="contents[{{ $index }}][value]"
        cols="50"
        rows="10"
        id="content-value-{{ $index }}"
        >{{$content->value}}</textarea
    >
    @elseif($content->content_type_id === 2)

    <x-editable-image :imgSrc="$content->value" :imgId="'contentImage' . $index" fileInputName="contents[{{$index}}][value]"/>
    @elseif($content->content_type_id === 3)
    <label
        for="content-value-{{ $index }}"
        id="label-content-value-{{ $index }}"
        class="row mt-3 ml-1 mb-0"
        >Isi Konten {{ $index + 1 }} (Link Video)</label
    >
    <a class="row ml-1" href="{{$content->value}}">Link Video</a>
    <input
        type="url"
        class="form-control my-3"
        name="contents[{{ $index }}][value]"
        id="content-value-{{ $index }}"
        value="{{$content->value ?? ''}}"
    />

    @elseif($content->content_type_id === 4) @endif @endforeach @else

    <div class="form-group">
        <label class="" for="">Tipe Konten 1</label>

        <select
            class="
                form-control
                col-6
                dropdown-content-types dropdown-content-types-0
            "
            name="contents[0][content_type]"
            data-key="0"
            id="dropdownContentTypes0"
        >
            <option value="0" selected>---- Pilih Tipe Konten ----</option>

            @foreach($dropdownData as $data)
            <option value="{{$data->type}}">
                {{ucfirst($data->desc)}}
            </option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="form-group content" id="materiContent">
        <a
            id="btnAppend"
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
