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
                        <input type="hidden" name="materi_id" value="{{$parentId}}" />
                        {{--
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                        --}}
                    </div>
                    <!-- <div class="form-group">
                        <label for="foto">Logo</label>
                        <x-editable-image fileInputName="logo" imgId="logoMateri" />

                    </div> -->
                    <x-dynamic-dropdown-and-inputs-component section="Sub Materi" :excludes="['link','doc']"/>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{mix('js/dynamic-dropdown.js')}}">

@endsection
