@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Setting</a></li>
                            <li class="breadcrumb-item active">Tài Khoản</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        @include('_message')

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin Tài Khoản</h3>
                            </div>

                            <form class="form-horizontal" method="post"
                                action="{{ Auth::user()->is_role == 1 ? url('admin/my_account/update') : url('employee/my_account/update') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Họ Tên <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->full_name }}" name="full_name"
                                                class="form-control" required placeholder="Nhập Tên">

                                        </div>
                                        <span style="color: red;">{{ $errors->first('full_name') }}</span>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Địa chỉ <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->address }}" name="address"
                                                class="form-control" required placeholder="Nhập Tên">

                                        </div>
                                        <span style="color: red;">{{ $errors->first('address') }}</span>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Số điện thoại <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->phone_number }}" name="phone_number"
                                                class="form-control" required placeholder="Nhập Tên">

                                        </div>
                                        <span style="color: red;">{{ $errors->first('phone_number') }}</span>

                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->email }}" name="email"
                                                class="form-control" required placeholder="Nhập Email">
                                            <span style="color: red;">{{ $errors->first('email') }}</span>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable"> Profile Image
                                            <span style="color: red;"></span>
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="file" name="avatar" class="form-control">
                                            @if (!empty($getRecord->avatar))
                                                @if (file_exists('upload/' . $getRecord->avatar))
                                                    <img src="{{ url('upload/' . $getRecord->avatar) }}" alt="no-img"
                                                        style="height: 100px; width: 100px;">
                                                @endif
                                            @else
                                                <img src="{{ url('upload/no-image.png') }}"
                                                    style="height: 100px; width: 100px;">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Mật Khẩu <span
                                                style="color: red">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control"
                                                placeholder="Nhập Mật Khẩu">
                                            (Để trống nếu bạn không thay đổi mật khẩu).
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" onclick="return validateSalary()">Cập
                                        Nhập</button>
                                    <a href="{{ url('admin/my_account') }}" class="btn btn-default float-right">Thoát</a>
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
