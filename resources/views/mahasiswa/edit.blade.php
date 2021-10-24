@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Mahasiswa</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mahasiswa.update', ['mahasiswa'=> $mahasiswa->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>

                            <div class="col-md-6">
                                <input 
                                    id="nama" 
                                    type="text" 
                                    class="form-control @error('nama') is-invalid @enderror" 
                                    name="nama" 
                                    value="{{ $mahasiswa->nama }}"
                                    required >

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">NIM</label>

                            <div class="col-md-6">
                                <input 
                                    id="nim" 
                                    type="text" 
                                    class="form-control @error('nim') is-invalid @enderror" 
                                    name="nim" 
                                    value="{{ $mahasiswa->nim }}"
                                    required>

                                @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input 
                                    id="tanggal_lahir" 
                                    type="date" 
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                    name="tanggal_lahir" 
                                    value="{{ $mahasiswa->tanggal_lahir }}"
                                    required>

                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <input 
                                    id="alamat" 
                                    type="text" 
                                    class="form-control @error('alamat') is-invalid @enderror" 
                                    name="alamat" 
                                    value="{{ $mahasiswa->alamat }}"
                                    required>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tahun_masuk" class="col-md-4 col-form-label text-md-right">Tahun Masuk</label>

                            <div class="col-md-6">
                                <input 
                                    id="tahun_masuk" 
                                    type="text" 
                                    class="form-control @error('tahun_masuk') is-invalid @enderror" 
                                    name="tahun_masuk" 
                                    value="{{ $mahasiswa->tahun_masuk }}"
                                    required>

                                @error('tahun_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection