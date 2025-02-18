@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Jobs</h1>
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Sửa Việc Làm</h3>
                        </div>
                        <form  class="form-horizontai" method="post" action="{{ url('admin/jobs/edit/'. $getRecord->id) }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Tiêu Đề Việc Làm <span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$getRecord->job_titlle}}" name="job_titlle" class="form-cpntrol" required placeholder="Nhập Tiêu Đề Việc Làm">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Mức Lương Tối Thiểu<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->min_salary}}" name="min_salary" class="form-cpntrol" required placeholder="Nhập Mức Lương Tối Thiểu" id="min_salary">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-lable">Mức Lương Tối Đa<span style="color: red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" value="{{$getRecord->max_salary}}" name="max_salary" class="form-cpntrol" required placeholder="Nhập Mức Lương Tối Đa" id="max_salary">

                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary" onclick="return validateSalary()">Sửa</button>
                            <a href="{{url('admin/jobs')}}" class="btn btn-default float-right">Thoát</a>
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