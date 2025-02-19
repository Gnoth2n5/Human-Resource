@extends('backend.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Phòng ban</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <form action="{{ url('admin/departments_export') }}" method="get">
                        <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                        <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
                    
                        <a href="{{ url('admin/departments_export') }}?start_date={{ Request()->start_date }}&end_date={{ Request()->end_date }}" 
                           class="btn btn-success">Excel Export</a>
                    </form>
                    
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{url('admin/departments/add')}}" class="btn btn-primary">Thêm Phòng ban</a>
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
                                    <h3 class="card-title">Tìm Phòng ban</h3>
                                </div>
                                <form method="get" action="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>ID</label>
                                                <input type="text" name="id" value="{{ Request()->id }}" class="form-control" placeholder="ID">
                                            </div>
                                
                                            <div class="form-group col-md-3">
                                                <label>Tên phòng</label>
                                                <input type="text" name="id" value="{{ Request()->department_name }}" class="form-control" placeholder="Tên phòng">
                                            </div>
                                           
                                            <div class="form-group col-md-3">
                                                <label>Vị trí</label>
                                                <input type="text" name="id" value="{{ Request()->street_address }}" class="form-control" placeholder="Vị trí">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>From Date (Start Date)</label>
                                                <input type="date" name="start_date" value="{{ Request()->start_date }}" class="form-control">
                                            </div>
                                            
                                            <div class="form-group col-md-3">
                                                <label>To Date (End Date)</label>
                                                <input type="date" name="end_date" value="{{ Request()->end_date }}" class="form-control">
                                            </div>
                                            
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-primary" style="margin-top: 30px;" type="submit">Search</button>
                                                <a href="{{ url('admin/departments') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                             
                            @include('_message')
                            <div class="card">
                             <div class="card-header">
                               <h3 class="card-title">Danh Sách Phòng ban</h3>
                             </div>
                             <div class="card-body p-0">
                               <table class="table table-striped">
                                 <thead>
                                   <tr>
                                     <th>ID</th>
                                     <th>Tên phòng</th>
                                     <th>Tên quản lý</th>
                                     <th>Vị trí</th>
                                     <th>Ngày tạo</th>
                                     <th>Hành động</th>
                                     
                                   </tr>
                                 </thead>
                                 <tbody>
                                    @forelse($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->department_name }}</td>
                                        <td>
                                            @if($value->manager_id == 1)
                                             Thông
                                            @else
                                              Thông 2
                                            @endif

                                        </td>
                                        <td>{{ $value->street_address }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/departments/edit/' . $value->id) }}" class="btn btn-primary">Edit</a>

                                            <a href="{{ url('admin/departments/delete/' . $value->id) }}" class="btn btn-danger" 
                                               onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                             
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100%">No Record Found.</td>
                                    </tr>
                                    @endforelse
                                    
                                    
                                   
                                 </tbody>
                               </table>
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