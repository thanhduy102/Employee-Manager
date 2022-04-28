@extends('employees.master.master')
@section('title','Employee')
@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm nhân viên</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm nhân viên</li>
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
                                    <h3 class="card-title">Thêm nhân viên</h3>
                                </div>

                                <form method="POST" role="form">
                                    @csrf
                                    <div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputName">Họ và tên</label>
                                                <input type="text" class="form-control" id="exampleInputName" name="txt_name" value="{{ old('txt_name') }}" placeholder="Nhập họ tên...">
                                                {!! show_error($errors,'txt_name') !!}

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputGender">Giới tính</label>
                                                <select class="form-control" name="txt_gender" id="exampleInputGender">
                                                    <option selected="selected" value="">---Choose---</option>
                                                    <option value="Nam" @if (old('txt_gender')=='Nam') {{ 'selected' }} @endif>Nam</option>
                                                    <option value="Nữ" @if (old('txt_gender')=='Nữ') {{ 'selected' }} @endif>Nữ</option>
                                                    <option value="Khác" @if (old('txt_gender')=='Khác') {{ 'selected' }} @endif>Khác</option>
                                                </select>
                                                {!! show_error($errors,'txt_gender') !!}

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputLevel">Trình độ</label>
                                                <select class="form-control select2" name="txt_level" id="exampleInputLevel">
                                                    <option selected="selected" value="">---Choose---</option>
                                                    @foreach ($level as $row)
                                                        <option value="{{ $row->level_id }}" @if (old('txt_level')== $row->level_id ) {{ 'selected' }} @endif>{{ $row->level_name }}</option>
                                                    @endforeach
                                                
                                                
                                                </select>
                                                {!! show_error($errors,'txt_level') !!}

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPosition">Chức vụ</label>
                                                <select class="form-control select2" name="txt_position" id="exampleInputPosition">
                                                <option selected="selected" value="">---Choose---</option>
                                                @foreach ($position as $row)
                                                    <option value="{{ $row->position_id }}" @if (old('txt_position')== $row->position_id ) {{ 'selected' }} @endif>{{ $row->position_name }}</option>
                                                @endforeach
                                                
                                                
                                                </select>
                                                {!! show_error($errors,'txt_position') !!}

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputDepartment">Phòng ban</label>
                                                <select class="form-control select2" name="txt_department" id="exampleInputDepartment">
                                                <option selected="selected" value="">---Choose---</option>
                                                @foreach ($department as $row)
                                                    <option value="{{ $row->department_id }}" @if (old('txt_department')== $row->department_id ) {{ 'selected' }} @endif>{{ $row->department_name }}</option>
                                                @endforeach
                                                
                                                
                                                </select>
                                                {!! show_error($errors,'txt_department') !!}

                                            </div>
                                            <div class="form-group">
                                                <label>Loại hợp đồng</label>
                                                <select class="form-control" name="txt_type_contract" >
                                                    <option selected="selected" value="">---Choose---</option>
                                                    <option value="Dài hạn" @if (old('txt_type_contract')=='Dài hạn') {{ 'selected' }} @endif>Dài hạn</option>
                                                    <option value="Ngắn hạn" @if (old('txt_type_contract')=='Ngắn hạn') {{ 'selected' }} @endif>Ngắn hạn</option>
                                                    <option value="Khác" @if (old('txt_type_contract')=='Khác') {{ 'selected' }} @endif>Khác</option>
                                                </select> 
                                                {!! show_error($errors,'txt_type_contract') !!}
                                       
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày bắt đầu</label>
                                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" name="sign_day" value="{{ old('sign_day') }}"/>
                                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                {!! show_error($errors,'sign_day') !!}

                                            </div>
                                            <div class="form-group">
                                                <label>Ngày kết thúc</label>
                                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="expiration_date" value="{{ old('expiration_date') }}"/>
                                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                {!! show_error($errors,'expiration_date') !!}

                                                </div>
                                        
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary" style="float: right;">Thêm mới</button>
                                        </div>
                                </div>
                                </form>
                            </div>




                        </div>

                    </div>

                </div>

            </section>
@endsection
        