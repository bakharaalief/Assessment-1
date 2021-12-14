@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Dosen</h1>
    </div>

    <div class="row justify-content-center mb-4">
      <a class="btn btn-success" href="{{ route('admin.create-user', ['type' => 'dosen']) }}">Crete Dosen</a>
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
                <th scope="col">Nama</th>
                <th scope="col">NIDN</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tahun Masuk</th>
                <th scope="col">Kontak</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $dosen)
                <tr>
                    <td class="px-2">{{ $dosen->name }}</td>
                    <td class="px-2">{{ $dosen->NIM_NIDN }}</td>
                    <td class="px-2">{{ $dosen->alamat }}</td>
                    <td class="px-2">{{ $dosen->tahun_masuk }}</td>
                    <td class="px-2">{{ $dosen->kontak }}</td>
                    <td>
                      <a 
                        class="btn btn-warning" 
                        href="{{ route('admin.edit-user', ['id' => $dosen->id ]) }}">Edit
                      </a>
                    </td>
                    <td>
                      <form method="POST" action="{{ route('admin.destroy-user', ['type' => 'dosen', 'id' => $dosen->id]) }}">
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