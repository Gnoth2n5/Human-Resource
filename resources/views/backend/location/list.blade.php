@extends('backend.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Địa điểm</main></h1>
          </div><!-- /.col -->
          <form action="{{ url('admin/locations_export') }}" method="get">
            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">
        
            <a href="{{ url('admin/locations_export?start_date='.Request()->start_date.'&end_date='.Request()->end_date) }}" 
               class="btn btn-success">Excel Export</a>
        </form>
        
          <div class="col-sm-6" style="text-align: right">
            <a href="{{url('admin/locations/add')}}" class="btn btn-primary">Thêm Địa Điểm</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
       
        <div class="row">
            <section class="col-md-12">
                {{-- {Search start} --}}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Location</h3>
                    </div>
                
                    <form action="" method="get">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-1">
                                    <label>ID</label>
                                    <input type="text" name="id" id="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                </div>
                
                                <div class="form-group col-md-2">
                                    <label>Địa chỉ đường</label>
                                    <input type="text" name="street_address" class="form-control" value="{{ Request()->street_address }}" placeholder="Nhập đại chỉ đường">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Mã bưu điện</label>
                                    <input type="text" name="postal_code" class="form-control" value="{{ Request()->postal_code }}" placeholder="Mã bưu điện">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Thành phố</label>
                                    <input type="text" name="city" class="form-control" value="{{ Request()->city }}" placeholder="Nhập thành phố">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Tỉnh</label>
                                    <input type="text" name="state_province" class="form-control" value="{{ Request()->state_province }}" placeholder="Nhập tỉnh">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Tên quốc gia</label>
                                    <input type="text" name="country_name" class="form-control" 
                                           value="{{ Request()->country_name }}" placeholder="Tên quốc gia">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Created At</label>
                                    <input type="date" value="{{ Request()->created_at }}" name="created_at" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Update At</label>
                                    <input type="date" value="{{ Request()->update_at }}" name="update_at" class="form-control">
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>From Date (Start Date)</label>
                                    <input type="date" value="{{ Request()->start_date }}" name="start_date" class="form-control">
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label>To Date (End Date)</label>
                                    <input type="date" value="{{ Request()->end_date }}" name="end_date" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 15px">Tìm kiếm</button>
                                    <a href="{{ url('admin/locations') }}" class="btn btn-success" style="margin-top: 15px">Khôi phục</a>
                                  </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
                
                {{-- {Search end} --}}

                @include('_message')
                <div class="card">
                 <div class="card-header">
                   <h3 class="card-title">Danh Sách địa điểm</h3>
                 </div>
                 <div class="card-body p-0">
                   <table class="table table-striped">
                     <thead>
                       <tr>
                         <th>ID</th>
                         <th>Tên đường</th>
                         <th>Mã bưu điện</th>
                         <th>Thành phố</th>
                         <th>Tỉnh</th>
                         <th>Mã quốc gia</th>
                         <th>Ngày tạo</th>
                         <th>Ngày cập nhật</th>
                         <th>Hành động</th>
                       </tr>
                     </thead>
                     <tbody>
                        @forelse($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->street_address }}</td>
                            <td>{{ $value->postal_code }}</td>
                            <td>{{ $value->city }}</td>
                            <td>{{ $value->state_province }}</td>
                            <td>{{ $value->country_name }}/{{ $value->country_id }}</td>
                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                            <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                            <td>
                            <a href="{{ url('admin/locations/edit', $value->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            </td>
                            <td>
                            <a href="{{ url('admin/locations/delete', $value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn x')">Sửa</a>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="100%">No Record Found.</td>
                        </tr>
                        @endforelse
                        
                       
                     </tbody>
                   </table>
                   

                   </div>
                   {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                 </div>
                </div>
           </section>
       </div>
   </div>

</section>
</div>
<!-- /.content-wrapper -->
@endsection