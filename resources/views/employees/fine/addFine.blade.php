@extends('employees.master.master')
@section('title','Fine')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Fine</h1>
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
                                    <h3 class="card-title">Add Fine</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>
                                    <div class="card-body">
                                      
                                        <div class="form-group">
                                            <label>Chọn nhân viên</label>
                                            <select class="form-control select2" name="employee">
                                              <option selected="selected" value="">---Choose---</option>
                                            @foreach ($employee as $row)
                                                <option value="{{ $row->employee_id }}">{{ $row->employee_id }} - {{ $row->full_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        {!! show_error($errors,'employee') !!}

                                        <div class="form-group">
                                            <label>Chọn thông tin phạt</label>
                                            <select class="form-control" name="fine_reason">
                                              <option selected="selected" value="">---Choose---</option>
                                              @foreach ($fine_detail as $row)
                                                  <option value="{{ $row->fine_id }}">{{ $row->fine_reason }}</option>
                                              @endforeach
                                              
                                             
                                            </select>
                                        </div>
                                        {!! show_error($errors,'fine_reason') !!}

                                        <div class="form-group">
                                            <label>Tháng</label>
                                            <select class="form-control" name="month">
                                              <option selected="selected" value="">---Choose---</option>
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
                                        </div>
                                        {!! show_error($errors,'month') !!}

                                        <div class="form-group">
                                            <label>Năm</label>
                                            <select class="form-control" name="year">
                                              <option selected="selected" value="">---Choose---</option>
                                              @foreach ($year as $row)
                                                  <option value="{{ $row->year_id }}">{{ $row->salary_year }}</option>
                                              @endforeach
                                              
                                              
                                            </select>
                                        </div>
                                      
                                        {!! show_error($errors,'year') !!}

                                    </div>
                                
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" style="float:right;">Thêm mới</button>
                                    </div>
                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>

                </div>

            </section>

@endsection   