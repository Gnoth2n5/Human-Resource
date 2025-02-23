@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chức vụ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ url('admin/position_export') }}" class="btn btn-success">
                            Excel Export
                        </a>                        
                    <a href="{{ url('admin/position/add') }}" class="btn btn-primary mx-2">Thêm chức vụ</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>




    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search Position</h3>
                        </div>

                        <form action="" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-1">
                                        <label>ID</label>
                                        <input type="text" name="id" id="id" class="form-control"
                                            value="{{ Request()->id }}" placeholder="ID">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tên chức vụ</label>
                                        <input type="text" name="position_name" class="form-control" value="{{ Request()->position_name }}" placeholder="Nhập Tên Chức Vụ">
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>Ngày làm trong tháng</label>
                                        <input type="number" name="working_days_per_month" class="form-control" value="{{ Request()->working_days_per_month }}" placeholder="Nhập Ngày làm trong tháng">
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>Lương theo ngày</label>
                                        <input type="number" name="daily_rate" class="form-control" value="{{ Request()->daily_rate }}" placeholder="Nhập Lương Theo Ngày">
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <label>Lương theo tháng</label>
                                        <input type="number" name="monthly_rate" class="form-control" value="{{ Request()->monthly_rate }}" placeholder="Nhập Lương Theo Tháng">
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-3">
                                        <label>Created At</label>
                                        <input type="date" value="{{ Request()->created_at }}" name="created_at"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Update At</label>
                                        <input type="date" value="{{ Request()->update_at }}" name="update_at"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>From Date (Start Date)</label>
                                        <input type="date" value="{{ Request()->start_date }}" name="start_date"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>To Date (End Date)</label>
                                        <input type="date" value="{{ Request()->end_date }}" name="end_date"
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 15px">Tìm
                                            kiếm</button>
                                        <a href="{{ url('admin/position') }}" class="btn btn-success"
                                            style="margin-top: 15px">Khôi phục</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')   
                    
                    
                    <div class="card">
                        <div class="card-header">Danh sách chức vụ</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                   <tr>
                                    <th>ID</th>
                                     <th>Tên chức vụ</th>
                                     <th>Lương theo ngày</th>
                                     <th>Lương theo tháng</th>
                                     <th>Số ngày làm trên tháng</th>
                                     <th>Ngày tạo</th>
                                     <th>Ngày cập nhật</th>
                                     <th>Hành động</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->position_name }}</td>
                                        <td>{{ $value->daily_rate }}</td>
                                        <td>{{ $value->monthly_rate }}</td>
                                        <td>{{ $value->working_days_per_month }}</td>
                                        <td>{{ date('d-m-Y H:s:i', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('d-m-Y H:s:i', strtotime($value->updated_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/position/edit/' . $value->id) }}" class="btn btn-primary">
                                                Edit
                                            </a>
                                            
                                            <a href="{{ url('admin/position/delete/' . $value->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa')">
                                                Delete
                                            </a>
                                            </td>
                                            
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">No Record Found.</td>
                                    </tr>
                                    @endforelse                     
                                </tbody>
                            </table>
                        </div>
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>

                </section>                
            </div>
        </div>
    </section>

@endsection