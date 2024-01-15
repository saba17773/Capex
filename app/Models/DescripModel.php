<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DescripModel extends Model
{
    public function GetDataDescription(){
        $Descrip = DB::select(
            "SELECT * FROM TB_Description WHERE status <> 0"
        );
        return $Descrip;
    }
}
