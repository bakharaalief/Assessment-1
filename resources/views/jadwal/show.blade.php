@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <h1 class="font-weight-bold">Detail Jadwal<h1>
    </div>

    <div class="row justify-content-center mb-2" style="color: green">
        <h4 class="font-weight-bold">{{ $jadwal->judul }}<h4>
    </div>

    
    <div class="row justify-content-center mb-2" style="font-size: 15px">
        <p class="">{{ $jadwal->deskripsi }}<p>
    </div>

    
    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Dosen :</p>
        <p class="mb-0">{{ $jadwal->getDosen()->name }}<p>
    </div>

    
    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Mahasiswa :</p>
        <p class="mb-0">{{ $jadwal->getMahasiswa()->name }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Jadwal Awal :</p>
        <p class="mb-0">{{ $jadwal->awal }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Jadwal Akhir :</p>
        <p class="mb-0">{{ $jadwal->akhir }}<p>
    </div>

    <div class="row justify-content-center" style="font-size: 15px">
        <p class="font-weight-bold mr-1 mb-0">Status :</p>
        <p class="mb-0">{{ $jadwal->status }}<p>
    </div>
</div>
@endsection