<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\FixgroupModel;
use Auth;

class RequestModel extends Model
{
    public $col_year;
    public $col_progress;
    public $year_cur;

    public function __construct()
    {
        self::set_value();
        $this->Fix = new FixgroupModel;

    }
    public function set_value()
    {
        $this->year_cur = Date('Y');
        $this->col_year = 4;
        $this->col_progress = 12;
    }
    public function insertrequest($request_code,$Company,$HR_Department,$FixassetgroupID,$Project_code,$Owner,$Approved1,$Approved2,$Transactions,$Object_ID,$Amount,$Year,$Year1,$Year2,$Year3,$Year_1,$Year_2,$Year_3,$Jan,$Feb,$Mar,$Apr,$May,$Jun,$Jul,$Aug,$Sep,$Oct,$Nov,$Dec, $ProJan,$ProFeb,$ProMar,$ProApr,$ProMay,$ProJun,$ProJul,$ProAug,$ProSep,$ProOct,$ProNov,$ProDec,$status,$create_date,$create_by,$update_date,$update_by){
        // print_r($Company);
        // exit();
        $query = DB::table('TB_New_BP')->insert(
            array(
                'BPCode' => $request_code
                ,'CompanyId' => $Company
                ,'FixassetgroupID' => $FixassetgroupID
                ,'Decription' => $Transactions
                ,'ObjectId' => $Object_ID
                ,'AmountCapex' => $Amount
                ,'DetailId' => '1'
                ,'CreateDate' => $create_date
                ,'CreateBy' => $create_by
                ,'UpdateDate' => ''
                ,'UpdateBy' => ''
            )
            
        );
        return $query;
        // $query2 = DB::table('TB_ProgressTrans')->insert(
        //     array(
        //         'Code' => $request_code
        //         ,'BPCode' => $request_code
        //         ,'IdMonth' => $Jan
        //         ,'IdYear' => $Year
        //         ,'StatRateCode' =>''
        //     )
            
        // );
        // return $query2;
    }

    public function get_deptroute()
    {
        $data = DB::select("select * from Cap_DeptrouteBP");
        return $data;
    }
    public function get_project()
    {
        $data = DB::select("select * from ProjectTable");
        return $data;
    }


