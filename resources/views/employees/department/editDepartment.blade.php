@extends('employees.master.master')
@section('title','Department')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chỉnh sửa phòng ban</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Department</li>
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
                                    <h3 class="card-title">Chỉnh sửa phòng ban</h3>
                                </div>

                                <form method="post" role="form" >
                                    @csrf
                                    <div>
                                     
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputText1">Tên phòng ban</label>
                                                <input type="text" class="form-control" id="exampleInputText1" name="department_name" placeholder="Nhập phòng ban..." value="{{ $department_id->department_name }}">
                                                {!! show_error($errors,'department_name') !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputNumber1">Hệ số lương</label>
                                                <input type="number" step="0.001" class="form-control" id="exampleInputNumber1" name="coefficient_salary" placeholder="Hệ số lương..." value="{{ $department_id->salary_coefficient }}">
                                                {!! show_error($errors,'coefficient_salary') !!}
                                            </div>                       
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" style="float: right;">Chỉnh sửa</button>
                                        </div>
                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>

                </div>

            </section>
@endsection
      