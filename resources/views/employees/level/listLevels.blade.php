@extends('employees.master.master')
@section('title','Level')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DANH SÁCH TRÌNH ĐỘ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Level</li>
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
                                    <h3 class="card-title">Danh sách trình độ</h3>
                                    <a href="/admin/add-level" class="btn btn-primary" style="float: right;">Thêm mới</a>

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
                                                <th>Tên chức vụ</th>
                                                <th style="width:200px">Hệ số lương</th>
                                                <th style="width: 70px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($listLevelCount==0)
                                            <tr>
                                                <td colspan="4" class="text-danger">Danh sách chức vụ trống</td>
                                            </tr>
                                            @else
                                            <?php $i=1;?>
                                            @foreach ($listLevel as $row)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $row->level_name }}</td>
                                                    <td>{{ $row->coefficient_salary }}</td>
                                                    <td>
                                                        <a href="/admin/edit-level/{{ $row->level_id }}" class="fas fa-edit"></a>
                                                        <a href="/admin/delete-level/{{ $row->level_id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="fas fa-trash-alt"></a>
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
  