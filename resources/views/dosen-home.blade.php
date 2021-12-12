@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="font-weight-bold">List Jadwal</h1>
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
                <th scope="col">Mahasiswa</th>
                <th scope="col">NIM</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Awal</th>
                <th scope="col">Akhir</th>
                <th scope="col">Status</th>
                <th scope="col">Ubah Status</th>
                <th scope="col">Show</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $jadwal)
                <tr>
                    <td class="px-2">{{ $jadwal->getMahasiswa()->name }}</td>
                    <td class="px-2">{{ $jadwal->getMahasiswa()->NIM_NIDN }}</td>
                    <td class="px-2">{{ $jadwal->judul }}</td>
                    <td class="px-2">{{ $jadwal->deskripsi }}</td>
                    <td class="px-2">{{ $jadwal->awal }}</td>
                    <td class="px-2">{{ $jadwal->akhir }}</td>
                    <td 
                        @if ($jadwal->status == 'terima')
                        class="px-2 text-success font-weight-bold"
                        @elseif($jadwal->status == 'tolak')
                        class="px-2 text-danger font-weight-bold"
                        @else
                        class="px-2 font-weight-bold"
                        @endif
                        >{{ $jadwal->status }}
                    </td>
                    <td class="px-2">
                        <button 
                            class="btn btn-warning status"
                            data-toggle="modal" 
                            data-target="#exampleModal"
                            data-id="{{ $jadwal->id }}"
                            data-status="{{ $jadwal->status }}">Status</button>
                    </td>
                    <td class="px-2">
                        <a class="btn btn-info" href="{{ route('dosen.show-jadwal', ['id' => $jadwal->id]) }}">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <!-- Modal update status-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-update" method="post">
                    @method('PUT')
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="statusInput">Status</label>
                            <select class="form-control" id="statusInput" name="status">
                                <option value="terima">Terima</option>
                                <option value="tolak">Tolak</option>
                                <option value="tunggu">Tunggu</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $(function(){
        $('.status').on("click", function(){
            var status = $(this).data('status')
            var id = $(this).data('id')

            $('#statusInput').val(status)
            $("#form-update").attr('action', '/dosen/update-status/' + id)
        })
    })
</script>
@endSection