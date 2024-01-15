@extends('layouts.main_template')

@section('content')
    @csrf
    @php
        $col_year = 4;
        $col_progress = 12;
        $year_cur = date('Y');
        $yearcur = date('Y') + 1;
    @endphp
    <!-- Content Wrapper. Contains page content -->
    <form id="form_capex">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Bp</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Bp</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-file-invoice-dollar"></i>&ensp;Edit Bp</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            <button id="btneditlist" type="button" class="btn btn-warning float-right"
                                                style="margin-right: 5px;" data-toggle="modal"
                                                data-target="#mdladd_company">
                                                <i class="fas fa-pencil-alt"></i> แก้ไขรายการ
                                            </button>
                                            <button id="btnaddlist" type="button" class="btn btn-success float-right"
                                                style="margin-right: 5px;">
                                                <i class="fas fa-plus"></i> เพิ่มรายการ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                // echo'<pre>';
                                // print_r($Cadepart);
                                // echo'</pre>';
                                ?>
                                <div class="card-body">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <input name="YearData" id="txtYearData" type="hidden"
                                        class="YearData form-control text-right" name="" value="{{ date('Y') + 1 }}"
                                        required autocomplete="off">
                                    <table id="tblrequest" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" valign="middle" class="text-center"
                                                    style="width: 100px; text-align: center; background: #faf9f9;">BP Cpde
                                                </th>
                                                <th rowspan="2" valign="middle" class="text-center"
                                                    style="width: 100px; text-align: center; background: #faf9f9;">บริษัท
                                                </th>
                                                <th rowspan="2" rowspan="2" align="center" valign="middle"
                                                    class="text-center" style="width: 200px; background: #faf9f9;">Route
                                                    Dept</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">HR Department</th>
                                                <th rowspan="2" class="text-center" rowspan="2"
                                                    style="width: 200px; background: #faf9f9;">Department No.</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Department name</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Fixed asset group</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Project</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Transactions</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Owner/prepared by</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9; display: none;">Approved 1</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9; display: none;">Approved 2</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 400px; background: #faf9f9;">Objective</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 300px; background: #faf9f9;">Total Project/Budget (Amount)
                                                </th>
                                                <th class="text-center" colspan="4"
                                                    style="width: 800px; background: #faf9f9;">Year</th>
                                                <th class="text-center Progress" colspan="12"
                                                    style="width: 2400px; background: #faf9f9;">% Progress</th>
                                                <th class="text-center" colspan="12"
                                                    style="width: 2400px; background: #faf9f9;">Amount</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 90px; background: #faf9f9;">Calculate</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 200px; background: #faf9f9;">Year 2023</th>
                                                <th style="width: 200px; background: #faf9f9;">Year 2024</th>
                                                <th style="width: 200px; background: #faf9f9;">Year 2025</th>
                                                <th style="width: 200px; background: #faf9f9;">Year 2026</th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Jan-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Feb-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Mar-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Apr-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">May-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Jun-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Jul-23
                                                </th>
                                                <th class="Progress" class="Progress"
                                                    style="width: 200px; background: #faf9f9;">Aug-23</th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Sep-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Oct-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Nov-23
                                                </th>
                                                <th class="Progress" style="width: 200px; background: #faf9f9;">Dec-23
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jan-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Feb-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Mar-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Apr-23</th>
                                                <th style="width: 200px; background: #faf9f9;">May-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Jun-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Jul-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Aug-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Sep-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Oct-23</th>
                                                <th style="width: 200px; background: #faf9f9;">Nov-23</th>
                                                <th style="width: 200px;background: #faf9f9;">Dec-23</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input id="txt_bp_code" name="txt_bp_code" type="text"
                                                        class="form-control" name="" value="" required
                                                        autocomplete="off" readonly>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="txt_codebp" id="txt_codebp"
                                                        value="">
                                                    <select id="sel_com" name="sel_com"
                                                        class="form-control select2 select2-danger" style="width: 100%;">
                                                        @foreach ($company as $corp)
                                                            <option value="{{ $corp->Company }}">{{ $corp->Company }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input name="txt_dproute" id="txt_dproute" type="text"
                                                            class="form-control" readonly>
                                                        <span class="input-group-append">
                                                            <button style="color: #000000;" onclick="opendoc_department()"
                                                                value="" type="button"
                                                                class="btn btn-info btn-flat"><i
                                                                    class="fas fa-folder-open"></i></button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input id="txt_dephr" name="txt_dephr" type="text"
                                                        class="form-control" name="" value="" required
                                                        autocomplete="off" readonly>
                                                </td>
                                                <td>
                                                    <input id="txt_depno" name="txt_depno" type="text"
                                                        class="form-control" name="" value="" required
                                                        autocomplete="off" readonly>
                                                </td>
                                                <td>
                                                    <input id="txt_depname" name="txt_depnam" type="text"
                                                        class="form-control" name="" value="" required
                                                        autocomplete="off" readonly>
                                                </td>
                                                <td>
                                                    <select id="sql_assetgroup" name="sql_assetgroup"
                                                        class="form-control select2" onchange="select_fixasset();">
                                                        <option value="">กรุณาเลือก</option>
                                                        @foreach ($Fix as $fixas)
                                                            <option value="{{ $fixas->FixassetId }}">
                                                                {{ $fixas->Description }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="sel_project" name="sel_project"
                                                        class="form-control select2">
                                                        @foreach ($project as $pro)
                                                            <option value={{ $pro->ProjectName }}>{{ $pro->ProjectName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input id="txt_trans" name="txt_trans" type="text"
                                                        class="form-control" value="" required autocomplete="off">
                                                </td>
                                                <td>
                                                    <input id="txt_owner" name="txt_owner" type="text"
                                                        class="form-control" value="" autocomplete="off" readonly>
                                                </td>
                                                <td style="display: none;">
                                                    <input id="txt_app1" name="txt_app1" type="text"
                                                        class="form-control" value="" autocomplete="off" readonly>
                                                </td>
                                                <td style="display: none;">
                                                    <input id="txt_app2" name="txt_app2" type="text"
                                                        class="form-control" value="" autocomplete="off" readonly>
                                                </td>
                                                <td>
                                                    <select id="sel_obj" name="sel_obj" class="form-control select2">
                                                        @foreach ($obj as $ob)
                                                            <option value="{{ $ob->Object_ID }}">
                                                                {{ $ob->Object_TH . ' (' . $ob->Object_EN . ')' }} </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input onkeydown="return nextbox(event, value, 'txtyear_1');"
                                                        onkeyup="javascript:this.value=Comma(this.value);"
                                                        id="txt_totalamount" name="txt_totalamount" type="text"
                                                        class="form-control text-right" value="" required
                                                        autocomplete="off">
                                                </td>
                                                @for ($i = 1; $i <= $col_year; $i++)
                                                    <td>
                                                        <input
                                                            onkeydown="return nextbox(event, value, 'txtyear_{{ $i + 1 }}');"
                                                            onkeyup="javascript:this.value=Comma(this.value);"
                                                            id="txtyear_{{ $i }}"
                                                            name="txtyear_{{ $i }}" type="text"
                                                            class="form-control text-right" value=""
                                                            autocomplete="off">
                                                    </td>
                                                @endfor
                                                @for ($i = 1; $i <= $col_progress; $i++)
                                                    <td class="Progress">
                                                        <select id="selpro_{{ $i }}"
                                                            name="selpro_{{ $i }}"
                                                            class="form-control select2">
                                                            <option value=""></option>
                                                            @foreach ($rate as $row)
                                                                <option value="{{ $row->StatRateCode }}">
                                                                    {{ $row->Description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endfor
                                                @for ($i = 1; $i <= $col_progress; $i++)
                                                    <td>
                                                        <input
                                                            onkeydown="return nextbox(event, value, 'txtamount_{{ $i + 1 }}');"
                                                            onkeyup="javascript:this.value=Comma(this.value);"
                                                            id="txtamount_{{ $i }}"
                                                            name="txtamount_{{ $i }}" type="text"
                                                            class="form-control text-right" value=""
                                                            autocomplete="off">
                                                    </td>
                                                @endfor

                                                <td>
                                                    <button class="btn btn-primary btn-sm mr-1" id="btn_cal"
                                                        title="Calculate Amount" disabled><i
                                                            class="fas fa-calculator"></i></button>
                                                    <button class="btn btn-primary btn-sm mr-1" id="btn_reset"
                                                        title="Reset progress"><i class="fas fa-minus"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table></BR>
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <button id="btn_save" style="background: #640d14; color: #ffffff;"
                                                type="button" class="btn btn-success button1">
                                                <i class="far fa-save"></i> บันทึกรายการ
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- =======================================================Transaction============================================================================= --}}
                                @php
                                    $year = date('Y');
                                    $year_sub = substr($year, -2);
                                @endphp
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-coins"></i>&ensp;Transaction</h3>
                                    </div></br>
                                    <table id="tblTrans" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                {{-- <th colspan="13" style="width: 2600px;"></th> --}}
                                                <th rowspan="2" valign="middle" class="text-center"
                                                    style="width: 100px; text-align: center; background: #faf9f9;">BP Cpde
                                                </th>
                                                <th rowspan="2" valign="middle" class="text-center"
                                                    style="width: 100px; text-align: center; background: #faf9f9;">บริษัท
                                                </th>
                                                <th rowspan="2" rowspan="2" align="center" valign="middle"
                                                    class="text-center" style="width: 200px; background: #faf9f9;">Route
                                                    Dept</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">HR Department</th>
                                                <th rowspan="2" class="text-center" rowspan="2"
                                                    style="width: 200px; background: #faf9f9;">Department No.</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Department name</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Fixed asset group</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Project</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Transactions</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9;">Owner/prepared by</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9; display:none;">Approved 1</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 200px; background: #faf9f9; display:none;">Approved 2</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 400px; background: #faf9f9;">Objective</th>
                                                <th rowspan="2" class="text-center"
                                                    style="width: 300px; background: #faf9f9;">Total Project/Budget
                                                    (Amount)</th>
                                                <th class="text-center" colspan="4"
                                                    style="width: 800px; background: #faf9f9;">Year</th>
                                                <th class="text-center" colspan="12"
                                                    style="width: 2400px; background: #faf9f9;">% Progress</th>
                                                <th class="text-center" colspan="12"
                                                    style="width: 2400px; background: #faf9f9;">Amount</th>
                                                {{-- <th rowspan="2" class="text-center" style="width: 90px; background: #faf9f9;">Action</th> --}}
                                            </tr>
                                            <tr>
                                                <th style="width: 200px; background: #faf9f9;">Year {{ date('Y') }}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Year {{ date('Y') + 1}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Year {{ date('Y') + 2 }}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Year {{ date('Y') + 3 }}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jan-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Feb-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Mar-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Apr-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">May-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jun-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jul-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Aug-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Sep-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Oct-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Nov-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Dec-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jan-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Feb-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Mar-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Apr-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">May-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jun-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Jul-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Aug-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Sep-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Oct-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px; background: #faf9f9;">Nov-{{ $year_sub}}
                                                </th>
                                                <th style="width: 200px;background: #faf9f9;">Dec-{{ $year_sub}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Ecapex as $rows)
                                                <tr>
                                                    <td><a href="#"
                                                            onclick="openeditDocument('{{ $rows->BPCode }}')">{{ $rows->BPCode }}</a>
                                                    </td>
                                                    <td>{{ $rows->CompanyId }}</td>
                                                    <td>{{ $rows->DeptRouteId }}</td>
                                                    <td>{{ $rows->Department_HR }}</td>
                                                    <td>{{ $rows->CodeHR }}</td>
                                                    <td>{{ $rows->Department_AC }}</td>
                                                    <td>{{ $rows->Fix_Asset }}</td>
                                                    <td>{{ $rows->ProjectID }}</td>
                                                    <td>{{ $rows->Trans }}</td>
                                                    <td>{{ $rows->email }}</td>
                                                    <td style="display: none;">{{ $rows->E_Map2 }}</td>
                                                    <td style="display: none;">{{ $rows->E_Map3 }}</td>
                                                    <td>{{ $rows->Object_TH }}</td>
                                                    <td class="text-right">{{ number_format($rows->AmountCapex, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->YearD, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->YEAR1, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->YEAR2, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->YEAR3, 2) }}</td>
                                                    <td class="text-right">{{ $rows->JanString }}</td>
                                                    <td class="text-right">{{ $rows->FebString }}</td>
                                                    <td class="text-right">{{ $rows->MarString }}</td>
                                                    <td class="text-right">{{ $rows->AprString }}</td>
                                                    <td class="text-right">{{ $rows->MayString }}</td>
                                                    <td class="text-right">{{ $rows->JunString }}</td>
                                                    <td class="text-right">{{ $rows->julString }}</td>
                                                    <td class="text-right">{{ $rows->AugString }}</td>
                                                    <td class="text-right">{{ $rows->SepString }}</td>
                                                    <td class="text-right">{{ $rows->OctString }}</td>
                                                    <td class="text-right">{{ $rows->NovString }}</td>
                                                    <td class="text-right">{{ $rows->DeceString }}</td>
                                                    <td class="text-right">{{ number_format($rows->Jan, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Feb, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Mar, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Apr, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->May, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Jun, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->jul, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Aug, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Sep, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Oct, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Nov, 2) }}</td>
                                                    <td class="text-right">{{ number_format($rows->Dece, 2) }}</td>
                                                    {{-- <td class="text-center">
                        <button onclick="openeditDocument('{{ $rows->BPCode }}')" class="btn btn-warning btn-sm mr-1" id="" title="" value="{{ $rows->BPCode }}"><i class="fas fa-pencil-alt"></i>แก้ไข</button>
                      </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                {{-- =======================================================Clode Transaction============================================================================= --}}
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </form>
    <!-- /.modal -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="tblDepartment" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>HR Department</th>
                                <th>Department No.</th>
                                <th style="width: 100px;">Department name</th>
                                <th>Approved 1</th>
                                <th>Approved 2</th>
                                <th>เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Cadepart as $val)
                                <tr>
                                    <td>{{ $val->CodeCD }}</td>
                                    <td>{{ $val->Department_HR }}</td>
                                    <td>{{ $val->Code }}</td>
                                    <td>{{ $val->Department_AC }}</td>
                                    <td>{{ $val->E_Map2 }}</td>
                                    <td>{{ $val->E_Map3 }}</td>
                                    <td class="text-center"><button rows=""
                                            onclick="addDataDepartment('{{ $val->CodeCD }}')"
                                            style="background: #9a031e;" class="btn btn-danger btn-sm mr-1"
                                            id="" title="Calculate Amount"><i
                                                class="fas fa-hand-point-left"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.modal -->
    <!-- /.content-wrapper -->
    <script type="text/javascript">
        function openeditDocument(params) {
            // alert('params =>'+params);
            $.post("getData_Edit_NewBP", {
                    params
                },
                function(result) {
                    // console.log('result=>'+result);
                    var data = JSON.parse(result);
                    if (data != undefined) {
                        for (var obj in data) {
                            $('#txt_bp_code').val(data[0].BPCode);
                            $('#sel_com').val(data[0].CompanyId);
                            $('#txt_dproute').val(data[0].CodeCD);
                            $('#txt_dephr').val(data[0].Department_HR);
                            $('#txt_depno').val(data[0].CodeHR);
                            $('#txt_depname').val(data[0].Department_AC);
                            $('#sql_assetgroup').val(data[0].FixassetgroupID);
                            $('#sel_project').val(data[0].ProjectID);
                            $('#txt_owner').val(data[0].E_Map1);
                            $('#txt_app1').val(data[0].E_Map2);
                            $('#txt_app2').val(data[0].E_Map3);
                            $('#txt_trans').val(data[0].Trans);
                            $('#sel_obj').val(data[0].Object_ID).attr("selected", "selected");
                            if (data[0].AmountCapex != undefined) {
                                $('#txt_totalamount').val(Comma(parseFloat(data[0].AmountCapex).toFixed(2)));
                            }
                            if (data[0].YearD != undefined) {
                                $('#txtyear_1').val(Comma(parseFloat(data[0].YearD).toFixed(2)));
                            }
                            if (data[0].YEAR1 != undefined) {
                                $('#txtyear_2').val(Comma(parseFloat(data[0].YEAR1).toFixed(2)));
                            }
                            if (data[0].YEAR2 != undefined) {
                                $('#txtyear_3').val(Comma(parseFloat(data[0].YEAR2).toFixed(2)));
                            }
                            if (data[0].YEAR3 != undefined) {
                                $('#txtyear_4').val(Comma(parseFloat(data[0].YEAR3).toFixed(2)));
                            }
                            if (data[0].Jan != undefined) {
                                $('#txtamount_1').val(Comma(parseFloat(data[0].Jan).toFixed(2)));
                            }
                            if (data[0].Feb != undefined) {
                                $('#txtamount_2').val(Comma(parseFloat(data[0].Feb).toFixed(2)));
                            }
                            if (data[0].Mar != undefined) {
                                $('#txtamount_3').val(Comma(parseFloat(data[0].Mar).toFixed(2)));
                            }
                            if (data[0].Apr != undefined) {
                                $('#txtamount_4').val(Comma(parseFloat(data[0].Apr).toFixed(2)));
                            }
                            if (data[0].May != undefined) {
                                $('#txtamount_5').val(Comma(parseFloat(data[0].May).toFixed(2)));
                            }
                            if (data[0].Jun != undefined) {
                                $('#txtamount_6').val(Comma(parseFloat(data[0].Jun).toFixed(2)));
                            }
                            if (data[0].jul != undefined) {
                                $('#txtamount_7').val(Comma(parseFloat(data[0].jul).toFixed(2)));
                            }
                            if (data[0].Aug != undefined) {
                                $('#txtamount_8').val(Comma(parseFloat(data[0].Aug).toFixed(2)));
                            }
                            if (data[0].Sep != undefined) {
                                $('#txtamount_9').val(Comma(parseFloat(data[0].Sep).toFixed(2)));
                            }
                            if (data[0].Oct != undefined) {
                                $('#txtamount_10').val(Comma(parseFloat(data[0].Oct).toFixed(2)));
                            }
                            if (data[0].Nov != undefined) {
                                $('#txtamount_11').val(Comma(parseFloat(data[0].Nov).toFixed(2)));
                            }

                            if (data[0].Dece != undefined) {
                                $('#txtamount_12').val(Comma(parseFloat(data[0].Dece).toFixed(2)))
                            }

                            $('#selpro_1').val(data[0].Jan_S).attr("selected", "selected");
                            $('#selpro_2').val(data[0].Feb_S).attr("selected", "selected");
                            $('#selpro_3').val(data[0].Mar_S).attr("selected", "selected");
                            $('#selpro_4').val(data[0].Apr_S).attr("selected", "selected");
                            $('#selpro_5').val(data[0].May_S).attr("selected", "selected");
                            $('#selpro_6').val(data[0].Jun_S).attr("selected", "selected");
                            $('#selpro_7').val(data[0].jul_S).attr("selected", "selected");
                            $('#selpro_8').val(data[0].Aug_S).attr("selected", "selected");
                            $('#selpro_9').val(data[0].Sep_S).attr("selected", "selected");
                            $('#selpro_10').val(data[0].Oct_S).attr("selected", "selected");
                            $('#selpro_11').val(data[0].Nov_S).attr("selected", "selected");
                            $('#selpro_12').val(data[0].Dece_S).attr("selected", "selected");
                            $('#txt_bp_code').val(data[0].BPCode);
                        }
                    }
                });
        }

        function opendoc_department() {
            $('#modal-lg').modal('show');
        }

        function addDataDepartment(params) {
            // alert('params =>'+params);
            $.post("getData_Cap_Deptroute_CodeCD", {
                    params
                },
                function(result) {
                    // console.log('result=>'+result);
                    var data = JSON.parse(result);
                    if (data != undefined) {
                        for (var obj in data) {
                            // console.log(obj);
                            $('#txt_dproute').val(data[0].CodeCD);
                            $('#txt_dephr').val(data[0].Department_HR);
                            $('#txt_depno').val(data[0].Code);
                            $('#txt_owner').val(data[0].E_Map1);
                            $('#txt_depname').val(data[0].Department_AC);
                            $('#txt_app1').val(data[0].E_Map2);
                            $('#txt_app2').val(data[0].E_Map3);
                        }
                    }
                    $('#modal-lg').modal('hide');
                });
        }

        $(document).ready(function() {

            // $('#tblrequest_filter').css("display", "none");
            $('#btneditlist').click(function() {
                window.location.href = "capex_new_edit";
            });
            $('#btnaddlist').click(function() {
                window.location.href = "capex_new";
            });
            var count = 2;
            $('#tblrequest').dataTable({
                "searching": false,
                "paging": false,
                "info": false,
                "aaSorting": [
                    [0, 'desc']
                ],
                "scrollX": true,
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                        19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                        37, 38, 39, 40, 41, 42
                    ]
                }],
            });
            $('#tblDepartment').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 1, 2, 3, 4, 5, 6]
                }]
            });
            $('#tblTrans').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
                        19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
                        37, 38, 39, 40, 41
                    ]
                }],
                "aaSorting": [
                    [0, 'desc']
                ],
                "scrollX": true
            });

        });
    </script>
    <script>
        let txt_asset = 0;
        $(document).ready(function() {

            // assign_value();   
            $('#btn_cal').click(function(e) {
                e.preventDefault();
                var amount = document.getElementById("txtyear_1").value;
                if (amount <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Amount is not correct!!',
                        text: 'Calculate failed'
                    });
                } else if (check_input_progress() == true) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Input progress is not correct!!',
                        text: 'Calculate failed'
                    });
                } else {
                    cal_amount();
                }

            });

            $('#btn_reset').click(function(e) {
                e.preventDefault();
                btn_reset();

            });

            $('#btn_save').click(function(e) {
                e.preventDefault();

                btn_save();
            });

        });



        function select_fixasset() {
            val_asset = document.getElementById("sql_assetgroup").value;
            //get isprogress
            $.ajax({
                type: "GET",
                url: "/fixasset/isprogress/" + val_asset,
                dataType: "JSON",
                success: function(response) {
                    isprogress = response[0].Isprogress;
                    console.log(isprogress);
                    if (isprogress == "0") {
                        $(".Progress").hide();
                        // alert('TEST');
                    } else {
                        // $(".Progress").attr("style", "display");
                        $(".Progress").show();
                    }
                    reset_value_by_asset(isprogress);
                }
            });

        }

        function reset_value_by_asset(isprogress) {
            document.getElementById("btn_cal").disabled = isprogress == 1 ? false : true;
            for (let index = 1; index <= {{ $col_progress }}; index++) {
                let amount = 'txtamount_' + index;
                let value_a = isprogress == 1 ? "" : document.getElementById(amount).value;
                document.getElementById(amount).value = (value_a);
                document.getElementById(amount).readOnly = isprogress == 1 ? true : false;

                let progress = 'selpro_' + index;
                let value_p = isprogress == 1 ? document.getElementById(progress).value : "";
                document.getElementById(progress).value = (value_p);
                document.getElementById(progress).disabled = isprogress == 1 ? false : true;
            }
        }

        function show_transaction() {
            $('#tb_transaction').DataTable({
                "searching": false,
                serverSide: false,
                processing: false,
                destroy: true,
                ajax: {
                    url: "/request/transaction",
                    type: "get"
                },
                columns: [{
                    title: "No",
                    visible: true,
                    data: "Id",
                    width: "3%"
                }]
            });

            var table = $('#tb_transaction').DataTable();
        }


        function btn_save() {
            var data = {
                BPCode: $('#txt_bp_code').val(),
                Compa: $('#sel_com').val(),
                Route_Dept: $('#txt_dproute').val(),
                Assetgroup: $('#sql_assetgroup').val(),
                Project: $('#sel_project').val(),
                Trans: $('#txt_trans').val(),
                Objective: $('#sel_obj').val(),
                AmountCapex: $('#txt_totalamount').val().split(",").join("")
            };
            var JsonData = JSON.stringify(data);
            // console.log(JsonData);
            $.post("edit_Cap_NewBP", {
                    JsonData
                },
                function(result) {
                    console.log(result);
                    // alert('บันทึกข้อมูลสำเร็จ');
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    ).then(function() {
                        window.location.href = 'capex_new_edit';
                    });

                });
            //============================YEAR================================

            var Year_Amount_S = [];
            var q = 0;
            for (var i = 1; i <= 4; i++) {
                Year_Amount_S = $('#txtyear_' + i).val().split(",").join("");
                $.post("edit_TB_ExpectPlan", {
                        YearAmount: Year_Amount_S,
                        YearId: (<?php echo date('Y'); ?>) + q,
                        BPCode: $('#txt_bp_code').val()
                    },
                    function(result) {
                        console.log(result);
                        // alert('บันทึกข้อมูลสำเร็จ');
                    });
                q++;
            }
            //===========================Month=================================
            var Month_Amount_S = [];
            for (var k = 1; k <= 12; k++) {
                Month_Amount_S = $('#txtamount_' + k).val().split(",").join("");
                $.post("edit_TB_AmountTrans", {
                        MonthAmount: Month_Amount_S,
                        MonthData: k,
                        BPCode: $('#txt_bp_code').val()
                    },
                    function(result) {
                        console.log(result);
                        // alert('บันทึกข้อมูลสำเร็จ');
                    });
            }
            //===========================Stat Rate=================================
            var Progress_trans = [];
            for (var s = 1; s <= 12; s++) {
                Progress_trans = $('#selpro_' + s).val();
                $.post("edit_TB_ProgressTrans", {
                        ProgressTrans: Progress_trans,
                        IdMonth: s,
                        BPCode: $('#txt_bp_code').val()
                    },
                    function(result) {
                        console.log(result);
                        // alert('บันทึกข้อมูลสำเร็จ');
                    });
            }

        }


        function cal_amount() {
            var form_capex = $("#form_capex").serialize();
            $.ajax({
                type: "POST",
                url: "/request/calamount",
                data: form_capex,
                dataType: "json",
                success: function(response) {
                    cal_result_amount(response);
                    // alert('Calculate complete');
                    Swal.fire('Calculate complete');
                },
                error: function(jqxhr, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Calculate failed',
                        text: 'Calculate failed'
                    });
                    console.log(jqxhr);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }

        function cal_result_amount(response) {
            for (let index = 1; index <= {{ $col_progress }}; index++) {
                // console.log(response[index]);
                let amount = 'txtamount_' + index;
                let value = response[index] == undefined ? "" : response[index];
                amount = amount == undefined ? "" : amount;
                document.getElementById(amount).value = (value);
            }
        }

        function btn_reset() {
            for (let index = 1; index <= {{ $col_progress }}; index++) {
                // console.log(response[index]);
                let amount = 'txtamount_' + index;
                document.getElementById(amount).value = ("");
            }

            for (let index = 1; index <= {{ $col_progress }}; index++) {
                let progress = 'selpro_' + index;
                document.getElementById(progress).value = '';
            }

            Swal.fire({
                icon: 'warning',
                title: 'Reset',
                text: 'Reset progress!',
            })

        }


        function check_input_progress() {
            let prpo = "STR-0001";
            let process = "STR-0002";
            let complete = "STR-0003"
            let check_error = false;
            let count_prpo = 0;
            let count_process = 0;
            let count_complete = 0;
            for (let index = 1; index <= {{ $col_progress }}; index++) {
                let progress = 'selpro_' + index;
                let sel_progress = document.getElementById(progress);
                value = sel_progress.value;
                if (value == prpo) {
                    count_prpo++;
                } else if (value == process) {
                    count_process++;
                } else if (value == complete) {
                    count_complete++;
                }
                if (count_prpo > 1) {
                    check_error = true;
                    break;
                }
                if (count_complete > 1) {
                    check_error = true;
                    break;
                }
            }
            if (count_prpo == 0 && count_process == 0 && count_complete == 0) {
                check_error = true;
            }
            if (count_prpo == 0 && count_process >= 1) {
                check_error = true;
            }
            return check_error;
        }


        function separateComma(val) {
            // remove sign if negative
            var sign = 1;
            if (val < 0) {
                sign = -1;
                val = -val;
            }
            // trim the number decimal point if it exists
            let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
            let len = num.toString().length;
            let result = '';
            let count = 1;

            for (let i = len - 1; i >= 0; i--) {
                result = num.toString()[i] + result;
                if (count % 3 === 0 && count !== 0 && i !== 0) {
                    result = ',' + result;
                }
                count++;
            }

            // add number after decimal point
            if (val.toString().includes('.')) {
                result = result + '.' + val.toString().split('.')[1];
            }
            // return result with - sign if negative
            return sign < 0 ? '-' + result : result;
        }

        function select_routeDept() {

        }

        function assign_value() {
            //sel_com
            //sel_detail

            //sql_assetgroup
            //sel_project

            //sel_obj_th

            //sel_obj_en

            document.getElementById('sel_com').value = 'D1';
            document.getElementById('sel_project').value = 'Project1';
            $('#txt_dproute').val('CD31');
            // $('#txt_dephr').val('Project');
            // $('#txt_depno').val('FA110100');
            // $('#txt_depname').val('GL');
            $('#txt_owner').val('test');
            $('#txt_app1').val('sulawan_k@deestone.com');
            $('#txt_app2').val('jureemas_m@deestone.com');
            $('#txt_trans').val('test');
            $('#txt_totalamount').val('1000000');
            $('#txtyear_1').val('500000');
            $('#txtyear_2').val('200000');
            condition();
        }

        function condition() {
            let a = 'STR-0001';
            let b = 'STR-0002';
            let c = 'STR-0003';
            document.getElementById('selpro_1').value = a;
            document.getElementById('selpro_2').value = b;
            document.getElementById('selpro_3').value = b;
            document.getElementById('selpro_4').value = b;
            document.getElementById('selpro_5').value = b;
            document.getElementById('selpro_6').value = b;
            document.getElementById('selpro_7').value = b;
            document.getElementById('selpro_8').value = b;
            document.getElementById('selpro_9').value = b;
            document.getElementById('selpro_10').value = b;
            document.getElementById('selpro_11').value = b;
            document.getElementById('selpro_12').value = b;
        }
    </script>
@endsection
