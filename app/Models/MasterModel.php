<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterModel extends Model
{
    //
    public function GetDataCompany(){
        $corp = DB::select(
            "SELECT * FROM TB_Company WHERE status <> 0"
        );
        return $corp;
    }
    public function SaveDataCompany($Company,$Name){
        // print_r($Company);
        // exit();
        $query = DB::table('TB_Company')->insert(
            array(
                'Company' => $Company
                ,'Name' => $Name
                ,'create_date' => date('Y-m-d H:i:s')
                ,'create_by' => '7650030'
                ,'update_date' => ''
                ,'update_by' => ''
                ,'status' => 1
            )
       );
        return $query;
    }
    public function ConditionDataCompany($Company){
        $corp = DB::select(
            "SELECT * FROM TB_Company WHERE Company = '$Company' AND status <> 0"
        );
        return $corp;
    }
    public function UpdateDataCompany($Company,$Name,$Status){
        // print_r($Name);
        // exit();
        $update_date = date('Y-m-d H:i:s');
        $returnValue = DB::table('TB_Company')->where('Company', $Company)->update(array(
            'Name' => $Name,
            'update_date' => $update_date,
            'update_by' => '7650030',
            'status' => $Status
        ));  
        return $returnValue;
    }
    public function DelDataCompany($Company){
        // print_r($Name);
        // exit();
        $update_date = date('Y-m-d H:i:s');
        $returnValue = DB::table('TB_Company')->where('Company', $Company)->update(array(
            'update_date' => $update_date,
            'update_by' => '7650030',
            'status' => 0
        ));  
        return $returnValue;
    }
    
}
