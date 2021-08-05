@extends('partials.master')

@section('content')


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Konten Sub Sub Materi</h1>
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
                    action="/detailssm/{{$submateri->id}}/edit"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="sub_materi_id" value="{{$submateri->id}}">
      
                    <div class="form-group">
                        <label for="judul_submateri">Judul Konten Sub Sub Materi</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="judul_submateri"
                            aria-describedby="emailHelp"
                            value="{{isset($submateri->title) ? $submateri->title :  ''}}"

                            placeholder="Masukkan Judul Submateri"
                        />
                        {{--
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                        --}}
                    </div>

                    <x-dynamic-dropdown-and-inputs-component :excludes="['link']" section="Submateri" :totalContents="count($submateri->detailSsmContents)" :contents="$submateri->detailSsmContents"/>
             
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