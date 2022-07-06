<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prosentase;

class ProsentaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Prosentase::with('siswa')->get();
        return view('mtsn.hasilangket', ['data' => $data]);
    }
}
