<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
Use Alert;
Use Auth;

class PelanggaranController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data = Pelanggaran::where('guru_id', Auth::user()->id)->first();
        if(!empty($data)){
            $data = Pelanggaran::where('guru_id', Auth::user()->id)->with('siswa')->get();
            $ada = 1;
        }elseif(Auth::user()->level == 0){
            $data = Pelanggaran::with('guru', 'siswa')->get();
            $ada = 1;
        }else{
            $ada == 0;
            return redirect()->back()
            ->with('toast_error', 'Kamu belum menambahkan pelanggaran!');
        }
        
        view()->share([
            'data' => $data,
            'ada' => $ada
        ]);
        return view('mtsn.pelanggaran');
    }

    public function create(){
        $siswa = Siswa::all();
        view()->share([
            'siswa' => $siswa
        ]);
        return view('mtsn.submit-pelanggaran');  
    }

    public function store(Request $request){
        $request->validate([
            'pelanggaran' => 'required',
            'siswa_id' => 'required'
        ]);
        $data = new Pelanggaran;
        $photo = $request->file('bukti');
        $path = 'bukti_pelanggaran';
        $string = rand(22,5033);
        if ($photo != null) {
            $fileName = $string .'___bukti.'.$photo->getClientOriginalExtension();
            $photo->move($path, $fileName);
            $data->bukti = $path . '/' . $fileName;
        }
        $data->guru_id = Auth::user()->id;
        $data->siswa_id = $request->siswa_id;
        $data->pelanggaran = $request->pelanggaran;
        $data->save();
        return redirect()->route('mtsn.pelanggaran')
        ->with('toast_success', 'Pelanggaran Berhasl ditambahkan!');
    }
}
