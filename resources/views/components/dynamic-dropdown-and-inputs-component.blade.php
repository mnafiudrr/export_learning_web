<div>
    <div class="header mt-5 mb-3">
        <h3>Tambah Konten {{ $section }}</h3>
        <hr />
    </div>
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
            id="dropdownContentTypes"
        >
            <option value="0" selected>---- Pilih Tipe Konten ----</option>

            @foreach($dropdownData as $data)
            <option value="{{$data->type}}">
                {{ucfirst($data->desc)}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group content" id="materiContent">
        <a
            id="btnAppend"
            type="button"
            class="
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
