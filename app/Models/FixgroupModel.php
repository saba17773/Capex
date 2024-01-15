<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FixgroupModel extends Model
{
    public function GetDataFixgroup($id=""){

        if($id)
        {
            $result = DB::SELECT("SELECT * FROM TB_FixAssetTable WHERE FixassetId=?",[$id]);
        }
        else
        {
            $result = DB::SELECT("SELECT * FROM TB_FixAssetTable");
        }
        
        return $result;
    }
}
