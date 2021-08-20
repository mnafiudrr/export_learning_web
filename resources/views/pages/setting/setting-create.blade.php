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
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="splash">Splash Screen</label>--}}
                        {{--                            <x-editable-image fileInputName="splash" imgId="splashScreen" />--}}
                        {{--                        </div>--}}
                        {{--`--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="tagline">Tagline</label>--}}
                        {{--                            <input type="text" class="form-control" name="tagline" id="tagline" placeholder="Masukkan tagline"/>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="header">Header Utama</label>--}}
                        {{--                            <x-editable-image fileInputName="header" imgId="appHeader" />--}}
                        {{--                        </div>--}}

                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="tagline">Link Video</label>--}}
                        {{--                            <input type="url" class="form-control" name="link" id="link" placeholder="Masukkan link video utama"/>--}}
                        {{--                        </div>--}}

                        @foreach($settings as $idx => $set)
                            <div class="form-group">
                                <label for=""> {{ucwords($set->desc)}}</label>
                                <input type="hidden" name="setting[{{$idx}}][name]" value="{{$set->name}}">

                                <input type="hidden" name="setting[{{$idx}}][desc]" value="{{$set->desc}}">
                                <input type="hidden" name="setting[{{$idx}}][content_type_id]" value="{{$set->content_type_id}}">


                            </div>

                            <div class="form-group">
                                @if($set->content_type_id === 1 /*  Text */)
                                    <input class="form-control" type="text" name="setting[{{$idx}}][value]" id=""
                                           value="{{$set->value ?? null}}">
                                @elseif($set->content_type_id === 2)

                                    <x-editable-image :imgSrc="$set->value ?? null" fileInputName="setting[{{$idx}}][value]"
                                                      :imgId="'img' . $idx"/>
                                @elseif($set->content_type_id === 3)
                                    <input class="form-control" type="url" name="setting[{{$idx}}][value]" value="{{$set->value ?? ''}}">
                                @endif


                            </div>
                        @endforeach
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
