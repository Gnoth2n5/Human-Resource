@extends('backend.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ !empty('$getEmployeeCount') ? $getEmployeeCount : '0' }}</h3>
                                <p>Nhân Viên</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                            <a href="{{ url('admin/employees') }}" class="small-box-footer">Xem Thêm Thông Tin <i
                                    class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ !empty('$getDepartmentCount') ? $getDepartmentCount : '0' }}</h3>
                                <p>Phòng ban</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                            <a href="{{ url('admin/departments') }}" class="small-box-footer">Xem Thêm Thông Tin <i
                                    class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ !empty('$JobNoWork') ? $JobNoWork : '0' }}</h3>
                                <p>Công việc chưa được làm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                            <a href="{{ url('admin/jobs') }}" class="small-box-footer">Xem Thêm Thông Tin <i
                                    class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ !empty('$JobWork') ? $JobWork : '0' }}</h3>
                                <p>Công việc đang làm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                            <a href="{{ url('admin/jobs') }}" class="small-box-footer">Xem Thêm Thông Tin <i
                                    class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>

                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
