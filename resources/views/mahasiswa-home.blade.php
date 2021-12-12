@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Jadwal</h1>
    </div>

    <div class="row justify-content-center mb-4">
        <a class="btn btn-success" href="{{ route('mahasiswa.create-jadwal') }}">Crete Jadwal</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('failed'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="row justify-content-center">
        <table class="table-sm table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Dosen</th>
                <th scope="col">NIDN</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Awal</th>
                <th scope="col">Akhir</th>
                <th scope="col">Status</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $jadwal)
                <tr>
                    <td class="px-2">{{ $jadwal->getDosen()->name }}</td>
                    <td class="px-2">{{ $jadwal->getDosen()->NIM_NIDN }}</td>
                    <td class="px-2">{{ $jadwal->judul }}</td>
                    <td class="px-2">{{ $jadwal->deskripsi }}</td>
                    <td class="px-2">{{ $jadwal->awal }}</td>
                    <td class="px-2">{{ $jadwal->akhir }}</td>
                    <td 
                        @if ($jadwal->status == 'terima')
                        class="px-2 text-success font-weight-bold"
                        @elseif($jadwal->status == 'tolak')
                        class="px-2 text-danger font-weight-bold"
                        @else
                        class="px-2 font-weight-bold"
                        @endif
                        >{{ $jadwal->status }}
                    </td>
                    <td class="px-2"><a class="btn btn-info" href="{{ route('mahasiswa.show-jadwal', ['id'=> $jadwal->id]) }}">Show</a></td>
                    <td class="px-2"><a class="btn btn-warning" href="{{ route('mahasiswa.edit-jadwal', ['id'=> $jadwal->id]) }}">Edit</a></td>
                    <td class="px-2">
                        <form method="POST" action="{{ route('mahasiswa.destroy-jadwal', ['id'=> $jadwal->id]) }}">
                            @csrf
                            @method('Delete')

                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection