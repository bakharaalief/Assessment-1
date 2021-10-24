<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jadwal::all();
        return View('jadwal.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataMahasiswa = Mahasiswa::all();
        $dataDosen = Dosen::all();

        return View('jadwal.create')
            ->with('dataMahasiswa', $dataMahasiswa)
            ->with('dataDosen', $dataDosen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jadwal::create([
            'mahasiswa_id' => $request['mahasiswa'],
            'dosen_id' => $request['dosen'],
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
            'awal' => $request['awal'],
            'akhir' => $request['akhir'],
        ]);

        return redirect(route('jadwal.index'))->with(['success' => 'Jadwal Berhasil Di Buat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return View('jadwal.show')->with('jadwal', $jadwal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMahasiswa = Mahasiswa::all();
        $dataDosen = Dosen::all();
        $jadwal = Jadwal::findOrFail($id);

        return View('jadwal.edit')
            ->with('jadwal', $jadwal)
            ->with('dataMahasiswa', $dataMahasiswa)
            ->with('dataDosen', $dataDosen);
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
        Jadwal::where('id', $id)->update([
            'mahasiswa_id' => $request['mahasiswa'],
            'dosen_id' => $request['dosen'],
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
            'awal' => $request['awal'],
            'akhir' => $request['akhir'],
        ]);

        return redirect(route('jadwal.index'))->with(['success' => 'Jadwal Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect(route('jadwal.index'))->with(['success' => 'Jadwal Berhasil Di Delete']);
    }
}
