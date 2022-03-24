<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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
        return view('home');
    }

    public function dashboard()
    {
    	$beban_usaha_query = "select MONTH(posting_date) as periode, sum(ad.value) as beban_usaha 
                    from account_detail ad, account a 
                    where a.number = ad.account_number and a.group_id < 10 
                    group by MONTH(posting_date)";
        $beban_pinjaman_query = "select MONTH(posting_date) as periode, sum(ad.value) as beban_pinjaman 
                    from account_detail ad, account a 
                    where a.number = ad.account_number and a.group_id = 10 
                    group by MONTH(posting_date)";
        $kwhjual_query = "select periode, sum(value) as kwhjual from kwhjual group by periode";
        $psa_query = "select p.periode, sum(p.psa) as psa from psa p group by periode";
        $pendapatan_query = "select MONTH(posting_date) as periode, sum(ad.value) as pendapatan 
                    from account_detail ad, account a 
                    where a.number = ad.account_number and a.group_id = 11
                    group by MONTH(posting_date)";

        $beban_usaha_obj = DB::select($beban_usaha_query);
        $beban_pinjaman_obj = DB::select($beban_pinjaman_query);
        $kwhjual_obj = DB::select($kwhjual_query);
        $psa_obj = DB::select($psa_query);
        $pendapatan_obj = DB::select($pendapatan_query);

        $beban_usaha_arr = array();
        $beban_pinjaman_arr = array();
        $kwhjual_arr = array();
        $psa_arr = array();
        $pendapatan_arr = array();

        foreach ($beban_usaha_obj as $row) 
		{
			$beban_usaha_arr[$row->periode] = $row->beban_usaha;
		}

		foreach ($beban_pinjaman_obj as $row) 
		{
			$beban_pinjaman_arr[$row->periode] = $row->beban_pinjaman;
		}

		foreach ($pendapatan_obj as $row) 
		{
			$pendapatan_arr[$row->periode] = $row->pendapatan;
		}

		foreach ($kwhjual_obj as $row) 
		{
			$kwhjual_arr[$row->periode] = $row->kwhjual;
		}

		foreach ($psa_obj as $row) 
		{
			$psa_arr[$row->periode] = $row->psa;
		}

		$beban_perkwh_kumulatif = array();
		$pendapatan_perkwh_kumulatif = array();
		$bpp_kumulatif = array();

		$sum_beban_usaha = 0;
		$sum_kwhjual = 0;
		$sum_beban_pinjaman = 0;
		$sum_pendapatan = 0;
		$sum_psa = 0;

		for($i=1;$i<=12;$i++)
		{
			if(!empty($beban_usaha_arr[$i])) $sum_beban_usaha += $beban_usaha_arr[$i];
			if(!empty($beban_pinjaman_arr[$i])) $sum_beban_pinjaman += $beban_pinjaman_arr[$i];
			if(!empty($kwhjual_arr[$i])) $sum_kwhjual += $kwhjual_arr[$i];
			if(!empty($pendapatan_arr[$i])) $sum_pendapatan += $pendapatan_arr[$i];
			if(!empty($psa_arr[$i])) $sum_psa += $psa_arr[$i];

			if($sum_kwhjual != 0) 
			{
				$beban_perkwh_kumulatif[$i] = ($sum_beban_usaha + $sum_beban_pinjaman) / $sum_kwhjual;
				$pendapatan_perkwh_kumulatif[$i] = -1 * ($sum_pendapatan / $sum_kwhjual);
				$bpp_kumulatif[$i] = ($sum_beban_usaha + $sum_beban_pinjaman - $sum_psa) / $sum_kwhjual;
				$beban_akhir = ($sum_beban_usaha + $sum_beban_pinjaman) / $sum_kwhjual;
				$pendapatan_akhir = -1 * ($sum_pendapatan / $sum_kwhjual);
			}
			else
			{
				$beban_perkwh_kumulatif[$i] = 0;
				$pendapatan_perkwh_kumulatif[$i] = 0;
				$bpp_kumulatif[$i] = 0;
			}
		}

		$data['beban_perkwh_kumulatif'] = $beban_perkwh_kumulatif;
		$data['pendapatan_perkwh_kumulatif'] = $pendapatan_perkwh_kumulatif;
		$data['bpp_kumulatif'] = $bpp_kumulatif;
		$data['beban_akhir'] = $beban_akhir;
		$data['pendapatan_akhir'] = $pendapatan_akhir;

		// dd($data);

        return view('dashboard/dashboard',$data);
    }

    public function test()
    {

		$curl = curl_init();
		$token = "TId5mvyTx0r6rj2lwjzl8aw6aBsdiwkgc81F4oorMDbQVS7RX1hhiXSl0gOySIzN";
		$data = [
		    'phone' => '+628981711081',
		    'message' => 'hellow world',
		];

		curl_setopt($curl, CURLOPT_HTTPHEADER,
		    array(
		        "Authorization:".$token,
		    )
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://sambi.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo "<pre>";
		print_r($result);

    }
}
