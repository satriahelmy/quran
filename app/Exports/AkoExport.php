<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Unit;
use App\Ako;
use DB;


class AkoExport implements FromView
{

	function __construct($periode,$business_area,$pos) {
        $this->periode = $periode;
        $this->business_area = $business_area;
        $this->pos = $pos;
	}
	
    public function view(): View
    {
        $data = array();
        $data['units'] = Unit::all();
        if(!empty($this->business_area))
        {
            $akos = Ako::where('pos',$this->pos)->get();
            if($this->business_area == 'ALL')
            {
                $ako_obj = DB::select("select ad.ako_number, month(ad.ako_date) as periode, sum(ad.`value`) as jumlah from ako a, ako_detail ad where a.number = ad.ako_number and month(ad.ako_date) <= '".$this->periode."' and a.pos='".$this->pos."' group by ad.ako_number, month(ad.ako_date)");
                $target_obj = DB::select("SELECT ta.ako_number, sum(ta.pagu) as pagu FROM `target_ako` ta group by ta.ako_number");
            }
            else
            {
                $ako_obj = DB::select("select ad.ako_number, month(ad.ako_date) as periode, sum(ad.`value`) as jumlah from ako a, ako_detail ad where a.number = ad.ako_number and month(ad.ako_date) <= '".$this->periode."' and business_area='".$this->business_area."' and a.pos='".$this->pos."' group by ad.ako_number, month(ad.ako_date)");
                $target_obj = DB::select("SELECT ta.ako_number, sum(ta.pagu) as pagu FROM `target_ako` ta where business_area = '".$this->business_area."' group by ta.ako_number");
            }

            $ako_array = array();
            $target_array = array();
            $ako_kumulatif = array();

            foreach ($ako_obj as $row) 
            {
                $ako_array[$row->ako_number][$row->periode] = $row->jumlah;
                //$ako_array[$row->ako_number] = $row->jumlah;
            }

            foreach ($target_obj as $row) 
            {
                $target_array[$row->ako_number] = $row->pagu;
            }

            foreach ($akos as $ako) 
            {
                $temp = 0;
                for($i=1;$i<=$this->periode;$i++)
                {
                    if(empty($ako_array[$ako->number][$i]))
                    {
                        $temp += 0;
                    }
                    else
                    {
                        $temp += $ako_array[$ako->number][$i];
                    }
                    $ako_kumulatif[$ako->number][$i] = $temp;
                }
            }

            $data['business_area'] = $this->business_area;
            $data['periode'] = $this->periode;
            $data['ako_array'] = $ako_array;
            $data['target_array'] = $target_array;
            $data['ako_kumulatif'] = $ako_kumulatif;
            $data['akos'] = $akos;
            $data['pos'] = $this->pos;
        }
    	return view('export.ako', $data);
    }
}
