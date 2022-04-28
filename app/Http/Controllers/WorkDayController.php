<?php

namespace App\Http\Controllers;
use App\models\salary_month;
use App\models\salary_year;
use App\models\work_day;
use App\models\employee;
use App\models\bonus_info;
use App\models\fine_info;
use App\Http\Requests\AddWorkDayRequest;
use App\Http\Requests\AddWorkDay1Request;
use App\Http\Requests\EditWorkDayRequest;



class WorkDayController extends Controller
{
    //
    function GetListWorkDay(){

        //$data['year']
       $data['work_day']=work_day::join('employee','work_day.employee_id','=','employee.employee_id')
       ->leftjoin('level','level.level_id','=','employee.level_id')
       ->leftjoin('department','department.department_id','=','employee.department_id')
       ->leftjoin('position','position.position_id','=','employee.position_id')
       ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
       ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
       ->where('work_day.isDelete','=',0)
       ->orWhere('work_day.isDelete','=',null)
       ->orderBy('work_day.ordinal_id','desc')
       ->get();

       $data['work_day_count']=work_day::join('employee','work_day.employee_id','=','employee.employee_id')
       ->leftjoin('level','level.level_id','=','employee.level_id')
       ->leftjoin('department','department.department_id','=','employee.department_id')
       ->leftjoin('position','position.position_id','=','employee.position_id')
       ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
       ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
       ->where('work_day.isDelete','=',0)
       ->orWhere('work_day.isDelete','=',null)
       ->count('work_day.ordinal_id');

       $data['empolyees']=employee::join('position','employee.position_id','=','position.position_id')
       ->join('department','employee.department_id','=','department.department_id')
       ->join('level','employee.level_id','=','level.level_id')
       ->where('employee.isDelete','=',0)
       ->orWhere('employee.isDelete','=',null)
       ->orderBy('employee.employee_id','desc')
       ->get();
       $data['years']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();

        //return response()->json($data);
        return view('employees.workday.listWorkday',$data);
    }
    function PostListWorkDay(AddWorkDayRequest $req){
        $salary_year=new salary_year;
        $salary_year->salary_year=$req->year;
        $salary_year->save();
        return redirect('/admin/add-work-day')->with("thongbao","Đã thêm thành công!");
    }


    function GetAddWorkDay(){

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

        $data['year']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();
        return view('employees.workday.addWorkday',$data);
    }

    function PostAddWorkDay(AddWorkDay1Request $re){
       // $employee=new employee;
        $employee=employee::where('employee.isDelete','=',0)
        
        ->orWhere('employee.isDelete','=',null)
        ->orderBy('employee.employee_id','desc')
        ->get();
        $salary_month=new salary_month;
       
        foreach($employee as $row){

            $employee_id=$row->employee_id;


            if($re->{'txt_number_'.$employee_id}!=null && $re->{'txt_number1_'.$employee_id}!=null){

            $salary_month->salary_month=$re->select_month;
            $salary_month->year_id=$re->select_year;
            $salary_month->save();
            }
            $month=salary_month::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_id','desc')->first();
            $month_id=$month->salary_id;
            if($re->{'txt_number_'.$employee_id}!=null && $re->{'txt_number1_'.$employee_id}!=null){
                $workday=new work_day;
                
                $workday->employee_id=$re->{'txt_employee_id_'.$employee_id};
                $workday->salary_id=$month_id;
                $workday->day_worked=$re->{'txt_number_'.$employee_id};
                $workday->overtime=$re->{'txt_number1_'.$employee_id};
                $workday->save();
               

                 if($re->{'txt_number_'.$employee_id}>=26){
                $bonus_info=new bonus_info;
                $bonus_info->employee_id=$re->{'txt_employee_id_'.$employee_id};
                $bonus_info->bonus_id=3;
                $bonus_info->salary_id=$month_id;
                $bonus_info->save();
            }

             if($re->{'txt_number_'.$employee_id}<=17){
                $fine_info=new fine_info;
                $fine_info->employee_id=$re->{'txt_employee_id_'.$employee_id};
                $fine_info->fine_id=1;
                $fine_info->salary_id=$month_id;
                $fine_info->save();
            }
            }          
        }
        return redirect('/admin/list-work-day')->with("thongbao","Đã thêm thành công");
        
        //dd($re->all());
    }
  
    function GetEditWorkDay($ordinal_id){

        $data['work_day']=work_day::join('employee','work_day.employee_id','=','employee.employee_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->where('work_day.ordinal_id','=',$ordinal_id)
        ->first();

        $data['year']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();


        return view('employees.workday.editWorkday',$data);
    }
    function PostEditWorkDay(EditWorkDayRequest $req, $ordinal_id){

            $work_day=work_day::find($ordinal_id);

            $a=$work_day->employee_id;
            $b=$work_day->salary_id;
            $c=$work_day->day_worked;

            $bonus_info=bonus_info::query()->fromSub(function ($query) use($a){
                $query->from('bonus_info')->where('employee_id','=',$a);
            },'duy')->where('salary_id','=',$b)->where('duy.isDelete','=',0)->orWhere('duy.isDelete','=',null)->get();
            
            $fine_info=fine_info::query()->fromSub(function ($query) use($a){
                $query->from('fine_info')->where('employee_id','=',$a);
            },'duy')->where('salary_id','=',$b)->where('duy.isDelete','=',0)->orWhere('duy.isDelete','=',null)->get();
          
            if($req->txt_number_worked==null && $req->txt_number_overtime==null){
                $work_day->isDelete=1;
                $work_day->save();
              
            }
            if($req->txt_number_worked!=null && $req->txt_number_overtime!=null){
                
                 //$work_day->salary_id=$req->select_month;
                $work_day->day_worked=$req->txt_number_worked;
                $work_day->overtime=$req->txt_number_overtime;
                $work_day->save();

                
       return redirect('/admin/list-work-day');
        }

    function DeleteWorkDay($ordinal_id){

        $work_day=work_day::find($ordinal_id);
        $work_day->isDelete=1;
        $work_day->save();

        return redirect()->back();

    }
}
