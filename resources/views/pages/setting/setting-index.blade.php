@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-4">
            <h1 class="h3 mb-0 text-gray-800">
                Setting
            </h1>
        </div>

        <a href="/setting/create" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mb-3 ml-4">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>

        <div class="container-fluid">
            <div class="card shadow px-4">
                <div class="card-body">
                    <div class=" my-4">
                        @foreach($settings as $setting)
                            <h2>Splash Screen</h2>
                            <img src="{{asset('image/'.$setting->splash)}}" alt="splash" style="max-width: 200px">
                            <br>
                            <h2>Tagline</h2>
                            <p>{{$setting->tagline}}</p>
                            <br>
                            <h2>Header Utama</h2>
                            <img src="{{asset('image/'.$setting->header)}}" alt="header" style="max-width: 700px">
                            <br>
                            <br>
                            <h2>Link Video Utama</h2>
                            <p>{{$setting->link}}</p>
                            <br>
                            <a href="/setting/{{$setting->id}}/hapus" class="d-none d-sm-inline-block btn btn-lg btn-danger shadow-sm">
                                <i class="fas fa-trash fa-sm text-white-50"></i> Hapus Data
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
