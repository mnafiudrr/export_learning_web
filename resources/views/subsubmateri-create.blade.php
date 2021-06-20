@extends('partials.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Materi</h1>
        </div>

        <div class="col-md-6 offset-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="icon_subsubmateri">Icon Sub Sub-Materi</label>
                            <input type="file" class="form-control" name="icon_subsubmateri" id="icon_subsubmateri">
                        </div>
                        <div class="form-group">
                            <label for="header">Header</label>
                            <input type="file" class="form-control" name="header" id="header">
                        </div>
                        <div class="form-group">
                          <label for="judul_materi">Judul Sub Sub-Materi</label>
                          <input type="text" class="form-control" name="judul_materi" id="judul_materi" aria-describedby="emailHelp" placeholder="Masukkan Judul Materi">
                          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto 1</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <label for="isi_paragraf">Isi Pragaraf 1</label>
                            <a onclick="appendText()" id="btnAppend" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i>
                            </a>
                        </div>
                        <div class="form-group teksarea" id="teksarea">
                            <textarea name="isi_paragraf[]" cols="50" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto 2</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <label for="isi_paragraf">Isi Pragaraf 2</label>
                            <a onclick="appendText()" id="btnAppend" type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus fa-sm text-white-50"></i>
                            </a>
                        </div>
                        <div class="form-group teksarea" id="teksarea">
                            <textarea name="isi_paragraf[]" cols="50" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $("#btnAppend").click(function(){
            $("#teksarea").append("<textarea></textarea>");
        });
    </script>
@endsection