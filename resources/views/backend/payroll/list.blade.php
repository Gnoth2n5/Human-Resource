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
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ url('admin/payroll_export') }}" class="btn btn-success">Excel Export</a>
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
                            
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Search Pay Roll List</h3>
                                </div>

                                <form method="get" action="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>ID</label>
                                                <input type="text" name="id" class="form-control" placeholder="ID" value="{{ Request()->id }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Employee Name</label>
                                                <input type="text" name="employee_id" class="form-control" placeholder="Employee Name" value="{{ Request()->employee_id }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Number Of Day Work</label>
                                                <input type="text" name="number_of_day_work" class="form-control" placeholder="Number Of Day Work" value="{{ Request()->number_of_day_work }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Bonus</label>
                                                <input type="text" name="bonus" class="form-control" placeholder="Bonus" value="{{ Request()->bonus }}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Overtime</label>
                                                <input type="text" name="overtime" class="form-control" placeholder="Overtime" value="{{ Request()->overtime }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                                 <a href="{{ url('admin/payroll') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            @include('_message')

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pay Roll List</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee Name</th>
                                                <th>Number Of Day Work</th>
                                                <th>Bonus</th>
                                                <th>Overtime</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                 $totalNumberOfDayWork = 0;
                                                $totalBonus = 0;
                                                 $totalOvertime = 0;
                                            @endphp
                                            @foreach($getRecord as $value)
                                            @php
                                                 $totalOvertime = $totalOvertime+$value->overtime;
                                                 $totalNumberOfDayWork = $totalNumberOfDayWork+$value->number_of_day_work;
                                                $totalBonus = $totalBonus+$value->bonus;
                                            @endphp

                                           <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ !empty($value->name) ? $value->name : '' }}</td>
                                                <td>{{ $value->number_of_day_work }}</td>
                                                <td>{{ $value->bonus }}</td>
                                                <td>{{ $value->overtime }}</td>
                                                <td>
                                                    <a href="{{ url('admin/payroll/view/'.$value->id) }}" class="btn btn-info">View</a>
                                                    <a href="{{ url('admin/payroll/edit/'.$value->id) }}"  class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/payroll/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                                </td>
                                           </tr>
                                           @endforeach

                                           <tr>
                                            <th colspan="3">Total All</th>
                                            <td>
                                                {{ $totalNumberOfDayWork }}
                                            </td>
                                            <td>
                                                {{ $totalBonus }}
                                            </td>
                                            <td>
                                                 {{ $totalOvertime }}
                                            </td>
                                           </tr>
                                           
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px; float:right;">

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
