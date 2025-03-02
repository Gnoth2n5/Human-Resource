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
                    <div class="col-sm-6 d-flex justify-content-end">



                        <a href="{{ url('admin/departments/add') }}" class="btn btn-primary mx-2">Thêm phòng ban</a>
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
                                <h3 class="card-title">Tìm kiếm</h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Tên Phòng</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ Request()->name }}" placeholder="Tên phòng">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Vị trí</label>
                                            <input type="number" name="location" class="form-control"
                                                value="{{ Request()->location }}" placeholder="Vị trí">
                                        </div>


                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/departments') }}" class="btn btn-success"
                                                style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách phòng ban</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>*</th>
                                            <th>Tên Phòng</th>
                                            <th>Vị trí</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->location }}</td>
                                                <td>
                                                    <a href="{{ url('admin/departments/view/' . $value->id) }}"
                                                        class="btn btn-info">Chi tiết</a>
                                                    <a href="{{ url('admin/departments/edit/' . $value->id) }}"
                                                        class="btn btn-primary">Sửa</a>
                                                    <a href="{{ url('admin/departments/delete/' . $value->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found</td>
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
    @endsection
