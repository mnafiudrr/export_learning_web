@extends('partials.master')

@section('content')


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Subsubmateri</h1>
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
                    action="/subsubmateri/{{$ssm->id}}/edit"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="sub_sub_materi_id" value="{{$ssm->id}}">
                    <div class="form-group col">
                        <label class="row" for="icon_materi">Icon Sub Sub Materi</label>

                        
                        <x-editable-image fileInputName="logo" :imgSrc="$ssm->logo" imgId="logoSsm" />
                    </div>
      
                    <div class="form-group">
                        <label for="judul_ssm">Judul SubSubmateri</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="judul_ssm"
                            aria-describedby="emailHelp"
                            value="{{isset($ssm->title) ? $ssm->title :  ''}}"

                            placeholder="Masukkan Judul Subsubmateri"
                        />
                        {{--
                        <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone
                            else.</small
                        >
                        --}}
                    </div>

                    <x-dynamic-dropdown-and-inputs-component :excludes="['link','doc']" section="Subsubmateri" :totalContents="count($ssm->subSubMateriContents)" :contents="$ssm->subSubMateriContents"/>
             
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