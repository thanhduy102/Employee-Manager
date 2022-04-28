<?php

namespace App\Http\Controllers;
use App\models\employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\models\position;
use App\models\department;
use App\models\level;
use App\models\contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    //
    function GetListEmployee(){

        $data['empolyee']=employee::join('position','employee.position_id','=','position.position_id')
        ->join('department','employee.department_id','=','department.department_id')
        ->join('level','employee.level_id','=','level.level_id')
        ->where('employee.isDelete','=',0)
        ->orWhere('employee.isDelete','=',null)
        ->orderBy('employee.employee_id','desc')
        ->get();

        $data['empolyeeCount']=employee::join('position','employee.position_id','=','position.position_id')
        ->join('department','employee.department_id','=','department.department_id')
        ->join('level','employee.level_id','=','level.level_id')
        ->where('employee.isDelete','=',0)
        ->orWhere('employee.isDelete','=',null)
        ->count('employee.employee_id');
        //return response()->json($data);
        return view('employees.employe.listEmployees',$data);
    }

    function GetAddEmployee(){
        $data['level']=level::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('level_id','desc')->get();
        $data['position']=position::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('position_id','desc')->get();
        $data['department']=department::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('department_id','desc')->get();
        return view('employees.employe.addEmployees',$data);
    }

    function PostAddEmployee(EmployeeRequest $request){
        //dd($request->all());

        if($request->txt_type_contract==null && $request->sign_day==null && $request->expriation_date==null)
        {
            $employee=new employee;
            $employee->full_name=$request->txt_name;
            $employee->gender=$request->txt_gender;
            $employee->level_id=$request->txt_level;
            $employee->position_id=$request->txt_position;
            $employee->department_id=$request->txt_department;
            $employee->save();
            return redirect('/admin/list-employee')->with("thongbao","Đã thêm thành công!");

        }
        else
        //if($request->txt_type_contract!=null && $request->sign_day!=null && $request->expriation_date!=null)
        {
            $employee=new employee;
            $employee->full_name=$request->txt_name;
            $employee->gender=$request->txt_gender;
            $employee->level_id=$request->txt_level;
            $employee->position_id=$request->txt_position;
            $employee->department_id=$request->txt_department;
            $employee->save();

            $data['employee']=employee::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('employee_id','desc')->first();
            $a=$employee->employee_id;


            $contract=new contract;
            $contract->employee_id=$a;
            $contract->type_contract=$request->txt_type_contract;

            $sign_day=Carbon::parse($request->sign_day)->format('Y-m-d');
            $expiration_day=Carbon::parse($request->expiration_date)->format('Y-m-d');
    
            $contract->sign_day=$sign_day;
            $contract->expiration_day=$expiration_day;
            $contract->save();

            return redirect('/admin/list-employee')->with("thongbao","Đã thêm thành công!");
        } 
       
    }

    function GetEditEmployee($employee_id){

        $data['employee_id']=employee::find($employee_id);
        $data['level']=level::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('level_id','desc')->get();
        $data['position']=position::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('position_id','desc')->get();
        $data['department']=department::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('department_id','desc')->get();
        return view('employees.employe.editEmployee',$data);
    }

    function PostEditEmployee(EditEmployeeRequest $request,$employee_id){
        $employee=employee::find($employee_id);
        $employee->full_name=$request->txt_name;
        $employee->gender=$request->txt_gender;
        $employee->level_id=$request->txt_level;
        $employee->position_id=$request->txt_position;
        $employee->department_id=$request->txt_department;
        $employee->save();

        return redirect('/admin/list-employee')->with("thongbao","Đã chỉnh sửa thành công");
    }


    function DeleteEmployee($employee_id)
    {
       
      $contract=contract::query()->fromSub(function ($query) use($employee_id){
          $query->from('contract')->where('employee_id','=',$employee_id);
      },'a')->where('isDelete','=',0)->orWhere('isDelete','=',null)->get();

        foreach($contract as $row){
        $row->isDelete=1;
        $row->save();
        }
        //$contract->save();
        $employee=employee::find($employee_id);
        $employee->isDelete=1;
        $employee->save();

        return redirect('/admin/list-employee')->with("thongbao","Đã xóa thành công!");
        // return response()->json($contract);
    }
}
