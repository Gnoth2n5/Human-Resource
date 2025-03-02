@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Xem chi tiết</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Xem</h3>
                            </div>
                            <form class="form-horizontai" method="post" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Tiêu Đề Việc Làm<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->title }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Mô tả<span
                                                style="color: red">*</span></label>
                                        <textarea name="" id="" class="form-control" cols="100" rows="5" disabled>{{ $getRecord->description }}</textarea>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Ngày bắt đầu<span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y', strtotime($getRecord->start_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Ngày kết thúc <span
                                                style="color: red"></span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y', strtotime($getRecord->end_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Người nhận <span
                                                style="color: red"></span></label>
                                        <div class="col-sm-10">
                                            @if ($getRecord->assignedUsers->isEmpty())
                                                <p class="text-muted">Chưa có người nhận</p>
                                            @else
                                                @foreach ($getRecord->assignedUsers as $item)
                                                    <p>{{ $item->full_name }} ({{ $item->department->name ?? 'Không có phòng ban' }})</p>
                                                @endforeach
                                                {{-- <p>{{ $getRecord->assignedUsers->first()->name }}</p> --}}
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a href="{{ url('admin/jobs') }}" class="btn btn-default float-right">Thoát</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
