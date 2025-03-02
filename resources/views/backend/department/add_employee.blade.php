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
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Thêm Nhân viên vào phòng ban</h3>
                            </div>
                            @include('_message')
                            <div class="card-body">
                                <form action="{{ url('admin/departments/add_employee/' . $getRecord->id) }}" method="POST">
                                    @csrf
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Chọn</th>
                                                <th>UID</th>
                                                <th>Họ và Tên</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($getEmployee as $i)
                                                <tr>
                                                    <td><input type="checkbox" name="employee_ids[]" value="{{$i->id}}"></td>
                                                    <td>{{ $i->uid }}</td>
                                                    <td>{{ $i->full_name }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Không có dữ liệu</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Thêm nhân viên</button>
                                        <a href="{{ url('admin/departments/view/'.$getRecord->id) }}" class="btn btn-info">Quay lại</a>
                                    </div>


                                </form>
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
