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

        .status-normal {
            color: black;
        }

        .status-warning {
            color: orange;
        }

        .status-danger {
            color: red;
            font-weight: bold;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ !empty('$getJobWorkWithEmployee') ? $getJobWorkWithEmployee : '0' }}</h3>

                                <p>Công việc đang làm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>

                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h5>Phòng ban: {{ $getDepartment->department->name }}</h5>

                                <p>Vị trí: {{ $getDepartment->department->location }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Danh sách công việc</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tiêu đề</th>
                                            <th>Bắt đầu</th>
                                            <th>Deadline</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jobTableBody">

                                        @php
                                            $i = 1;
                                        @endphp

                                        @forelse ($jobs as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->job->title}}</td>
                                                <td>{{$item->job->start_at}}</td>
                                                <td class="end-date" data-end="{{$item->job->end_at}}">{{$item->job->end_at}}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm"
                                                        onclick="toggleDetails(this)">Xem</button>
                                                </td>
                                            </tr>
                                            <tr class="details">
                                                <td colspan="5">
                                                    <p>Chi tiết công việc: {{$item->job->description}}</p>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">Không có công việc nào</td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                </table>
                                <div class="" style="padding: 10px; float: right;">
                                    {!! $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
@endsection

@section('script')
    <script>
        function toggleDetails(button) {
            let detailsRow = button.closest('tr').nextElementSibling;
            detailsRow.classList.toggle('show');
        }

        function updateEndDateStatus() {
            const today = new Date();
            document.querySelectorAll('.end-date').forEach(td => {
                const endDate = new Date(td.getAttribute('data-end'));
                const diffDays = Math.ceil((endDate - today) / (1000 * 60 * 60 * 24));

                if (diffDays <= 3) {
                    td.classList.add('status-danger');
                } else if (diffDays <= 7) {
                    td.classList.add('status-warning');
                } else {
                    td.classList.add('status-normal');
                }
            });
        }

        document.addEventListener("DOMContentLoaded", updateEndDateStatus);
    </script>
@endsection