    public function check_amountbyyear($request)
    {
        $totalamount = 0;
        $get_amount = 0;
        $expextamount = 0;

        if($request->txt_codebp)
        {
            $sel_expect = DB::select('SELECT 
                                    SUM(B.AmountCapex) amount,
                                    SUM(P.ExpectPlanAmount)  TotalAmount
                                    from 
                                    TB_New_BP B 
                                    JOIN Cap_DeptrouteBP D ON B.DeptRouteId = D.CodeCD 
                                    JOIN 
                                    (
                                        SELECT E.PorjectId,SUM(E.ExpectPlanAmount) ExpectPlanAmount
                                        FROM TB_ExpectPlan E
                                        GROUP BY E.PorjectId
                                        HAVING SUM(E.ExpectPlanAmount)>0
                                    )P 
                                    ON P.PorjectId = B.BPCode
                                    where b.ProjectID  IN (?)
                                    and d.Code = (select dd.Code from Cap_DeptrouteBP dd where dd.CodeCD = ?)
                                    and b.BPCode NOT IN (?)', [
                                            $request->sel_project, 
                                            $request->txt_dproute,
                                            $request->txt_codebp
                                        ]); 
        }
        else
        {
            $sel_expect = DB::select('SELECT 
                                    SUM(B.AmountCapex) amount,
                                    SUM(P.ExpectPlanAmount)  TotalAmount
                                    FROM TB_New_BP B 
                                    JOIN Cap_DeptrouteBP D ON B.DeptRouteId = D.CodeCD 
                                    JOIN 
                                    (
                                        SELECT E.PorjectId,SUM(E.ExpectPlanAmount) ExpectPlanAmount
                                        FROM TB_ExpectPlan E
                                        GROUP BY E.PorjectId
                                        HAVING SUM(E.ExpectPlanAmount)>0
                                    )P 
                                    ON P.PorjectId = B.BPCode
                                    where b.ProjectID  IN (?)
                                    and d.Code = (select dd.Code from Cap_DeptrouteBP dd where dd.CodeCD = ?)', [
                                            $request->sel_project, 
                                            $request->txt_dproute
                                    ]); 
        }

        if($sel_expect)
        {
            $arr_expect = json_decode(json_encode($sel_expect), true);
            foreach ($arr_expect as $key => $value) {
                $totalamount = $value["TotalAmount"];
                $expextamount = $value["amount"];
            }
        }

        for ($i=1; $i < $this->col_year; $i++) 
        { 
            $yearid = $this->year_cur  + $i;
            $y_amount = 'txtyear_' . $i;
            if(isset($request->$y_amount))
            {
                if($request->$y_amount!="")
                {
                    $get_amount += (float)$request->$y_amount;
                }
            }
        }
        $expextamount += (float)$request->txt_totalamount;//get value from view
       
        // print_r($expextamount);
        // echo '<br>';
        // print_r($totalamount+$get_amount);
        // exit;
        if(($totalamount+$get_amount)> $expextamount)
            return true;
        return false;
       
    }

    public function Isprogress($id)
    {
        $isprogress = 0;
        $sel_fixgroup = $this->Fix->GetDataFixgroup($id);
        $fixgroup  = json_decode(json_encode($sel_fixgroup), true);
        foreach ($fixgroup as $key => $value) 
        {
            $isprogress = $value["Isprogress"];
        }
        return $isprogress;
    }
    //กรณีหยอดข้อมูลamount เอง
    public function check_amountbymonth($request)
    {
        
        if(self::Isprogress($request->sql_assetgroup)==0)
        {
            $yearid = 0;
            $totalamount = 0;
            for ($i=1; $i <= 12; $i++) 
            { 
                $m_amount = 'txtamount_' . $i;
                if(isset($request->$m_amount))
                {
                    if($request->$m_amount !="")
                        $totalamount += (float)$request->$m_amount;                 
                }
            }
            // print_r('check_amountbymonth');
            // print_r($request->txtyear_1);
            // print_r($totalamount);exit;
            if($request->txtyear_1 < $totalamount) 
                return true;
            return false;
        }
        return false;
    }

    public function add($request)
    {
        // dd($request);
        // exit();
        
        if(self::check_amountbyyear($request)==true)
        {
            return ['result' => false , 'massage' =>"sum(amount by year) > Budget(amount)"];
        }

        if(self::check_amountbymonth($request)==true) 
        {
            return ['result' => false , 'massage' =>"sum(amount by month) > amount of next year" ];
        }
        // print_r('add');
     
    
        $prefix_bp = "NewBP";
        $ck_bp = false;
        $ck_expect = false;
        $ck_amount = false;
        $ck_progress = false;
        $ck_updSeq = false;
        $ins_bp = false;
        $ins_expect = false;
        $ins_amount = false;
        $ins_progress = false;
        $ins_result = array();


        DB::beginTransaction();
        try 
        {
           
            $sel_seq = DB::Select("SELECT top(1) *
                                FROM NumberSeqTable 
                                WHERE CategoryName = ?
                                AND Status=1",[
                                    $prefix_bp
                                ]);
            if($sel_seq)
            {
                $ck_bp = true; 
                foreach ($sel_seq as $key => $value) 
                {
                    $seq = $value->NumberSeq . '-' . $value->NumNext; 
                }
                $bpcode = $seq;
                $CreateBy = Auth::user()->emp_code;
                $CreateDate = date('Y-m-d H:i:s');
                $num_total = str_replace(",", "", $request->txt_totalamount);
                $ins_bp = DB::insert("INSERT INTO TB_New_BP(
                            BPCode,
                            CompanyId,
                            FixassetgroupID,
                            Description,
                            ProjectID,
                            ObjectId,
                            AmountCapex,
                            DeptRouteId,
                            CreateDate,
                            CreateBy
                            ) 
                            VALUES(?,?,?,?,?,?,?,?,?,?)",[
                                $bpcode,
                                $request->sel_com,
                                $request->sql_assetgroup,
                                $request->txt_trans,
                                $request->sel_project,
                                $request->sel_obj,
                                $num_total,
                                $request->txt_dproute,
                                $CreateDate,
                                $CreateBy
                            ]);
                
                if($ins_bp)
                {
                    $y=0;
                    for ($i=1; $i <= $this->col_year ; $i++) 
                    { 
                        $yearid = $this->year_cur  + $y;
                        $y_amount = 'txtyear_' . $i;
                        if(isset($request->$y_amount))
                        {
                            $num_amount = str_replace(",", "", $request->$y_amount);  
                            $ins_expect = DB::insert("INSERT INTO TB_ExpectPlan(
                                        PorjectId,
                                        YearId,
                                        ExpectPlanAmount)
                                        VALUES(?,?,?)",[
                                            $bpcode,
                                            $yearid,
                                            $num_amount
                                            // (float)$request->$y_amount
                                        ]);
                        }
                        if($ins_expect)$ck_expect = true;
                        else $ck_expect = false;

                    $y++;
                    }
        
                    if(self::Isprogress($request->sql_assetgroup)==0) $ck_progress = true;
                    //$n = 0;
                    $yearid = $this->year_cur;
                    for ($i=1; $i <= $this->col_progress; $i++) 
                    {                        
                        if(self::Isprogress($request->sql_assetgroup)==1)
                        {
                            $progressid = 'selpro_' . $i;
                            if(isset($request->$progressid))
                            {
                                if($request->$progressid !="")
                                {
                                    $ins_progress = DB::insert('INSERT INTO TB_ProgressTrans (
                                                        BPCode, 
                                                        IdMonth,
                                                        IdYear,
                                                        StatRateCode) 
                                                        VALUES (?,?,?,?)', [
                                                        $bpcode,
                                                        $i,
                                                        $yearid,
                                                        $request->$progressid
                                                        ]); 
                                }
                                
                                if($ins_progress) $ck_progress = true;
                                else $ck_progress = false;
                            }
                        }
                       
                        $amountid = 'txtamount_' . $i;
                        if(isset($request->$amountid))
                        {
                            if($request->$amountid != "")
                            {
                                
                                $val_amount = (float)$request->$amountid;
                                $num_amountid = str_replace(",", "", $request->$amountid); 
                                $ins_amount = DB::insert('INSERT INTO TB_AmountTrans (
                                                        BPCode, 
                                                        IdMonth,
                                                        IdYear,
                                                        Amount) 
                                                        VALUES (?, ?,?,?)', [
                                                        $bpcode,
                                                        $i,
                                                        $yearid,
                                                        $num_amountid
                                                        ]); 
                                if($ins_amount)$ck_amount = true;
                                else $ck_amount = false;
                            }
                            
                        }
                        // $n++;
                    }
                    //update number seq
                    $upd_seq = DB::update('UPDATE NumberSeqTable 
                                                SET NumNext = NumNext +1 
                                                WHERE CategoryName = ?
                                                AND Status = 1', [$prefix_bp]);
                   

                    if($upd_seq)$ck_updSeq = true;
                    
                }
            }
           
            //store result from insert/update table
           
            $ins_result = [
                    'bp' =>$ck_bp,
                    'expect' =>$ck_expect,
                    'amount' =>$ck_amount,
                    'progress'=>$ck_progress,
                    'updSeq'=>$ck_updSeq
            ];
            // print_r($ins_result);exit;
            if(!array_search(0,$ins_result))
            {
                DB::commit();     
                return ['result' => true , 'massage' =>"Save complete"];
            }
            else
                return ['result' => false, 'massage' =>"Save failed"];

        } catch (Exception $e) {
            DB::rollback();
            return ['result' => false, 'massage' => $e->getMessage()];
        }
    }

   
}
