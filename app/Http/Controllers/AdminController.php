<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

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
}
