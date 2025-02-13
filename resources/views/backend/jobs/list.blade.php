@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jobs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right">

            <form action="{{ url('admin/jobs_export') }}" method="get">

              <input type="hidden" name="start_date" value="{{Request()->start_date}}">
              <input type="hidden" name="end_date" value="{{Request()->end_date}}">
              
              <a class="btn btn-success" href="{{ url('admin/jobs_export?start_date=' . request()->get('start_date') . request()->get('end_date')) }}">Xuất Excel</a>
            </form>
            <br>

            <a href="{{url('admin/jobs/add')}}" class="btn btn-primary">Thêm Việc Làm</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
       
        <div class="row">
            <section class="col-md-12">
              
                <div class="card">
                    <div class="card-header">
                       <h3 class="card-title">Tìm kiếm Việc Làm</h3>
                    </div>
                    <form method="get"  action="">
                      <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-1">
                            <label >ID</label>
                            <input type="text" class="form-control" name="id" value="{{Request()->id}}"
                            placeholder="ID">
                          </div>

                          <div class="form-group col-md-3">
                            <label >Tiêu Đề Việc Làm</label>
                            <input type="text" class="form-control" name="job_titlle" value="{{Request()->job_titlle}}"placeholder="Tiêu Đề Công Việc">
                          </div>

                          <div class="form-group col-md-3">
                            <label >Mức Lương Tối Thiểu</label>
                            <input type="text" class="form-control" name="min_salary" value="{{Request()->min_salary}}"placeholder="Mức Lương Tối Thiểu">
                          </div>
                          
                          <div class="form-group col-md-3">
                            <label >Mức Lương Tối Đa</label>
                            <input type="text" class="form-control" name="max_salary" value="{{Request()->max_salary}}"placeholder="Mức Lương Tối Đa">
                          </div>

                          <div class="form-group col-md-3">
                            <label >From Date (Start Date)</label>
                            <input type="date" class="form-control" name="start_date" value="{{Request()->start_date}}">
                          </div>

                          <div class="form-group col-md-3">
                            <label >To Date (End Date)</label>
                            <input type="date" class="form-control" name="end_date" value="{{Request()->end_date}}">
                          </div>

                          <div class="form-group col-md-3">
                            <button class="btn btn-primary" type="submit" style="margin-top: 15px">Tìm kiếm</button>
                            <a href="{{ url('admin/jobs') }}" class="btn btn-success" style="margin-top: 15px">Khôi phục</a>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
                 @include('_message')
                 <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Danh Sách Việc Làm</h3>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>*</th>
                          <th>Tiêu Đề Việc Làm</th>
                          <th>Mức Lương Tối Thiểu</th>
                          <th>Mức Lương Tối Đa</th>
                          <th>Ngày Tạo</th>
                          <th>Hành động</th>
                          

                        </tr>
                      </thead>
                      <tbody>
                      @forelse($getRecord as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->job_titlle}}</td>
                          <td>{{$value->min_salary}}</td>
                          <td>{{$value->max_salary}}</td>
                          <td>{{date('d-m-Y H:i A', strtotime($value->updated_at))}}</td>
                          
                          <td>
                            <a href="{{ url('admin/jobs/view/'. $value->id) }}" class="btn btn-info">View</a>
                            <a href="{{ url('admin/jobs/edit/'. $value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/jobs/delete/'. $value->id) }}" onclick="return confirm('Bạn có chắc muốn xóa')" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6" style="text-align: center;">Không tìm thấy dữ liệu</td>
                        </tr>
                      @endforelse
                        
                      </tbody>
                    </table>
                    <div class="" style="padding: 10px; float: right;">
                      {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                    </div>
                  </div>
                 </div>
            </section>
        </div>
    </div>

</section>
</div>
<!-- /.content-wrapper -->
@endsection