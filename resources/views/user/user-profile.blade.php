@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">Profile</h1>
    </div>

    <div class="row justify-content-center mb-4">
        <a 
            class="btn btn-success" 

            @if (Auth::user()->level == 'mahasiswa')
            href="{{ route('mahasiswa.edit-profile') }}"
            @elseif(Auth::user()->level == 'dosen')
            href="{{ route('dosen.edit-profile') }}"
            @else
            href="{{ route('admin.edit-profile') }}"
            @endif
            >Edit Profile</a>
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
    
    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Name :</p>
        <p class="mb-0">{{ Auth::user()->name }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        @if (Auth::user()->level == 'mahasiswa')
        <p class="font-weight-bold mr-1 mb-0">NIM :</p>
        @else
        <p class="font-weight-bold mr-1 mb-0">NIDN :</p>
        @endif
        
        <p class="mb-0">{{ Auth::user()->NIM_NIDN }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Email :</p>
        <p class="mb-0">{{ Auth::user()->email }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Alamat :</p>
        <p class="mb-0">{{ Auth::user()->alamat }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Tahun Masuk :</p>
        <p class="mb-0">{{ Auth::user()->tahun_masuk }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Kontak :</p>
        <p class="mb-0">{{ Auth::user()->kontak }}<p>
    </div>

</div>
@endsection