<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gelombang;
use App\PerairanGelombangToday;
use App\PerairanGelombangH1;
use App\PerairanGelombangH2;
use App\PerairanGelombangH3;

class GelombangController extends Controller
{
    public function index()
    {
        $url = "https://peta-maritim.bmkg.go.id/public_api/overview/gelombang.json";
        $waves = (array)json_decode(file_get_contents($url));
        $keys = array_keys($waves);

        foreach ($keys as $key) 
        {
            $today = PerairanGelombangToday::where('wp_1',$key)->first();
            // dd(env('DB_SCHEMA'));
            $today->issued = $waves[$key]->issued;
            $today->kondisi = $waves[$key]->today;
            $today->created_at = date("Y-m-d H:i:s");
            $today->save();

            $h1 = PerairanGelombangH1::where('wp_1',$key)->first();
            $h1->issued = $waves[$key]->issued;
            $h1->kondisi = $waves[$key]->tommorow;
            $h1->created_at = date("Y-m-d H:i:s");
            $h1->save();

            $h2 = PerairanGelombangH2::where('wp_1',$key)->first();
            $h2->issued = $waves[$key]->issued;
            $h2->kondisi = $waves[$key]->h2;
            $h2->created_at = date("Y-m-d H:i:s");
            $h2->save();

            $h3 = PerairanGelombangH3::where('wp_1',$key)->first();
            $h3->issued = $waves[$key]->issued;
            $h3->kondisi = $waves[$key]->h2;
            $h3->created_at = date("Y-m-d H:i:s");
            $h3->save();
        }
    }

    public function sendRequest($url)
    {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
        // print_r($result);
    }

    // public function index()
    // {
    //     $url = "https://peta-maritim.bmkg.go.id/public_api/overview/gelombang.json";
    //     $waves = (array)json_decode($this->sendRequest($url));
    //     $keys = array_keys($waves);

    //     foreach ($keys as $key) 
    //     {
    //         $gelombang = new Gelombang();
    //         $gelombang->wp_1 = $key;
    //         $gelombang->issued = $waves[$key]->issued;
    //         $gelombang->today = $waves[$key]->today;
    //         $gelombang->tomorrow = $waves[$key]->tommorow;
    //         $gelombang->h2 = $waves[$key]->h2;
    //         $gelombang->h3 = $waves[$key]->h3;
    //         $gelombang->save();
    //     }
    // }
}
