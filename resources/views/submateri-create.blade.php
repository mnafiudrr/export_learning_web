@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Sub-Materi</h1>
    </div>

    <div class="col-md-6 offset-3">
        <div class="card shadow mb-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form
                    action="/submateri"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label for="judul_submateri">Judul Sub-Materi</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="judul_submateri"
                            aria-describedby="emailHelp"
                            placeholder="Masukkan Judul Materi"
                        />

                        <!-- DUMMY MATERI ID PLEASE PUT MATERI ID HERE -->
                        <input type="hidden" name="materi_id" value="1" />
                        {{--
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                        --}}
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input
                            type="file"
                            class="form-control"
                            name="logo"
                            id="foto"
                        />
                    </div>
                    <div
                        class="
                            d-sm-flex
                            align-items-center
                            justify-content-between
                            mb-4
                        "
                    >
                        <label for="isi_paragraf">Isi Pragaraf</label>
                        <a
                            onclick="appendText()"
                            id="btnAppend"
                            type="button"
                            class="
                                d-none d-sm-inline-block
                                btn btn-sm btn-primary
                                shadow-sm
                            "
                        >
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                        </a>
                    </div>
                    <div class="form-group teksarea" id="teksarea">
                        <textarea
                            name="isi_paragraf[]"
                            cols="50"
                            rows="10"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("#btnAppend").click(function () {
        $("#teksarea").append(
            "<textarea name='isi_paragraf[]' cols='50' rows='10'></textarea>"
        );
    });
</script>
@endsection
