<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterModel;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->corp = new MasterModel;
    }
 
    public function company()
    {
        $compa = $this->corp->GetDataCompany();
        return view(
            'masters/company',
            [
                'compa' => $compa
            ]
        );
    }
    public function insertCompany(Request $request){
        $Company =  $request->input('Company');
        $Name =  $request->input('Name');
        // print_r($Company);
        // exit();
        $compa = $this->corp->SaveDataCompany($Company,$Name);
        return $compa;
    }
    public function get_company(Request $request){
        $Company =  $request->input('Company');
        // print_r($Company);
        // exit();
        $compa = $this->corp->ConditionDataCompany($Company);
        return $compa;
    }
    public function edit_company(Request $request){
        $Company =  $request->input('Company');
        // print_r($Company);
        // exit();
        $Name =  $request->input('Name');
        $Status = $request->input('Status');
        $compa = $this->corp->UpdateDataCompany($Company,$Name,$Status);
        return $compa;
    }
    public function del_company(Request $request){
        $Company =  $request->input('Company');
        $compa = $this->corp->DelDataCompany($Company);
        return $compa;
    }
}
