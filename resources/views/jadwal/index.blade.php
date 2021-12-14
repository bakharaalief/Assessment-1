@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Jadwal</h1>
    </div>

    <div class="row justify-content-center mb-4">
        <a class="btn btn-success" href="{{ route('jadwal.create')}}">Crete Jadwal</a>
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
                <th scope="col">Mahasiswa</th>
                <th scope="col">NIM</th>
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
                    <td>{{ $jadwal->getMahasiswa()->name }}</td>
                    <td>{{ $jadwal->getMahasiswa()->NIM_NIDN }}</td>
                    <td>{{ $jadwal->getDosen()->name }}</td>
                    <td>{{ $jadwal->getDosen()->NIM_NIDN }}</td>
                    <td>{{ $jadwal->judul }}</td>
                    <td>{{ $jadwal->deskripsi }}</td>
                    <td>{{ $jadwal->awal }}</td>
                    <td>{{ $jadwal->akhir }}</td>
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
                    <td><a class="btn btn-info" href="{{ route('jadwal.show', ['jadwal' => $jadwal->id]) }}">Show</a></td>
                    <td><a class="btn btn-warning" href="{{ route('jadwal.edit', ['jadwal' => $jadwal->id]) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('jadwal.destroy', ['jadwal' => $jadwal->id]) }}">
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