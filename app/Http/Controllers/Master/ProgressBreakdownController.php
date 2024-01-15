<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatRateModel;

class ProgressBreakdownController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Stat = new StatRateModel;
    }
    public function progress_breakdown()
    {
        $Stat = $this->Stat->GetDataStatRate();
        return view(
            'masters/progress_breakdown',
            [
                'Stat' => $Stat
            ]
        );
    }
}
