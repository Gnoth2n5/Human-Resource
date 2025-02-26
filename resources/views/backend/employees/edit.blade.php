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
                                <label class="col-sm-2 col-form-lable">Họ và tên <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$getRecord->full_name}}" name="full_name" class="form-cpntrol" required placeholder="Nhập họ và tên">

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
                                <label class="col-sm-2 col-form-lable">Địa chỉ thoại <span style="color: red"></span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->address}}" name="address" class="form-cpntrol"  placeholder="Nhập địa chỉ">
                                </div>
                                <span style="color: red">{{$errors->first('address')}}</span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Avatar <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="avatar" class="form-control" accept="image/*">
                                </div>
                                <div>
                                    <img src="{{$getRecord->avatar}}" alt="">
                                </div>
                                <span style="color: red">{{$errors->first('avatar')}}</span>
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