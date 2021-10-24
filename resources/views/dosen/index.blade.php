@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Dosen</h1>
    </div>

    <div class="row justify-content-center mb-4">
        <a class="btn btn-success" href="{{ route('dosen.create')}}">Crete Dosen</a>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
          <strong>{{ $message }}</strong>
      </div>
    @endif

    <div class="row justify-content-center">
        <table class="table-sm table table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">NIDN</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kontak</th>
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $dosen)
                <tr>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->nidn }}</td>
                    <td>{{ $dosen->alamat }}</td>
                    <td>{{ $dosen->kontak }}</td>
                    <td><a class="btn btn-info" href="{{ route('dosen.show', ['dosen'=> $dosen->id]) }}">Show</a></td>
                    <td><a class="btn btn-warning" href="{{ route('dosen.edit', ['dosen'=> $dosen->id]) }}">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ route('dosen.destroy', ['dosen'=> $dosen->id]) }}">
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