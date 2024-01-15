<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatRateModel extends Model
{
    public function GetDataStatRate(){
       
        $data = DB::select(
            "SELECT * FROM TB_StatRate WHERE status <> 0"
        );
        return $data;
    }
}
