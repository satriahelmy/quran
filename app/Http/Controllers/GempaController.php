<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GempaController extends Controller
{
    public function gempaTerkini()
    {
        $url = "https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json";
        $gempa = json_decode(file_get_contents($url));
        $output = $gempa->Infogempa->gempa;

        $id = 1;
        $output_new = array();
        foreach ($output as $row) 
        {
            $obj = array(
                'id' => $id,
                'Tanggal' => $row->Tanggal,
                'Jam' => $row->Jam,
                'DateTime' => $row->DateTime,
                'Coordinates' => $row->Coordinates,
                'Lintang' => preg_replace("/[^0-9.]/", "", $row->Lintang),
                'Bujur' => preg_replace("/[^0-9.]/", "", $row->Bujur),
                'Magnitude' => $row->Magnitude,
                'Kedalaman' => $row->Kedalaman,
                'Wilayah' => $row->Wilayah,
                'Potensi' => $row->Potensi
            );
            if(explode(" ", $row->Lintang)[1] == "LS")
            {
                $obj['Lintang'] = "-".$obj['Lintang'];
            }
            $id++;
            array_push($output_new, $obj);
        }
        return response()->json($output_new); 
    }

    public function autoGempa()
    {
        $url = "https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json";
        $gempa = json_decode(file_get_contents($url));
        $row = $gempa->Infogempa->gempa;
        $id = 1;
        $output_new = array(
            'id' => $id,
            'Tanggal' => $row->Tanggal,
            'Jam' => $row->Jam,
            'DateTime' => $row->DateTime,
            'Coordinates' => $row->Coordinates,
            'Lintang' => preg_replace("/[^0-9.]/", "", $row->Lintang),
            'Bujur' => preg_replace("/[^0-9.]/", "", $row->Bujur),
            'Magnitude' => $row->Magnitude,
            'Kedalaman' => $row->Kedalaman,
            'Wilayah' => $row->Wilayah,
            'Potensi' => $row->Potensi,
            'Dirasakan' => $row->Dirasakan,
            'Shakemap' => $row->Shakemap
        );
        if(explode(" ", $row->Lintang)[1] == "LS")
        {
            $output_new['Lintang'] = "-".$output_new['Lintang'];
        }
        return response()->json($output_new); 
    }

    public function gempaDirasakan()
    {
        $url = "https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.json";
        $gempa = json_decode(file_get_contents($url));
        $output = $gempa->Infogempa->gempa;

        $id = 1;
        $output_new = array();
        foreach ($output as $row) 
        {
            $obj = array(
                'id' => $id,
                'Tanggal' => $row->Tanggal,
                'Jam' => $row->Jam,
                'DateTime' => $row->DateTime,
                'Coordinates' => $row->Coordinates,
                'Lintang' => preg_replace("/[^0-9.]/", "", $row->Lintang),
                'Bujur' => preg_replace("/[^0-9.]/", "", $row->Bujur),
                'Magnitude' => $row->Magnitude,
                'Kedalaman' => $row->Kedalaman,
                'Wilayah' => $row->Wilayah,
                'Dirasakan' => $row->Dirasakan
            );
            if(explode(" ", $row->Lintang)[1] == "LS")
            {
                $obj['Lintang'] = "-".$obj['Lintang'];
            }
            $id++;
            array_push($output_new, $obj);
        }
        return response()->json($output_new); 
    }
}
