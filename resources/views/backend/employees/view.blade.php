@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Employees</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Xem</h3>
                        </div>
                        <form  class="form-horizontai" method="post"  enctype="multipart/form-data">
                            
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">ID <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    {{$getRecord->id}}
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Tên <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->name}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Họ <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->last_name}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Email <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->email}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Số điện thoaoj <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->phone_number}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Ngày thuê <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{date('d-m-Y',strtotime($getRecord->hire_date))}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">job ID <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{ !empty($getRecord->get_job_single->job_titlle) ? $getRecord->get_job_single->job_titlle : '' }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Lương <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->salary}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">lượng việc <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->commission_pct}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">ID quản lý <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->manager_id}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">ID Phòng ban <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->department_id}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Ngày tạo <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{date('d-m-Y H:i A',strtotime($getRecord->create_at))}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Ngày sửa <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{date('d-m-Y H:i A',strtotime($getRecord->updated_at))}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Role <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{!empty($getRecord->is_role)?'HR':'Nhân viên'}}
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{url('admin/employees')}}" class="btn btn-default float-right">Thoát</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</div>
<!-- /.content-wrapper -->
@endsection