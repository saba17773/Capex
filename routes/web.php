<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Process\RequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::GET('/', 'HomeController@index')->name('home');
Route::GET('/home', 'HomeController@index')->name('home');
Route::GET('admin/home','HomeController@adminHome')->name('admin.home')->middleware('is_admin');


//Company Master
Route::GET('company', 'Master\MasterController@company')->name('company')->middleware('is_admin');
Route::POST('save_company', 'Master\MasterController@insertCompany')->name('save_company');
Route::POST('get_company', 'Master\MasterController@get_company');
Route::POST('edit_company', 'Master\MasterController@edit_company');
Route::POST('del_company', 'Master\MasterController@del_company');

//Objective Master
Route::GET('objective', 'Master\ObjectiveController@objective')->middleware('is_admin');
Route::POST('save_objective', 'Master\ObjectiveController@save_objective');
Route::POST('get_objective', 'Master\ObjectiveController@get_objective');
Route::POST('edit_objective', 'Master\ObjectiveController@edit_objective');
Route::POST('del_objective', 'Master\ObjectiveController@del_objective');

//Description Master
Route::GET('description', 'Master\DescriptionController@description')->middleware('is_admin');
Route::POST('save_description', 'Master\DescriptionController@save_description');
Route::POST('get_description', 'Master\DescriptionController@get_description');
Route::POST('edit_description', 'Master\DescriptionController@edit_description');
Route::POST('del_description', 'Master\DescriptionController@del_description');

//Fixassetgroup Master
Route::GET('fixassetgroup', 'Master\FixassetgroupController@fixassetgroup')->middleware('is_admin');
Route::POST('save_fixassetgroup', 'Master\FixassetgroupController@save_fixassetgroup');
Route::POST('get_fixassetgroup', 'Master\FixassetgroupController@get_fixassetgroup');
Route::POST('edit_fixassetgroup', 'Master\FixassetgroupController@edit_fixassetgroup');
Route::POST('del_fixassetgroup', 'Master\FixassetgroupController@del_fixassetgroup');
Route::GET('fixasset/isprogress/{id}', 'Master\FixassetgroupController@get_isprogress');//tan


//Progress Breakdown Master
Route::GET('progress_breakdown', 'Master\ProgressBreakdownController@progress_breakdown')->middleware('is_admin');
Route::POST('save_fixassetgroup', 'Master\FixassetgroupController@save_fixassetgroup');
Route::POST('get_fixassetgroup', 'Master\FixassetgroupController@get_fixassetgroup');
Route::POST('edit_fixassetgroup', 'Master\FixassetgroupController@edit_fixassetgroup');
Route::POST('del_fixassetgroup', 'Master\FixassetgroupController@del_fixassetgroup');

//Department Master
Route::GET('department', 'Master\DepartmentController@department')->name('department');
Route::POST('saveCap_DeptrouteBP', 'Master\DepartmentController@saveCap_DeptrouteBP');
Route::POST('sendCap_DeptrouteBP', 'Master\DepartmentController@sendCap_DeptrouteBP');
Route::POST('editCap_DeptrouteBP', 'Master\DepartmentController@edit');

//Department Transfer Master
Route::GET('DepartmentTrans', 'Master\DepartmentController@DepartmentTrans')->name('DepartmentTrans');
Route::POST('SaveDepartmentTrans', 'Master\DepartmentController@SaveDepartmentTrans');
Route::POST('SendDepartmentTrans', 'Master\DepartmentController@SendDepartmentTrans');
Route::POST('EditDepartmentTrans', 'Master\DepartmentController@EditDepartmentTrans');

//Key Request Capex
Route::GET('request_capex', 'Process\RequestController@request_capex')->name('request_capex');
Route::POST('save_capex_request', 'Process\RequestController@save_capex_request');
Route::POST('request/calamount', 'Process\RequestController@calcurate_amount');//tan
Route::POST('request/add', 'Process\RequestController@add');//tan
Route::GET('request/transaction','Process\RequestController@transaction');
Route::POST('request/edit', 'Process\RequestController@edit');


//Deptroute
Route::get('/get/deptroute', 'Process\RequestController@get_deptroute');//tan

//Tranfer BP
Route::GET('capex_tranfer_list', 'Process\TransferController@capex_tranfer_list');
Route::GET('capex_tranfer_bp', 'Process\TransferController@capex_tranfer_bp');
Route::POST('edit_capex_trans', 'Process\TransferController@edit_capex_trans');
Route::POST('edit_Cap_Transfer_Year', 'Process\TransferController@edit_Cap_Transfer_Year');
Route::POST('edit_Cap_Transfer_Detail', 'Process\TransferController@edit_Cap_Transfer_Detail');
Route::POST('up_Cap_Transfer_Year', 'Process\TransferController@up_Cap_Transfer_Year');
Route::POST('up_Cap_Transfer_Detail', 'Process\TransferController@up_Cap_Transfer_Detail');
Route::POST('getData_Cap_Deptroute', 'Process\TransferController@getData_Cap_Deptroute');
Route::POST('delete_capex', 'Process\TransferController@delete_capex');

//Capex New
Route::GET('capex_new', 'Process\CapexnewController@capex_new')->name('capex_new');
Route::GET('capex_new_edit', 'Process\CapexnewController@capex_new_edit')->name('capex_new_edit');
Route::POST('getData_Cap_Deptroute_CodeCD', 'Process\CapexnewController@getData_Cap_Deptroute_CodeCD');
Route::POST('getData_Edit_NewBP', 'Process\CapexnewController@getData_Edit_NewBP');
Route::POST('edit_Cap_NewBP', 'Process\CapexnewController@edit_Cap_NewBP');
Route::POST('edit_TB_AmountTrans', 'Process\CapexnewController@edit_TB_AmountTrans');
Route::POST('edit_TB_ExpectPlan', 'Process\CapexnewController@edit_TB_ExpectPlan');
Route::POST('edit_TB_ProgressTrans', 'Process\CapexnewController@edit_TB_ProgressTrans');