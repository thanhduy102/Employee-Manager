@extends('employees.master.master')
@section('title','Work Day')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thông tin ngày làm việc</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Simple Tables</li>
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
                                    <h3 class="card-title">Bordered Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <form method="POST" role="form">
                                    @csrf
                                <div>

                                
                                <div class="card-body">
                                    @if(session('thongbao'))
                                    <div class="alert alert-success" id="alert_noti" role="alert">
                                        <strong>{{ session("thongbao") }}</strong>
                                    </div>
                                    @endif
                                    <div class="d-flex">
                                    <div class="form-group mr-5">
                                        <label for="select_year">Year</label>
                                        <select class="form-control d-lg-inline" id="select_year" name="select_year" style="width:100px;" >
                                           <option selected="selected" value="">---Choose---</option>
                                           @foreach ($year as $row)
                                               <option value="{{ $row->year_id }}" @if(old('select_year')==$row->year_id) {{ 'selected' }} @endif>{{ $row->salary_year }}</option>
                                           @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group ">
                                        <label for="select_year">Month</label>
                                        <select class="form-control d-lg-inline" id="select_month" name="select_month" style="width:100px;" >
                                         <option value="" selected>---Choose---</option>
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
                                    </div>
                                    {!! show_error($errors,'select_year') !!}

                                    {{-- {!! show_error($errors,'select_month') !!} --}}


                                    <table class="table table-bordered" id="table_id">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Mã nhân viên</th>
                                                <th>Tên nhân viên</th>
                                                <th>Phòng ban</th>
                                                <th>Chức vụ</th>
                                                <th>Ngày làm</th>
                                                <th>Giờ làm</th>
                                                {{-- <th style="width: 40px">Label</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($empolyeeCount==0)
                                                <tr>
                                                    <td colspan="7">Danh sách trống!</td>
                                                </tr>
                                            @else
                                            <?php $i=1;?>
                                                @foreach ($empolyee as $row)
                                                    <tr>
                                                <td>{{ $i++ }}</td>
                                                <input type="hidden" name="txt_employee_id_{{ $row->employee_id }}" value="{{ $row->employee_id }}" />
                                                <td>
                                                    {{ $row->employee_id }}
                                                </td>
                                                <td>
                                                    {{ $row->full_name }}
                                                </td>
                                                <td>
                                                    {{ $row->department_name }}
                                                </td>
                                                <td>
                                                    {{ $row->position_name }}
                                                </td>
                                                <td style="width: 100px">
                                                    <input type="number" min="0" name="txt_number_{{ $row->employee_id }}" class="form-control" >
                                                </td>
                                                <td style="width: 100px">
                                                    <input type="number" min="0" name="txt_number1_{{ $row->employee_id }}" class="form-control">
                                                </td>
                                            </tr>
                                                @endforeach
                                                {{-- {!! show_error($errors,'txt_number') !!}
                                                {!! show_error($errors,'txt_number1') !!} --}}

                                            @endif
                                            
                                           
                                        </tbody>
                                       
                                    </table>
                                     {{-- <div class="card-footer"> --}}
                                            <button type="submit" class="btn btn-primary" style="float: right;">Thêm mới</button>
                                        {{-- </div> --}}
                                </div>
                                <!-- /.card-body -->
                                
                                    
                                </div>
                                
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
 @endsection       


 