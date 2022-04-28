@extends('employees.master.master')
@section('title','Fine')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>UPDATE FINE</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Fine</li>
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
                                    <h3 class="card-title">Update Fine</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputText1">Fine Name</label>
                                                <input type="text" class="form-control" id="exampleInputText1" name="txt_finename" placeholder="Thông tin phạt..." value="{{ $fine_id->fine_reason }}">
                                                {!! show_error($errors,'txt_finename') !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputNumber1">Tiền phạt</label>
                                                <input type="number" class="form-control" id="exampleInputNumber1" name="txt_fine" placeholder="Số tiền..." value="{{ $fine_id->fine }}">
                                                {!! show_error($errors,'txt_fine') !!}
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
       