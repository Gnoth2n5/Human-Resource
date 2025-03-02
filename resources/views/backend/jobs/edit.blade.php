@extends('backend.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cập nhật công việc</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
                        </ol>
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
                                <h3 class="card-title">Cập nhật Việc Làm</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/jobs/update', $job->id) }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                        
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tiêu Đề Việc Làm <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('title', $job->title) }}" name="title"
                                                class="form-control" required placeholder="Nhập Tiêu Đề Việc Làm">
                                            <span style="color: red">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mô tả</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" rows="4" class="form-control" placeholder="Nhập mô tả">{{ old('description', $job->description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thời gian bắt đầu <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ old('start_at', $job->start_at) }}"
                                                name="start_at" class="form-control" required>
                                            <span style="color: red">{{ $errors->first('start_at') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thời gian kết thúc <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ old('end_at', $job->end_at) }}" name="end_at"
                                                class="form-control" required>
                                            <span style="color: red">{{ $errors->first('end_at') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phân công <span
                                                style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="assign" class="form-control">
                                                <option value="">Chọn người phân công</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user['id'] }}"
                                                        {{ $assign->first() == $user['id'] ? 'selected' : '' }}>
                                                        {{ $user['display'] }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red">{{ $errors->first('assign') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="{{ url('admin/jobs') }}" class="btn btn-default float-right">Thoát</a>
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
