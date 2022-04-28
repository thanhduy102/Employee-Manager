@extends('employees.master.master')
@section('title','Level')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chỉnh sửa trình độ</h1>
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
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Chỉnh sửa trình độ</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputText1">Tên cấp độ</label>
                                                <input type="text" class="form-control" id="exampleInputText1" name="txt_level" placeholder="Nhập trình độ..." value="{{ $level_id->level_name }}">
                                                {!! show_error($errors,'txt_level') !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputNumber1">Hệ số lương</label>
                                                <input type="number" step="0.1" class="form-control" id="exampleInputNumber1" name="txt_hesoluong" placeholder="Hệ số lương..." value="{{ $level_id->coefficient_salary }}">
                                                {!! show_error($errors,'txt_hesoluong') !!}
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
        