@extends('partials.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Quis</h1>
            <a href="/tambah-quiz" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah Quis</a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Quis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Quis</th>
                                <th class="text text-center">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Materi 1</td>
                                <td>
                                    <button class="d-none d-sm-inline-block shadow-sm btn-danger btn-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 2</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 3</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 4</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 5</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 6</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 7</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 8</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Materi 9</td>
                                <td>
                                    <button class="btn-danger btn-sm d-none d-sm-inline-block shadow-sm" type="button">
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
@endsection