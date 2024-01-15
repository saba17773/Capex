<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\TransModel;

class TransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $email = Auth::user()->email;
        $this->trans = new TransModel;
    }
    public function capex_tranfer_bp(){
        $email = Auth::user()->email;
        $tempa_array= array();
        $transfer = $this->trans->GetDataCap_Deptroute($email);
        for ($i=0; $i < count($transfer); $i++) {
            $transf = $this->trans->GetDataCap_Transfer_Trans($transfer[$i]->Code,$transfer[$i]->Company);
            // echo'<pre>';
            if(!empty($transf)){
                // print_r($transf);
                foreach ($transf as $key => $value) {
                    // $value;
                    // echo'<pre>';
                    // print_r($value);
                    $tempa_array[] = $value;
                }
            }
        }
        // return $tempa_array;
        // $Cap_Year = $this->trans->Data_Cap_Transfer_Year_sum();
        // print_r($Cap_Year);
        return view(
            'pages/capex_tranfer_bp',
            [
                'transf' => $tempa_array
            ]
        );
    }
    public function capex_tranfer_list(){
        $email = Auth::user()->email;
        $tempa_array= array();
        $com_array= array();
        $transfer = $this->trans->GetDataCap_Deptroute($email);
        // print_r($transfer);
        // print_r( $transfer);
        for ($i=0; $i < count($transfer); $i++) {
            // $transf = $this->trans->Data_Cap_Transfer_Year_sum($transfer[$i]->Code);
            $transf = $this->trans->GetDataCap_Transfer_Trans_Old($transfer[$i]->Code,$transfer[$i]->Company);
            // echo'<pre>';
            if(!empty($transf)){
                // if(isset($Code) or empty($data)){
                    // echo'<pre>';
                    // print_r($transf);

                foreach ($transf as $key => $value) {
                    // $value;
                    // echo'<pre>';
                    // print_r($value->COMPANY);
                    $tempa_array[] = $value->DEPARTMENT_NO;
                    $com_array[] = $value->COMPANY;
                }
            }
        }
        // echo'<pre>';
        // print_r($transfer[0]->Company);
        if( !empty( $tempa_array ) ) {
            $Cap_Year = $this->trans->Data_Cap_Transfer_Year_sum($tempa_array,$com_array);
        }else{
            $Cap_Year = "";
        }
        // return $tempa_array;
        // if(!empty($tempa_array)){
            // $Cap_Year = $this->trans->Data_Cap_Transfer_Year_sum($tempa_array);
        // }
        // echo'<pre>';
        // print_r($Cap_Year);
        return view(
            'pages/capex_tranfer_list',
            [
                'transf' => $tempa_array,
                'capYear' => $Cap_Year
            ]
        );
    }
    public function edit_capex_trans(){
        // print_r($_POST);
        // exit();
        $data = json_decode($_POST['json_data']);
        // print_r($data);
        // exit;
        // $Jul = $data->Jul;
        $Jul = 0;
        // $Aug = $data->Aug;
        $Aug = 0;
        $Sep = $data->Sep;
        $Oct = $data->Oct;
        $Nov = $data->Nov;
        $Dec = $data->Dec;
        $Total = $data->Total;
        $BP_DEDUCT = $data->BP_DEDUCT;
        // $hr_department = $data->hr_department;
        $Status = $data->Status;
        $TotalMonth = $data->TotalMonth;
        $BPTotal = $data->BPTotal;
        $CAPEX_NO = $_POST['params'];
        // print_r($CAPEX_NO);
        // exit();
        $this->trans->UpdateCap_Transfer_Trans($CAPEX_NO,$Jul,$Aug,$Sep,$Oct,$Nov,$Dec,$Total,$BP_DEDUCT,$Status,$BPTotal,$TotalMonth);
    }
    public function edit_Cap_Transfer_Year(){
        $variable = $_POST;
        $CAPEX_NO = $_POST['params'];
        $funArray=array($variable['YearAmount']);
        $funArray2=array($variable['YearData']);
        foreach ($funArray as  $value) {
            foreach ($funArray2 as  $value2) {
                $this->trans->InsertCap_Transfer_Year_sum($value,$value2,$CAPEX_NO);
            }
        }
    }
    public function up_Cap_Transfer_Year(){
        $variable = $_POST;
        $CAPEX_NO = $_POST['params'];
        $funArray=array($variable['YearAmount']);
        $funArray2=array($variable['YearData']);
        foreach ($funArray as  $value) {
            foreach ($funArray2 as  $value2) {
                $this->trans->UpdateCap_Transfer_Year_sum($value,$value2,$CAPEX_NO);
            }
        }
    }
    public function up_Cap_Transfer_Detail(){
        $variable = $_POST;
        $CAPEX_NO = $_POST['params'];
        $funArray=array($variable['MonthAmount']);
        // print_r($funArray);
        $funArray2=array($variable['MonthData']);
        // print_r($funArray2);
        foreach ($funArray as  $value) {
            foreach ($funArray2 as  $value2) {
                $this->trans->UpdateCap_Transfer_Detail($value,$value2,$CAPEX_NO);
            }
        }

    }
    public function edit_Cap_Transfer_Detail(){
        $variable = $_POST;
        $CAPEX_NO = $_POST['params'];
        $funArray=array($variable['MonthAmount']);
        // print_r($funArray);
        $funArray2=array($variable['MonthData']);
        // print_r($funArray2);
        foreach ($funArray as  $value) {
            foreach ($funArray2 as  $value2) {
                $this->trans->InsertCap_Transfer_Detail($value,$value2,$CAPEX_NO);
            }
        }

    }
    public function getData_Cap_Deptroute(){
        $val = $_POST['val'];
        // print_r($val);
        $resulte = $this->trans->Data_Cap_Deptroute($val);
        echo json_encode($resulte);
    }
    public function delete_capex(){
        $param = $_POST['param'];
        $resulte = $this->trans->delete_capex($param);
        echo json_encode($resulte);
    }
}
