<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ObjectiveModel;

class ObjectiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->obj = new ObjectiveModel;
        
    }
    public function objective()
    {
        $obj = $this->obj->GetDataObjective();
        // print_r($obj);
        // exit();
        return view(
            'masters/objective',
            ['obj' => $obj
        ]);
    }
    public function save_objective(Request $request){
        // print_r($request);
        // exit();
        $objective =  $request->input('objective');
        
        $Name_TH =  $request->input('Name_TH');
        $Name_EN =  $request->input('Name_EN');

        $result = $this->obj->InesrtDataObjective($objective,$Name_TH,$Name_EN);
        return $result;
    }
    public function get_objective(Request $request){
        $objective =  $request->input('objective');
        // print_r($objective);
        // exit();
        $resulte = $this->obj->ConditionDataObjective($objective);
        return $resulte;
    }
    public function edit_objective(Request $request){
        $objective =  $request->input('objective');
        $Name_TH =  $request->input('Name_TH');
        $Name_EN =  $request->input('Name_EN');
        $status = $request->input('status');

        $resulte = $this->obj->UpdateDataObjective($objective,$Name_TH,$Name_EN,$status);
        return $resulte;
    }
    public function del_objective(Request $request){
        $objective =  $request->input('objective');
        $resulte = $this->obj->DelDataObjective($objective);
        return $resulte;
    }
}
