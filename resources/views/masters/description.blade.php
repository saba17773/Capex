@extends('layouts.main_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Description</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Description</li>
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
              <h3 class="card-title">Description</h3>
              <div class="row">
                <div class="col-12">
                  <button id="btndelete" type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Delete
                  </button>
                  <button id="btnedit" type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                    <i class="fas fa-pencil-alt"></i> Edit 
                  </button>
                  <button id="btnadd" type="button" class="btn btn-success float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#mdladd_descrip">
                    <i class="fas fa-plus"></i> Add 
                  </button>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <?php 
              //echo'<pre>';
              //print_r($des);
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
              <table width="100%" id="tbl_description" class="table table-bordered">
                <thead>
                
                <tr style="background: #ffd670;">
                  <th width="1%"></th>
                  <th width="5%">ลำดับ</th>
                  <th width="9%">รหัส</th>
                  <th>รายละเอียด</th>
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
                    foreach ($des as $key => $value) {
                      //print_r($value->Name);
                      if($value->status == 1){
                        $status = 'ใช้งาน';
                      }else if($value->status == 2){
                        $status = 'ไม่ใช้งาน';
                      }
                  ?>
                  <tr>
                    <td width="1%"><div class="icheck-primary d-inline">
                      <input type="radio" id="rdodescrip_<?php echo $i;?>" name="descrip" value="<?php echo $value->DepreciationRundateCode;?>">
                      <label for="rdodescrip_<?php echo $i;?>">
                      </label>
                    </div></td>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value->DepreciationRundateCode;?></td>
                    <td><?php echo $value->Description;?></td>
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
<div class="modal fade" id="mdladd_descrip">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Description</h4>
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
              <input id="txtDescrip_id" type="text" class="form-control"  autocomplete="off">
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>รายละเอียด</label> 
              <textarea id="txtDescripName" class="form-control" rows="3"  autocomplete="off" placeholder="Enter ..."></textarea>
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
<div class="modal fade" id="mdledit_descrip">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Description</h4>
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
              <input id="txtEditCompany" type="text" class="form-control"  autocomplete="off" readonly>
            </div>
            <div class="col-md-8">
              <!-- general form elements -->
              <label>รายละเอียด</label>
              <textarea id="txtEditDescripName" class="form-control" rows="3"  autocomplete="off" placeholder="Enter ..."></textarea>
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
    $('#tbl_description').dataTable( {
      "scrollX": true,
      "aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5,6,7,8] }],
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
        url: "/save_company",
        type:"POST",
        data:{
          Company : $('#txtCompany').val(),
          Name : $('#txtName').val()
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
              window.location.href = 'company';
            }
          })
        },
        error: function(error) {
         console.log(error);
        }
      });
    });
    $('#btnedit').click(function(){
      if($('input[name=descrip]:checked').val() != undefined ){
        $('#mdledit_descrip').modal('show');
        $.ajax({
          url: "/get_descrip",
          type:"POST",
          data:{
            descrip : $('input[name=descrip]:checked').val()
          },
          success:function(response){
            // console.log(response[0].Company);
            // $('#txtEditCompany').val(response[0].Company);
            // $('#txtEditName').val(response[0].Name);
            // $('#selstatus').val(response[0].status);
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
        url: "/edit_company",
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
              window.location.href = 'company';
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
          url: "/del_company",
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
                window.location.href = 'company';
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