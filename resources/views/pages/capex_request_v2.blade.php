@extends('layouts.main_template')
@section('content')
@csrf

@php
   $col_year=4;
   $col_progress=12;
   $year_cur = date('Y');
@endphp

<style>
.form-control {
    width: auto;
}
.content-wrapper {
    background-color:white;
}
.card {
    box-shadow:none

}
</style>
<form id="form_capex">
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>New Bp</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">New Bp</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
           
            <div class="row text-left">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <div class="col-12">
                <button id="btn_save" class="btn btn-info float-center mb-2" style="margin-center: 5px; background: #0081a7;">
                  <i class="fas fa-file-download mr-1"></i>Save
                </button>
              </div>

              <table  id="tblrequest" class="table table-bordered" >
                <thead>
                  <tr>
                      <th colspan="13" style="background: #adc178;"></th>
                      <th class="text-center" colspan={{$col_year}} style="background: #e09f3e;">Year</th>
                      <th class="text-center" colspan={{$col_progress}} style="background: #cdb4db;">Amount</th>
                      <th class="text-center" colspan={{$col_progress}} style="background: #a2d2ff;">% Progress</th>
                  </tr>
                  <tr>
                      <th style="background: #dde5b6;">Company</th>
                      <th style="background: #dde5b6;">Route Dept.</th>
                      <th style="background: #dde5b6;">HR Dept.</th>
                      <th style="background: #dde5b6;">Dep.No</th>
                      <th style="background: #dde5b6;">Dep. Name</th>
                      <th style="background: #dde5b6;">Asset group</th>
                      <th style="background: #dde5b6;">Project</th>
                      <th style="background: #dde5b6;">Owner by</th>
                      <th style="background: #dde5b6;">Approved 1</th>     
                      <th style="background: #dde5b6;">Approved 2</th>  
                      <th style="background: #dde5b6;">Transactions</th> 
                      <th style="background: #dde5b6;">Objective</th> 
                      <th style="background: #dde5b6;">Budget(Amount)</th>

                      @for ($i = 1; $i <= $col_year; $i++)
                        <th style="background: #ffe6a7; ">{{$year_cur+$i}}</th>
                      @endfor

                      @for ($i = 1; $i <= $col_progress; $i++)
                        <th style="background: #ffe6a7;">{{$i}}</th>
                      @endfor

                      @for ($i = 1; $i <= $col_progress; $i++)
                        <th style="background: #ffe6a7;">{{$i}}</th>
                      @endfor
                    <th colspan="2"  class="text-center" style="background: #2eb9fc;">Action</th>
                  </tr>       
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input type="hidden" name="txt_codebp" id="txt_codebp" value="">
                      <select id="sel_com" name = "sel_com"  class="form-control select2 select2-danger" >
                        @foreach ($company as $corp) 
                          <option value="{{ $corp->Company }}">{{ $corp->Company }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      
                      <input type="text" name="txt_dproute" id="txt_dproute" class="form-control">
                    </td>
                    <td>
                      <input id="txt_dephr" name="txt_dephr"  type="text" class="form-control" name="" value=""  autocomplete="off" readonly>
                    </td>
                    <td>
                      <input id="txt_depno" name="txt_depno"  type="text" class="form-control" name="" value=""  autocomplete="off" readonly>
                    </td>
                    <td>
                      <input id="txt_depname" name="txt_depnam" type="text" class="form-control" name="" value=""  autocomplete="off" readonly>
                    </td>
                    <td>
                      <select id="sql_assetgroup" name="sql_assetgroup" class="form-control select2" onchange="select_fixasset();">
                        <option value=""></option>
                        @foreach ($Fix as $fixas) 
                          <option value="{{$fixas->FixassetId }}">{{$fixas->Description}}</option>
                        @endforeach
                      </select>
                        
                    </td>
                    <td>
                      <select id="sel_project" name="sel_project"  class="form-control select2">
                        @foreach ($project as $pro)
                            <option value={{$pro->ProjectName}}>{{$pro->ProjectName}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input id="txt_owner" name= "txt_owner" type="text" class="form-control"  value=""  autocomplete="off" readonly>
                    </td>
                    <td>
                      <input id="txt_app1" name="txt_app1" type="text" class="form-control" value=""  autocomplete="off" readonly>
                    </td>     
                    <td>
                      <input id="txt_app2" name="txt_app2" type="text" class="form-control" value=""  autocomplete="off" readonly>
                    </td>  
                    <td>
                      <input id="txt_trans" name="txt_trans" type="text" class="form-control" value="" required autocomplete="off">
                    </td> 
                    <td>
                      <select id="sel_obj" name="sel_obj" class="form-control select2" >
                        @foreach ($obj as $ob) 
                          <option value="{{ $ob->Object_ID }}">{{ $ob->Object_TH ." (" . $ob->Object_EN . ")"}} </option>
                        @endforeach
                      </select>
                    </td> 
                    <td>
                      <input id="txt_totalamount" name= "txt_totalamount" type="number" class="form-control"  value="" required autocomplete="off">
                    </td>
                    @for ($i = 1; $i <= $col_year; $i++)
                      <td>
                        <input id="txtyear_{{ $i }}" name="txtyear_{{ $i }}" type="text" class="form-control"  value=""  autocomplete="off">
                      </td>
                    @endfor
                    
                    @for ($i = 1; $i <= $col_progress; $i++)
                      <td>
                        <input id="txtamount_{{ $i }}" name="txtamount_{{ $i }}" type="number" class="form-control" value=""  autocomplete="off" readonly>
                      </td>
                    @endfor
                      @for ($i = 1; $i <= $col_progress; $i++)
                        <td>
                          <select id="selpro_{{$i}}" name="selpro_{{$i}}" class="form-control select2" disabled >
                            <option value=""></option>
                            @foreach ($rate as $row) 
                            <option value="{{ $row->StatRateCode }}">{{ $row->Description}}</option>
                            @endforeach
                          </select>
                        </td>
                      @endfor
                    <td>
                        <button class="btn btn-primary btn-sm mr-1" id="btn_cal" title="Calculate Amount" disabled><i class="fas fa-calculator"></i></button>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm mr-1" id="btn_reset" title="Reset progress"><i class="fas fa-minus"></i></button>
                    </td>
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
      <div class = "row">
        <table width="100%" id="tb_transaction" class="table table-bordered">
        </table>
      </div>
  
    </div>
    <!-- /.container-fluid -->
  </section>
</div>
</form>
</div>

<script>


  let txt_asset = 0;
  $(document).ready(function () {
    $("#tblrequest").DataTable({
      //"aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53] }],
      "scrollX": true,
      "iDisplayLength": parseInt(<?php echo 7; ?>)
    })
    // assign_value();   
    $('#btn_cal').click(function (e) { 
        e.preventDefault();
        var amount = document.getElementById("txtyear_1").value;
        if(amount<=0)
        {
            Swal.fire({
                      icon: 'error',
                      title: 'Amount is not correct!!',
                      text: 'Calculate failed'
            });
        }
        else if(check_input_progress()== true)
        {
            Swal.fire({
                      icon: 'error',
                      title: 'Input progress is not correct!!',
                      text: 'Calculate failed'
            });
        }  
        else
        {
            cal_amount();
        }

    });

    $('#btn_reset').click(function (e) { 
      e.preventDefault();
      btn_reset();
      
    });

    $('#btn_save').click(function (e) { 
        e.preventDefault();

        btn_save();
    });

  });



  function select_fixasset()
  {
      val_asset = document.getElementById("sql_assetgroup").value;
      //get isprogress
      $.ajax({
        type: "GET",
        url: "/fixasset/isprogress/" + val_asset,
        dataType: "JSON",
        success: function (response) {
            isprogress = response[0].Isprogress;
            console.log(isprogress);
            reset_value_by_asset(isprogress);
        }
      });
        
  }

  function reset_value_by_asset(isprogress)
  {
      document.getElementById("btn_cal").disabled = isprogress ==1 ? false : true;
      for (let index = 1; index <= {{$col_progress}}; index++) 
      {
            let amount =  'txtamount_' + index;
            let value_a = isprogress ==1 ? "" : document.getElementById(amount).value;
            document.getElementById(amount).value=(value_a);
            document.getElementById(amount).readOnly = isprogress ==1 ? true : false;

            let progress =  'selpro_' + index;
            let value_p = isprogress ==1 ? document.getElementById(progress).value : "";
            document.getElementById(progress).value=(value_p);
            document.getElementById(progress).disabled = isprogress==1 ? false : true;
      }
  }

  function show_transaction()
  {
    $('#tb_transaction').DataTable( {
        "searching": false,
        serverSide: false,
        processing: false,
        destroy: true,
        ajax: {
          url: "/request/transaction",
          type: "get"
        },
        columns: [
          {
            title: "No",
            visible: true,
            data: "Id",
            width : "3%"
          }
        ]
    });
    
    var table = $('#tb_transaction').DataTable();
  }


  function btn_save()
  {
    var form_capex = $("#form_capex").serialize();
    $.ajax({
            type: "POST",
            url: "/request/add",
            data: form_capex,
            dataType: "json",
            success: function (response) {
              if(response.result)
              {
                  $("#form_capex")[0].reset();
                  Swal.fire(response.massage);
              }
              else
              { 
                  
                  Swal.fire({
                      icon: 'error',
                      title: response.massage,
                      text: 'save failed'
                  });
              }
               
            },
            error: function(jqxhr,textStatus,errorThrown)
            {
                
                Swal.fire({
                      icon: 'error',
                      title: 'Save failed',
                      text: 'save failed'
                // console.log(jqxhr);
                // console.log(textStatus);
                // console.log(errorThrown);         
                });                     
            }
    });
  }


  function cal_amount()
  {
    var form_capex = $("#form_capex").serialize();
    $.ajax({
            type: "POST",
            url: "/request/calamount",
            data: form_capex,
            dataType: "json",
            success: function (response) {
                cal_result_amount(response);
                // alert('Calculate complete');
                Swal.fire('Calculate complete');
            },
            error: function(jqxhr,textStatus,errorThrown)
            {
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

  function cal_result_amount(response)
  {
      for (let index =1; index <= {{$col_progress}}; index++) 
      {
        // console.log(response[index]);
        let amount =  'txtamount_' + index;
        let value = response[index] == undefined ? "" : response[index];
        amount = amount == undefined ? "" : amount;
        document.getElementById(amount).value=(value);
      }
  }

  function btn_reset()
  {
      for (let index =1; index <= {{$col_progress}}; index++) 1
      {
        // console.log(response[index]);
        let amount =  'txtamount_' + index;
        document.getElementById(amount).value=("");
      }

      for (let index = 1; index <= {{$col_progress}}; index++) {
        let progress = 'selpro_' + index;
        document.getElementById(progress).value='';
      }
      
      Swal.fire('Reset progress');

  }


  function check_input_progress() 
  {
      let prpo = "STR-0001";
      let process = "STR-0002";
      let complete = "STR-0003"
      let check_error = false;
      let count_prpo = 0;
      let count_process = 0;
      let count_complete = 0;
      for (let index = 1; index <= {{$col_progress}}; index++) 
      {
          let progress =  'selpro_' + index;
          let sel_progress = document.getElementById(progress);
          value = sel_progress.value;
          if(value == prpo)
          {
            count_prpo++;
          }
          else if (value == process)
          {
            count_process ++;
          }
          else if (value==complete)
          {
            count_complete++;
          }
          if(count_prpo>1){check_error = true; break;}
          if(count_complete>1){check_error = true; break;}
        }
        if(count_prpo==0 && count_process==0 && count_complete==0){check_error = true; }
        if(count_prpo==0 && count_process>=1){check_error = true; }
        return check_error;
  }


  function separateComma(val) 
  {
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

  function select_routeDept()
  {

  }

  function assign_value() 
  {  
    //sel_com
    //sel_detail

    //sql_assetgroup
    //sel_project

    //sel_obj_th

    //sel_obj_en
  
    document.getElementById('sel_com').value='D1';
    document.getElementById('sel_project').value='Project1';
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

  function condition()
  {
    let a = 'STR-0001';
    let b = 'STR-0002';
    let c = 'STR-0003';
    document.getElementById('selpro_1').value=a;
    document.getElementById('selpro_2').value=b;
    document.getElementById('selpro_3').value=b;
    document.getElementById('selpro_4').value=b;
    document.getElementById('selpro_5').value=b;
    document.getElementById('selpro_6').value=b;
    document.getElementById('selpro_7').value=b;
    document.getElementById('selpro_8').value=b;
    document.getElementById('selpro_9').value=b;
    document.getElementById('selpro_10').value=b;
    document.getElementById('selpro_11').value=b;
    document.getElementById('selpro_12').value=b;
  }

</script>


@endsection