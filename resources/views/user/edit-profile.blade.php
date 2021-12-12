@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form method="POST" 
                        @if (Auth::user()->level == 'dosen')
                        action="{{ route('dosen.update-profile') }}"
                        @else
                        action="{{ route('mahasiswa.update-profile') }}"
                        @endif>
                        
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ Auth::user()->name }}" 
                                    required  
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">alamat</label>

                            <div class="col-md-6">
                                <textarea 
                                    class="form-control @error('alamat') is-invalid @enderror" 
                                    id="alamat" 
                                    name='alamat' 
                                    rows="3" 
                                    required>{{ Auth::user()->alamat }}</textarea>

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
                                    value="{{ Auth::user()->tahun_masuk }}" 
                                    required 
                                    autofocus>

                                @error('tahun_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kontak" class="col-md-4 col-form-label text-md-right">Kontak</label>

                            <div class="col-md-6">
                                <input 
                                    id="kontak" 
                                    type="text" 
                                    class="form-control @error('kontak') is-invalid @enderror" 
                                    name="kontak" 
                                    value="{{ Auth::user()->kontak }}" 
                                    required 
                                    autofocus>

                                @error('kontak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
