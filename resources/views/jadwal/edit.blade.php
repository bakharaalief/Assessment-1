@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Jadwal</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jadwal.update', ['jadwal' => $jadwal->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="mahasiswa" class="col-md-4 col-form-label text-md-right">Mahasiswa</label>

                            <div class="col-md-6">
                                <select id="mahasiswa" type="text" class="form-control @error('mahasiswa') is-invalid @enderror" name="mahasiswa" required>
                                    @foreach ($dataMahasiswa as $mahasiswa)
                                        <option value="{{ $mahasiswa->id }}" @if($jadwal->mahasiswa_id == $mahasiswa->id) selected @endif>{{ $mahasiswa->NIM_NIDN }} - {{ $mahasiswa->name }} </option>
                                    @endforeach
                                </select>

                                @error('mahasiswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dosen" class="col-md-4 col-form-label text-md-right">Dosen</label>

                            <div class="col-md-6">
                                <select id="dosen" type="text" class="form-control @error('dosen') is-invalid @enderror" name="dosen" required>
                                    @foreach ($dataDosen as $dosen)
                                        <option value="{{ $dosen->id }}" @if($jadwal->dosen_id == $dosen->id) selected @endif>{{ $dosen->NIM_NIDN }} - {{ $dosen->name }} </option>
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
                                <input 
                                    id="judul" 
                                    type="text" 
                                    class="form-control @error('judul') is-invalid @enderror" 
                                    name="judul" 
                                    value="{{ $jadwal->judul }}"
                                    required>

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
                                <textarea 
                                    class="form-control @error('deskripsi') is-invalid @enderror" 
                                    id="deskripsi" 
                                    name='deskripsi' 
                                    rows="3" 
                                    required>{{ $jadwal->deskripsi }}</textarea>

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
                                <input 
                                    id="awal" 
                                    type="datetime-local" 
                                    class="form-control @error('awal') is-invalid @enderror" 
                                    name="awal" 
                                    value="{{ date("Y-m-d\TH:i:s", strtotime($jadwal->awal)) }}"
                                    required>

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
                                <input 
                                    id="akhir" 
                                    type="datetime-local" class="form-control @error('akhir') is-invalid @enderror" 
                                    name="akhir" 
                                    value="{{ date("Y-m-d\TH:i:s", strtotime($jadwal->akhir)) }}"
                                    required>

                                @error('akhir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select 
                                    id="status" 
                                    type="text" 
                                    class="form-control @error('status') is-invalid @enderror" 
                                    name="status" 
                                    required>
                                    <option value="terima" @if ($jadwal->status == 'terima') selected @endif>Terima</option>
                                    <option value="tolak" @if ($jadwal->status == 'tolak') selected @endif>Tolak</option>
                                    <option value="tunggu" @if ($jadwal->status == 'tunggu') selected @endif>Tunggu</option>
                                </select>

                                @error('status')
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