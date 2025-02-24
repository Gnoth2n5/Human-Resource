@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm chức vụ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Chức vụ </li>
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
                            <h3 class="card-title">Sửa chức vụ</h3>
                        </div>
                        <form  class="form-horizontai" method="post" accept="admin/position/edit"  enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Tên chức vụ<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$getRecord->position_name}}" name="position_name" class="form-control" required placeholder="Nhập Tên Chức Vụ">
                                </div>
                                <span style="color: red;">{{ $errors->first('position_name') }}</span>
                            </div> <!-- Đóng div bị thiếu -->

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Ngày làm trong tháng <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->working_days_per_month}}" name="working_days_per_month" class="form-control" required placeholder="Nhập Ngày làm trong tháng">
                                </div>
                            </div> <!-- Đóng div bị thiếu -->

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Lương theo ngày <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->daily_rate}}" name="daily_rate" class="form-control" required placeholder="Nhập Lương Theo Ngày">
                                </div>
                            </div> <!-- Đóng div bị thiếu -->

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Lương Theo tháng <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->monthly_rate}}" name="monthly_rate" class="form-control" required placeholder="Nhập Lương Theo Tháng">
                                </div>
                            </div> <!-- Đóng div bị thiếu -->

                        </div> <!-- Đóng div card-body bị thiếu -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" onclick="return validateSalary()">Cập nhật</button>
                            <a href="{{url('admin/position')}}" class="btn btn-default float-right">Thoát</a>
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
<script>
function validateSalary() {
    const minSalary = parseFloat(document.getElementById('min_salary').value);
    const maxSalary = parseFloat(document.getElementById('max_salary').value);
    if (minSalary > maxSalary) {
        alert('Mức lương tối thiểu không được lớn hơn mức lương tối đa.');
        return false;
    }
    return true;
}
</script>
@endsection
