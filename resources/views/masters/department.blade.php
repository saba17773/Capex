@extends('layouts.main_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Department BP</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Department BP</li>
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
              <h3 class="card-title">Department BP</h3>
              <div class="row">
                <div class="col-12">
                  <button id="btndelete" type="button" class="btn btn-danger float-right"><i class="far fa-times-circle"></i> Delete
                  </button>
                  <button id="btnedit" type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                    <i class="fas fa-pencil-alt"></i> Edit 
                  </button>
                  <button id="btnadd" type="button" class="btn btn-success float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#modaladddepartmrnt">
                    <i class="fas fa-plus"></i> Add 
                  </button>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table width="100%" id="tbl_company" class="table table-bordered">
                <thead>
                @php
                // echo'<pre>';
                // print_r($dep);
                @endphp
                  <tr style="background: #ffd670;">
                    <th width="1%"></th>
                    <th width="1%">CodeCD</th>
                    <th width="9%">Company</th>
                    <th>Department_HR</th>
                    <th width="10%">Code</th>
                    <th>Department_AC</th>
                    <th width="10%">DeptGroup1</th>
                    <th width="10%">DeptGroup2</th>
                    <th width="10%">E-Map1</th>     
                    <th width="10%">E-Map2</th>      
                    <th width="10%">E-Map3</th>         
                    <th width="10%">E-Clevel</th>  
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dep as $vals)
                    <tr>
                      <td width="1%"><input value="{{ $vals->CodeCD }}" type="radio" name="rdoCodeCD"></td>
                      <td width="1%">{{ $vals->CodeCD }}</td>
                      <td width="9%">{{ $vals->Company }}</td>
                      <td>{{ $vals->Department_HR }}</td>
                      <td width="10%">{{ $vals->Code }}</td>
                      <td>{{ $vals->Department_AC }}</td>
                      <td width="10%">{{ $vals->DeptGroup1 }}</td>
                      <td width="10%">{{ $vals->DeptGroup2 }}</td>
                      <td width="10%">{{ $vals->E_Map1 }}</td>     
                      <td width="10%">{{ $vals->E_Map2 }}</td>      
                      <td width="10%">{{ $vals->E_Map3 }}</td>         
                      <td width="10%">{{ $vals->E_Clevel }}</td>  
                    </tr>
                  @endforeach
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
<div class="modal fade" id="modaladddepartmrnt" data-keyboard="false" data-backdrop="">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Department Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-4">
            <div class="form-group">
            <label>CodeCD</label>            
              <input id="txtCodeCD" class="form-control" type="text">
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
            <label>Company</label>            
              <input id="txtCompany"  class="form-control" type="text">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
            <label>Department_HR</label>            
              <input id="txtDepartment_HR" class="form-control" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label>Code</label>           
              <input id="txtCode" class="form-control" type="text">
            </div>
          </div>         
          <div class="col-md-4">
            <div class="form-group">
            <label>Department_AC</label>           
              <input id="txtDepartment_AC" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>DeptGroup1</label>           
              <input id="txtDeptGroup1" class="form-control" type="text">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label>DeptGroup2</label>           
              <input id="txtDeptGroup2" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Map1</label>           
              <input id="txtE-Map1" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Map2</label>           
              <input id="txtE-Map2" class="form-control" type="text">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Map3</label>           
              <input id="txtE-Map3" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Clevel</label>           
              <input id="txtE-Clevel" class="form-control" type="text">
            </div>
          </div>   
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="btnsave" onclick="sendDataSave()" type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.modal -->
<div class="modal fade" id="modaleditdepartmrnt" data-keyboard="false" data-backdrop="">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Department Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-4">
            <div class="form-group">
            <label>CodeCD</label>            
              <input id="txtEditCodeCD" class="form-control" type="text" readonly>
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group">
            <label>Company</label>            
              <input id="txtEditCompany"  class="form-control" type="text">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
            <label>Department_HR</label>            
              <input id="txtEditDepartment_HR" class="form-control" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label>Code</label>           
              <input id="txtEditCode" class="form-control" type="text">
            </div>
          </div>         
          <div class="col-md-4">
            <div class="form-group">
            <label>Department_AC</label>           
              <input id="txtEditDepartment_AC" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>DeptGroup1</label>           
              <input id="txtEditDeptGroup1" class="form-control" type="text">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label>DeptGroup2</label>           
              <input id="txtEditDeptGroup2" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Map1</label>           
              <input id="txtEditE-Map1" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Map2</label>           
              <input id="txtEditE-Map2" class="form-control" type="text">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Map3</label>           
              <input id="txtEditE-Map3" class="form-control" type="text">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
            <label>E-Clevel</label>           
              <input id="txtEditE-Clevel" class="form-control" type="text">
            </div>
          </div>   
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="btneditdata" type="button" class="btn btn-primary">Edit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /.content-wrapper -->
<script type="text/javascript">
function sendDataSave(){
    $.ajax({
      url: "/saveCap_DeptrouteBP",
      type:"POST",
      data:{
        CodeCD : $('#txtCodeCD').val(),
        Company : $('#txtCompany').val(),
        Department_HR : $('#txtDepartment_HR').val(),
        Code : $('#txtCode').val(),
        Department_AC : $('#txtDepartment_AC').val(),
        DeptGroup1 : $('#txtDeptGroup1').val(),
        DeptGroup2 : $('#txtDeptGroup2').val(),
        E_Map1 : $('#txtE-Map1').val(),
        E_Map2 : $('#txtE-Map2').val(),
        E_Map3 : $('#txtE-Map3').val(),
        E_Clevel : $('#txtE-Clevel').val()
      },
      success:function(response){
        console.log('response=>'+response);
        Swal.fire({
          title: "Good job!",
          text: "บันทึกข้อมูลสำเร็จ!",
          icon: "success",
          button: "OK!"
          
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'department';
          }
        })
      },
      error: function(error) {
        console.log('error=>'+error);
      }
    });
  }
  $(document).ready(function(){
    $('#btnedit').click(function(){
      // alert('Tset');
      var CodeCD = $('input[name=rdoCodeCD]:checked').val();
      // console.log('CodeCD=>'+CodeCD);
      if(CodeCD != undefined){
        $('#modaleditdepartmrnt').modal('show');
        $.ajax({
          url: "/sendCap_DeptrouteBP",
          type:"POST",
          data:{
            CodeCD
          },
          success:function(response){          
            // console.log('response=>'+response);            
            $('#txtEditCodeCD').val(response[0].CodeCD);
            $('#txtEditCompany').val(response[0].Company);
            $('#txtEditDepartment_HR').val(response[0].Department_HR);
            $('#txtEditCode').val(response[0].Code);
            $('#txtEditDepartment_AC').val(response[0].Department_AC);
            $('#txtEditDeptGroup1').val(response[0].DeptGroup1);
            $('#txtEditDeptGroup2').val(response[0].DeptGroup2);
            $('#txtEditE-Map1').val(response[0].E_Map1);
            $('#txtEditE-Map2').val(response[0].E_Map2);
            $('#txtEditE-Map3').val(response[0].E_Map3);
            $('#txtEditE-Clevel').val(response[0].E_Clevel);
            // Swal.fire({
            //   title: "Good job!",
            //   text: "บันทึกข้อมูลสำเร็จ!",
            //   icon: "success",
            //   button: "OK!"
              
            // }).then((result) => {
            //   if (result.isConfirmed) {
            //     window.location.href = 'department';
            //   }
            // })
          },
          error: function(error) {
            console.log('error=>'+error);
          }
        });
      }else{
        Swal.fire(
          'Oops...',
          'กรุณาคลิ๊กเลือก radio รายการที่จะแก้ไข !',
          'error'
        )
      }
    });
    $('#btneditdata').click(function(){
      $.ajax({
        url: "/editCap_DeptrouteBP",
        type:"POST",
        data:{
          CodeCD : $('#txtEditCodeCD').val(),
          Company : $('#txtEditCompany').val(),
          Department_HR : $('#txtEditDepartment_HR').val(),
          Code : $('#txtEditCode').val(),
          Department_AC : $('#txtEditDepartment_AC').val(),
          DeptGroup1 : $('#txtEditDeptGroup1').val(),
          DeptGroup2 : $('#txtEditDeptGroup2').val(),
          E_Map1 : $('#txtEditE-Map1').val(),
          E_Map2 : $('#txtEditE-Map2').val(),
          E_Map3 : $('#txtEditE-Map3').val(),
          E_Clevel : $('#txtEditE-Clevel').val()
        },
        success:function(response){
          console.log('response=>'+response);
          Swal.fire({
            title: "Good job!",
            text: "แก้ไขข้อมูลสำเร็จ!",
            icon: "success",
            button: "OK!"
            
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'department';
            }
          })
        },
        error: function(error) {
          console.log('error=>'+error);
        }
      });
    });
    $('#tbl_company').dataTable( {
      "scrollX": true,
      "aoColumnDefs": [{ "bSortable": false, "aTargets": [0,1,2,3,4,5,6,7,8,9,10,11] }], 
    });
  });
</script>
@endsection