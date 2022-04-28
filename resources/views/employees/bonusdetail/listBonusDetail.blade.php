@extends('employees.master.master')
@section('title','Bonus')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thông tin thưởng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Bonus</li>
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
                                    <h3 class="card-title">Thông tin thưởng</h3>
                                    <a href="/admin/add-bonus-detail" class="btn btn-primary" style="float: right;">Thêm mới</a>

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
                                                <th>Loại thưởng</th>
                                                <th style="width:200px">Tiền thưởng(VNĐ)</th>
                                                <th style="width: 70px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($bonus_detail_count==0)
                                                <tr>
                                                    <td colspan="4">Thông tin thưởng trống!</td>
                                                </tr>
                                            @else
                                            <?php $i=1;?>
                                            @foreach ($bonus_detail as $row)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $row->bonus_reason }}</td>
                                                    <td>{{ $row->bonus }}</td>
                                                   
                                                    <td>
                                                        <a href="/admin/edit-bonus-detail/{{ $row->bonus_id }}" class="fas fa-edit" title="Sửa"></a>
                                                        <a href="/admin/delete-bonus-detail/{{ $row->bonus_id }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="fas fa-trash-alt" title="Xóa"></a>
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