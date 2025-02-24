@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Manager</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản lý </li>
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
                            <h3 class="card-title">Thêm Quản Lý</h3>
                        </div>
                        <form  class="form-horizontai" method="post" accept="admin/manager/add"  enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Tên quản lý <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{old('manager_name')}}" name="manager_name" class="form-control" required placeholder="Nhập Tên Quản Lý">

                                </div>
                                <span style="color: red;">{{ $errors->first('manager name') }}</span>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-lable">Email quản lý <span style="color: red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="email" value="{{old('manager_email')}}" name="manager_email" class="form-control" required placeholder="Nhập Email Quản Lý">
    
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">SĐT quản lý <span style="color: red">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{old('manager_mobile')}}" name="manager_mobile" class="form-control" required placeholder="Nhập SĐT Quản Lý">
        
                                        </div>
                                    </div>

                            


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" onclick="return validateSalary()">Thêm</button>
                            <a href="{{url('admin/manager')}}" class="btn btn-default float-right">Thoát</a>
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