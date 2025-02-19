@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm vị trí</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vị trí </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Vị Trí</h3>
                        </div>
                        <form  class="form-horizontai" method="post" accept="admin/locations/add" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Địa chỉ đường <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('street_address')}}" name="street_address" class="form-cpntrol" required placeholder="Nhập Đường">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Mã bưu điện<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{old('postal_code')}}" name="postal_code" class="form-cpntrol" required placeholder="Nhập Mã Bưu Điện">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Thành phố<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('city')}}" name="city" class="form-cpntrol" required placeholder="Nhập Thành Phố">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Tỉnh<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('	state_province')}}" name="	state_province" class="form-cpntrol" required placeholder="Nhập tỉnh">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable"> Tên quốc gia <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                   <select name="countries_id"  class="form-control" required>
                                    <option value="">Chọn quốc gia</option>
                                    @foreach($getCountries as $countries)
                                    <option value="{{ $countries->id }}">{{ $countries->country_name }}</option>
                                @endforeach                              
                                   </select>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{url('admin/locations')}}" class="btn btn-default float-right">Thoát</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-header -->

</div>
<!-- /.content-wrapper -->
@endsection