@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">
                Setting
            </h1>
        </div>

        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm mb-3 ml-4">
            <i class="fas fa-trash fa-sm text-white-50"></i> Hapus
        </a>

        <a href="/setting/tambah" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mb-3">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>

        <div class="container-fluid">
            <div class="card shadow px-4">
                <div class="card-body">
                    <div class=" my-4">
                        @foreach($settings as $setting)
                            <h2>Splash Screen</h2>
                            <p></p>
                            <br>
                            <h2>Tagline</h2>
                            <p>{{$settings->tagline}}</p>
                            <br>
                            <h2>Header Utama</h2>
                            <p></p>
                            <h2>Link Video Utama</h2>
                            <p></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
