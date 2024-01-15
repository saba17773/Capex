<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DepartmentModel extends Model
{
    //
    public function getDataCap_DeptrouteBP(){
        $query = DB::select(
            "SELECT * FROM Cap_DeptrouteBP"
        );
        return $query;
    }
    public function InsertCap_DeptrouteBP($data){
        // print_r($data['CodeCD']);
        DB::beginTransaction();

        try {
            DB::insert('INSERT  INTO Cap_DeptrouteBP (CodeCD
            ,Company
            ,Department_HR
            ,Code
            ,Department_AC
            ,DeptGroup1
            ,DeptGroup2
            ,E_Map1
            ,E_Map2
            ,E_Map3
            ,E_Clevel) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
               $data['CodeCD'],
               $data['Company'],
               $data['Department_HR'],
               $data['Code'],
               $data['Department_AC'],
               $data['DeptGroup1'],
               $data['DeptGroup2'],
               $data['E_Map1'],
               $data['E_Map2'],
               $data['E_Map3'],
               $data['E_Clevel']
            ]);    
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function SelectCap_DeptrouteBP($codecd){
        $query = DB::select(
            "SELECT * FROM Cap_DeptrouteBP WHERE CodeCD ='$codecd'"
        );
        return $query;
    }
    public function UpdateCap_DeptrouteBP($data){
        DB::beginTransaction();

        try {
            DB::update('UPDATE Cap_DeptrouteBP SET 
            Company = ?
            ,Department_HR = ?
            ,Code = ?
            ,Department_AC = ?
            ,DeptGroup1 = ?
            ,DeptGroup2 = ?
            ,E_Map1 = ?
            ,E_Map2 = ?
            ,E_Map3 = ?
            ,E_Clevel = ?
            WHERE CodeCD = ?', 
            [
            $data['Company'],
            $data['Department_HR'],
            $data['Code'],
            $data['Department_AC'],
            $data['DeptGroup1'],
            $data['DeptGroup2'],
            $data['E_Map1'],
            $data['E_Map2'],
            $data['E_Map3'],
            $data['E_Clevel'],
            $data['CodeCD']
            ]);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function getDataCap_DeptrouteTrans(){
        $query = DB::select(
            "SELECT * FROM Cap_DeptrouteTransfer"
        );
        return $query;
    }
}
