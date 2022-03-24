<?php

namespace App\Exports;

use App\AccountDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class AccountDetailExport implements FromView
{

	function __construct($periode,$business_area,$group_id,$account_number) {
        $this->periode = $periode;
        $this->business_area = $business_area;
        $this->group_id = $group_id;
        $this->account_number = $account_number;
	}

    public function view(): View
    {
        if($this->business_area == 'ALL')
        {
            $query = "SELECT ad.business_area, ad.`value`, ad.cost_center, ad.username, ad.`order`, ad.vendor, ad.document_date, ad.document_number, ad.document_type, ad.no_offsetting_account, ad.name_offsetting_account, ad.wbs_element, ad.account_number, ad.posting_date, a.`name`, ad.description FROM `account_detail` ad, account a where a.number = ad.account_number and ad.account_number=".$this->account_number." and a.group_id = '".$this->group_id."' and MONTH(posting_date) = ".$this->periode;
            $account_details = DB::select($query);
        }
        else
        {
            $query = "SELECT ad.business_area, ad.`value`, ad.cost_center, ad.username, ad.`order`, ad.vendor, ad.document_date, ad.document_number, ad.document_type, ad.no_offsetting_account, ad.name_offsetting_account, ad.wbs_element, ad.account_number, ad.posting_date, a.`name`, ad.description FROM `account_detail` ad, account a where a.number = ad.account_number and ad.account_number=".$this->account_number." and ad.business_area = '".$this->business_area."' and a.group_id = '".$this->group_id."' and MONTH(posting_date) = ".$this->periode;
            $account_details = DB::select($query);
        }
        // dd($query);

        $data['account_details'] = $account_details;
        $data['periode'] = $this->periode;

        return view('export.account_detail', $data);
    }
}
