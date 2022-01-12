@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center mb-3">
            <h1 class="h3 mb-0 text-gray-800">Materi {{$materi->title}}</h1>
            <a href="{{ route('materi.edit', $materi->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-3">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
            </a>
            <a href="/materi" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm ml-3">
                <i class="fas fa-tasks fa-sm text-white-50"></i> List Materi
            </a>
        </div>

        <div class="row ml-2">
            <div class="col-xl-2 col-md-2 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <p>Logo Materi</p>
                        <td><x-image :imgSrc="$materi->logo"/></td>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-md-9 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <p>Header Materi</p>
                        <td><x-image :imgSrc="$materi->header"/></td>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">List Sub Materi</h1>
                <a href="/submateri/create?parentId={{$materi->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Sub-Materi
                </a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sub Materi</th>
                                    <td>Dibuat pada</td>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sub Materi</th>
                                    <td>Dibuat pada</td>
                                    <th class="text text-center">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($materi->subMateris as $submateri)
                                    <tr>
                                        <td>
                                            <a href="/submateri/{{$submateri->id}}?parentId={{$materi->id}}" style="text-decoration: none">{{$submateri->title}}</a>
                                        </td>
                                        <td>{{$submateri->created_at}}</td>
                                        <td>
                                            <a href="{{ route('submateri.delete', $submateri->id)}}" class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm">Hapus</a>
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
