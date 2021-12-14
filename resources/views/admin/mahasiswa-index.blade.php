@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Mahasiswa</h1>
    </div>

    <div class="row justify-content-center mb-4">
      <a class="btn btn-success" href="{{ route('admin.create-user', ['type' => 'mahasiswa']) }}">Crete Mahasiswa</a>
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
                <th scope="col">NIM</th>
                <th scope="col">Alamat</th>
                <th scope="col">Kontak</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $mahasiswa)
                <tr>
                    <td class="px-2">{{ $mahasiswa->name }}</td>
                    <td class="px-2">{{ $mahasiswa->NIM_NIDN }}</td>
                    <td class="px-2">{{ $mahasiswa->alamat }}</td>
                    <td class="px-2">{{ $mahasiswa->kontak }}</td>
                    <td>
                      <a 
                        class="btn btn-warning" 
                        href="{{ route('admin.edit-user', ['id' => $mahasiswa->id ]) }}">Edit
                      </a>
                    </td>
                    <td class="px-2">
                      <form method="POST" action="{{ route('admin.destroy-user', ['type' => 'mahasiswa', 'id' => $mahasiswa->id]) }}">
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