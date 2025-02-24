@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pay Roll</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pay Roll </li>
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
                            <h3 class="card-title">Add Pay Roll</h3>
                        </div>


                        <form  class="form-horizontai" method="post" action="{{ url('admin/payroll/add') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Employee Name <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="employee_id">
                                        <option value="">Select Employees Name</option>
                                       @foreach($getEmployee as $getE)
                                        <option value="{{ $getE->id }}">{{ $getE->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Number Of Day Work<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('number_of_day_work')}}" name="number_of_day_work" class="form-control" required placeholder="Number of Day Work">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Bonus<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('bonus')}}" name="bonus" class="form-control" required placeholder="Bonus">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Overtime<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('overtime')}}" name="overtime" class="form-control" required placeholder="Overtime">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Gross Salary<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('gross_salary')}}" name="gross_salary" class="form-control" required placeholder="Gross Salary">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Cash Advance<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('cash_advance')}}" name="cash_advance" class="form-control" required placeholder="Cash Advance">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Late Hours<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('late_hours')}}" name="late_hours" class="form-control" required placeholder="Late Hours">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Absent Days<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('absent_days')}}" name="absent_days" class="form-control" required placeholder="Absent Days">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">SSS_Contribution<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('sss_contribution')}}" name="sss_contribution" class="form-control" required placeholder="SSS_Contribution">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Philhealth<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('philhealth')}}" name="philhealth" class="form-control" required placeholder="Philhealth">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Total Deductions<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('total_deductions')}}" name="total_deductions" class="form-control" required placeholder="Total Deductions">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Netpay<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('netpay')}}" name="netpay" class="form-control" required placeholder="Netpay">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Payroll Monthly<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('payroll_monthly')}}" name="payroll_monthly" class="form-control" required placeholder="Payroll Monthly">

                                </div>
                            </div>

                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{url('admin/payroll')}}" class="btn btn-default float-right">Thoát</a>
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