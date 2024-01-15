<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;

class DepartmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->dep = new DepartmentModel;
        
    }
    public function department(){
        $dep = $this->dep->getDataCap_DeptrouteBP();
        return view(
            'masters/department',[
                'dep' => $dep
            ]
        );
    }
    public function saveCap_DeptrouteBP(Request $request){
        $data =  $request->all();
        // print_r($data);
        $result = $this->dep->InsertCap_DeptrouteBP($data);
        print_r($result);
    }
    public function sendCap_DeptrouteBP(Request $request){
        $data =  $request->input('CodeCD');
        // print_r($data);
        $result = $this->dep->SelectCap_DeptrouteBP($data);
        return $result;
    }
    public function edit(Request $request){
        $data =  $request->all();
        $result = $this->dep->UpdateCap_DeptrouteBP($data);
        return $result;
    }
    public function DepartmentTrans(){
        $dep = $this->dep->getDataCap_DeptrouteTrans();
        return view(
            'masters/department_trans',[
                'dep' => $dep
            ]
        );
    }
}
