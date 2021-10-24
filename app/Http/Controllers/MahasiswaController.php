<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all data from db
        $data = Mahasiswa::all();

        return View('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mahasiswa::create([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'alamat' => $request['alamat'],
            'tahun_masuk' => $request['tahun_masuk']
        ]);

        return redirect(route('mahasiswa.index'))->with(['success' => 'Mahasiswa Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mahasiswa::where('id', $id)->update([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'alamat' => $request['alamat'],
            'tahun_masuk' => $request['tahun_masuk']
        ]);

        return redirect(route('mahasiswa.index'))->with(['success' => 'Mahasiswa Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect(route('mahasiswa.index'))->with(['success' => 'Mahasiswa Berhasil Di Delete']);
    }
}
