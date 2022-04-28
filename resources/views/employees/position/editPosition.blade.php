@extends('employees.master.master')
@section('title','Position')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chỉnh sửa chức vụ</h1>
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
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Chỉnh sửa chức vụ</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputText1">Tên chức vụ</label>
                                                <input type="text" class="form-control" id="exampleInputText1" name="txt_position" placeholder="Nhập chức vụ..." value="{{ $position_id->position_name }}">
                                                {!! show_error($errors,'txt_position') !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputNumber1">Lương cơ bản</label>
                                                <input type="number" class="form-control" id="exampleInputNumber1" name="txt_basicsalary" placeholder="Lương cơ bản..." value="{{ $position_id->basic_salary }}">
                                                {!! show_error($errors,'txt_basicsalary') !!}
                                            </div>                       
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" style="float: right;">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>

                </div>

            </section>
@endsection
   