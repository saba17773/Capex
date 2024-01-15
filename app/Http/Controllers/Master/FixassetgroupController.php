<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FixgroupModel;

class FixassetgroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Fix = new FixgroupModel;
        
    }
    public function fixassetgroup()
    {
        $Fix = $this->Fix->GetDataFixgroup();
        // print_r($obj);
        // exit();
        return view(
            'masters/fixassetgroup',
            [
                'Fix' => $Fix
            ]
        );
    }
    public function get_isprogress($id)
    {
        $data = $this->Fix->GetDataFixgroup($id);
        return  response()->json($data);
    }
    public function save_fixassetgroup(Request $request){
        // print_r($request);
    }
}
