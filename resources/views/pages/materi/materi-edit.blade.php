@extends('partials.master')

@section('content')


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Materi</h1>
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
                    action="/materi/{{$materi->id}}/edit"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="materi_id" value="{{$materi->id}}">
                    <div class="form-group col">
                        <label class="row" for="icon_materi">Icon Materi</label>

                        
                        <x-editable-image fileInputName="logo" :imgSrc="$materi->logo" imgId="logoMateri" />
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <x-editable-image fileInputName="header" :imgSrc="$materi->header" imgId="headerMateri" />

                    </div>
                    <div class="form-group">
                        <label for="judul_materi">Judul Materi</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="judul_materi"
                            aria-describedby="emailHelp"
                            value="{{isset($materi->title) ? $materi->title :  ''}}"

                            placeholder="Masukkan Judul Materi"
                        />
                        {{--
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                        --}}
                    </div>

                    <x-dynamic-dropdown-and-inputs-component section="Materi" :totalContents="count($materi->materiContents)" :contents="$materi->materiContents"/>
             
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
   
</script>
@endsection