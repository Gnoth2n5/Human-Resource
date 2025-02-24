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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Job History </li>
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
                            <h3 class="card-title">Edit History</h3>
                        </div>
                        <form  class="form-horizontai" method="post" action="{{ url('admin/job_history/edit/'.$getRecord->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Employee Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="employee_id">
                                        <option value="">Select Employees Name</option>
                                        @foreach ($getEmployee as $value_employee)
                                            <option {{($value_employee->id == $getRecord->employee_id) ? 'selected' : ''}} value="{{ $value_employee->id }}">{{ $value_employee->name }} {{ $value_employee->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Start Date<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{ $getRecord->start_date }}" name="start_date" class="form-control" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">End Date<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" value="{{ $getRecord->start_date }}" name="end_date" class="form-control" required>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Job Name (JobID) <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="job_id">
                                        <option value="">Select Job Name</option>
                                        @foreach($getJobs as $value_job)
                                            <option {{($value_job->id == $getRecord->job_id) ? 'selected' : ''}} value="{{ $value_job->id }}">{{ $value_job->job_titlle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Department Name (Department ID) <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="department_id">
                                        <option value="">Select Department Name</option>
                                        @foreach ($getDepartments as $value_d)
                                            <option {{ ($value_d->id == $getRecord->department_id) ? 'selected' : '' }} value="{{ $value_d->id }}">{{ $value_d->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{url('admin/job_history')}}" class="btn btn-default float-right">Thoát</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->
@endsection