<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CapexnewModel extends Model
{
    public function GetDataCapex_Deptroute($email, $email_appr1)
    {
        // print_r($email);
        // print_r($email_appr1);
        // exit();
        $data = DB::SELECT("SELECT *
                        FROM Cap_DeptrouteBP
                        WHERE E_Map1 = '$email' OR E_Map1 ='$email_appr1'
                    UNION
                    SELECT *
                        FROM Cap_DeptrouteBP
                        WHERE E_Map2 = '$email'  OR E_Map1 ='$email_appr1'
                    UNION
                    SELECT *
                        FROM Cap_DeptrouteBP
                        WHERE E_Map3 = '$email'	 OR E_Map1 ='$email_appr1'");
        return $data;
    }
    public function get_project()
    {
        $data = DB::select("select * from ProjectTable ORDER BY Id ASC");
        return $data;
    }
    public function GetDataCapex_Deptroute_CodeCD($CodeCD)
    {
        // print_r($CodeCD);
        // exit;
        $query = DB::SELECT("SELECT *
                FROM Cap_DeptrouteBP
                WHERE CodeCD = '$CodeCD'
                ");
        return $query;
    }
    public function GetDataPivotTB_New_BP($empCode)
    {
        // print_r($empCode);
        // exit;
        $query = DB::SELECT("SELECT *,

        T1.Description AS Trans,
        TB1.Code AS CodeHR,
        T3.[2023] AS YearD,
        T3.[2024] AS YEAR1,
        T3.[2025] AS YEAR2,
        T3.[2026] AS YEAR3,
        T2.[1] AS Jan,T2.[2] AS Feb,T2.[3] AS Mar,T2.[4] AS Apr,T2.[5] AS May,T2.[6] AS Jun,T2.[7] AS jul,T2.[8] AS Aug,
        T2.[9] AS Sep,T2.[10] AS Oct,T2.[11] AS Nov,T2.[12] AS Dece,
        CASE
   WHEN T4.[1] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[1] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[1] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS JanString,
        CASE
   WHEN T4.[2] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[2] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[2] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS FebString,
        CASE
   WHEN T4.[3] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[3] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[3] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS MarString,
        CASE
   WHEN T4.[4] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[4] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[4] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS AprString,
        CASE
   WHEN T4.[5] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[5] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[5] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS MayString,
        CASE
   WHEN T4.[6] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[6] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[6] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS JunString,
        CASE
   WHEN T4.[7] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[7] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[7] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS julString,
        CASE
   WHEN T4.[8] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[8] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[8] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS AugString,
        CASE
   WHEN T4.[9] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[9] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[9] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS SepString,
        CASE
   WHEN T4.[10] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[10] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[10] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS OctString,
        CASE
   WHEN T4.[11] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[11] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[11] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS NovString,
        CASE
   WHEN T4.[12] = 'STR-0001' THEN 'PR&PO'
   WHEN T4.[12] = 'STR-0002' THEN 'PROCESS'
   WHEN T4.[12] = 'STR-0003' THEN 'COMPLETE'
   ELSE ''
  END AS DeceString,
         TB2.Description AS Fix_Asset,
         TB3.Object_TH ,
         email
          FROM TB_New_BP T1
        LEFT JOIN users U1 ON U1.emp_code = T1.CreateBy
        LEFT JOIN Cap_DeptrouteBP TB1 ON T1.DeptRouteId = TB1.CodeCD
        LEFT JOIN TB_FixAssetTable TB2 ON T1.FixassetgroupID = TB2.FixassetId
        LEFT JOIN TB_Objective TB3 ON T1.ObjectId = TB3.Object_ID
        INNER JOIN (
                SELECT *
                FROM
                    (SELECT [BPCode]
              ,[IdMonth]
              ,[Amount] FROM TB_AmountTrans) I
                    PIVOT (SUM(Amount) FOR IdMonth IN ([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) P
        ) T2 ON T1.BPCode = T2.BPCode
        INNER JOIN (
                SELECT *
                FROM
                    (SELECT [PorjectId]
              ,[YearId]
              ,[ExpectPlanAmount] FROM TB_ExpectPlan) I
                    PIVOT (SUM(ExpectPlanAmount) FOR YearId IN ([2023],[2024], [2025], [2026]
                        )) P
        ) T3 ON T1.BPCode = T3.PorjectId

         INNER JOIN (
                 SELECT *
    FROM
    (SELECT DISTINCT B.BPCode AS Code,M.MonthId,P.StatRateCode
     FROM TB_New_BP B
     FULL JOIN MonthTable M
     ON B.BPCode != ''
     LEFT JOIN TB_ProgressTrans P ON B.BPCode = P.BPCode AND M.MonthId = P.IdMonth ) AS Source
    PIVOT
    (MAX(StatRateCode) FOR MonthId IN ([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) AS PVT

         ) T4  ON T1.BPCode = T4.Code
        WHERE T1.CreateBy ='$empCode'
        ");
        return $query;
    }
    public function getDataTable_Edit_NewBP($empCode, $params)
    {
        // print_r($params);
        // exit;
        $query = DB::SELECT("SELECT *,
        T1.Description AS Trans,
        TB1.Code AS CodeHR,
        T3.[2023] AS YearD,
        T3.[2024] AS YEAR1,
        T3.[2025] AS YEAR2,
        T3.[2026] AS YEAR3,
        T2.[1] AS Jan,T2.[2] AS Feb,T2.[3] AS Mar,T2.[4] AS Apr,T2.[5] AS May,T2.[6] AS Jun,T2.[7] AS jul,T2.[8] AS Aug,
        T2.[9] AS Sep,T2.[10] AS Oct,T2.[11] AS Nov,T2.[12] AS Dece,
        T4.[1] AS Jan_S,T4.[2] AS Feb_S,T4.[3] AS Mar_S,T4.[4] AS Apr_S,T4.[5] AS May_S,T4.[6] AS Jun_S,T4.[7] AS jul_S,T4.[8] AS Aug_S,
        T4.[9] AS Sep_S,T4.[10] AS Oct_S,T4.[11] AS Nov_S,T4.[12] AS Dece_S,
        CASE
			WHEN T4.[1] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[1] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[1] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS JanString,
        CASE
			WHEN T4.[2] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[2] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[2] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS FebString,
        CASE
			WHEN T4.[3] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[3] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[3] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS MarString,
        CASE
			WHEN T4.[4] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[4] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[4] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS AprString,
        CASE
			WHEN T4.[5] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[5] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[5] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS MayString,
        CASE
			WHEN T4.[6] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[6] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[6] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS JunString,
        CASE
			WHEN T4.[7] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[7] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[7] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS julString,
        CASE
			WHEN T4.[8] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[8] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[8] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS AugString,
        CASE
			WHEN T4.[9] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[9] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[9] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS SepString,
        CASE
			WHEN T4.[10] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[10] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[10] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS OctString,
        CASE
			WHEN T4.[11] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[11] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[11] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS NovString,
        CASE
			WHEN T4.[12] = 'STR-0001' THEN 'PR&PO'
			WHEN T4.[12] = 'STR-0002' THEN 'PROCESS'
			WHEN T4.[12] = 'STR-0003' THEN 'COMPLETE'
			ELSE ''
		END AS DeceString,
         TB2.Description AS Fix_Asset,
         TB3.Object_TH
          FROM TB_New_BP T1
        LEFT JOIN Cap_DeptrouteBP TB1 ON T1.DeptRouteId = TB1.CodeCD
        LEFT JOIN TB_FixAssetTable TB2 ON T1.FixassetgroupID = TB2.FixassetId
        LEFT JOIN TB_Objective TB3 ON T1.ObjectId = TB3.Object_ID
        INNER JOIN (
                SELECT *
                FROM
                    (SELECT [BPCode]
              ,[IdMonth]
              ,[Amount] FROM TB_AmountTrans) I
                    PIVOT (SUM(Amount) FOR IdMonth IN ([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) P
        ) T2 ON T1.BPCode = T2.BPCode
        INNER JOIN (
                SELECT *
                FROM
                    (SELECT [PorjectId]
              ,[YearId]
              ,[ExpectPlanAmount] FROM TB_ExpectPlan) I
                    PIVOT (SUM(ExpectPlanAmount) FOR YearId IN ([2023],[2024], [2025], [2026]
                        )) P
        ) T3 ON T1.BPCode = T3.PorjectId

         INNER JOIN (
                 SELECT *
				FROM
				(SELECT DISTINCT B.BPCode AS Code,M.MonthId,P.StatRateCode
					FROM TB_New_BP B
					FULL JOIN MonthTable M
					ON B.BPCode != ''
					LEFT JOIN TB_ProgressTrans P ON B.BPCode = P.BPCode AND M.MonthId = P.IdMonth ) AS Source
				PIVOT
				(MAX(StatRateCode) FOR MonthId IN ([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) AS PVT

         ) T4  ON T1.BPCode = T4.Code
        WHERE T1.CreateBy ='$empCode' AND T1.BPCode = '$params'
        ");
        return $query;
    }
    public function updateCap_NewBP($BPCode, $Compa, $Route_Dept, $Assetgroup, $Project, $Trans, $Objective, $AmountCapex)
    {
        $empCode = Auth::user()->emp_code;
        $returnValue = DB::table('TB_New_BP')->where('BPCode', $BPCode)->update(array(
            'CompanyId' => $Compa,
            'FixassetgroupID' => $Assetgroup,
            'Description' => $Trans,
            'ProjectID' => $Project,
            'ObjectId' => $Objective,
            'AmountCapex' => $AmountCapex,
            'DeptRouteId' => $Route_Dept,
            'UpdateDate' => date('Y-m-d H:i:s'),
            'UpdateBy' => $empCode,
            'Transactions' => $Trans,
        ));
        return $returnValue;

    }
    public function updateAmountTrans($MonthAmount, $MonthData, $BPCode)
    {
        $num_rows = DB::SELECT("SELECT *
                FROM TB_AmountTrans
                WHERE BPCode = '$BPCode' AND IdMonth = '$MonthData'
                ");
        $success = false;
        DB::beginTransaction();
        try {
            if (!empty($num_rows)) {
                DB::table('TB_AmountTrans')->where(array(
                    'IdMonth' => $MonthData
                    , 'BPCode' => $BPCode,
                ))->update(array(
                    'Amount' => $MonthAmount,
                ));
            } else {
                if ($MonthAmount != "") {
                    DB::table('TB_AmountTrans')->insert(
                        array(
                            'IdMonth' => $MonthData
                            , 'Amount' => $MonthAmount
                            , 'BPCode' => $BPCode
                            , 'IdYear' => date('Y') + 1,
                        )
                    );
                }

            }
            $success = true;
            if ($success) {
                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        return ["success" => "Data Inserted"];

    }
    public function updateExpectPlan($YearAmount, $YearId, $BPCode)
    {
        $num_rows = DB::SELECT("SELECT *
                FROM TB_ExpectPlan
                WHERE PorjectId = '$BPCode' AND YearId = '$YearId'
                ");

        $success = false;
        DB::beginTransaction();
        try {
            if (!empty($num_rows)) {
                DB::table('TB_ExpectPlan')->where(array(
                    'YearId' => $YearId
                    , 'PorjectId' => $BPCode,
                ))->update(array(
                    'ExpectPlanAmount' => $YearAmount,
                ));
            } else {
                if ($YearAmount != "") {
                    DB::table('TB_ExpectPlan')->insert(
                        array(
                            'YearId' => $YearId
                            , 'ExpectPlanAmount' => $YearAmount
                            , 'PorjectId' => $BPCode,
                        )
                    );
                }

            }
            $success = true;
            if ($success) {
                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        return ["success" => "Data Inserted"];

    }
    public function updateProgressTrans($Progress, $IdMonth, $BPCode)
    {
        $num_rows = DB::SELECT("SELECT *
                FROM TB_ProgressTrans
                WHERE BPCode = '$BPCode' AND IdMonth = '$IdMonth'
                ");
        // print_r($query);
        $success = false;
        DB::beginTransaction();
        try {
            if (!empty($num_rows)) {
                DB::table('TB_ProgressTrans')->where(array(
                    'IdMonth' => $IdMonth
                    , 'BPCode' => $BPCode,
                ))->update(array(
                    'StatRateCode' => $Progress,
                ));
            } else {
                if ($Progress != "") {
                    DB::table('TB_ProgressTrans')->insert(
                        array(
                            'IdMonth' => $IdMonth
                            , 'StatRateCode' => $Progress
                            , 'BPCode' => $BPCode
                            , 'IdYear' => date('Y') + 1,
                        )
                    );
                }

            }
            $success = true;
            if ($success) {
                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        return ["success" => "Data Inserted"];

    }
}
