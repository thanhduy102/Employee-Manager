<?php

namespace App\Http\Controllers;
use App\models\bonus_info;
use App\models\employee;
use App\models\salary_month;
use App\models\salary_year;
use App\models\bonusDetail;
use App\Http\Requests\BonusInfoRequest;
use App\Http\Requests\EditBonusInfoRequest;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    function GetListBonus(){
        

        $data['bonus_info']=bonus_info::join('bonus_detail','bonus_info.bonus_id','=','bonus_detail.bonus_id')
        ->join('employee','employee.employee_id','=','bonus_info.employee_id')
        ->join('salary_month','salary_month.salary_id','=','bonus_info.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->where('bonus_info.isDelete','=',0)
        ->orWhere('bonus_info.isDelete','=',null)
        ->orderBy('bonus_info.ordinal_id','desc')
        ->get();

        $data['bonus_info_count']=bonus_info::join('bonus_detail','bonus_info.bonus_id','=','bonus_detail.bonus_id')
        ->join('employee','employee.employee_id','=','bonus_info.employee_id')
        ->join('salary_month','salary_month.salary_id','=','bonus_info.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->where('bonus_info.isDelete','=',0)
        ->orWhere('bonus_info.isDelete','=',null)
        ->count('bonus_info.ordinal_id');


        $data['empolyees']=employee::join('position','employee.position_id','=','position.position_id')
        ->join('department','employee.department_id','=','department.department_id')
        ->join('level','employee.level_id','=','level.level_id')
        ->where('employee.isDelete','=',0)
        ->orWhere('employee.isDelete','=',null)
        ->orderBy('employee.employee_id','desc')
        ->get();
        $data['years']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();
 
        return view('employees.bonus.listBonus',$data);
    }
    function GetAddBonus(){
        $data['employee']=employee::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('employee_id','desc')
        ->get();

        $data['year']=salary_year::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('year_id','asc')
        ->get();

        $data['bonus_detail']=bonusDetail::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('bonus_id','desc')
        ->get();

        return view('employees.bonus.addBonus',$data);
    }

    function PostAddBonus(BonusInfoRequest $request){

        $bonus_info=new bonus_info;
        $salary_month=new salary_month;
        $salary_month->salary_month=$request->month;
        $salary_month->year_id=$request->year;
        $salary_month->save();
        $month=salary_month::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_id','desc')->first();
        
        $month_id=$month->salary_id;
        $bonus_info->employee_id=$request->employee;
        $bonus_info->bonus_id=$request->bonus_reason;
        $bonus_info->salary_id=$month_id;
        $bonus_info->save();

        return redirect('/admin/list-bonus')->with("thongbao","Đã thêm thành công!");
        
    }


    function GetEditBonus($ordinal_id){
        $data['bonus_info']=bonus_info::find($ordinal_id);
        $bonusinfo=bonus_info::find($ordinal_id);
        $mont=$bonusinfo->salary_id;
        $data['salaryMonth']=salary_month::find($mont);

        $employee_id=$bonusinfo->employee_id;
        $data['employee']=employee::find($employee_id);
       
        $data['year']=salary_year::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('year_id','asc')
        ->get();

        $data['bonus_detail']=bonusDetail::where('isDelete','=',0)
        ->orWhere('isDelete','=',null)
        ->orderBy('bonus_id','desc')
        ->get();

        return view('employees.bonus.editBonus',$data);
    }

    function PostEditBonus(EditBonusInfoRequest $r,$ordinal_id){
        $bonus_info=bonus_info::find($ordinal_id);
        $bonusInfo=bonus_info::find($ordinal_id);
        $month=$bonusInfo->salary_id;
        $salaryMonth=salary_month::find($month);


        //$bonus_info->employee_id=$r->employee;
        $bonus_info->bonus_id=$r->bonus_reason;
        $bonus_info->save();

        $salaryMonth->salary_month=$r->month;
        $salaryMonth->year_id=$r->year;
        $salaryMonth->save();

        return redirect('/admin/list-bonus')->with("thongbao","Chỉnh sửa thành công!");
       // $bonus_info
    }

    function DeleteBonus($ordinal_id){
        $bonus_info=bonus_info::find($ordinal_id);
        $bonus_info->isDelete=1;

        $bonus_info->save();
        return redirect()->back()->with("thongbao","Xóa thành công!");
    }
}
