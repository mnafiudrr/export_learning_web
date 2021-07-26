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
                    action="/materi"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group col">
                        <label class="row" for="icon_materi">Icon Materi</label>

                        
                        <x-editable-image imageSource={{$materi->logo}} />
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input
                            type="file"
                            class="form-control"
                            name="header"
                            id="header"
                        />
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

                    @foreach($materi->materiContents as $index =>  $content)
                    <label class="" for="">Tipe Konten {{$index + 1}}</label>

                    <select
                        class="
                            form-control
                            col-6
                            dropdown-content-types dropdown-content-types-0
                        "
                        name="contents[0][content_type]"
                        data-key="0"
                        id="dropdownContentTypes"
                    >
                        <!-- <option value="0" selected>---- Pilih Tipe Konten ----</option> -->

                        @foreach($contentTypes as $contentType)
                        <option value="{{$contentType->type}} " {{$contentType->id === $content->content_type_id  ? 'selected' : ''}}>
                            {{ucfirst($contentType->desc)}}
                        </option>
                        @endforeach
                     </select>          
                     
                     
                     @if($content->content_type_id === 1 /* PARAGRAF*/) 
                     <label for="content-value-${index}" id="label-content-value-${index}" class="mt-3 mb-0  ">Isi Konten {{$index + 1}} (Paragraf)</label>
                     <textarea
                        class='form-control my-3'
                        name="contents[${index}][value]"
                        cols="50"
                        rows="10"
                        id="content-value-${index}"

                    >{{$content->value}}</textarea>
                     @elseif($content->content_type_id === 2)
                            <img src="{{$content->value}}" alt="">
                     
                     @elseif($content->content_type_id === 3)
                     <label for="content-value-${index}" id="label-content-value-${index}" class="mt-3 mb-0  ">Isi Konten {{$index + 1}} (Link Video)</label>
                     <input
                        type="url"
                        class="form-control my-3"
                        name="contents[${index}][value]"
                        id="content-value-${index}"
                        value="{{$content->value ?? ''}}"
                    />                     
                     
                     @elseif($content->content_type_id === 4)
                            
                     @endif
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

<script src="{{mix('js/dynamic-dropdown.js')}}">
   
</script>
@endsection