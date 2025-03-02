@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Phòng ban</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Department </li>
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
                                <h3 class="card-title">Sửa Phòng ban</h3>
                            </div>
                            <form class="form-horizontai" method="post"
                                action="{{ url('admin/departments/edit/' . $getRecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Tên Phòng<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->name }}" name="name"
                                                class="form-control" required placeholder="Enter Name">
                                            <span style="color: red">{{ $errors->first('name') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Vị trí<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->location }}" name="location"
                                                class="form-control" required placeholder="Enter Location">
                                            <span style="color: red">{{ $errors->first('location') }}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ url('admin/deparments') }}" class="btn btn-default float-right">Thoát</a>
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
