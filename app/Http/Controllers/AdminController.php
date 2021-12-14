<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    public function index()
    {
        return View('admin-home');
    }

    public function dosenIndex()
    {
        $data = User::where('level', 'dosen')->get();
        return View('admin.dosen-index')->with(compact('data'));
    }

    public function mahasiswaIndex()
    {
        $data = User::where('level', 'mahasiswa')->get();
        return View('admin.mahasiswa-index')->with(compact('data'));
    }

    public function createUser($type)
    {
        return view('admin.create-user')->with('type', $type);
    }

    public function storeUser($type, Request $request)
    {
        if ($type == 'dosen') {
            User::create([
                'NIM_NIDN' => rand(10000000, 99999999),
                'name' => $request['name'],
                'email' => $request['email'],
                'alamat' => $request['alamat'],
                'tahun_masuk' => $request['tahun_masuk'],
                'kontak' => $request['kontak'],
                'level' => 'dosen',
                'password' => bcrypt($request['password'])
            ]);

            return redirect(route('admin.dosen-index'))
                ->with(['success' => 'Dosen Berhasil Ditambah']);
        } else {
            User::create([
                'NIM_NIDN' => rand(10000000, 99999999),
                'name' => $request['name'],
                'email' => $request['email'],
                'alamat' => $request['alamat'],
                'tahun_masuk' => $request['tahun_masuk'],
                'kontak' => $request['kontak'],
                'level' => 'mahasiswa',
                'password' => bcrypt($request['password'])
            ]);

            return redirect(route('admin.mahasiswa-index'))
                ->with(['success' => 'Mahasiswa Berhasil Ditambah']);
        }
    }

    public function editUser($id)
    {
        $data = User::findOrFail($id);
        return view('admin.edit-user')->with(compact('data'));
    }

    public function updateUser($type, $id, Request $request)
    {
        $cekAda = User::where('id', $id)->first();

        if (isset($cekAda)) {
            User::where('id', $id)->update([
                'name' => $request['name'],
                'alamat' => $request['alamat'],
                'tahun_masuk' => $request['tahun_masuk'],
                'kontak' => $request['kontak'],
                'level' => $request['level']
            ]);

            if ($type == 'dosen') {
                return redirect(route('admin.dosen-index'))
                    ->with(['success' => 'Dosen Berhasil Diupdate']);
            } else {
                return redirect(route('admin.mahasiswa-index'))
                    ->with(['success' => 'Mahasiswa Berhasil Diupdate']);
            }
        } else {
            if ($type == 'dosen') {
                return redirect(route('admin.dosen-index'))
                    ->with(['failed' => 'Dosen Tidak Ditemukan']);
            } else {
                return redirect(route('admin.mahasiswa-index'))
                    ->with(['failed' => 'Mahasiswa Tidak Ditemukan']);
            }
        }
    }

    public function destroyUser($type, $id)
    {
        User::destroy($id);

        if ($type == 'dosen') return redirect(route('admin.dosen-index'))->with(['success' => 'Dosen Berhasil Dihapus']);
        else return redirect(route('admin.mahasiswa-index'))->with(['success' => 'Mahasiswa Berhasil Dihapus']);
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

            return redirect(route('admin.profile'))
                ->with(['success' => 'User Berhasil Diupdate']);
        } else {
            return redirect(route('admin.profile'))
                ->with(['failed' => 'User Tidak Ditemukan']);
        }
    }
}
