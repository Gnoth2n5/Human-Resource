@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Employees</h1>
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
                            <h3 class="card-title">Sửa nhân sự</h3>
                        </div>
                        <form  class="form-horizontai" method="post" action="{{url('admin/employees/edit/'.$getRecord->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                           
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Tên <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$getRecord->name}}" name="name" class="form-cpntrol" required placeholder="Nhập họ">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">họ <span style="color: red"></span></label>
                                <div class="col-sm-10">
                                    <input type="text"value="{{$getRecord->last_name}}" name="last_name" class="form-cpntrol" placeholder="Nhập tên">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Email <span style="color: red">*</span></label>
                                <div class="col-sm-10"> 
                                    <input type="email" value="{{$getRecord->email}}" name="email" class="form-cpntrol" required placeholder="Nhập email">
                                </div>
                                <span style="color: red">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Số điện thoại <span style="color: red"></span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->phone_number}}" name="phone_number" class="form-cpntrol"  placeholder="Nhập SDT">
                                </div>
                                <span style="color: red">{{$errors->first('phone_number')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    Ảnh đại diện <span style="color: red;"></span>
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="profile_image" class="form-control">
                                        @if(!empty($getRecord->profile_image))
                                            @if(file_exists(public_path('upload/' . $getRecord->profile_image)))
                                                <img src="{{ url('upload/' . $getRecord->profile_image) }}" 
                                                     style="height: 80px; width: 80px;">
                                            @endif
                                        @endif
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Ngày thuê <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{$getRecord->hire_date}}" name="hire_date" class="form-cpntrol" required placeholder="Nhập ngày">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Job Title <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                   <select name="job_id"  class="form-control" required>
                                    @foreach($getJobs as $value_job)
                                        <option {{ $value_job->id ==  $getRecord->job_id ? 'selected' : ''}} value="{{ $value_job->id }}">{{ $value_job->job_titlle }}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Lương <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->salary}}" name="salary" class="form-cpntrol" required placeholder="Nhập lương">
                                </div>
                                <span style="color: red">{{$errors->first('salary')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Nhiệm vụ <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->commission_pct}}" name="commission_pct" class="form-cpntrol" required placeholder="Nhập nhiệm vụ">
                                </div>
                                <span style="color: red">{{$errors->first('commission_pct')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Manager Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="manager_id"  class="form-control" required>
                                        <option value="">Select Manager Name</option>
                                        @foreach ($getManager as $value_m)
                                            <option {{ ($value_m->id == $getRecord->manager_id) ? 'selected' : ''}} value="{{ $value_m->id }}">{{ $value_m->manager_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Phòng  <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select name="department_id"  class="form-control" required>
                                        <option value="">Select Department Name</option>
                                        @foreach ($getDepartments as $value_d)
                                            <option {{ ($value_d->id == $getRecord->department_id) ? 'selected' : ''}} value="{{ $value_d->id }}">{{ $value_d->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
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