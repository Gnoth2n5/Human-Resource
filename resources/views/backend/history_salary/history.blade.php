@extends('backend.layouts.app')

@section('style')
    <style>
        .details {
            display: none;
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
        }

        .details.show {
            display: table-row;
            max-height: 200px;
            opacity: 1;
        }

        .details td {
            padding: 15px;
            background: #f8f9fa;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lịch sử lương</h1>
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
                                <h3 class="card-title">Lịch sử lương</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>UID</th>
                                            <th>Tên nhân viên</th>
                                            <th>Ngày nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $i = 1;
                                        @endphp

                                        @forelse ($getRecord as $val)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $val->user->uid }}</td>
                                                <td>{{ $val->user->full_name }}</td>
                                                <td>{{ $val->paid_at }}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" onclick="toggleDetails(this)">Xem
                                                        chi
                                                        tiết</button>
                                                    <a href="{{ url('admin/history-salary/delete/' . $val->id) }}"
                                                        onclick="return confirm('Bạn có chắc muốn xoá ?')"
                                                        class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>

                                            <tr class="details">
                                                <td colspan="4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><strong>Lương cơ bản:</strong>
                                                                {{ $val->salary->formatted_base_salary ?? 'N/A' }}</p>
                                                            <p><strong>Bonus:</strong> {{ $val->formatted_bonus ?? 'N/A' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="text-end"><strong>Tổng:</strong>
                                                        {{ $val->formatted_total_salary ?? 'N/A' }}</p>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">Không có dữ liệu</td>
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

@section('script')
    <script>
        function toggleDetails(button) {
            let detailsRow = button.closest('tr').nextElementSibling;
            detailsRow.classList.toggle('show');
        }
    </script>
@endsection
