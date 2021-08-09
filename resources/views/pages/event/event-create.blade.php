@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Event</h1>
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
                    action="/event"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label for="judul_event">Judul Event</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="judul_event"
                            aria-describedby="emailHelp"
                            placeholder="Masukkan Judul Materi"
                        />
                      
                    </div>
                    <div class="form-group">
                        <label for="icon_materi">Foto Event</label>
                        <x-editable-image fileInputName="image" imgId="logoEvent" />
                    </div>
                    <div class="form-group">
                     
                        <label for="descEvent">Deskripsi Event</label>
                        <textarea
                        class="form-control"
                         name="content" id="descEvent" cols="30" rows="10" placeholder="Deskripsi Event"></textarea>
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

   
</script>
@endsection
