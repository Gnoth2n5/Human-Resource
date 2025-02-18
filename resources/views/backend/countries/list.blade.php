@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Countries</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6 d-flex justify-content-end">

                    <form action="{{ url('admin/countries_export') }}" method="get">

                        <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                        <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                        <a class="btn btn-success" href="{{ url('admin/countries_export?start_date=' . request()->get('start_date') . request()->get('end_date')) }}">Export Excel</a>
                    
                    </form> 
                    <br>   
                
                        <a href="{{ url('admin/countries/add') }}" class="btn btn-primary mx-2">Add Countries</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">

                        //Search Box Start
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Country List</h3>
                            </div>

                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Country Name</label>
                                            <input type="text" name="counntry_name" class="form-control" value="{{ Request()->country_name }}" placeholder="Country Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Regions Name</label>
                                            <input type="text" name="region_name" class="form-control" value="{{ Request()->region_name }}" placeholder="Regions Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Form Date (Start Date)</label>
                                            <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>To Date (End Date)</label>
                                            <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/countries') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        //Search Box End

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Countries List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Country Name</th>
                                            <th>Regions Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tbody>

                                            @forelse ($getRecord as $value)
                                                
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->country_name }}</td>
                                                <td>{{ !empty($value->get_region_name->region_name) ? $value->get_region_name->region_name : '' }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                                <td>

                                                    <a href="{{ url('admin/countries/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>

                                                    <a href="{{ url('admin/countries/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>

                                                </td>
                                            </tr>

                                            @empty
                                              <tr>
                                                <td colspan="100%">No Record Found</td>
                                              </tr>  
                                            @endforelse
                                        </tbody>
                                    </thead>
                                </table>
                                <div style="padding: 10px; float: right;">
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

        