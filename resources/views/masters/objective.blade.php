@extends('layouts.main_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Objective (วัตถุประสงค์การใช้)</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Objective</li>
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
              <h3 class="card-title">Objective (วัตถุประสงค์การใช้)</h3>
              <div class="row">
                <div class="col-12">
                  <button id="btndelete" type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Delete
                  </button>
                  <button id="btnedit" type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                    <i class="fas fa-pencil-alt"></i> Edit 
                  </button>
                  <button id="btnadd" type="button" class="btn btn-success float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#mdladd_objective">
                    <i class="fas fa-plus"></i> Add 
                  </button>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <?php 
              //echo'<pre>';
              //print_r($obj);
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
            ?>
            <div class="card-body">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <table width="100%" id="tblobjective" class="table table-bordered">
                <thead>
                
                <tr style="background: #ffd670;">
                  <th width="1%"></th>
                  <th width="6%">รหัส</th>
                  <th>ชื่ออังกฤษ</th>
                  <th>ชื่อไทย</th>
                  <th width="10%">วันที่สร้าง</th>
                  <th width="10%">ผู้สร้าง</th>
                  <th width="10%">วันที่แก้ไข</th>
                  <th width="10%">ผู้แก้ไข</th>
                  <th width="10%">สถานะ</th>                
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($obj as $key => $value) {
                      //print_r($value->Name);
                      if($value->status == 1){
                        $status = 'ใช้งาน';
                      }else if($value->status == 2){
                        $status = 'ไม่ใช้งาน';
                      }
                  ?>
                  <tr>
                    <td width="1%"><div class="icheck-primary d-inline">
                      <input type="radio" id="rdoobjective_<?php echo $i;?>" name="objective" value="<?php echo $value->Object_ID?>">
                      <label for="rdoobjective_<?php echo $i;?>">
                      </label>
                    </div></td>
                    <td><?php echo $value->Object_ID;?></td>
                    <td><?php echo $value->Object_EN;?></td>
                    <td><?php echo $value->Object_TH;?></td>
                    <td><?php echo convert_date_SQL($value->create_date);?></td>
                    <td><?php echo $value->create_by;?></td>
                    <td><?php echo convert_date_SQL($value->update_date);?></td>
                    <td><?php echo $value->update_by;?></td>
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
<div class="modal fade" id="mdladd_objective">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Objective</h4>
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
              <input id="txtobjective" type="text" class="form-control"  autocomplete="off">
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>ชื่อไทย</label>
              <input id="txtName_TH" type="text" class="form-control"  autocomplete="off">
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
              <label>ชื่ออังกฤษ</label>
              <input id="txtName_EN" type="text" class="form-control"  autocomplete="off">
            </div>
            <!--/.col (left) -->
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
<div class="modal fade" id="mdledit_objective">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Objective</h4>
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
              <input id="txtEditobjective" type="text" class="form-control"  autocomplete="off" readonly>
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>ชื่อไทย</label>
              <input id="txtEditName_TH" type="text" class="form-control"  autocomplete="off">
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
              <label>ชื่ออังกฤษ</label>
              <input id="txtEditName_EN" type="text" class="form-control"  autocomplete="off">
            </div>
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
                <option value="1">ใช้งาน</option>
                <option value="2">ไม่ใช้งาน</option>
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
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('#btnsaveadd').click(function(){
      // alert('ทดสอบ');      
      $.ajax({
        url: "/save_objective",
        type:"POST",
        data:{
          objective : $('#txtobjective').val(),
          Name_TH : $('#txtName_TH').val(),
          Name_EN : $('#txtName_EN').val()
        },
        success:function(response){
          console.log(response);
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'บันทึกข้อมูลสำเร็จ!',
            showConfirmButton: true
            
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'objective';
            }
          })
        },
        error: function(error) {
         console.log(error);
        }
      });
    });
    $("#tblobjective").DataTable({
      "bJQueryUI": false,
      "bAutoWidth": false,
      "sPaginationType": "full_numbers",
      "sDom": '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
      "aaSorting": [[1,'asc']],
      "aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5,6,7,8] }],
      "iDisplayLength": parseInt(<?php echo 25; ?>)
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#btnedit').click(function(){
      if($('input[name=objective]:checked').val() != undefined ){
        $('#mdledit_objective').modal('show');
        $.ajax({
          url: "/get_objective",
          type:"POST",
          data:{
            objective : $('input[name=objective]:checked').val()
          },
          success:function(response){
            console.log(response);
            $('#txtEditobjective').val(response[0].Object_ID);
            $('#txtEditName_TH').val(response[0].Object_TH);
            $('#txtEditName_EN').val(response[0].Object_EN);
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
        url: "/edit_objective",
        type:"POST",
        data:{
          objective  : $('#txtEditobjective').val(),
          Name_TH  : $('#txtEditName_TH').val(),
          Name_EN  : $('#txtEditName_EN').val(),
          status  : $('#selstatus').val()
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
              window.location.href = 'objective';
            }
          })
        },
        error: function(error) {
         console.log(error);
        }
      });
    });
    $('#btndelete').click(function(){
      if($('input[name=objective]:checked').val() != undefined ){
        $.ajax({
          url: "/del_objective",
          type:"POST",
          data:{
            objective : $('input[name=objective]:checked').val()
          },
          success:function(response){
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'ลบข้อมูลสำเร็จ!',
              showConfirmButton: true
              
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'objective';
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