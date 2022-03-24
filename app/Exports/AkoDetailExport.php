<?php

namespace App\Exports;

use App\AkoDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Unit;
use App\Ako;
use DB;

class AkoDetailExport implements FromView
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
        if(!empty($this->periode))
        {
            if($this->business_area == 'ALL')
            {
                $ako_detail = DB::select("SELECT ad.account_number, ad.ako_number,ad.no_offsetting_account, ad.document_number, a.pos, ad.description, v.name as vendor, ad.value FROM ako a left join ako_detail ad on a.number = ad.ako_number left join vendor v on ad.vendor = v.vendor where month(ad.ako_date) = ".$this->periode." and a.pos = '".$this->pos."'");
            }
            else
            {
                $ako_detail = DB::select("SELECT ad.account_number,ad.ako_number,ad.no_offsetting_account, ad.document_number, a.pos, ad.description, v.name as vendor, ad.value, t.status FROM ako a left join ako_detail ad on a.number = ad.ako_number left join vendor v on ad.vendor = v.vendor left join tagihan t on ad.document_number = t.document_number where month(ad.ako_date) = ".$this->periode." and a.pos = '".$this->pos."' and ad.business_area = '".$this->business_area."'");
            }
            // dd($ako_detail);
            $data['ako_detail'] = $ako_detail;

            // dd($ako_detail);
        }
    	return view('export.ako_detail',$data);
    }
}
