@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Sub Materi {{ $submateri->title }}
        </h1>
        <a
            href="{{ route('submateri.edit', $submateri->id) }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            ><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a
        >
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <x-image :imgSrc="$submateri->logo" />
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Sub Sub Materi</h1>
            <a
                href="/subsubmateri/create?parentId={{$submateri->id}}"
                class="
                    d-none d-sm-inline-block
                    btn btn-sm btn-primary
                    shadow-sm
                "
                ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Sub Sub
                Materi</a
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
                            @foreach($submateri->subSubMateri as $ssm)
                            <tr>
                                <td>
                                    <a
                                        href="{{
                                            route('subsubmateri.show', $ssm->id)
                                        }}"
                                        style="text-decoration: none"
                                        >{{$ssm->title}}</a
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
