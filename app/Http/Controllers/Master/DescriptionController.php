<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DescripModel;

class DescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->des = new DescripModel;
        
    }
    public function description(){
        $des = $this->des->GetDataDescription();
        return view(
            'masters/description',
            [
                'des' => $des
            ]
        );
    }
    
}
