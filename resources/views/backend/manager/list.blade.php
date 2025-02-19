@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ url('admin/manager/add') }}" class="btn btn-primary mx-2">Thêm quản lý</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">
                        {{-- Search box start --}}  
                        <div class="card">  
                     <div class="card-header">  
                        <h3 class="card-title">Search Manager</h3>  
                    </div>  
                    <form method="get" action="">  
                        <div class="card-body">  
                            <div class="row">  
                                <div class="form-group col-md-2">  
                                    <label>ID</label>  
                                    <input type="text" name="id" class="form-control" placeholder="Enter ID">  
                                </div>  
                                
                                <div class="form-group col-md-2">  
                                    <label>Manager Name</label>  
                                    <input type="text" name="manager_name" class="form-control" placeholder="Enter Manager Name">  
                                </div>
                                <div class="form-group col-md-2">  
                                    <label>Manager Email</label>  
                                    <input type="text" name="manager_email" class="form-control" placeholder="Enter Manager Email">  
                                </div>  
                                
                                <div class="form-group col-md-2">  
                                    <label>Manager Mobile</label>  
                                    <input type="number" name="manager_mobile" class="form-control" placeholder="Enter Manager Email">  
                                </div>
                                <div class="form-group col-md-2">  
                                    <button class="btn btn-primary" type="submit" style="magin-top: 30px;">Search</button>  
                                    <a href="{{ url('admin/manager') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>  
                                </div>
                                
                            </div>  
                        </div>  
                    </form>  
                            </div>  
                            {{-- Search box end --}}

                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh Sách Quản Lý/h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>*</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                             <th>Sđt</th>
                                            <th>Hành động</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->manager_name }}</td>
                                            <td>{{ $value->manager_email }}</td>
                                            <td>{{ $value->manager_mobile }}</td>
                                            <td>
                                                <a href="{{ url('admin/manager/edit/' . $value->id) }}" class="btn btn-primary">Sửa</a>
                                                <a href="{{ url('admin/manager/delete/' . $value->id) }}" class="btn btn-danger">Xóa</a>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="100%">No Record Found.</td>
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
    </div>
    <!-- /.content-wrapper -->
@endsection
