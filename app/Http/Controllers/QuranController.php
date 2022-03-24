<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuranController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
    	$surah = file_get_contents("https://api.quran.sutanlab.id/surah");
    	$surah = json_decode($surah);
    	$daftar_surat = $surah->data;
    	$data['surat'] = $daftar_surat;
        return view('surah/list',$data);
    }

    public function show(Request $request)
    {
    	$surah = file_get_contents("https://api.quran.sutanlab.id/surah/".$request->id);
    	$surah = json_decode($surah);
    	$surat = $surah->data;
    	$data['surat'] = $surat;
        return view('surah/show',$data);
    }
}
