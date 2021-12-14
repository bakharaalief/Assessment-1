<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function index()
    {
        return View('dosen-home');
    }

    public function jadwalIndex()
    {
        $userId = Auth::user()->id;
        $data = Jadwal::where('dosen_id', $userId)->get();
        return View('dosen.index')->with(compact('data'));
    }

    public function updateStatus($id, Request $request)
    {
        $cekAda =  Jadwal::where('id', $id)->first();

        if (isset($cekAda)) {
            Jadwal::where('id', $id)->update([
                'status' => $request['status']
            ]);

            return redirect(route('dosen.jadwal'))
                ->with(['success' => 'Jadwal Berhasil Diupdate']);
        } else {
            return redirect(route('dosen.jadwal'))
                ->with(['failed' => 'Jadwal Tidak Ditemukan']);
        }
    }

    public function showJadwal($id)
    {
        $jadwal =  Jadwal::findOrFail($id);
        return view('jadwal.show')->with(compact('jadwal'));
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

            return redirect(route('dosen.profile'))
                ->with(['success' => 'User Berhasil Diupdate']);
        } else {
            return redirect(route('dosen.profile'))
                ->with(['failed' => 'User Tidak Ditemukan']);
        }
    }
}
