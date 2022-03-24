<?php

namespace App\Exports;

use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class AccountExport implements FromView
{

	function __construct($periode,$business_area,$group_id) {
        $this->periode = $periode;
        $this->business_area = $business_area;
        $this->group_id = $group_id;
	}

    public function view(): View
    {
        if($this->business_area == 'ALL')
        {
            $query_account = "select a.number, ad.business_area, MONTH(ad.posting_date) as periode, sum(ad.value) as account_value, a.group_id, g.name from account a, account_detail ad, `group` g where ad.account_number = a.number and g.id = a.group_id and MONTH(ad.posting_date) <= '".$this->periode."' and a.group_id=".$this->group_id;
            $query_account .= " group by a.number, MONTH(ad.posting_date) order by a.group_id asc";    
        }
        else
        {
            $query_account = "select a.number, ad.business_area, MONTH(ad.posting_date) as periode, sum(ad.value) as account_value, a.group_id, g.name from account a, account_detail ad, `group` g where ad.account_number = a.number and g.id = a.group_id and MONTH(ad.posting_date) <= '".$this->periode."' and ad.business_area = '".$this->business_area."' and a.group_id=".$this->group_id;
            $query_account .= " group by a.number, MONTH(ad.posting_date) order by a.group_id asc";    
        }
    	
        $account_obj = DB::select($query_account);

        foreach ($account_obj as $row) 
        {
            $account_array[$row->periode][$row->number] = $row;
        }

        $data['account_array'] = $account_array;
        $data['periode'] = $this->periode;
        $data['accounts'] = Account::where('group_id',$this->group_id)->get();

        return view('export.account', $data);
    }
}
