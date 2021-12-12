@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Jadwal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mahasiswa.store-jadwal') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="dosen" class="col-md-4 col-form-label text-md-right">Dosen</label>

                            <div class="col-md-6">
                                <select id="dosen" type="text" class="form-control @error('dosen') is-invalid @enderror" name="dosen" required>
                                    @foreach ($dataDosen as $dosen)
                                        <option value="{{ $dosen->id }}">{{ $dosen->NIM_NIDN }} - {{ $dosen->name }} </option>
                                    @endforeach
                                </select>

                                @error('dosen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul" class="col-md-4 col-form-label text-md-right">Judul Jadwal</label>

                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name='deskripsi' rows="3" required></textarea>

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="awal" class="col-md-4 col-form-label text-md-right">Pertemuan Awal</label>

                            <div class="col-md-6">
                                <input id="awal" type="datetime-local" class="form-control @error('awal') is-invalid @enderror" name="awal" required>

                                @error('awal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="akhir" class="col-md-4 col-form-label text-md-right">Pertemuan Akhir</label>

                            <div class="col-md-6">
                                <input id="akhir" type="datetime-local" class="form-control @error('akhir') is-invalid @enderror" name="akhir" required>

                                @error('akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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