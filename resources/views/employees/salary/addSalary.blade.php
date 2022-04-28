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
                                                <td>Chọn phòng ban:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col1_filter">
                                                        <option value="" selected="selected">All</option>
                                                        @foreach ($department as $row)
                                                            <option value="{{ $row->department_name }}">{{ $row->department_name }}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </td>
                                            </tr>

                                           

                                            <tr id="filter_col3" data-column="2" >
                                                <td>Tháng:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col2_filter">
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
                                                </td>
                                            </tr>
                                            <tr id="filter_col4" data-column="3">
                                                <td>Năm:</td>
                                                <td align="center">
                                                    <select class="column_filter" id="col3_filter">
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
                                                <th>Phòng ban</th>
                                                <th style="width:100px">Tháng</th>
                                                <th style="width:100px">Năm</th>
                                               
                                                <th style="width:100px">Tổng tiền</th>
                                                
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            <?php $j=0; ?>
                                            @foreach ($workk as $row)
                                           
                                                <tr>
                                                    <td>{{ $i=$i+1 }}</td>
                                                    <td>{{ $row->department_name }}</td>
                                                    
                                                    <td>{{ $row->salary_month }}</td>
                                                    <td>{{ $row->salary_year }}</td>
                                                    <td>{{ $mang[$j] }} VNĐ</td>
                                                </tr>
                                                <?php $j++;?>
                                            @endforeach

                                           
                                            
                                          
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
 @endsection       