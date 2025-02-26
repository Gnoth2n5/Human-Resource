@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Interview</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">   
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-md-12">
                      

                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh Sách Interview</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>*</th>
                                            <th>Tên</th>
                                            <th>Lương</th>
                                            <th>Interview</th>
                                            <th>Ngày Tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $getRecord->id }}</td>
                                            <td>{{ $getRecord->name }}</td>
                                            <td>{{ $getRecord->salary }}</td>
                                            <td>
                                                @if($getRecord->interview == '0')
                                                    Cancel
                                                @elseif($getRecord->interview == '1')
                                                    Pending
                                                @elseif($getRecord->interview == '2')
                                                    Completed
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($getRecord->created_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($getRecord->created_at)) }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="" style="padding: 10px; float: right;">
                                    
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
