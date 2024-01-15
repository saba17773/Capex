<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterModel;
use App\Models\FixgroupModel;
use App\Models\ObjectiveModel;
use App\Models\StatRateModel;//tan
use Auth;
use App\Models\RequestModel;

class RequestController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
        $this->corp = new MasterModel;
        $this->Fix = new FixgroupModel;
        $this->req = new RequestModel;
        $this->obj = new ObjectiveModel;
        $this->rate = new StatRateModel;
    }
    public function request_capex(){
        // echo'Tess';
        $company = $this->corp->GetDataCompany();
        $Fix = $this->Fix->GetDataFixgroup();
        $obj = $this->obj->GetDataObjective();
        $deptroute = $this->req->get_deptroute();//tan
        $rate = $this->rate->GetDataStatRate();//tan
        $project = $this->req->get_project();//tan
        return view(
            'pages/capex_request_v1',
            [
                'company' => $company,
                'Fix' => $Fix,
                'obj' => $obj,
                'deptroute' => $deptroute,
                'rate'=>$rate,
                'project'=>$project
            ]
        );
    }
    public function request_capex_old()
    {
        // echo'Tess';
        $company = $this->corp->GetDataCompany();
        $Fix = $this->Fix->GetDataFixgroup();
        $obj = $this->obj->GetDataObjective();
        // print_r($company);
        // exit();
        return view(
            'pages/capex_request',
            [
                'company' => $company,
                'Fix' => $Fix,
                'obj' => $obj
            ]
        );
    }
    public function calcurate_amount(Request $request)//tan
    {
        // print_r($request->all());
        // exit();
        $progress = array();
        $count_status_process = 0;
        $result = array();

        $data = $request->all();
        // print_r($data);
        // exit();
        $code_prpo = "STR-0001";
        $code_process = "STR-0002";
        $code_complete = "STR-0003";
        $col_progress = 12;

        $start_amount = str_replace(",", "", $data["txtyear_1"]);
        $final_progress = '';
        $start_progress= '';


        for ($i=1; $i<=$col_progress ; $i++) 
        {
            $var = "selpro_" . $i; 
            
            if(isset($data[$var]))
            {
                $progress[$i] = $data[$var];
                if($data[$var] !="")
                {
                    if($start_progress== '')$start_progress = $i;
                    $final_progress = $i;
                }
            }
            else $progress[$i]= "";
        }
       
        // print_r($progress);
        // exit;
        $count_status = array_count_values($progress);//count status
       

        //rate status
        $rates = $this->rate->GetDataStatRate();

        foreach ($rates as $key => $rate) 
        {
            if($rate->StatRateCode==$code_prpo)
            {
                $rate_prpo = $rate->Rate;
            }
            else if($rate->StatRateCode==$code_process)
            {
                $rate_process = $rate->Rate;
            }
            else if($rate->StatRateCode==$code_complete)
            {
                $rate_complete = $rate->Rate;
            }
            
        }

        //calcurate
        $cal_prpo = 0;
        $cal_prograss = 0;
        $total = 0;

        $ck_prpo = isset($count_status[$code_prpo]) == 1 ? 1 : 0 ;
        $ck_process = isset($count_status[$code_process])== 1 ? 1 : 0 ;
        $ck_complete = isset($count_status[$code_complete])== 1 ? 1 : 0 ;
        
        if($ck_prpo)
        {
            if($ck_complete)
            {
                if($ck_process)//PRPO-Process-Complete
                {
                    // echo 'PRPO-Process-Complete';
                    for ($i=$start_progress; $i<=$col_progress ; $i++) 
                    {
                        $cal_prograss = 0;
                        if($progress[$i] == $code_prpo)
                        {
                            $cal_prograss = ($rate_prpo * $start_amount) /100;
                            $cal_prpo = $cal_prograss;
                        }
                        else if ($progress[$i]==$code_process)
                        {
                            $cal_prograss = ($rate_process * $start_amount)/100/$count_status[$code_process];
                        }
                        else if ($progress[$i]==$code_complete)
                        {
                            $cal_prograss = ($rate_complete * $start_amount) /100;
                        }
                        if($cal_prograss && $cal_prograss !=0)
                        {
                            $total += number_format($cal_prograss,2,'.','');

                            if($i == $final_progress)
                            {
                                if($start_amount-$total<0)
                                {
                                    $cal_prograss -=($total-$start_amount);
                                }
                                else
                                {
                                    $cal_prograss += ($start_amount-$total);
                                }
                            }
                            $result[$i] = number_format($cal_prograss,2,'.','');
                        }
                    }

                }
                else//PRPO-Complete
                {
                    // echo 'PRPO-Complete';
                    $cal_prograss = number_format(($rate_prpo * $start_amount) /100,2,'.','');
                    $result[array_search($code_prpo,$progress)] =  number_format($cal_prograss,2,'.','');
                    $result[array_search($code_complete,$progress)] = number_format($start_amount -  $cal_prograss,2,'.','');
                }
            }
            else 
            {
                if($ck_process)//PRPO-PROCESS
                {
                    // echo 'PRPO-PROCESS';

                    for ($i=$start_progress; $i<=$col_progress ; $i++) 
                    { 
                        $cal_prograss = 0;
                        if($progress[$i] == $code_prpo)
                        {
                            $cal_prograss = ($rate_prpo * $start_amount) /100;
                            $cal_prpo = $cal_prograss;
                        }
                        else if ($progress[$i]==$code_process)
                        {
                            $cal_prograss = ($start_amount - $cal_prpo)/$count_status[$code_process];
                        }
                        if($cal_prograss && $cal_prograss !=0) 
                        {
                            $total += number_format($cal_prograss,2,'.','');

                            if($i == $final_progress)
                            {
                                if($start_amount-$total<0)
                                {
                                    $cal_prograss -=($total-$start_amount);
                                }
                                else
                                {
                                    $cal_prograss += ($start_amount-$total);
                                }
                            }
                            $result[$i] = number_format($cal_prograss,2,'.','');
                        }
                    }
                }
                else //PRPO
                {   
                    // echo 'PRPO';
                    $result[array_search($code_prpo,$progress)] = number_format($start_amount,2,'.','');
                }
            }
        }
        // echo "<pre></pre>".$total."</pre>";

        // echo "<pre></pre>".print_r($result,true) ."</pre>";
        // // echo "<pre></pre>".print_r($data,true) ."</pre>";
        // echo "<pre></pre>".print_r($progress,true) ."</pre>";
        // echo "<pre></pre>".print_r($count_status,true) ."</pre>";

        // var_dump(gettype($result));
        return json_encode($result, JSON_FORCE_OBJECT);
    }
    
    public function add(Request $request)
    {
        
       $result = $this->req->add($request);
       return $result;
    }

    public function get_deptroute()
    {
        $data  = $this->req->get_deptroute();
        return  response()->json($data);
    }

    public function edit(Request $request)
    {
        // print_r($request);
       $result = $this->req->edit($request);
       return response()->json($data);
    }


}
