@extends('employees.master.master')
@section('title','Salary')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Simple Tables</h1>
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
                                                <td>Chọn chức vụ:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col3_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($empolyees as $row)
                                                            <option value="{{ $row->position_name }}">{{ $row->position_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </td>
                                            </tr>
                                            <tr id="filter_col5" data-column="4">
                                                <td>Chọn phòng ban:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col4_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($department as $row)
                                                            <option value="{{ $row->department_name }}">{{ $row->department_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </td>
                                            </tr>
                                            <tr id="filter_col6" data-column="5" style="display:none;">
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
                                                <td>Chọn phòng ban:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col6_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($empolyees as $row)
                                                            <option value="{{ $row->department_name }}">{{ $row->department_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    
                                                </td>
                                            </tr>

                                            <tr id="filter_col8" data-column="7" >
                                                <td>Tháng:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col7_filter">
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
                                            <tr id="filter_col9" data-column="8">
                                                <td>Năm:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col8_filter">
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
                                                <th>Tên nhân viên</th>
                                                <th>Chức vụ</th>
                                                <th>Phòng ban</th>
                                                <th>Ngày làm</th>
                                                <th>Giờ tăng ca</th>
                                                <th>Tháng</th>
                                                <th>Năm</th>
                                                <th>Tổng tiền</th>
                                                
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            <?php $j=0; ?>
                                            @foreach ($works as $row)
                                           
                                                <tr>
                                                    <td>{{ $i=$i+1 }}</td>
                                                    <td>{{ $row->employee_id }}</td>
                                                    <td>{{ $row->full_name }}</td>
                                                    <td>{{ $row->position_name }}</td>
                                                    <td>{{ $row->department_name }}</td>
                                                    <td>{{ $row->day_worked }}</td>
                                                    <td>{{ $row->overtime }}</td>
                                                    <td>{{ $row->salary_month }}</td>
                                                    <td>{{ $row->salary_year }}</td>
                                                    <td>{{ $array[$j] }} VNĐ</td>
                                                </tr>
                                                <?php $j++;?>
                                            @endforeach

                                           
                                            
                                          
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