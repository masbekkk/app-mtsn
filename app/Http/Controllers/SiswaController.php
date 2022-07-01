<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Siswa::all();
        view()->share([
            'data' => $data
        ]);

        return view('mtsn.siswa');
    }

    public function add()
    {
        $kelas = range('A', 'J');

        return view('mtsn.siswa.add', ['kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        $data = new Siswa();
        $data->nisn = $request->nisn;
        $data->nama = $request->nama;
        $data->kelas = $request->tingkat. '-'.$request->kelas;
        $data->tingkat = $request->tingkat;
        $data->save();
        return redirect()->route('mtsn.siswa')
        ->with('toast_success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Siswa::findOrFail($id);
        view()->share([
            'data' => $data
        ]);
        return view('mtsn.siswa.edit');
    }

    public function update($id, Request $request)
    {
        $data = Siswa::findOrFail($id);
        $data->nisn = $request->nisn;
        $data->nama = $request->nama;
        $data->kelas = $request->tingkat . '-' . $request->kelas;
        $data->tingkat = $request->tingkat;
        $data->save();
        return redirect()->route('mtsn.siswa')
        ->with('toast_success', 'Data siswa berhasil diupdate!');
    }

    public function delete($id)
    {
        $data = Siswa::findOrFail($id)->delete();
        
        return redirect()->route('mtsn.siswa')
        ->with('toast_success', 'Data siswa berhasil dihapus!');
    }
}
