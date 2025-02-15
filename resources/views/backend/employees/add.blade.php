@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Thêm nhân sự</h3>
                        </div>
                        <form  class="form-horizontai" method="post" accept="admin/employees/add" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Tên <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('name')}}" name="name" class="form-cpntrol" required placeholder="Nhập tên">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Họ <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"value="{{old('last_name')}}" name="last_name" class="form-cpntrol" placeholder="Nhập họ">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Email <span style="color: red">*</span></label>
                                <div class="col-sm-10"> 
                                    <input type="email" value="{{old('email')}}" name="email" class="form-cpntrol" required placeholder="Nhập email">
                                </div>
                                <span style="color: red">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Số điện thoại <span style="color: red"></span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('phone_number')}}" name="phone_number" class="form-cpntrol"  placeholder="Nhập SDT">
                                </div>
                                <span style="color: red">{{$errors->first('phone_number')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Ngày thuê <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{old('hire_date')}}" name="hire_date" class="form-cpntrol" required placeholder="Nhập ngày">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Job Title <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                   <select name="job_id"  class="form-control" required>
                                    <option value="">Select Job Title</option>
                                    @foreach($getJobs as $value_job)
                                        <option value="{{ $value_job->id }}">{{ $value_job->job_titlle }}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Lương <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('salary')}}" name="salary" class="form-cpntrol" required placeholder="Nhập lương">
                                </div>
                                <span style="color: red">{{$errors->first('salary')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Nhiệm vụ <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('commission_pct')}}" name="commission_pct" class="form-cpntrol" required placeholder="Nhập nhiệm vụ">
                                </div>
                                <span style="color: red">{{$errors->first('commission_pct')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Manager Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                   <select name="manager_id"  class="form-control" required>
                                    <option value="">Select Manager Name</option>
                                    <option value="1">Number c100</option>
                                    <option value="2">Number Z1000</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Phòng  <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                   <select name="department_id"  class="form-control" required>
                                    <option value="">Select Department Name</option>
                                    <option value="1">Dev Department</option>
                                    <option value="2">PDF Department</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{url('admin/employees')}}" class="btn btn-default float-right">Thoát</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->
@endsection