@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job History</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">

                        <form action="{{ url('admin/job_history/export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a href="{{ url('admin/job_history/export?start_date=') . Request::get('start_date') . '&end_date' . Request::get('end_date') }}"
                                class="btn btn-success">Excel Export</a>
                        </form>
                        <br>

                        <a href="{{ url('admin/job_history/add') }}" class="btn btn-primary mx-2">Add Job History</a>
                    </div><!-- /.col -->
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
                            <h3 class="card-title">Search Jobs History List</h3>
                        </div>

                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ID</label>
                                        <input type="text" name="id" class="form-control" placeholder="ID"
                                            value="{{ Request()->id }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Employee Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Employee Name" value="{{ Request()->name }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control"
                                            value="{{ Request()->start_date }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control"
                                            value="{{ Request()->end_date }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Job Title</label>
                                        <input type="text" name="job_titlle" class="form-control" placeholder="Job Title"
                                            value="{{ Request()->job_titlle }}">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary" type="submit"
                                            style="margin-top: 30px;">Search</button>
                                        <a href="{{ url('admin/job_history') }}" class="btn btn-success"
                                            style="margin-top: 30px">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jobs History List</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name (employee_id)</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Job Name (job_id)</th>
                                        <th>Department Name (department_id)</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ !empty($value->get_user_name_single->name) ? $value->get_user_name_single->name : '' }}
                                                {{ !empty($value->get_user_name_single->last_name) ? $value->get_user_name_single->last_name : '' }}
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->start_date)) }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->end_date)) }}</td>
                                            <td>{{ !empty($value->get_job_single->job_titlle) ? $value->get_job_single->job_titlle : '' }}</td>
                                            <td>
                                                {{ !empty($value->get_departments_name_single->department_name) ? $value->get_departments_name_single->department_name : '' }}
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/job_history/edit/' . $value->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/job_history/delete/' . $value->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    class="btn btn-danger">Delete</a>
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
                    </div>

                </section>
            </div>
        </div>
    </section>



    </div>
    <!-- /.content-wrapper -->
@endsection
