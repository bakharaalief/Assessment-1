@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profile</div>

                <div class="card-body">
                    <form 
                        method="POST" 
                        @if ($data->level == 'dosen')
                        action="{{ route('admin.update-user', ['type' => 'dosen', 'id' => $data->id]) }}"
                        @else
                        action="{{ route('admin.update-user', ['type' => 'mahasiswa', 'id' => $data->id]) }}"
                        @endif
                        >
                        
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
                                    value="{{ $data->name }}" 
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
                                    required>{{ $data->alamat }}</textarea>

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
                                    value="{{ $data->tahun_masuk }}" 
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
                                    value="{{ $data->kontak }}" 
                                    required 
                                    autofocus>

                                @error('kontak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>

                            <div class="col-md-6">
                                <select 
                                    id="level" 
                                    type="text" 
                                    class="form-control @error('level') is-invalid @enderror" 
                                    name="level" 
                                    required>
                                    <option value="dosen" @if ($data->level == 'dosen') selected @endif>Dosen</option>
                                    <option value="mahasiswa" @if ($data->level == 'mahasiswa') selected @endif>Mahasiswa</option>
                                </select>

                                @error('level')
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
