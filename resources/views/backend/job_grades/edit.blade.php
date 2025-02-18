@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Grades</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Job Grades </li>
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
                                <h3 class="card-title">Edit Grades</h3>
                            </div>
                            <form class="form-horizontai" method="post" action="{{ url('admin/job_grades/edit/'.$getRecord->id)}}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Grade Level<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->grade_level }}" name="grade_level"
                                                class="form-control" required placeholder="Enter Grade Level">
                                            <span style="color: red">{{ $errors->first('grade_level') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Lowest Sal<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->lowest_sal }}" name="lowest_sal"
                                                class="form-control" required placeholder="Enter Lowest Sal">
                                                <span style="color: red">{{$errors->first('lowest_sal')}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Highest Sal <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->highest_sal }}" name="highest_sal"
                                                class="form-control" required placeholder="Enter Highest Sal">
                                                <span style="color: red">{{$errors->first('highest_sal')}}</span>
                                        </div>
                                    </div>




                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ url('admin/job_grades') }}" class="btn btn-default float-right">Thoát</a>
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
