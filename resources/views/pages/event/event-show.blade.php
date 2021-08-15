@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Event <strong>{{ $event->title }}</strong>
            </h1>
        </div>

        <div class="container-fluid">
            <div class="card shadow px-4">
                <div class="card-body">
                    <div class=" my-4">
                        <h1> Foto</h1>
                        <x-image :imgSrc="$event->image" />
                    </div>
                    <h1>Isi</h1>
                    <p>{{$event->content}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
