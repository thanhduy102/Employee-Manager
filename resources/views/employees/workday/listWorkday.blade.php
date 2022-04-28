@extends('employees.master.master')
@section('title','Work Day')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thông tin ngày làm việc</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Simple Tables</li>
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
                                <form method="POST" role="form">
                                    {{ csrf_field() }}
                                <div class="card-header">
                                    <input type="number" class="form-control d-inline" name="year" id="year" style="width:70px;" placeholder="Year..." value="">
                                    {{-- <h3 class="card-title"></h3> --}}
                                    <span><button type="submit" name="submit0" value="submit0" class="btn btn-primary" style="margin-bottom: 4px;">Add</button></span>
                                    {!! show_error($errors,'year') !!}
                                    {{-- @if(session('thongbao'))
                                    <div class="alert alert-success" id="alert_noti" role="alert">
                                        <strong>{{ session("thongbao") }}</strong>
                                    </div>
                                    @endif --}}
                                </div>
                                </form>
                                {{-- <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div> --}}
                                <div class="card-header">
                                    <h3 class="card-title">Bordered Table</h3>
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
                                                <td align="center">
                                                    <select class="column_filter" id="col1_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($empolyees as $row)
                                                            <option value="{{ $row->employee_id }}">{{ $row->employee_id }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    {{-- <input type="text" class="column_filter" id="col1_filter"> --}}
                                                </td>
                                            </tr>

                                            <tr id="filter_col3" data-column="2">
                                                <td>Tên nhân viên:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col2_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($empolyees as $row)
                                                            <option value="{{ $row->full_name }}">{{ $row->full_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    {{-- <input type="text" class="column_filter" id="col1_filter"> --}}
                                                </td>
                                            </tr>

                                            <tr id="filter_col4" data-column="3" style="display:none;">
                                                <td>Mã hợp đồng:</td>
                                                <td align="center">
                                                 
                                                    <input type="text" class="column_filter" id="col3_filter">
                                                </td>
                                            </tr>
                                            <tr id="filter_col5" data-column="4" style="display:none;">
                                                <td>Tên nhân viên:</td>
                                                <td align="center"><input type="text" class="column_filter" id="col4_filter"></td>
                                            </tr>
                                            <tr id="filter_col6" data-column="5">
                                                <td>Chọn phòng ban:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col5_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($empolyees as $row)
                                                            <option value="{{ $row->department_name }}">{{ $row->department_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </td>
                                            </tr>
                                            <tr id="filter_col7" data-column="6" style="display:none;">
                                                <td>Tháng:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col6_filter">
                                                        <option value="" selected="selected">All</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>

                                                    </select>
                                                    {{-- <input type="text" class="column_filter" id="col6_filter"> --}}
                                                </td>
                                            </tr>
                                            <tr id="filter_col8" data-column="7" style="display:none;">
                                                <td>Tháng:</td>
                                                <td align="center"><input type="text" class="column_filter" id="col7_filter"></td>
                                            </tr>
                                            <tr id="filter_col9" data-column="8">
                                                <td>Tháng:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col8_filter">
                                                        <option value="" selected="selected">All</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>

                                                    </select>
                                                    {{-- <input type="text" class="column_filter" id="col8_filter"> --}}
                                                </td>
                                            </tr>
                                            <tr id="filter_col10" data-column="9">
                                                <td>Năm:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col9_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($years as $row)
                                                            <option value="{{ $row->salary_year }}">{{ $row->salary_year }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    
                                   
                                    <table class="table table-bordered" id="table_id">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Mã nhân viên</th>
                                                <th>Họ tên</th>
                                                <th>Chức vụ</th>
                                                <th>Trình độ</th>
                                                <th>Phòng ban</th>
                                                <th>Ngày làm</th>
                                                <th>Giờ làm</th>
                                                <th>Tháng</th>
                                                <th>Năm</th>
                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($work_day_count==0)
                                                <tr>
                                                    <td colspan="11">Danh sách trống!</td>
                                                </tr>
                                            @else
                                            <?php $i=1; ?>
                                                @foreach ($work_day as $row)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $row->employee_id }}</td>
                                                        <td>{{ $row->full_name }}</td> 
                                                        <td>{{ $row->position_name }}</td>
                                                        <td>{{ $row->level_name }}</td>
                                                        <td>{{ $row->department_name }}</td>
                                                        <td>{{ $row->day_worked }}</td>
                                                        <td>{{ $row->overtime }}</td>
                                                        <td>{{ $row->salary_month }}</td>
                                                        <td>{{ $row->salary_year }}</td>                                                
                                                        
                                                        <td>
                                                            <a href="/admin/edit-work-day/{{ $row->ordinal_id }}" class="fas fa-edit" title="Sửa"></a>
                                                            <a href="/admin/delete-work-day/{{ $row->ordinal_id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="fas fa-trash-alt" title="Xóa"></a>
                                                        </td>
                                            </tr>
                                                @endforeach
                                            @endif
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
 @endsection       