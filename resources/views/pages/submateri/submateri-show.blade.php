@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center mb-3">
            <h1 class="h3 mb-0 text-gray-800">
                Sub Materi <strong>{{ $submateri->title }}</strong>
            </h1>
            <a href="{{ route('submateri.edit', $submateri->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-3">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
            </a>
            <a href="{{route('materi.show', $submateri->materi_id)}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm ml-3">
                <i class="fas fa-tasks fa-sm text-white-50"></i> Materi
            </a>
        </div>

        <div class="row ml-2 mr-2">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">List Sub Sub Materi</h1>
                <a href="/subsubmateri/create?parentId={{$submateri->id}}" class=" d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Sub Sub Materi
                </a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sub Sub Materi</th>
                                    <th>Dibuat pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sub Sub Materi</th>
                                    <th>Dibuat pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($submateri->subSubMateri as $ssm)
                                    <tr>
                                        <td>
                                            <a href="{{ route('subsubmateri.show', $ssm->id) }}" style="text-decoration: none" >
                                                {{$ssm->title}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$ssm->created_at}}
                                        </td>
                                        <td>
                                            <a href="{{ route('subsubmateri.delete', $ssm->id) }}" class=" d-none d-sm-inline-block shadow-sm btn-danger btn-sm">Hapus</a>
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
