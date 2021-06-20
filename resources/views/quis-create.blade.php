@extends('partials.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Quis</h1>
        </div>

        <div class="col-md-6 offset-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="icon_quis">Icon Quis</label>
                            <input type="file" class="form-control" name="icon_quis" id="icon_quis">
                        </div>
                        <div class="form-group">
                            <label for="header">Header</label>
                            <input type="file" class="form-control" name="header" id="header">
                        </div>
                        <div class="form-group">
                          <label for="judul_quis">Judul Quis</label>
                          <input type="text" class="form-control" name="judul_quis" id="judul_quis" aria-describedby="emailHelp" placeholder="Masukkan Judul Quis">
                          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection