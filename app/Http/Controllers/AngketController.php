<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angket;
use App\Models\Siswa;
use App\Models\HasilAngket;
use App\Models\Prosentase;
Use Alert;

class AngketController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index($pilihan)
    {
        $data = Angket::all();
        //print($data);
        $jml = $data->count();
        $kelas7 = Siswa::where('tingkat', 7)->get();
        $kelas8 = Siswa::where('tingkat', 8)->get();
        $kelas9 = Siswa::where('tingkat', 9)->get();

        view()->share([
            'data' => $data,
            'jml' => $jml,
            'kls7' => $kelas7,
            'kls8' => $kelas8,
            'kls9' => $kelas9,
            'pilihan' => $pilihan
        ]);

        return view('mtsn.angket');
    }

    public function store(Request $request)
    {
        $data = new HasilAngket();
        $count = 0;
        $data->siswa_id = $request->siswa_id;
        for($i=1; $i<=180; $i++){
            $data->{'jawaban' . $i} = $request->{'jawaban_' . $i}; 
            if($request->{'jawaban_' . $i} === "Ya") $count++;
        }
        $siswa = Siswa::find($request->siswa_id);
        $data->kelas = $siswa->kelas;
        $data->save();

        $tingkat = $siswa->tingkat;
        $jml = Siswa::where('tingkat', $tingkat)->count();
        $prosentase = new Prosentase();
        $prosentase->siswa_id = $data->siswa_id;
        $prosentase->angket_id = $data->id;
        $prosentase->prosentase = round($count/$jml, 2) . '% dari '. $jml . ' siswa';
        $prosentase->save();
        return redirect()->route('mtsn.angket1')
        ->with('success', 'Terima kasih sudah mengisi<br>' . $siswa->nama . ' ' . $siswa->kelas . '<br>Prosentase kamu: <b>' .$prosentase->prosentase . '</b>');
    }

    public function detail($id)
    {
        $data = HasilAngket::findOrFail($id);
        $angket = Angket::all();
        return view('mtsn.detail-angket', ['data' => $data, 'angket' => $angket]);
    }
}
