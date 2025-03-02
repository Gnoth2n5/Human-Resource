@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lương</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        {{-- <a href="{{ url('admin/payroll_export') }}" class="btn btn-success">Excel Export</a> --}}
                        <a href="{{ url('admin/payroll/add') }}" class="btn btn-primary mx-2">Add Pay Roll</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">

                            {{-- <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Search Pay Roll List</h3>
                                </div>

                                <form method="get" action="">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>UID</label>
                                                <input type="text" name="id" class="form-control" placeholder="UID"
                                                    value="{{ Request()->uid }}">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Employee Name</label>
                                                <input type="text" name="employee_id" class="form-control"
                                                    placeholder="Employee Name" value="{{ Request()->employee_id }}">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <button class="btn btn-primary" type="submit"
                                                    style="margin-top: 30px;">Search</button>
                                                <a href="{{ url('admin/payroll') }}" class="btn btn-success"
                                                    style="margin-top: 30px;">Reset</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div> --}}

                            @include('_message')

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pay Roll List</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>*</th>
                                                <th>UID</th>
                                                <th>Tên nhân viên</th>
                                                <th>Lương cơ bản</th>
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @forelse ($getRecord as $value)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $value->user->uid }}</td>
                                                    <td>{{ $value->user->full_name }}</td>
                                                    <td>{{ $value->formatted_base_salary }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/payroll/caculate/' . $value->user->id) }}" class="btn btn-success">Tính
                                                            lương</a>
                                                        <a href="{{ url('admin/payroll/edit/' . $value->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{ url('admin/payroll/delete/' . $value->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete?')"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No Record Found</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    <div class="" style="padding: 10px; float: right;">
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
