@extends('layouts.main_template')
@section('content')
    @csrf
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Transfer Bp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Transfer Bp</li>
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
                                <h3 class="card-title">Transfer Bp</h3>
                                <div class="row">
                                    <div class="col-12">
                                        {{-- <button id="btnexport_excel" type="button" class="btn btn-warning float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#mdladd_company">
                      <i class="fas fa-pencil-alt"></i>Export Excel 
                    </button> --}}
                                        <button id="btnoldlist" type="button" class="btn btn-warning float-right"
                                            style="margin-right: 5px;" data-toggle="modal" data-target="#mdladd_company">
                                            <i class="fas fa-pencil-alt"></i>รายการที่เคยบันทึก
                                        </button>
                                        <button id="btnnewlist" type="button" class="btn btn-success float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-plus"></i> รายการใหม่
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @php
                                // echo'<pre>';
                                // print_r($capYear);
                            @endphp

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 1px;">บริษัท</th>
                                            {{-- <th style="width: 200px;">HR Department</th> --}}
                                            <th style="width: 100px;">Department No</th>
                                            <th style="width: 120px;">Department name</th>
                                            {{-- <th>วันที่อนุมัติ</th> --}}
                                            <th style="width: 59px;">Group ID</th>
                                            <th style="width: 30px;">Year</th>
                                            <th style="width: 120px;">เลข JOB</th>
                                            <th style="width: 120px;">เลขที่งบประมาณ</th>
                                            <th style="width: 250px;">รายการ</th>
                                            <th style="width: 250px;">วัตถุประสงค์การใช้</th>
                                            <th style="width: 220px;">CAPEX {{ date('Y') - 1 }} งบประมาณแรกเริ่ม</th>
                                            <th style="width: 150px;">Increase ({{ date('Y') - 1 }})</th>
                                            <th style="width: 150px;">Decrease ({{ date('Y') - 1 }})</th>
                                            <th style="width: 150px;">Adjust Transfer</th>
                                            <th style="width: 150px;">Transfer In</th>
                                            <th style="width: 150px;">Transfer Out</th>
                                            <th style="width: 150px;">Total budget {{ date('Y') - 1 }}</th>
                                            <th style="width: 200px;">PR Issued(Pending/Approved)</th>
                                            <th style="width: 150px;">PO Pending</th>
                                            <th style="width: 150px;">PO Approved</th>
                                            <th style="width: 150px;">Total</th>
                                            <th style="width: 150px;">BP {{ date('Y') - 1 }} Balance</th>
                                            <th style="width: 200px;">งบประมาณใช้ไปทั้งหมด {{ date('Y') - 1 }}</th>
                                            <th style="width: 200px;">PO approved Remaining</th>
                                            {{-- <th style="width: 200px;">PO approved Remaining</th> --}}
                                            <th style="width: 200px;">Adjust Other</th>
                                            <th style="width: 200px; display:none;">BP {{ date('Y') - 1 }} Remaining</th>
                                            <th style="width: 150px;">ยอดยกไป</th>
                                            <th style="width: 150px;">เงินเหลือ</th>
                                            <th style="width: 150px; display:none;">Jul {{ date('Y') }}</th>
                                            <th style="width: 150px; display:none;">Aug {{ date('Y') }}</th>
                                            <th style="width: 150px; display:none;">Sep {{ date('Y') }}</th>
                                            <th style="width: 150px; display:none;">Oct {{ date('Y') }}</th>
                                            <th style="width: 150px; display:none;">Nov {{ date('Y') }}</th>
                                            <th style="width: 150px; display:none;">Dec {{ date('Y') }}</th>
                                            <th></th>
                                            <th style="width: 150px; display:none;">Total {{ date('Y') }}</th>
                                            <th style="width: 200px;">BP Total available for transfer</th>
                                            <th style="width: 150px;">Jan {{ date('Y') }}</th>
                                            <th style="width: 150px;">Feb {{ date('Y') }}</th>
                                            <th style="width: 150px;">Mar {{ date('Y') }}</th>
                                            <th style="width: 150px;">Apr {{ date('Y') }}</th>
                                            <th style="width: 150px;">May {{ date('Y') }}</th>
                                            <th style="width: 150px;">Jun {{ date('Y') }}</th>
                                            <th style="width: 150px;">Jul {{ date('Y') }}</th>
                                            <th style="width: 150px;">Aug {{ date('Y') }}</th>
                                            <th style="width: 150px;">Sep {{ date('Y') }}</th>
                                            <th style="width: 150px;">Oct {{ date('Y') }}</th>
                                            <th style="width: 150px;">Nov {{ date('Y') }}</th>
                                            <th style="width: 150px;">Dec {{ date('Y') }}</th>
                                            <th></th>
                                            <th style="width: 150px;">Total {{ date('Y') }}</th>
                                            @for ($c = 2; $c <= 2; $c++)
                                                <th style="width: 150px;">{{ date('Y') + 1 }}</th>
                                            @endfor
                                            <th style="width: 150px;">{{ date('Y') + 2 }}</th>
                                            <th style="width: 150px;">{{ date('Y') + 3 }}</th>
                                            <th></th>
                                            <th style="width: 150px;">BP Total Deduct</th>
                                            <th style="width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1; ?>
                                        @if (!empty($capYear))
                                            @foreach ($capYear as $rows)
                                                {{-- @php echo'<pre>'; print_r($val->COMPANY); @endphp --}}
                                                @foreach ($rows as $val)
                                                    <tr>
                                                        <td>{{ $val->COMPANY }}</td>
                                                        {{-- <td><div class="input-group">
                            <input id="txthr_department_{{ $i }}" type="text" class="form-control">
                            <span class="input-group-append">
                              <button style="color: #000000;" onclick="opentable_department('{{ $rows->DEPARTMENT_NO }}',{{ $i }})" value="{{ $rows->DEPARTMENT_NO }}" type="button" class="btn btn-info btn-flat"><i class="fas fa-folder-open"></i></button>
                            </span>
                          </div></td> --}}
                                                        <td>{{ $val->DEPARTMENT_NO }}</td>
                                                        <td>{{ $val->DEPARTMENT_NAME }}</td>
                                                        {{-- <td>วันที่อนุมัติ</td> --}}
                                                        <td>{{ $val->GROUPID }}</td>
                                                        <td>{{ $val->YEAR }}</td>
                                                        <td>{{ $val->CAPEX_NO }}</td>
                                                        <td>{{ $val->CAPEX_NO }}</td>
                                                        <td>{{ $val->CAPEX_NAME }}</td>
                                                        <td>{{ $val->CAPEX_NAME }}</td>
                                                        <td class="text-right">{{ number_format($val->BP, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->INCREASE, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->DECREASE, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->ADJ_TRANS, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->ADJ_TRANS_IN, 2) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($val->ADJ_TRANS_OUT, 2) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($val->TotalBudget, 2) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($val->PR_ISSUE, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->PO_PENDING, 2) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($val->PO_APPROVE, 2) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($val->TOTALPRPO, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->BP_BALANCE, 2) }}
                                                        </td>
                                                        <td class="text-right">{{ number_format($val->ACTUAL, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->PO_APP_REMAIN, 2) }}
                                                        </td>
                                                        {{-- <td class="text-right">{{ number_format($rows->PO_APP_REMAIN,2) }}</td> --}}
                                                        <td class="text-right">{{ number_format($val->ADJ_OTHER, 2) }}
                                                        </td>
                                                        <td class="text-right" style="display: none;">
                                                            {{ number_format($val->BP_REMAIN, 2) }}</td>
                                                        <input value="{{ $val->BP_REMAIN_AFTER_ADJOTH }}"
                                                            id="txtTotal_BP{{ $i }}" type="hidden"
                                                            class="form-control text-right">
                                                        <td class="text-right">
                                                            {{ number_format($val->BP_REMAIN_AFTER_ADJOTH, 2) }}</td>
                                                        <td class="text-right">{{ number_format($val->ADV, 2) }}</td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->MONTH_7, 2) }}"
                                                                id="txtFix_Jul_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->MONTH_8, 2) }}"
                                                                id="txtFix_Aug_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->MONTH_9, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtFix_Oct_{{ $i }}');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtFix_Sep_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->MONTH_10, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtFix_Nov_{{ $i }}');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtFix_Oct_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->MONTH_11, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtFix_Dec_{{ $i }}');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtFix_Nov_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->MONTH_12, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'btncal_Fixmonth{{ $i }}');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtFix_Dec_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><button style="background: #fff3b0;"
                                                                onkeydown="return nextbox(event, value, 'txtTotal_{{ $i }}');"
                                                                onclick="CalSumTotal('{{ $i }}')"
                                                                class="btn btn-warning btn-sm mr-1"
                                                                id="btncal_Fixmonth{{ $i }}"
                                                                title="Calculate Amount"><i
                                                                    class="fas fa-calculator"></i></button></td>
                                                        <td style="display: none;"><input
                                                                value="{{ number_format($val->BP_AFTER_FC, 2) }}"
                                                                onkeydown="return nextbox(event, value, 'txtBP_Total_{{ $i }}');"
                                                                id="txtTotal_{{ $i }}" type="text"
                                                                class="FixMonth form-control text-right" name=""
                                                                value="" required autocomplete="off" readonly></td>
                                                        <td><input value="{{ number_format($val->BPTotal, 2) }}"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtBP_Total_{{ $i }}" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off" readonly></td>
                                                        {{-- @for ($n = 1; $n <= 12; $n++) --}}
                                                        <td><input value="{{ number_format($val->JAN, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_2');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_1" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->FEB, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_3');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_2" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->MAR, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_4');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_3" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->APR, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_5');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_4" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->MAY, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_6');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_5" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->JUN, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_7');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_6" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->JUL, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_8');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_7" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->AUG, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_9');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_8" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->SEP, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_10');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_9" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->OCT, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_11');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_10" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->NOV, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_12');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_11" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        <td><input value="{{ number_format($val->DECA, 2) }}"
                                                                OnKeyPress="return chkNumber(this)"
                                                                onkeydown="return nextbox(event, value, 'txtMonth_{{ $i }}_rows_12');"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtMonth_{{ $i }}_rows_12" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"></td>
                                                        {{-- @endfor --}}
                                                        <td><button style="background: #fff3b0;"
                                                                onclick="CalSumTotalMonth('{{ $i }}')"
                                                                class="btn btn-warning btn-sm mr-1"
                                                                id="btncal_month{{ $i }}"
                                                                title="Calculate Amount"><i
                                                                    class="fas fa-calculator"></i></button></td>
                                                        <input name="YearData" id="txtYearData" type="hidden"
                                                            class="YearData form-control text-right" name=""
                                                            value="{{ date('Y') }}" required autocomplete="off">
                                                        <td><input id="txtTotalM_{{ $i }}" type="text"
                                                                class="form-control text-right" name=""
                                                                value="{{ number_format($val->TotalMonth, 2) }}" required
                                                                autocomplete="off" readonly></td>
                                                        @if (!empty($capYear))
                                                            {{-- @for ($j = 1; $j <= 3; $j++)   --}}
                                                            <td><input OnKeyPress="return chkNumber(this)"
                                                                    onkeydown="return nextbox(event, value, 'txtYear_{{ $i }}_rows_2');"
                                                                    onkeypress="return check(event,value)"
                                                                    onkeyup="javascript:this.value=Comma(this.value);"
                                                                    name="YearAmount[]"
                                                                    id="txtYear_{{ $i }}_rows_1"
                                                                    type="text"
                                                                    class="YearData form-control text-right"
                                                                    name=""
                                                                    value="{{ number_format($val->Y2, 2) }}" required
                                                                    autocomplete="off"></td>
                                                            <td><input OnKeyPress="return chkNumber(this)"
                                                                    onkeydown="return nextbox(event, value, 'txtYear_{{ $i }}_rows_3');"
                                                                    onkeypress="return check(event,value)"
                                                                    onkeyup="javascript:this.value=Comma(this.value);"
                                                                    name="YearAmount[]"
                                                                    id="txtYear_{{ $i }}_rows_2"
                                                                    type="text"
                                                                    class="YearData form-control text-right"
                                                                    name=""
                                                                    value="{{ number_format($val->Y3, 2) }}" required
                                                                    autocomplete="off"></td>
                                                            <td><input OnKeyPress="return chkNumber(this)"
                                                                    onkeydown="return nextbox(event, value, 'txtYear_{{ $i }}_rows_3');"
                                                                    onkeypress="return check(event,value)"
                                                                    onkeyup="javascript:this.value=Comma(this.value);"
                                                                    name="YearAmount[]"
                                                                    id="txtYear_{{ $i }}_rows_3"
                                                                    type="text"
                                                                    class="YearData form-control text-right"
                                                                    name=""
                                                                    value="{{ number_format($val->Y4, 2) }}" required
                                                                    autocomplete="off"></td>
                                                            {{-- @endfor --}}
                                                        @else
                                                            @for ($j = 1; $j <= 3; $j++)
                                                                <td><input value="0"
                                                                        OnKeyPress="return chkNumber(this)"
                                                                        onkeydown="return nextbox(event, value, 'txtYear_{{ $i }}_rows_{{ $j + 1 }}');"
                                                                        onkeypress="return check(event,value)"
                                                                        onkeyup="javascript:this.value=Comma(this.value);"
                                                                        name="YearAmount[]"
                                                                        id="txtYear_{{ $i }}_rows_{{ $j }}"
                                                                        type="text"
                                                                        class="YearData form-control text-right"
                                                                        name="" value="" required
                                                                        autocomplete="off"></td>
                                                            @endfor
                                                        @endif
                                                        <td><button style="background: #fff3b0;"
                                                                onclick="CalResulteAll('{{ $i }}')"
                                                                class="btn btn-warning btn-sm mr-1"
                                                                id="btncal_Fixmonth{{ $i }}"
                                                                title="Calculate Amount"><i
                                                                    class="fas fa-calculator"></i></button></td>
                                                        <td><input value="{{ number_format($val->BP_DEDUCT, 2) }}"
                                                                onkeypress="return check(event,value)"
                                                                onkeyup="javascript:this.value=Comma(this.value);"
                                                                id="txtBP_DEDUCT_{{ $i }}" type="text"
                                                                class="form-control text-right" name=""
                                                                value="" required autocomplete="off"
                                                                readonly="true"></td>
                                                        <td><button rowsid="{{ $i }}"
                                                                style="background: #219ebc;"
                                                                class="text-center btn btn-success button1"
                                                                onclick="editTransfer('{{ $val->CAPEX_NO }}','{{ $i }}')">
                                                                <i class="far fa-save"></i> บันทึก
                                                            </button>
                                                            <button
                                                                onclick="delete_capex('{{ $val->CAPEX_NO }}','{{ $i }}')"
                                                                style="background: #640d14;"
                                                                class="text-center btn btn-success button1">
                                                                <i class="fas fa-trash-alt"></i> ลบ
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                @endforeach

                                                {{-- @php $i++; @endphp --}}
                                            @endforeach
                                        @else
                                            <h3 class="card-title"></h3>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
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

    </section>
    <!-- /.content -->
    <!-- /.modal -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
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
                                <th style="width: 1px;">Code</th>
                                <th style="width: 257px;">Department Name</th>
                                <th style="width: 257px;">HR Department</th>
                                <th style="width: 1%;">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script type="text/javascript">
        //คีย์เฉพาะตัวเลขเท่านั้น
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar < '0' || vchar > '9') && (vchar != '.'))
                return false;
            ele.onKeyPress = vchar;

        }
        //ฟังก์ชันเช็คคีย์ตัวเลข จำนวนเต็มเท่านั้น และ กด Enter
        function nextbox(e, value, id) {
            // อ่าน keycode (cross browser)
            var keycode = e.which || e.keyCode;
            // ตรวจสอบ keycode (13 คือ กด enter)
            if (keycode == 13) {
                // ย้ายโฟกัสไปยัง input ที่ id
                document.getElementById(id).focus();
                // return false เพื่อยกเลิกการ submit form
                return false;
            }
            var unicode = e.charCode ? e.charCode : e.keyCode;
            if (value.indexOf(".") != -1) {
                if (unicode == 46) {
                    Swal.fire(
                        'The Number',
                        'รับค่าเฉพาะตัวเลขและจำนวนเต็มบวกเท่านั้น',
                        'question'
                    );
                    return false;
                } else {
                    return true;
                }
            }
            // if (unicode != 8){
            //   if ((unicode < 48 || unicode > 57) && unicode != 46){
            //     Swal.fire(
            //       'The Number',
            //       'รับค่าเฉพาะตัวเลขและจำนวนเต็มบวกเท่านั้น',
            //       'question'
            //     );
            //     return false;
            //   }else{           
            //     return true;
            //   }
            // }
        }

        function delete_capex(param, val) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("delete_capex", {
                        param
                    },
                    function(result) {
                        console.log(result);
                        Swal.fire({
                            icon: 'success',
                            title: 'Your file has been delete.',
                            text: `Capex is delete successfully`
                        }).then((result) => {
                            window.location.reload(true);
                        });
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })



        }

        function opentable_department(val, Counter) {
            // alert('params=>'+val);
            $('#modal-lg').modal('show');
            $.post("getData_Cap_Deptroute", {
                    val
                },
                function(result) {
                    // console.log('result=>'+result);
                    var data = JSON.parse(result);
                    // console.log('data=>'+data);
                    var rowCount = 1;
                    if (data != undefined) {
                        $('#tblDepartment').dataTable().fnClearTable();
                        for (var obj in data) {
                            var button = '<button rows="' + rowCount + '" onclick="selectdepartment(\'' + data[obj]
                                .Department_HR + '\',\'' + Counter +
                                '\')" style="background: #9a031e;" class="btn btn-danger btn-sm mr-1" id="" title="Calculate Amount"><i class="fas fa-hand-point-left"></i></button>';
                            var newRow = $('#tblDepartment').dataTable().fnAddData([
                                data[obj].Code,
                                data[obj].Department_AC,
                                data[obj].Department_HR,
                                button
                            ]);
                            rowCount++;
                        }
                    }
                });
        }

        function selectdepartment(params, Counter) {
            // alert('params =>'+params);
            // alert('rowCount =>'+Counter);
            $('#txthr_department_' + Counter).val(params);
            $('#modal-lg').modal('hide');
        }

        function CalSumTotalMonth(counter) {
            var Month_Amount = [];
            var sum = 0;
            for (var m = 1; m <= 12; m++) {
                Month1 = $('#txtMonth_' + counter + '_rows_' + m).val().split(",").join("");
                sum = sum + parseFloat(Month1);
                // console.log(sum);
            }
            Month_Amount = sum
            // console.log(Month_Amount);
            var BP_Total = $('#txtBP_Total_' + counter).val().split(",").join("")
            if (Month_Amount > BP_Total) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total {{ date('Y') + 1 }} เกิน BP Total available for transfer !',
                });
            } else {
                $('#txtTotalM_' + counter).val(Comma(Month_Amount.toFixed(2)));
            }
        }

        function CalResulteAll(counter) {
            var Year_Amount = [];
            var sum = 0;
            for (var m = 1; m <= 3; m++) {
                Year_Amount = $('#txtYear_' + counter + '_rows_' + m).val().split(",").join("");
                sum = sum + parseFloat(Year_Amount);
            }
            Year_Amount = sum
            var BP_Total = $('#txtBP_Total_' + counter).val().split(",").join("");
            var TotalM = $('#txtTotalM_' + counter).val().split(",").join("");
            if (Year_Amount > BP_Total) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total เกิน BP Total available for transfer !',
                });
                $('#txtBP_DEDUCT_' + counter).val("0");
            } else {
                var subb = BP_Total - TotalM - Year_Amount;
                $('#txtBP_DEDUCT_' + counter).val(Comma(subb.toFixed(2)));
            }
        }

        function CalSumTotal(counter) {
            // alert('counter=>'+counter);
            var Jul = $('#txtFix_Jul_' + counter).val().split(",").join("");
            var Aug = $('#txtFix_Aug_' + counter).val().split(",").join("");
            var Sep = $('#txtFix_Sep_' + counter).val().split(",").join("");
            var Oct = $('#txtFix_Oct_' + counter).val().split(",").join("");
            var Nov = $('#txtFix_Nov_' + counter).val().split(",").join("");
            var Dec = $('#txtFix_Dec_' + counter).val().split(",").join("");
            var SumTotal = parseFloat(Jul) + parseFloat(Aug) + parseFloat(Sep) + parseFloat(Oct) + parseFloat(Nov) +
                parseFloat(Dec);
            // alert(SumTotal);
            var txtTotal_BP = $('#txtTotal_BP' + counter).val().split(",").join("");
            var Total_month = $('#txtTotal_' + counter).val(Comma(SumTotal.toFixed(2)));
            if (SumTotal > txtTotal_BP) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total {{ date('Y') }} เกิน Total !',
                });
                $('#txtBP_Total_' + counter).val("0");
                $('#txtTotal_' + counter).val("0");
            } else {
                var delTotal = txtTotal_BP - SumTotal;
                var ckBP_Total = $('#txtBP_Total_' + counter).val(Comma(delTotal.toFixed(2)));
            }
        }

        function editTransfer(params, row) {
            // alert('paramiter=>'+params);
            //===========================Trans Fer=================================
            // CalSumTotal(row);
            var Month_Amount = [];
            var sum = 0;
            for (var m = 1; m <= 12; m++) {
                Month1 = $('#txtMonth_' + row + '_rows_' + m).val().split(",").join("");
                sum = sum + parseFloat(Month1);
                // console.log(sum);
            }
            Month_Amount = sum
            // console.log(Month_Amount);
            var BP_Total = $('#txtBP_Total_' + row).val().split(",").join("")
            if (Month_Amount > BP_Total) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total {{ date('Y') + 1 }} เกิน BP Total available for transfer !',
                });
            } else {
                $('#txtTotalM_' + row).val(Comma(Month_Amount.toFixed(2)));
            }
            // CalResulteAll(row);
            var Year_Amount = [];
            var sum = 0;
            for (var m = 1; m <= 3; m++) {
                Year_Amount = $('#txtYear_' + row + '_rows_' + m).val().split(",").join("");
                sum = sum + parseFloat(Year_Amount);
            }
            Year_Amount = sum
            var BP_Total = $('#txtBP_Total_' + row).val().split(",").join("");
            var TotalM = $('#txtTotalM_' + row).val().split(",").join("");
            if (Year_Amount > BP_Total) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total เกิน BP Total available for transfer !',
                });
                $('#txtBP_DEDUCT_' + row).val("0");
            } else {
                var subb = BP_Total - TotalM - Year_Amount;
                $('#txtBP_DEDUCT_' + row).val(Comma(subb.toFixed(2)));
            }
            // CalSumTotalMonth(row);
            var Jul = $('#txtFix_Jul_' + row).val().split(",").join("");
            var Aug = $('#txtFix_Aug_' + row).val().split(",").join("");
            var Sep = $('#txtFix_Sep_' + row).val().split(",").join("");
            var Oct = $('#txtFix_Oct_' + row).val().split(",").join("");
            var Nov = $('#txtFix_Nov_' + row).val().split(",").join("");
            var Dec = $('#txtFix_Dec_' + row).val().split(",").join("");
            var SumTotal = parseFloat(Jul) + parseFloat(Aug) + parseFloat(Sep) + parseFloat(Oct) + parseFloat(Nov) +
                parseFloat(Dec);
            // alert(SumTotal);
            var txtTotal_BP = $('#txtTotal_BP' + row).val().split(",").join("");
            var Total_month = $('#txtTotal_' + row).val(Comma(SumTotal.toFixed(2)));
            if (SumTotal > txtTotal_BP) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total {{ date('Y') }} เกิน Total !',
                });
                $('#txtBP_Total_' + row).val("0");
                $('#txtTotal_' + row).val("0");
            } else {
                var delTotal = txtTotal_BP - SumTotal;
                var ckBP_Total = $('#txtBP_Total_' + row).val(Comma(delTotal.toFixed(2)));
            }
            if ($('#txtBP_DEDUCT_' + row).val() > $('#txtBP_Total_' + row)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'จำนวน Total {{ date('Y') }} เกิน Total !',
                });
                return false;
            }
            var data = {
                Jul: $('#txtFix_Jul_' + row).val().split(",").join(""),
                Aug: $('#txtFix_Aug_' + row).val().split(",").join(""),
                Sep: $('#txtFix_Sep_' + row).val().split(",").join(""),
                Oct: $('#txtFix_Oct_' + row).val().split(",").join(""),
                Nov: $('#txtFix_Nov_' + row).val().split(",").join(""),
                Dec: $('#txtFix_Dec_' + row).val().split(",").join(""),
                Total: $('#txtTotal_' + row).val().split(",").join(""),
                BP_DEDUCT: $('#txtBP_DEDUCT_' + row).val().split(",").join(""),
                // hr_department : $('#txthr_department_'+row).val(),
                TotalMonth: $('#txtTotalM_' + row).val().split(",").join(""),
                BPTotal: $('#txtBP_Total_' + row).val().split(",").join(""),
                Status: 1
            };
            var json_data = JSON.stringify(data);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to save this!",
                icon: 'question',
                cancelButtonText: 'No, cancel!',
                confirmButtonText: 'Yes, Save it!',
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("edit_capex_trans", {
                            json_data,
                            params
                        },
                        function(result) {
                            console.log('result=>' + result);
                            Swal.fire({
                                icon: 'success',
                                title: 'Your file has been save.',
                                text: `Capex is save successfully`
                            }).then((result) => {
                                window.location.reload(true);
                            });

                        });
                    //============================YEAR================================
                    var Year_Amount = [];
                    var q = 0;
                    for (var i = 1; i <= 3; i++) {
                        Year_Amount = $('#txtYear_' + row + '_rows_' + i).val().split(",").join("");
                        $.post("up_Cap_Transfer_Year", {
                                YearAmount: Year_Amount,
                                YearData: parseInt($('#txtYearData').val()) + q,
                                params
                            },
                            function(result) {
                                console.log(result);
                                // alert('บันทึกข้อมูลสำเร็จ');
                            });
                        q++;
                    }
                    //===========================Month=================================
                    var Month_Amount = [];
                    for (var k = 1; k <= 12; k++) {
                        Month_Amount = $('#txtMonth_' + row + '_rows_' + k).val().split(",").join("");
                        $.post("up_Cap_Transfer_Detail", {
                                MonthAmount: Month_Amount,
                                MonthData: k,
                                params
                            },
                            function(result) {
                                console.log(result);
                                // alert('บันทึกข้อมูลสำเร็จ');
                            });
                    }

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })

        }
        $(document).ready(function() {
            $("#example1").DataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                        20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37,
                        38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55
                    ]
                }],
                "scrollX": true,
                // "buttons": ["excel"],
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                                20, 21, 22, 23, 24, 25, 26, 35, 36, 37,
                                38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 49, 50, 51, 52, 54
                            ],
                            format: {
                                body: function(data, column, row, node) {
                                    if (row == 0 || row == 1 || row == 2 || row == 3 || row == 4 ||
                                        row == 5 || row == 6 || row == 7 || row == 8 || row == 9 ||
                                        row == 10 || row == 11 || row == 12 || row == 13 || row ==
                                        14 || row == 15 ||
                                        row == 16 || row == 17 || row == 18 || row == 19 || row ==
                                        20 || row == 21 || row == 22 || row == 23 || row == 24 ||
                                        row == 25
                                    ) {
                                        return data
                                    } else if (row == 26 || row == 27 || row == 28 || row == 29 ||
                                        row == 30 || row == 31 || row == 32 || row == 33 || row ==
                                        34 || row == 35 || row == 36 || row == 37 || row == 38 ||
                                        row == 39 || row == 40 || row == 41 || row == 42 || row ==
                                        43) {
                                        return $(data).is("input") ? $(data).val() : data
                                        // return data
                                    }

                                    // else {
                                    //     return $(data).is("input") ? $(data).val() : data
                                    // }
                                }
                            }
                        }
                    },
                    'colvis'
                ],
                "aaSorting": [
                    [0, 'asc']
                ],
                fixedColumns: {
                    left: 6
                },
                "iDisplayLength": parseInt(<?php echo 7; ?>)
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example").DataTable({
                "scrollX": true,
                "iDisplayLength": parseInt(<?php echo 7; ?>)
            })
            $('#tblDepartment').DataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1, 2, 3]
                }]
            });
            $('#btnoldlist').click(function() {
                window.location.href = "capex_tranfer_list"
            });
            $('#btnnewlist').click(function() {
                window.location.href = "capex_tranfer_bp"
            });
        });
    </script>
@endsection
