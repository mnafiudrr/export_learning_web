@extends('partials.master') @section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sub Sub Materi {{ $ssm->title }}</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <x-image :imgSrc="$ssm->logo" />
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Konten Sub Sub Materi</h1>
            <a
                href="{{ route('kontensubsubmateri.create') }}"
                class="
                    d-none d-sm-inline-block
                    btn btn-sm btn-primary
                    shadow-sm
                "
                ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Konten
                Sub Sub Materi</a
            >
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
              
                <x-dynamic-dropdown-and-inputs-component section="SubSubmateri" :totalContents="count($ssm->subSubMateriContents)" :contents="$ssm->subSubMateriContents"/>

            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{mix('js/dynamic-dropdown.js')}}">
   
</script>

@endsection
