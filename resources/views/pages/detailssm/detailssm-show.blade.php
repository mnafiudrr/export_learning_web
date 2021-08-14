@extends('partials.master') @section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Detail Sub Sub Materi <strong> {{$detailSsm->title}} </strong>
            </h1>
        </div>

        <a href="{{ route('detailssm.edit', $detailSsm->id) }}" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mb-3">
            <i class="fas fa-edit fa-sm text-white-50"></i> Edit
        </a>

        <a href="{{route('subsubmateri.show', $detailSsm->sub_sub_materi_id)}}" class="d-none d-sm-inline-block btn btn-lg btn-success shadow-sm mb-3">
            <i class="fas fa-tasks fa-sm text-white-50"></i> Sub Sub Materi
        </a>

        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        @foreach($detailSsm->detailSsmContents as $index => $content)
                            @if($content->contentType->type === 'text')

                            <div class="content my-3">
                                <h2>Paragraf {{ $content->row }}</h2>
                                <p>{{$content->value}}</p>
                            </div>
                            <br>

                            @elseif($content->contentType->type === 'image')

                            <div class="content">
                                <h2>Gambar {{ $content->row }}</h2>
                                <x-image :imgSrc="$content->value" />
                            </div>
                            <br>
                            
                            @elseif($content->contentType->type === 'doc')

                            <div class="content">
                                <h2>Dokumen {{ $content->row }}</h2>
                                @php
                                    $docSrc = str_replace('public', '', $content->value);
                                @endphp
                                <a href="{{asset('storage' . $docSrc)}}" download>Click untuk download</a>
                            </div>

                            @endif 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
