@extends('employees.master.master')
@section('title','Bonus')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Bonus</h1>
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
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Bonus</h3>
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
                                            <label>Chọn thông tin thưởng</label>
                                            <select class="form-control" name="bonus_reason">
                                              <option selected="selected" value="">---Choose---</option>
                                              @foreach ($bonus_detail as $row)
                                                  <option value="{{ $row->bonus_id }}">{{ $row->bonus_reason }}</option>
                                              @endforeach
                                              
                                             
                                            </select>
                                        </div>
                                        {!! show_error($errors,'bonus_reason') !!}

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