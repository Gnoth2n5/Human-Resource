
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
                <h3>150</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

              <a href="{{ url('admin/employees') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <h3>{{ !empty('$getHRCount') ? $getHRCount : '0' }}</h3>

                <p>Tổng Thể Quản Trị Nhân Sự</p>

              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('admin/manager') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <h3>{{ !empty('$getEMPCount') ? $getEMPCount : '0' }}</h3>

                <p>Tổng Số Nhân Viên</p>

              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

              <a href="{{ url('admin/employees') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <h3>{{ !empty('$getTotalJobCount') ? $getTotalJobCount : '0' }}</h3>

                <p>Tổng Số Công Việc</p>

              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>

              <a href="{{ url('admin/jobs') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ !empty('$getJobHCount') ? $getJobHCount : '' }}</h3>

                <p>Lịch Sử Công Việc</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/job_history') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ !empty('$getRegionsCount') ? $getRegionsCount : '' }}</h3>

                <p>Regions</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/regions') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ !empty('$TodayRegion') ? $TodayRegion : '0' }}</h3>

                <p>Today Regions</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('admin/regions') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ !empty('$YesterdayRegion') ? $YesterdayRegion : '0' }}</h3>

                <p>Yesterday Region</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/regions') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ !empty('$getCountriesCount') ? $getCountriesCount : '0' }}</h3>

                <p>Countries</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/countries') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ !empty('$getLocationsCount') ? $getLocationsCount : '0' }}</h3>

                <p>Vị Trí</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('admin/locations') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ !empty('$getDepartmentsCount') ? $getDepartmentsCount : '0' }}</h3>
                
                <p>Phòng</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('admin/departments') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ !empty('$getManagerCount') ? $getManagerCount : '0' }}</h3>
                
                <p>Giám Đốc</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('admin/manager') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ !empty('$getPositionCount') ? $getPositionCount : '0' }}</h3>

              <p>Position</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/position') }}" class="small-box-footer">Xem Thêm Thông Tin <i class="fas fa-arrow-circle-right"></i></a>
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