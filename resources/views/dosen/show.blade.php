@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <h1 class="font-weight-bold">Detail Dosen<h1>
    </div>

    <div class="row justify-content-center mb-2" style="color: green">
        <h4 class="font-weight-bold">{{ $dosen->nama }}<h4>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">NIDN :</p>
        <p class="mb-0">{{ $dosen->nidn }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Alamat :</p>
        <p class="mb-0">{{ $dosen->alamat }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Kontak :</p>
        <p class="mb-0">{{ $dosen->kontak }}<p>
    </div>
</div>
@endsection