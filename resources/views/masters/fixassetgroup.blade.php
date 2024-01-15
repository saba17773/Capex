@extends('layouts.main_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Fixassetgroup</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Fixassetgroup</li>
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
              <h3 class="card-title">Fixassetgroup</h3>
              <div class="row">
                <div class="col-12">
                  <button id="btndelete" type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Delete
                  </button>
                  <button id="btnedit" type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                    <i class="fas fa-pencil-alt"></i> Edit 
                  </button>
                  <button id="btnadd" type="button" class="btn btn-success float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#mdladd_company">
                    <i class="fas fa-plus"></i> Add 
                  </button>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            @php
              //echo'<pre>';
              //print_r($Fix);
              function convert_date_SQL($data){                
                  $split = explode("-",$data);
                  $temp = sprintf('%s-%s-%s',$split[0]+543,$split[1],$split[2]);
                  $date = new DateTime($temp);
                  // $result = $date->format('d-m-Y H:i:s');
                  $result = $date->format('d/m/Y');
                  unset($temp);
                  unset($date);
                return $result;
              } 
            @endphp
            <div class="card-body">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <table width="100%" id="tbl_fix_group" class="table table-bordered">
                <thead>
                  <tr style="background: #ffd670;">
                    <th width="1%"></th>
                    <th width="3%">ลำดับ</th>
                    <th width="7%">รหัส</th>
                    <th>รายละเอียด</th>
                    <th width="10%">สถานะ</th>                
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($Fix as $key => $value) {
                      //print_r($value->Name);
                      if($value->Isprogress == 0){
                        $status = 'Non Progress';
                      }else if($value->Isprogress == 1){
                        $status = 'Progress';
                      }
                  ?>
                  <tr>
                    <td width="1%"><div class="icheck-primary d-inline">
                      <input type="radio" id="rdoasset_<?php echo $i;?>" name="asset" value="<?php echo $value->FixassetId;?>">
                      <label for="rdoasset_<?php echo $i;?>">
                      </label>
                    </div></td>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value->FixassetId;?></td>
                    <td><?php echo $value->Description;?></td>
                    <td><?php echo $status;?></td>
                  
                  </tr>
                  <?php $i++; } ?>
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
<!-- /.modal -->
<div class="modal fade" id="mdladd_company">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Fixassetgroup</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <label>รหัส</label>
              <input id="txtCode" type="text" class="form-control"  autocomplete="off">
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>รายละเอียด</label>
              <input id="txtName" type="text" class="form-control"  autocomplete="off">
            </div>
            <!--/.col (left) -->
          </div>
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <label>สถานะ</label>
              <select class="form-control" id="selstatus">
                <option value="1">Progress</option>
                <option value="0">Non Progress</option>
              </select>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button id="btnsaveadd" type="button" class="btn btn-primary"><i class="fas fa-download"></i> Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade" id="mdledit_company">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Fixassetgroup</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <label>รหัสบริษัท</label>
              <input id="txtEditCompany" type="text" class="form-control"  autocomplete="off" readonly>
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>ชื่อบริษัท</label>
              <input id="txtEditName" type="text" class="form-control"  autocomplete="off">
            </div>
            <!--/.col (left) -->
          </div>
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>สถานะ</label>
              <select id="selstatus" class="form-control select2" style="width: 100%;">
                <option value="0">Non Progress</option>
                <option value="1">Progress</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <button id="btnsaveedit" type="button" class="btn btn-primary"><i class="fas fa-download"></i> Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#tbl_fix_group').dataTable( {
      "scrollX": true,
      "aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4] }],
    });
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('#btnadd').click(function(){
      $('#txtCompany').val('');
      $('#txtName').val('');
    });
    $('#btnsaveadd').click(function(){
      // alert('ทดสอบ');      
      $.ajax({
        url: "/save_fixassetgroup",
        type:"POST",
        data:{
          Code : $('#txtCode').val(),
          Description : $('#txtName').val(),
          Status : $('#selstatus').val()
        },
        success:function(response){
          console.log(response);
          // Swal.fire({
          //   position: 'top-end',
          //   icon: 'success',
          //   title: 'บันทึกข้อมูลสำเร็จ!',
          //   showConfirmButton: true
            
          // }).then((result) => {
          //   if (result.isConfirmed) {
          //     window.location.href = 'company';
          //   }
          // })
        },
        error: function(error) {
         console.log(error);
        }
      });
    });
    $('#btnedit').click(function(){
      if($('input[name=company]:checked').val() != undefined ){
        $('#mdledit_company').modal('show');
        $.ajax({
          url: "/get_company",
          type:"POST",
          data:{
            Company : $('input[name=company]:checked').val()
          },
          success:function(response){
            console.log(response[0].Company);
            $('#txtEditCompany').val(response[0].Company);
            $('#txtEditName').val(response[0].Name);
            $('#selstatus').val(response[0].status);
          },
          error: function(error) {
           console.log(error);
          }
        });
      }else{
        alert('กรุณาเลือกข้อมูลที่ต้องการเเก้ไข');
        return false;
      }
    });
    $('#btnsaveedit').click(function(){
      $.ajax({
        url: "/edit_fixassetgroup",
        type:"POST",
        data:{
          Company : $('#txtEditCompany').val(),
          Name : $('#txtEditName').val(),
          Status : $('#selstatus').val()
        },
        success:function(response){
          console.log(response);
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'แก้ไขข้อมูลสำเร็จ!',
            showConfirmButton: true
            
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'fixassetgroup';
            }
          })
        },
        error: function(error) {
         console.log(error);
        }
      });
    });
    $('#btndelete').click(function(){
      if($('input[name=company]:checked').val() != undefined ){
        $.ajax({
          url: "/del_fixassetgroup",
          type:"POST",
          data:{
            Company : $('input[name=company]:checked').val()
          },
          success:function(response){
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'ลบข้อมูลสำเร็จ!',
              showConfirmButton: true
              
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'fixassetgroup';
              }
            })
          },
          error: function(error) {
            console.log(error);
          }
        });
      }else{
        alert('กรุณาเลือกข้อมูลที่ต้องการลบ');
        return false;
      }
    });
  });
</script>
@endsection