@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý nhân viên</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/employees/add') }}" class="btn btn-primary">Thêm</a>
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
                                <h3 class="card-title">Tìm kiếm nhân viên</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            <label>UID</label>
                                            <input type="text" class="form-control" name="uid"
                                                value="{{ Request()->uid }}" placeholder="UID">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Họ Tên</label>
                                            <input type="text" class="form-control" name="full_name"
                                                value="{{ Request()->full_name }}" placeholder="Họ Tên">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Email</label>
                                            <input type="text" class="form-control"
                                                name="email"value="{{ Request()->email }}" placeholder="email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 32px">Tìm
                                                kiếm</button>
                                            <a href="{{ 'employees' }}" class="btn btn-success"
                                                style="margin-top: 32px">Khôi phục</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách nhân sự</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>*</th>
                                            <th>UID</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Ảnh đại diện</th>
                                            <th>Phòng ban</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php $i = 1 @endphp
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $value->uid }}</td>
                                                <td>{{ $value->full_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    @if (!empty($value->avatar))
                                                        @if (file_exists(public_path('upload/' . $value->avatar)))
                                                            <img src="{{ url('upload/' . $value->avatar) }}"
                                                                style="height: 80px; width: 80px; object-fit: cover;" class="img-fluid">
                                                        @endif
                                                    @else
                                                        <img src="{{ url('upload/no-image.png') }}"
                                                            style="height: 80px; width: 80px; object-fit: cover;" class="img-fluid">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $value->department->name ?? 'Chưa có' }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/employees/view/' . $value->id) }}"
                                                        class="btn btn-info">Chi tiết</a>
                                                    <a href="{{ url('admin/employees/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Sửa</a>

                                                    <a href="{{ url('admin/employees/delete/' . $value->id) }}"
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
