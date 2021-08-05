@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Konten Sub Sub Materi <strong> {{$detailSsm->title}} </strong>
        </h1>
    </div>
    <!-- Content Row -->
    <!-- <div class="row"> -->
        <a
        href="{{ route('detailssm.edit', $detailSsm->id) }}"
        class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm mb-3   "
        ><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a
    >    <!-- </div> -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    @foreach($detailSsm->detailSsmContents as $index =>
                    $content)

                    @if($content->contentType->type === 'text')

                    <div class="content my-3">
                        <h1>Paragraf {{ $index }}</h1>

                        <p>{{$content->value}}</p>
                    </div>

                    @elseif($content->contentType->type === 'image')

                    <div class="content">
                        <h1>Gambar {{ $content->row }}</h1>

                        <x-image :imgSrc="$content->value" />
                    </div>
                    
                    @elseif($content->contentType->type === 'doc')

                    <div class="content">
                        <h1>Dokumen {{ $content->row }}</h1>

                        @php

                        $docSrc = str_replace('public', '', $content->value);

                        @endphp
                        <a href="{{asset('storage' . $docSrc)}}" download>Click untuk download</a>

                        <!-- <x-image :imgSrc="$content->value" /> -->
                    </div>
                    @endif 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
