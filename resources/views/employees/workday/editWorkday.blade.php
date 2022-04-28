@extends('employees.master.master')
@section('title','Edit Work Day')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Work Day</li>
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
                                    <h3 class="card-title">Update Work Day</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Họ tên</label>
                                            <input type="text" class="form-control" id="exampleInputName" value="{{ $work_day->full_name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPosition">Chức vụ</label>
                                            <input type="text" class="form-control" id="exampleInputPosition" value="{{ $work_day->position_name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputLevel">Trình độ</label>
                                            <input type="text" class="form-control" id="exampleInputLevel" value="{{ $work_day->level_name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputDepartment">Phòng ban</label>
                                            <input type="text" class="form-control" id="exampleInputDepartment" value="{{ $work_day->department_name }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="select_month">Tháng</label>
                                            <input type="number" disabled name="select_month" class="form-control" id="select_month" value="{{ $work_day->salary_month }}">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="select_year">Năm</label>
                                            <input type="number" disabled name="select_year" class="form-control" id="select_year" value="{{ $work_day->salary_year }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputDayWork">Ngày làm</label>
                                            <input type="number" name="txt_number_worked" class="form-control" id="exampleInputDayWork" value="{{ $work_day->day_worked }}">
                                        </div>
                                        {!! show_error($errors,'txt_number_worked') !!}

                                        <div class="form-group">
                                            <label for="exampleInputOverTime">Giờ làm</label>
                                            <input type="number" name="txt_number_overtime" class="form-control" id="exampleInputOverTime" value="{{ $work_day->overtime }}">
                                        </div>
                                        {!! show_error($errors,'txt_number_overtime') !!}

                                     
                                        



                                        {{-- <div class="form-group">
                                            <label for="exampleInputMonth">Tháng</label>
                                            <select name="select_month" class="form-control" id="exampleInputMonth" disabled>
                                                <option value="" selected>---Choose---</option>
                                                <option value="1" {{ $work_day->salary_month=="1" ? 'selected' : '' }} >1</option>
                                                <option value="2" {{ $work_day->salary_month=="2" ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ $work_day->salary_month=="3" ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ $work_day->salary_month=="4" ? 'selected' : '' }}>4</option>
                                                <option value="5" {{ $work_day->salary_month=="5" ? 'selected' : '' }}>5</option>
                                                <option value="6" {{ $work_day->salary_month=="6" ? 'selected' : '' }}>6</option>
                                                <option value="7" {{ $work_day->salary_month=="7" ? 'selected' : '' }}>7</option>
                                                <option value="8" {{ $work_day->salary_month=="8" ? 'selected' : '' }}>8</option>
                                                <option value="9" {{ $work_day->salary_month=="9" ? 'selected' : '' }}>9</option>
                                                <option value="10" {{ $work_day->salary_month=="10" ? 'selected' : '' }}>10</option>
                                                <option value="11" {{ $work_day->salary_month=="11" ? 'selected' : '' }}>11</option>
                                                <option value="12" {{ $work_day->salary_month=="12" ? 'selected' : '' }}>12</option>
                                            </select>
                                        </div>
                                        {!! show_error($errors,'select_month') !!}

                                        <div class="form-group">
                                            <label for="exampleInputYear">Năm</label>
                                            <select name="select_year" class="form-control" id="exampleInputYear" disabled>
                                                <option value="" selected="selected">---Choose---</option>
                                                @foreach ($year as $row)
                                                    <option value="{{ $row->year_id }}" {{ $row->year_id==$work_day->year_id ? 'selected' : '' }}>{{ $row->salary_year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {!! show_error($errors,'select_year') !!} --}}

                                        
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                    </div>
                                </form>
                            </div>




                        </div>

                    </div>

                </div>

            </section>
@endsection
        