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
                                <label class="col-sm-2 col-form-lable">Họ và tên <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('full_name')}}" name="full_name" class="form-control" required placeholder="Nhập họ và tên">
                                    <span style="color: red">{{$errors->first('full_name')}}</span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Email <span style="color: red">*</span></label>
                                <div class="col-sm-10"> 
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" required placeholder="Nhập email">
                                </div>
                                <span style="color: red">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Số điện thoại <span style="color: red"></span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('phone_number')}}" name="phone_number" class="form-control"  placeholder="Nhập SDT">
                                </div>
                                <span style="color: red">{{$errors->first('phone_number')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Địa chỉ <span style="color: red"></span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('address')}}" name="address" class="form-control"  placeholder="Nhập địa chỉ">
                                </div>
                                <span style="color: red">{{$errors->first('phone_number')}}</span>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Avatar <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="avatar" class="form-control" accept="image/*">
                                </div>
                                <span style="color: red">{{$errors->first('avatar')}}</span>
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