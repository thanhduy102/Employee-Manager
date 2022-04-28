@extends('employees.master.master')
@section('title','Position')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Danh sách chức vụ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Position</li>
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
                                    <h3 class="card-title">Danh sách chức vụ</h3>
                                    <a href="/admin/add-position" class="btn btn-primary" style="float: right;">Thêm mới</a>

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
                                                <th style="width:200px">Lương cơ bản (VNĐ)</th>
                                                <th style="width: 70px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            @if ($positionCount==0)
                                                <tr>
                                                    <td colspan="4">Danh sách chức vụ đang trống!</td>
                                                </tr>
                                            @else
                                                @foreach ($position as $row)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $row->position_name }}</td>
                                                    <td>{{ $row->basic_salary }}</td>
                                                    <td>
                                                        <a href="/admin/edit-position/{{ $row->position_id }}" class="fas fa-edit" title="Sửa"></a>
                                                        <a href="/admin/delete-position/{{ $row->position_id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="fas fa-trash-alt" title="Xóa"></a>
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