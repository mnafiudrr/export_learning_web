@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Quis <strong>{{ $payload["quis_title"] }}</strong>
            </h1>
            <a href="{{ route('quis.edit', $payload["quis_id"]) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-3">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
            </a>
            <a href="{{ route('quis.show', $payload["quis_id"] )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm ml-3">
                <i class="fas fa-tasks fa-sm text-white-50"></i> Quiz
            </a>
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
