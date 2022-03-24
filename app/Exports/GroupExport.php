<?php

namespace App\Exports;

use App\Account;
use App\Group;
use App\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class GroupExport implements FromView
{

	function __construct($periode,$business_area) {
        $this->periode = $periode;
        $this->business_area = $business_area;
	}

    public function view(): View
    {
        $data = array();
        $units = Unit::all();
        $groups = Group::whereNull('is_lainlain')->get();
        $data['units'] = $units;
        $data['groups'] = $groups;
        if(!empty($this->periode) && !empty($this->business_area))
        {
            $query_group = "select a.group_id, MONTH(ad.posting_date) as periode, sum(ad.`value`) as group_value from `group` g,account a,account_detail ad where g.id = a.group_id and a.number = ad.account_number ";
            $query_target = "select g.id, g.name, sum(t.`value`)*".$this->periode."/12 as target_value from target t, `group` g where t.group_id = g.id ";
            $query_kwhjual = "select k.periode, sum(k.`value`) as kwhjual_value from kwhjual k ";
            $query_psa = "select p.periode, sum(p.psa) as psa_value from psa p ";
            // $query_beban = "select month(ad.posting_date) as periode, sum(ad.`value`) as total_beban
            //             from account_detail ad, account a 
            //             where ad.account_number = a.number and month(ad.posting_date) <= '".$this->periode."'  and a.group_id <= 10 ";
            
            if($this->business_area != 'ALL')
            {
                $query_group .= " and ad.business_area = '".$this->business_area."'";
                $query_target .= " and t.business_area = '".$this->business_area."'";
                $query_kwhjual .= " where k.business_area = '".$this->business_area."'";
                $query_psa .= "where p.business_area = '".$this->business_area."'";
                // $query_beban .= "where ad.business_area = '".$this->business_area."'";

            }
            $query_group .= " group by month(ad.posting_date), a.group_id";
            $query_target .= " group by g.id";
            $query_kwhjual .= " group by k.periode";
            $query_psa .= " group by p.periode";
            // $query_beban .= " group by month(ad.posting_date)";

            $group_obj = DB::select($query_group);
            $target_obj = DB::select($query_target);
            $kwhjual_obj = DB::select($query_kwhjual);
            $psa_obj = DB::select($query_psa);
            // $beban_obj = DB::select($query_beban);

            // dd($beban_obj);

            $group_arr = array();
            $target_arr = array();
            $kwhjual_arr = array();
            $psa_arr = array();
            $beban_arr = array();

            foreach ($target_obj as $row) 
            {
                $target_arr[$row->id] = $row->target_value;
            }

            foreach ($group_obj as $row) 
            {
                $group_arr[$row->group_id][$row->periode] = $row->group_value;
                if($row->group_id < 11)
                {
                    if(empty($beban_arr[$row->periode])) $beban_arr[$row->periode] = 0;
                    $beban_arr[$row->periode] += $row->group_value;
                }
            }

            foreach ($kwhjual_obj as $row) 
            {
                $kwhjual_arr[$row->periode] = $row->kwhjual_value;
            }

            foreach ($psa_obj as $row) 
            {
                $psa_arr[$row->periode] = $row->psa_value;
            }

            $group_kumulatif_arr = array();
            $kwhjual_kumulatif_arr = array();
            $psa_kumulatif_arr = array();
            $beban_kumulatif_arr = array();

            foreach ($groups as $group) 
            {
                $temp = 0;
                for($i=1;$i<=$this->periode;$i++)
                {
                    if(empty($group_arr[$group->id][$i]))
                    {
                        $temp += 0;
                    }
                    else
                    {
                        $temp += $group_arr[$group->id][$i];
                    }
                    $group_kumulatif_arr[$group->id][$i] = $temp;
                }
            }
            $bpp_kinerja = array();

            $temp_kwhjual = 0;
            $temp_psa = 0;
            $temp_beban = 0;

            for($i=1;$i<=$this->periode;$i++)
            {
                if(empty($kwhjual_arr[$i])) $temp_kwhjual += 0;
                else $temp_kwhjual += $kwhjual_arr[$i];

                if(empty($psa_arr[$i])) $temp_psa += 0;
                else $temp_psa += $psa_arr[$i];

                if(empty($beban_arr[$i])) $temp_beban += 0;
                else $temp_beban += $beban_arr[$i];
                
                $kwhjual_kumulatif_arr[$i] = $temp_kwhjual;
                $psa_kumulatif_arr[$i] = $temp_psa;
                $beban_kumulatif_arr[$i] = $temp_beban;

                if($kwhjual_kumulatif_arr[$i] == 0)
                {
                    $bpp_kinerja[$i] = 0;
                }
                else
                {
                    $bpp_kinerja[$i] = ($beban_kumulatif_arr[$i] - $psa_kumulatif_arr[$i]) / $kwhjual_kumulatif_arr[$i];
                }
            }
            // dd($beban_kumulatif_arr);
            // dd($bpp_kinerja);
            $data['bpp_kinerja'] = $bpp_kinerja;
            $data['psa_kumulatif_arr'] = $psa_kumulatif_arr;
            $data['kwhjual_kumulatif_arr'] = $kwhjual_kumulatif_arr;
            $data['target_arr'] = $target_arr;
            $data['group_arr'] = $group_arr;
            $data['group_kumulatif_arr'] = $group_kumulatif_arr;
            $data['periode'] = $this->periode;
            $data['business_area'] = $this->business_area;
        }

        return view('export.group', $data);
    }
}
