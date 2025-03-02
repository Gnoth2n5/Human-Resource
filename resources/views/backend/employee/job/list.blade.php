@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Công việc</h1>
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
                                <h3 class="card-title">Danh Sách Việc Làm</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>*</th>
                                            <th>Tiêu Đề Việc Làm</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $value->job->title }}</td>
                                                <td>{{ $value->job->start_at }}</td>
                                                <td>{{ $value->job->end_at }}</td>
                                                <td>
                                                    @if ($value->status == 'pending')
                                                        <span class="badge badge-success">Đang chờ</span>
                                                    @elseif ($value->status == 'in_progress')
                                                        <span class="badge badge-danger">Đang được làm</span>
                                                    @elseif ($value->status == 'completed')
                                                        <span class="badge badge-primary">Đã hoàn thành</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->status == 'in_progress')
                                                        <a href="{{ url('employee/my_jobs/view/' . $value->id) }}"
                                                            class="btn btn-info btn-sm">Xác nhận hoàn thành</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" style="text-align: center;">Không tìm thấy dữ liệu</td>
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
