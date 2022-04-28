@extends('employees.master.master')
@section('title','Contract')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Contract</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa hợp đồng</li>
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
                                    <h3 class="card-title">Sửa hợp đồng</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>

                                    
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Chọn nhân viên</label>
                                            <select class="form-control select2" name="txt_employee">
                                              <option selected="selected" value="">---Choose---</option>
                                              @foreach ($employee as $row)
                                                  <option value="{{ $row->employee_id }}" {{ $row->employee_id==$contract_id->employee_id ? 'selected' : '' }}>{{ $row->employee_id }} - {{ $row->full_name }}</option>
                                              @endforeach

                                              
                                            </select>
                                            {!! show_error($errors,'txt_employee') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Loại hợp đồng</label>
                                            <select class="form-control" name="txt_type_contract" >
                                                <option selected="selected" value="">---Choose---</option>
                                                <option value="Dài hạn" {{ $contract_id->type_contract=="Dài hạn" ? 'selected' : '' }}>Dài hạn</option>
                                                <option value="Ngắn hạn" {{ $contract_id->type_contract=="Ngắn hạn" ? 'selected' : '' }}>Ngắn hạn</option>
                                                <option value="Khác" {{ $contract_id->type_contract=="Khác" ? 'selected' : '' }}>Khác</option>
                                            </select> 
                                            {!! show_error($errors,'txt_type_contract') !!}
                                   
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày bắt đầu</label>
                                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="sign_day" value="{{ \Carbon\Carbon::parse($contract_id->sign_day)->format('m/d/Y') }}"/>
                                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            {!! show_error($errors,'sign_day') !!}

                                        </div>
                                        <div class="form-group">
                                            <label>Ngày kết thúc</label>
                                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="expiration_date" value="{{ \Carbon\Carbon::parse($contract_id->expiration_day)->format('m/d/Y') }}"/>
                                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            {!! show_error($errors,'expiration_date') !!}

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
       