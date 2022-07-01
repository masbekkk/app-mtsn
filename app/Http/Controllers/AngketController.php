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

    public function index()
    {
        $data = Angket::all();
        //print($data);
        $jml = $data->count();
        $kelas7 = Siswa::where('tingkat', 7)->get();
        $kelas8 = Siswa::where('tingkat', 8)->get();
        $kelas9 = Siswa::where('tingkat', 9)->get();
        $pilihan = 'default';

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

    public function kelas7(){
        $pilihan = 'kelas7';
        $data = Angket::all();
        //print($data);
        $jml = $data->count();
        $kelas7 = Siswa::where('tingkat', 7)->get();
        $kelas8 = Siswa::where('tingkat', 8)->get();
        $kelas9 = Siswa::where('tingkat', 9)->get();
        // $pilihan = 'default';

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

    public function kelas8(){
        $pilihan = 'kelas8';
        $data = Angket::all();
        //print($data);
        $jml = $data->count();
        $kelas7 = Siswa::where('tingkat', 7)->get();
        $kelas8 = Siswa::where('tingkat', 8)->get();
        $kelas9 = Siswa::where('tingkat', 9)->get();
        // $pilihan = 'default';

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

    public function kelas9(){
        $pilihan = 'kelas9';
        $data = Angket::all();
        //print($data);
        $jml = $data->count();
        $kelas7 = Siswa::where('tingkat', 7)->get();
        $kelas8 = Siswa::where('tingkat', 8)->get();
        $kelas9 = Siswa::where('tingkat', 9)->get();
        // $pilihan = 'default';

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
        $prosentase->prosentase = ($count/$jml);
        $prosentase->save();
        return redirect()->route('mtsn.angket')
        ->with('success', 'Terima kasih sudah mengisi<br>' . $siswa->nama . ' - ' . $siswa->kelas . '<br>Prosentase kamu <b>' .$prosentase->prosentase . '%</b>');
    //     ->with('html', '<i>HTML</i> <u>example</u>',"
    //     You can use <b>bold text</b>,
    //     <a href='//github.com'>links</a>
    //     and other HTML tags
    //   ",'success');      

    }


}
