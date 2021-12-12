<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data = Jadwal::where('mahasiswa_id', $userId)->get();
        return View('mahasiswa-home')->with(compact('data'));
    }

    public function createJadwal()
    {
        $dataDosen = User::where('level', 'dosen')->get();
        return View('jadwal.create-mahasiswa')->with(compact('dataDosen'));
    }

    public function storeJadwal(Request $request)
    {
        $idMahasiswa = Auth::user()->id;

        Jadwal::create([
            'mahasiswa_id' => $idMahasiswa,
            'dosen_id' => $request['dosen'],
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
            'awal' => $request['awal'],
            'akhir' => $request['akhir'],
        ]);

        return redirect(route('mahasiswa.index'))->with(['success' => 'Jadwal Berhasil Di Buat']);
    }

    public function showJadwal($id)
    {
        $jadwal =  Jadwal::findOrFail($id);
        return view('jadwal.show')->with(compact('jadwal'));
    }

    public function editJadwal($id)
    {
        $dataDosen = User::where('level', 'dosen')->get();
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.edit-mahasiswa')->with(compact('jadwal', 'dataDosen'));
    }

    public function updateJadwal($id, Request $request)
    {
        $idMahasiswa = Auth::user()->id;
        $cekAda =  Jadwal::where('id', $id)->first();

        if (isset($cekAda)) {
            Jadwal::where('id', $id)->update([
                'mahasiswa_id' => $idMahasiswa,
                'dosen_id' => $request['dosen'],
                'judul' => $request['judul'],
                'deskripsi' => $request['deskripsi'],
                'awal' => $request['awal'],
                'akhir' => $request['akhir'],
            ]);

            return redirect(route('mahasiswa.index'))
                ->with(['success' => 'Jadwal Berhasil Diupdate']);
        } else {
            return redirect(route('mahasiswa.index'))
                ->with(['failed' => 'Jadwal Tidak Ditemukan']);
        }
    }

    public function destroyJadwal($id)
    {
        Jadwal::destroy($id);
        return redirect(route('mahasiswa.index'))->with(['success' => 'Jadwal Berhasil Di Delete']);
    }

    public function profile()
    {
        return view('user.user-profile');
    }

    public function editProfile()
    {
        return view('user.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $cekAda = User::where('id', $userId)->first();

        if (isset($cekAda)) {
            User::where('id', $userId)->update([
                'name' => $request['name'],
                'alamat' => $request['alamat'],
                'tahun_masuk' => $request['tahun_masuk'],
                'kontak' => $request['kontak']
            ]);

            return redirect(route('mahasiswa.profile'))
                ->with(['success' => 'User Berhasil Diupdate']);
        } else {
            return redirect(route('mahasiswa.profile'))
                ->with(['failed' => 'User Tidak Ditemukan']);
        }
    }
}
