<?php

namespace App\Http\Controllers;
use App\models\fine_info;
use App\models\employee;
use App\models\salary_month;
use App\models\salary_year;
use App\models\fineDetail;
use App\Http\Requests\FineInfoRequest;
use App\Http\Requests\EditFineInfoRequest;
use Illuminate\Http\Request;

class FineController extends Controller
{
    //
    function GetListFine(){


        $data['fine_info']=fine_info::join('fine_detail','fine_info.fine_id','=','fine_detail.fine_id')
        ->join('employee','employee.employee_id','=','fine_info.employee_id')
        ->join('salary_month','salary_month.salary_id','=','fine_info.salary_id')
        //->leftjoin('work_day','work_day.employee_id','=','employee.employee_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->where('fine_info.isDelete','=',0)
        ->orWhere('fine_info.isDelete','=',null)
        ->orderBy('fine_info.ordinal_id','desc')
        ->get();

    //return response()->json($data);
        $data['fine_info_count']=fine_info::join('fine_detail','fine_info.fine_id','=','fine_detail.fine_id')
        ->join('employee','employee.employee_id','=','fine_info.employee_id')
        ->join('salary_month','salary_month.salary_id','=','fine_info.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->where('fine_info.isDelete','=',0)
        ->orWhere('fine_info.isDelete','=',null)
    
        ->count('fine_info.ordinal_id');


        
        $data['empolyees']=employee::join('position','employee.position_id','=','position.position_id')
        ->join('department','employee.department_id','=','department.department_id')
        ->join('level','employee.level_id','=','level.level_id')
        ->where('employee.isDelete','=',0)
        ->orWhere('employee.isDelete','=',null)
        ->orderBy('employee.employee_id','desc')
        ->get();
        $data['years']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();
 
        return view('employees.fine.listFine',$data);
    }

    function GetAddFine(){
        $data['employee']=employee::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('employee_id','desc')
        ->get();

        $data['year']=salary_year::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('year_id','asc')
        ->get();

        $data['fine_detail']=fineDetail::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('fine_id','desc')
        ->get();

        return view('employees.fine.addFine',$data);
    }

    function PostAddFine(FineInfoRequest $request){

        $fine_info=new fine_info;
        $salary_month=new salary_month;
        $salary_month->salary_month=$request->month;
        $salary_month->year_id=$request->year;
        $salary_month->save();
        $month=salary_month::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_id','desc')->first();
            $month_id=$month->salary_id;
        $fine_info->employee_id=$request->employee;
        $fine_info->fine_id=$request->fine_reason;
        $fine_info->salary_id=$month_id;
        $fine_info->save();

        return redirect('/admin/list-fine')->with("thongbao","Thêm thành công!");
        
    }

    function GetEditFine($ordinal_id){

        $data['fine_info']=fine_info::find($ordinal_id);
        $fineinfo=fine_info::find($ordinal_id);
        $mont=$fineinfo->salary_id;
        $data['salaryMonth']=salary_month::find($mont);

        $employee_id=$fineinfo->employee_id;
        $data['employee']=employee::find($employee_id);
       
        $data['year']=salary_year::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('year_id','asc')
        ->get();

        $data['fine_detail']=fineDetail::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('fine_id','desc')
        ->get();

        return view('employees.fine.editFine',$data);
    }

    function PostEditFine(EditFineInfoRequest $r,$ordinal_id){
        $fine_info=fine_info::find($ordinal_id);
        $fineInfo=fine_info::find($ordinal_id);
        $month=$fineInfo->salary_id;
        $salaryMonth=salary_month::find($month);


        //$bonus_info->employee_id=$r->employee;
        $fine_info->fine_id=$r->fine_reason;
        $fine_info->save();

        $salaryMonth->salary_month=$r->month;
        $salaryMonth->year_id=$r->year;
        $salaryMonth->save();

        return redirect('/admin/list-fine')->with("thongbao","Chỉnh sửa thành công!");
       
    }

    function DeleteFine($ordinal_id){
        $fine_info=fine_info::find($ordinal_id);
        $fine_info->isDelete=1;

        $fine_info->save();
        return redirect()->back()->with("thongbao","Xóa thành công!");
    }
}
