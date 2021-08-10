@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quis <strong>{{$quis->title}}</strong></h1>
        <a
            href="{{ route('quis.edit', $quis->id) }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            ><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a
        >
    </div>
    <!-- Content Row -->
    <div class="row ml-2">
        <div class="col-xl-2 col-md-2 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body" style="display: flex; justify-content: center;">
                    
                    <x-image :imgSrc="$quis->logo" />

                </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-9 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    
                    <x-image :imgSrc="$quis->header" />

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Soal Jawaban</h1>
            <a
                href="/question/create?quisId={{$quis->id}}"
                class="
                    d-none d-sm-inline-block
                    btn btn-sm btn-primary
                    shadow-sm
                "
                ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                Soal Jawaban</a
            >
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th>Soal </th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Soal</th>

                                <th class="text text-center">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($quis->questions as $question)
                            <tr>
                                <td>
                                    <a
                                        href="/question/{{$question->id}}"
                                        style="text-decoration: none"
                                        >{{$question->question}}</a
                                    >
                                </td>
                                <td>
                                    <button
                                        class="
                                            d-none d-sm-inline-block
                                            shadow-sm
                                            btn-danger btn-sm
                                        "
                                        type="button"
                                    >
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection