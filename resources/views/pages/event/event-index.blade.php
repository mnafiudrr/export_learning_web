@extends('partials.master') @section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Event</h1>
            <a href="{{ route('event.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Event
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul Event</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Judul Event</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        <a href="{{ route('event.show', $event->id) }}" style="text-decoration: none">
                                            {{$event->title}}
                                        </a>
                                    </td>
                                    <td>{{ $event->created_at }}</td>
                                    <td>
                                        <button onclick="deleteEvent(this)" class=" d-none d-sm-inline-block shadow-sm btn-danger btn-sm" data-evtid="{{$event->id}}" type="button">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const deleteEvent =  (e) => 
        {
            const eventId =  $(e).data('evtid');

            $.ajax({
                method: 'DELETE',
                url: '/api/event/' + eventId,
                success: (data,status) =>{
                    console.log(data,status);
                    location.reload()
                    alert('Event berhasil dihapus')

                }
            })
        }
    </script>

@endsection
