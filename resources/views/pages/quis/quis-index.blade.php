@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Quiz</h1>
        <a
            href="{{ route('quis.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Quiz</a
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
                            <th>Judul Quiz</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Judul Quiz</th>
                            <th class="text text-center">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($quises as $q)
                        <tr>
                            <td>
                                <a
                                    href="{{ route('quis.show', $q->id) }}"
                                    style="text-decoration: none"
                                >
                                   {{$q->title}}
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
@endsection
