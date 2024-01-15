<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ObjectiveModel extends Model
{
    public function GetDataObjective(){
        $resulte = DB::select(
            "SELECT * FROM TB_Objective WHERE status <> 0"
        );
        return $resulte;
    }
    public function InesrtDataObjective($objective,$Name_TH,$Name_EN){
        // print_r($objective);
        // exit();
        $query = DB::table('TB_Objective')->insert(
            array(
                'Object_ID' => $objective
                ,'Object_EN' => $Name_EN
                ,'Object_TH' => $Name_TH
                ,'create_date' => date('Y-m-d H:i:s')
                ,'create_by' => '7650030'
                ,'update_date' => ''
                ,'update_by' => ''
                ,'status' => 1
            )
       );
        return $query;
    }
    public function ConditionDataObjective($objective){
        $resulte = DB::select(
            "SELECT *
            FROM TB_Objective
             WHERE Object_ID = '$objective' AND status <> 0"
        );
        return $resulte;
    }
    public function UpdateDataObjective($objective,$Name_TH,$Name_EN,$status){
        // print_r($Name);
        // exit();
        $update_date = date('Y-m-d H:i:s');
        $returnValue = DB::table('TB_Objective')->where('Object_ID', $objective)->update(array(
            'Object_EN' => $Name_EN,
            'Object_TH' => $Name_TH,
            'update_date' => $update_date,
            'update_by' => '7650030',
            'status' => $status
        ));  
        return $returnValue;
    }
    public function DelDataObjective($objective){
        // print_r($Name);
        // exit();
        $update_date = date('Y-m-d H:i:s');
        $returnValue = DB::table('TB_Objective')->where('Object_ID', $objective)->update(array(
            'update_date' => $update_date,
            'update_by' => '7650030',
            'status' => 0
        ));  
        return $returnValue;
    }
}
