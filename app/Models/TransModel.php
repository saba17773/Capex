<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransModel extends Model
{
    //
    public function GetDataCap_Deptroute($email)
    {
        // print_r($email);
        // exit();
        $data = DB::SELECT("SELECT DISTINCT [Code] , Company
                    FROM Cap_DeptrouteTransfer
                    WHERE E_Map1 = '$email'
            -- UNION
            -- SELECT DISTINCT [Code] , Company
            --         FROM Cap_DeptrouteTransfer
            --         WHERE E_Map2 = '$email'
        ");
        return $data;
    }
    public function GetDataCap_Transfer_Trans($Code, $company)
    {
        // print_r($company);
        // // exit;
        $data = DB::SELECT("SELECT *
                            FROM Cap_Transfer_Trans
                            WHERE DEPARTMENT_NO = '$Code' AND COMPANY='$company' AND Status = 0");
        return $data;
    }
    public function GetDataCap_Transfer_Trans_Old($Code, $company)
    {
        // echo'<pre>';
        // print_r($company);
        // exit;
        $data = DB::SELECT("SELECT *
        FROM Cap_Transfer_Trans
        WHERE DEPARTMENT_NO = '$Code' AND COMPANY='$company' AND Status = 1");
        return $data;
    }
    public function UpdateCap_Transfer_Trans($CAPEX_NO, $Jul, $Aug, $Sep, $Oct, $Nov, $Dec, $Total, $BP_DEDUCT, $Status, $BPTotal, $TotalMonth)
    {
        DB::beginTransaction();

        try {
            DB::table('Cap_Transfer_Trans')->where('CAPEX_NO', $CAPEX_NO)->update(array(
                'MONTH_7' => $Jul
                , 'MONTH_8' => $Aug
                , 'MONTH_9' => $Sep
                , 'MONTH_10' => $Oct
                , 'MONTH_11' => $Nov
                , 'MONTH_12' => $Dec
                , 'BP_AFTER_FC' => $Total
                , 'BP_DEDUCT' => $BP_DEDUCT
                // ,'HR_DEPT' => $hr_department
                , 'Status' => $Status
                , 'TotalMonth' => $TotalMonth
                , 'BPTotal' => $BPTotal
            ));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

    }
    public function InsertCap_Transfer_Year_sum($value, $value2, $value3)
    {
        // print_r($value);
        DB::beginTransaction();

        try {
            DB::table('Cap_Transfer_Year_sum')->insert(
                array(
                    'Year' => $value2
                    , 'Amount' => $value
                    , 'CAPEX_NO' => $value3
                )
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function UpdateCap_Transfer_Year_sum($value, $value2, $value3)
    {
        // print_r($value);
        DB::beginTransaction();

        try {
            DB::table('Cap_Transfer_Year_sum')->where(array(
                'Year' => $value2
                , 'CAPEX_NO' => $value3
            ))->update(array(
                'Amount' => $value
            ));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function InsertCap_Transfer_Detail($value, $value2, $value3)
    {
        // print_r($value);
        $query = DB::SELECT("SELECT *
                FROM Cap_Transfer_Detail
                WHERE CAPEX_NO = '$value3' AND Month_num ='$value2'
               ");
        
        DB::beginTransaction();
        
        try {
            DB::table('Cap_Transfer_Detail')->insert(
                array(
                    'Month_num' => $value2
                    , 'Amount' => $value
                    , 'CAPEX_NO' => $value3
                )
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function UpdateCap_Transfer_Detail($value, $value2, $value3)
    {
        // print_r($value);
        DB::beginTransaction();

        try {
            DB::table('Cap_Transfer_Detail')->where(array(
                'Month_num' => $value2
                , 'CAPEX_NO' => $value3
            ))->update(array(
                'Amount' => $value
            ));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function Data_Cap_Deptroute($val)
    {
        // print_r($val);
        $query = DB::SELECT("SELECT [Department_AC],[Code]
                FROM Cap_DeptrouteTransfer
                WHERE Code = '$val'
                GROUP BY [Department_AC],[Code]");
        return $query;
    }
    public function Data_Cap_Transfer_Year_sum($Code, $Company)
    {
        // print_r($Company);
        $uniqueCode = array_unique($Code);
        $uniqueCompany = array_unique($Company);
        $key_array = array();

        foreach ($uniqueCode as $skey => $value) {
            foreach ($uniqueCompany as $skey => $compa) {
                $key_array[] = DB::SELECT("SELECT
                    T1.*,
                    T2.[1] AS JAN,
                    T2.[2] AS FEB,
                    T2.[3] AS MAR,
                    T2.[4] AS APR,
                    T2.[5] AS MAY,
                    T2.[6] AS JUN,
                    T2.[7] AS JUL,
                    T2.[8] AS AUG,
                    T2.[9] AS SEP,
                    T2.[10] AS OCT,
                    T2.[11] AS NOV,
                    T2.[12] AS DECA,
                    T3.[2024] AS Y2,
                    T3.[2025] AS Y3,
                    T3.[2026] AS Y4
                FROM
                    Cap_Transfer_Trans T1
                    INNER JOIN (
                    SELECT *
                    FROM
                        (SELECT [CAPEX_NO]
                    ,[Month_num]
                    ,[Amount] FROM Cap_Transfer_Detail) I
                        PIVOT (SUM(Amount) FOR Month_num IN ([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) P
                    ) T2 ON T1.CAPEX_NO = T2.CAPEX_NO
                    INNER JOIN (
                    SELECT *
                    FROM
                        (SELECT [CAPEX_NO]
                    ,[Year]
                    ,[Amount] FROM Cap_Transfer_Year_sum) I
                        PIVOT (SUM(Amount) FOR Year IN ([2024], [2025], [2026]
                            )) P
                ) T3 ON T1.CAPEX_NO = T3.CAPEX_NO
                WHERE T1.Status = 1 AND T1.DEPARTMENT_NO ='$value' AND T1.COMPANY ='$compa'");
            }
        }
        return $key_array;
    }
    public function delete_capex($capex_no)
    {
        // print_r($value);
        DB::beginTransaction();

        try {
            DB::table('Cap_Transfer_Trans')->where(array(
                'CAPEX_NO' => $capex_no
            ))->update(array(
                'Status' => '0',
            ));
            DB::table('Cap_Transfer_Detail')->where('CAPEX_NO',$capex_no)->delete();
            DB::table('Cap_Transfer_Year_sum')->where('CAPEX_NO',$capex_no)->delete();           
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
