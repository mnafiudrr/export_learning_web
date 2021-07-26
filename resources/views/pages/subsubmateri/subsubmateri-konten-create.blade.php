@extends('partials.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Konten Sub Sub-Materi</h1>
        </div>

        <div class="col-md-6 offset-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                          <label for="judul_materi">Judul Konten Sub Sub-Materi</label>
                          <input type="text" class="form-control" name="judul_materi" id="judul_materi" aria-describedby="emailHelp" placeholder="Masukkan Judul Materi">
                          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="foto1">Foto 1</label>
                            <input type="file" class="form-control" name="foto1" id="foto1">
                        </div>
                        <div class="form-group">
                            <label for="foto2">Foto 2</label>
                            <input type="file" class="form-control" name="foto2" id="foto2">
                        </div>
                        <div class="form-group">
                            <label for="foto3">Foto 3</label>
                            <input type="file" class="form-control" name="foto3" id="foto3">
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
                            <label for="dokumen1">Dokumen 1</label>
                            <input type="file" class="form-control" name="dokumen1" id="dokumen1">
                        </div>
                        <div class="form-group">
                            <label for="dokumen2">Dokumen 2</label>
                            <input type="file" class="form-control" name="dokumen2" id="dokumen2">
                        </div>
                        <div class="form-group">
                            <label for="dokumen3">Dokumen 3</label>
                            <input type="file" class="form-control" name="dokumen3" id="dokumen3">
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