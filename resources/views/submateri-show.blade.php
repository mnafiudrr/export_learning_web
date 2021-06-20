@extends('partials.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sub Materi {{"Ekspor"}}</h1>
            <a href="{{route('submateri.edit',1)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
        </div>
        <!-- Content Row -->
        <div class="row">
            
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda veritatis eos tempore illo minus adipisci sapiente quaerat repudiandae deleniti, possimus illum neque consectetur? Nobis sapiente odio eligendi reiciendis itaque quo?</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">List Sub Sub Materi</h1>
                <a href="{{route('subsubmateri.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Tambah Sub Sub Materi</a>
            </div>
    
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sub Sub Materi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sub Sub Materi</th>
                                    <th class="text text-center">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{route('subsubmateri.show',1)}}" style="text-decoration: none">Sub Sub Materi 1</a>
                                    </td>
                                    <td>
                                        <button class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm" type="button">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('subsubmateri.show',1)}}" style="text-decoration: none">Sub Sub Materi 1</a>
                                    </td>
                                    <td>
                                        <button class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm" type="button">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('subsubmateri.show',1)}}" style="text-decoration: none">Sub Sub Materi 1</a>
                                    </td>
                                    <td>
                                        <button class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm" type="button">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('subsubmateri.show',1)}}" style="text-decoration: none">Sub Sub Materi 1</a>
                                    </td>
                                    <td>
                                        <button class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm" type="button">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection