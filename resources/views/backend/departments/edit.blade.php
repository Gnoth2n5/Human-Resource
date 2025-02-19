@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm phòng ban</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Phòng ban </li>
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
                                <h3 class="card-title">Sửa Phòng ban</h3>
                            </div>
                            <form class="form-horizontai" method="post" accept="admin/departments/edit/"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Tên phòng <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->department_name }}"
                                                name="department_name" class="form-control" required
                                                placeholder="Nhập tên phòng">

                                        </div>
                                    </div>




                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable"> Tên quản lý <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="manager_id" class="form-control" required>
                                                <option {{ $getRecord->manager_id == 1 ? 'select' : '' }} value="1">Thông
                                                </option>
                                                <option {{ $getRecord->manager_id == 2 ? 'select' : '' }} value="2">Thông
                                                    2</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable"> Vị trí <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="locations_id" class="form-control">
                                                <option value="">Chọn vị trí</option>
                                                @foreach ($getLocation as $value)
                                                    <option {{ $value->id == $getRecord->locations_id ? 'selected' : '' }}
                                                        value="{{ $value->id }}">{{ $value->street_address }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <a href="{{ url('admin/departments') }}" class="btn btn-default float-right">Thoát</a>
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
