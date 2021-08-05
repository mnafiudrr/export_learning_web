@extends('partials.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Detail Sub Sub Materi</h1>
        </div>

        <div class="col-md-6 offset-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="/detailssm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sub_sub_materi_id" value="{{$parentId}}">
                      
                        <div class="form-group">
                          <label for="judul_materi">Judul Detail Sub Sub-Materi</label>
                          <input type="text" class="form-control" name="title" id="judul_materi" aria-describedby="emailHelp" placeholder="Masukkan Judul Materi">
                        </div>
                        <x-dynamic-dropdown-and-inputs-component section="Detail Sub Sub Materi" :excludes="['link']"/>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{mix('js/dynamic-dropdown.js')}}">

@endsection