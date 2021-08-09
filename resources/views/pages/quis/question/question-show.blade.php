@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Quis <strong>{{ $payload["quis_title"] }}</strong>
        </h1>
    </div>

    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-5">
                    Soal <strong>{{ $payload["question"]->question }}</strong>
                </h4>

                @foreach($payload['question']->options as $idx => $opt)

                <h4>Jawaban {{ $idx + 1 }}</h4>
                <p>{{$opt->value}}</p>
                @endforeach

                <h4 style="font-weight: bold">
                    Kunci Jawaban {{$payload['question']->key}}
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection
