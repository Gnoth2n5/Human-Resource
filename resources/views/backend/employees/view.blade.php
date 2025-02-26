@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Employees</h1>
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
                        <form  class="form-horizontai" method="post"  enctype="multipart/form-data">
                            
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">UID <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    {{$getRecord->uid}}
                                </div>
                            </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Họ và tên<span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->full_name}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Email <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->email}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Số điện thoại <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->phone_number}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Avatar <span style="color: red;"> </span></label>
                                    <div class="col-sm-10">
                                        @if(!empty($getRecord->avatar))
                                            @if(file_exists('upload/'.$getRecord->profile_image))
                                                <img src="{{ url('upload/'.$getRecord->avatar) }}" 
                                                     style="height: 80; width: 80px;">
                                            @endif
                                        @endif
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Địa chỉ <span style="color: red"></span></label>
                                    <div class="col-sm-10">
                                        {{$getRecord->address}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{url('admin/employees')}}" class="btn btn-default float-right">Thoát</a>
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