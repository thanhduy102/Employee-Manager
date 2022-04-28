@extends('employees.master.master')
@section('title','Fine')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Fine</h1>
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
                                            <label for="exampleInputName">Chọn nhân viên</label>
                                            <input type="text" class="form-control" id="exampleInputName" name="employee_id" value="{{ $employee->employee_id }} - {{ $employee->full_name }}" disabled >

                                            {{-- <select class="form-control select2" name="employee">
                                              <option selected="selected" value="">---Choose---</option>
                                            @foreach ($employee as $row)
                                                <option value="{{ $row->employee_id }}" {{ $row->employee_id==$fine_info->employee_id ? 'selected' : ''}}>{{ $row->employee_id }} - {{ $row->full_name }}</option>
                                            @endforeach
                                            </select> --}}
                                        </div>

                                        <div class="form-group">
                                            <label>Chọn thông tin phạt</label>
                                            <select class="form-control" name="fine_reason">
                                              <option selected="selected" value="">---Choose---</option>
                                              @foreach ($fine_detail as $row)
                                                  <option value="{{ $row->fine_id }}" {{ $row->fine_id==$fine_info->fine_id ? 'selected' : '' }}>{{ $row->fine_reason }}</option>
                                              @endforeach
                                              
                                             
                                            </select>
                                        </div>
                                        {!! show_error($errors,'fine_reason') !!}

                                        <div class="form-group">
                                            <label>Tháng</label>
                                            <select class="form-control" name="month">
                                              <option selected="selected" value="">---Choose---</option>
                                              <option value="1" {{ $salaryMonth->salary_month=="1" ? 'selected' : '' }}>1</option>
                                              <option value="2" {{ $salaryMonth->salary_month=="2" ? 'selected' : '' }}>2</option>
                                              <option value="3" {{ $salaryMonth->salary_month=="3" ? 'selected' : '' }}>3</option>
                                              <option value="4" {{ $salaryMonth->salary_month=="4" ? 'selected' : '' }}>4</option>
                                              <option value="5" {{ $salaryMonth->salary_month=="5" ? 'selected' : '' }}>5</option>
                                              <option value="6" {{ $salaryMonth->salary_month=="6" ? 'selected' : '' }}>6</option>
                                              <option value="7" {{ $salaryMonth->salary_month=="7" ? 'selected' : '' }}>7</option>
                                              <option value="8" {{ $salaryMonth->salary_month=="8" ? 'selected' : '' }}>8</option>
                                              <option value="9" {{ $salaryMonth->salary_month=="9" ? 'selected' : '' }}>9</option>
                                              <option value="10" {{ $salaryMonth->salary_month=="10" ? 'selected' : '' }}>10</option>
                                              <option value="11" {{ $salaryMonth->salary_month=="11" ? 'selected' : '' }}>11</option>
                                              <option value="12" {{ $salaryMonth->salary_month=="12" ? 'selected' : '' }}>12</option>
                                            </select>
                                        </div>
                                        {!! show_error($errors,'month') !!}

                                        <div class="form-group">
                                            <label>Năm</label>
                                            <select class="form-control" name="year">
                                              <option selected="selected" value="">---Choose---</option>
                                              @foreach ($year as $row)
                                                  <option value="{{ $row->year_id }}" {{ $row->year_id==$salaryMonth->year_id ? 'selected' : ''}}>{{ $row->salary_year }}</option>
                                              @endforeach
                                              
                                              
                                            </select>
                                        </div>
                                      
                                        {!! show_error($errors,'year') !!}

                                    </div>
                                
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" style="float:right;">Cập nhật</button>
                                    </div>
                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>

                </div>

            </section>

@endsection   