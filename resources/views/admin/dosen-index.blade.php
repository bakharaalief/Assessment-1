@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Dosen</h1>
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
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $dosen)
                <tr>
                    <td class="px-2">{{ $dosen->name }}</td>
                    <td class="px-2">{{ $dosen->NIM_NIDN }}</td>
                    <td class="px-2">{{ $dosen->alamat }}</td>
                    <td class="px-2">{{ $dosen->kontak }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>        
</div>
@endsection