@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pay Roll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pay Roll </li>
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
                                <h3 class="card-title">Add Pay Roll</h3>
                            </div>


                            <form class="form-horizontai" method="post" action="{{ url('admin/payroll/add') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Employee Name <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="employee_id">
                                                <option value="">Select Employees Name</option>
                                                @foreach ($getEmployee as $getE)
                                                    <option value="{{ $getE->id }}">{{ $getE->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Base Salary<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('base_salary') }}"
                                                name="base_salary" class="form-control" required
                                                placeholder="base_salary">

                                        </div>
                                    </div>

                                    

                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a href="{{ url('admin/payroll') }}" class="btn btn-default float-right">Thoát</a>
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
