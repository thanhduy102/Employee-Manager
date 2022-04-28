@extends('employees.master.master')
@section('title','Contract')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thông tin hợp đồng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Contract</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Hợp đồng nhân viên</h3>
                                    <a href="/admin/add-contract" class="btn btn-primary" style="float: right;">Thêm mới</a>

                                </div>
                                <div>
                                    
                                    <table class="table_data_search">
                                        <tbody class="tbd_data_search" style="display:flex;">
                                            <tr id="filter_col1" data-column="0" style="display:none;">
                                                <td>#</td>
                                                <td align="center"><input type="text" class="column_filter" id="col0_filter"></td>
                                            </tr>
                                            <tr id="filter_col2" data-column="1">
                                                <td>Mã nhân viên:</td>
                                                <td align="center"><input type="text" class="column_filter" id="col1_filter"></td>
                                            </tr>
                                            <tr id="filter_col3" data-column="2">
                                                <td>Mã hợp đồng:</td>
                                                <td align="center"><input type="text" class="column_filter" id="col2_filter"></td>
                                            </tr>
                                            <tr id="filter_col4" data-column="3">
                                                <td>Tên nhân viên:</td>
                                                <td align="center"><input type="text" class="column_filter" id="col3_filter"></td>
                                            </tr>
                                            {{-- <tr id="filter_col9" data-column="8">
                                                <td>Tình trạng:</td>
                                                <td align="center">
                                                    <select class="column_filters" id="col8_filter">
                                                        <option value="Hết hạn">Hết hạn</option>
                                                        <option value="Còn hạn">Còn hạn</option>
                                                    </select>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if (session("thongbao"))
                                    <div class="alert alert-success" id="alert_noti" role="alert">
                                        <strong>{{ session("thongbao") }}</strong>
                                    </div>
                                    @endif
                                    <table class="table table-bordered" id="table_id">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Mã nhân viên</th>
                                                <th>Mã hợp đồng</th>
                                                <th>Tên nhân viên</th>
                                                <th>Giới tính</th>
                                                <th>Loại hợp đồng</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Tình trạng</th>
                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($contractCount==0)
                                                <tr>
                                                    <td colspan="8">Danh sách đang trống!</td>
                                                </tr>
                                            @else
                                            <?php $i=0;?>
                                                @foreach ($contract as $row)
                                            
                                                    <tr title="Còn <?php if($row->expiration_day>$date) { echo $array[$i]; } else {echo '0';} ?> ngày">
                                                        
                                                        <td>{{ $i=$i+1 }}</td>
                                                        <td>{{ $row->employee_id }}</td>
                                                        <td>{{ $row->contract_id }}</td>
                                                        <td>{{ $row->full_name }}</td>
                                                        <td>{{ $row->gender }}</td>
                                                        <td>{{ $row->type_contract }}</td>
                                                        <td>{{ $row->sign_day }}</td>
                                                        <td>{{ $row->expiration_day }}</td>
                                                        
                                                            @if($row->expiration_day>$date)
                                                            <td>
                                                                <span class="badge bg-success">Còn hạn</span>
                                                            </td>
                                                            @else
                                                            <td><span class="badge bg-danger">Hết hạn</span></td> 
                                                            @endif
                                                                                                     
                                                        <td>
                                                            <a href="/admin/edit-contract/{{ $row->contract_id }}" class="fas fa-edit" title="Sửa"></a>
                                                            <a href="/admin/delete-contract/{{ $row->contract_id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="fas fa-trash-alt" title="Xóa"></a>
                                                        </td>
                                                        
                                                        
                                                    </tr>
                                                
                                                    
                                                @endforeach
                                            @endif
                                         
                                          
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                {{-- <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
@endsection        