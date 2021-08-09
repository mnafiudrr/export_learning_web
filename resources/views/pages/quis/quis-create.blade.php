@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Materi</h1>
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
                    action="/quis"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <label for="icon_materi">Icon Quiz</label>
                        <x-editable-image fileInputName="logo" imgId="logoQuiz" />
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <x-editable-image fileInputName="header"  imgId="headerQuiz"/>

                    </div>
                    <div class="form-group">
                        <label for="judul_materi">Judul Quiz</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="judul_materi"
                            aria-describedby="emailHelp"
                            placeholder="Masukkan Judul Materi"
                        />
                        {{--
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                        --}}
                    </div>
                    <x-dynamic-quiz-component />
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{mix('js/dynamic-quiz-component.js')}}">
   
</script>
@endsection
