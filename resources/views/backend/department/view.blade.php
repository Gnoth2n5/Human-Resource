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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Department </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Card Table Nhân viên -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Nhân viên trong phòng ban</h5>
                                <div>
                                    <a href="{{ url('admin/departments/add_employee/'.$getRecord->id) }}" class="btn btn-primary">Thêm nhân viên</a>
                                    <a href="{{ url('admin/departments') }}" class="btn btn-info">Quay lại</a>
                                </div>
                            </div>
                            @include('_message')
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UID</th>
                                            <th>Họ và Tên</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($getRecord->user as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->uid }}</td>
                                                <td>{{ $item->full_name }}</td>
                                                <td><a href="{{ url('admin/departments/delete_employee/'.$item->id) }}"
                                                        onclick="return confirm('Bạn có chắc muốn xoá ?')"
                                                        class="btn btn-danger btn-sm">Xóa</a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">Không có dữ liệu</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Card Thông tin phòng ban -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Thông tin phòng ban</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Tên phòng ban:</strong> {{ $getRecord->name }}</p>
                                <p><strong>Số nhân viên:</strong> {{ $getCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content-header -->

    </div>
    <!-- /.content-wrapper -->
@endsection
