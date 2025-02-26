@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Công việc</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">

                        <form action="{{ url('admin/jobs_export') }}" method="get">

                            <input type="hidden" name="start_date" value="{{ Request()->start_at }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_at }}">

                            <a class="btn btn-success"
                                href="{{ url('admin/jobs_export?start_date=' . request()->get('start_date') . request()->get('end_date')) }}">Xuất
                                Excel</a>
                        </form>
                
                        <a href="{{ url('admin/jobs/add') }}" class="btn btn-primary mx-2">Thêm Việc Làm</a>
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
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Tiêu Đề Việc Làm</label>
                                            <input type="text" class="form-control" name="job_title"
                                                value="{{ Request()->title }}"placeholder="Tiêu Đề Công Việc">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Trạng thái</label>
                                            <input type="text" class="form-control" name="status"
                                                value="{{ Request()->status }}" placeholder="Trạng thái">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Ngày bắt đầu</label>
                                            <input type="date" class="form-control" name="start_at"
                                                value="{{ Request()->start_at }}">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Ngày kết thúc</label>
                                            <input type="date" class="form-control" name="end_at"
                                                value="{{ Request()->end_at }}">
                                        </div>

                                        <div class="form-group col-md-3 mt-3">
                                            <button class="btn btn-primary" type="submit" style="">Tìm
                                                kiếm</button>
                                            <a href="{{ url('admin/jobs') }}" class="btn btn-success"
                                                style="">Khôi phục</a>
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
                                            <th>Trạng thái</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->status }}</td>
                                                <td>{{ $value->start_at }}</td>
                                                <td>{{ $value->end_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/jobs/view/' . $value->id) }}"
                                                        class="btn btn-info">Chi tiết</a>
                                                    <a href="{{ url('admin/jobs/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ url('admin/jobs/delete/' . $value->id) }}"
                                                        onclick="return confirm('Bạn có chắc muốn xóa')"
                                                        class="btn btn-danger">Xoá</a>
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
