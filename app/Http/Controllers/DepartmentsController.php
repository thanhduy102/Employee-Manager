<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddDepartmentRequest;
use App\Http\Requests\EditDepartmentRequest;
use Illuminate\Http\Request;
use App\models\department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
  function GetAddDepartments(){

        return view("employees.department.addDepartments");
    }

    function PostAddDepartments(AddDepartmentRequest $r)
    {
       
        $department=new department;
        $department->department_name=$r->department_name;
        $department->salary_coefficient=$r->coefficient_salary;
        $department->save();
        return redirect("/admin/list-departments")->with("thongbao","Thêm mới thành công!");
    }
    
 
    function GetEditDepartments($department_id){
        $data['department_id']=department::find($department_id);
        return view("employees.department.editDepartment",$data);
    }


    function PostEditDepartments(EditDepartmentRequest $r,$department_id){
        
        $department=department::find($department_id);        
         $department->department_name=$r->department_name;
         $department->salary_coefficient=$r->coefficient_salary;

         $department->save();
        return redirect("/admin/list-departments")->with("thongbao","Chỉnh sửa thành công!");
    }


    function DeleteDepartments($department_id)
    {
        $department=department::find($department_id);
        $department->isDelete=1;

        $department->save();
        return redirect()->back()->with("thongbao","Đã xóa thành công");
    }

    function GetListDepartments()
    {

        $data['department']=department::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('department_id','desc')->get();
        $data['departmentCount']=department::where('isDelete','=',0)->orWhere('isDelete','=',null)->count('department_id');
        return view("employees.department.listDepartments",$data);
    }
}
