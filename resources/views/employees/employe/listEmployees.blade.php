@extends('employees.master.master')
@section('title','Employee')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thông tin nhân viên</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thông tin nhân viên</li>
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
                                    <h3 class="card-title">Danh sách nhân viên</h3>
                                    <a href="/admin/add-employee" class="btn btn-primary" style="float: right;">Thêm mới</a>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if(session('thongbao'))
                                    <div class="alert alert-success" id="alert_noti" role="alert">
                                        <strong>{{ session("thongbao") }}</strong>
                                    </div>
                                    @endif
                                    <table class="table table-bordered" id="table_id">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Mã nhân viên</th>
                                                <th>Tên nhân viên</th>
                                                <th>Giới tính</th>
                                                <th>Trình độ</th>
                                                <th>Chức vụ</th>
                                                <th>Phòng ban</th>
                                                <th style="width: 40px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($empolyeeCount==0)
                                                <tr>
                                                    <td colspan="7">Danh sách nhân viên trống!</td>
                                                </tr>
                                            @else
                                            <?php $i=1;?>
                                                @foreach ($empolyee as $row)
                                                   <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $row->employee_id }}</td>
                                                        <td>{{ $row->full_name }}</td>
                                                        <td>{{ $row->gender }}</td>
                                                        <td>{{ $row->level_name }}</td>
                                                        <td>{{ $row->position_name }}</td>
                                                        <td>{{ $row->department_name }}</td>
                                                        <td>
                                                            <a href="/admin/edit-employee/{{ $row->employee_id }}" class="fas fa-edit" title="Sửa"></a>
                                                            <a href="/admin/delete-employee/{{ $row->employee_id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="fas fa-trash-alt" title="Xóa"></a>
                                                        </td>
                                                    </tr> 
                                                @endforeach
                                            @endif
                                            
                                           
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