@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
        </div>

        <div class="col-md-6 offset-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/setting" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="splash">Splash Screen</label>
                            <x-editable-image fileInputName="image" imgId="splash" />
                        </div>

                        <div class="form-group">
                            <label for="tagline">Tagline</label>
                            <input type="text" class="form-control" name="tagline" id="tagline" aria-describedby="emailHelp" placeholder="Masukkan tagline"/>
                        </div>

                        <div class="form-group">
                            <label for="splash">Header Utama</label>
                            <x-editable-image fileInputName="image" imgId="header" />
                        </div>

                        <div class="form-group">
                            <label for="tagline">Link Video</label>
                            <input type="url" class="form-control" name="link" id="link" placeholder="Masukkan link video utama"/>
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

@endsection
