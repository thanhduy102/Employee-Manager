<?php

namespace App\Http\Controllers;
use App\models\bonus_info;
use App\models\salary_year;
use App\models\employee;
use App\models\department;
use App\models\level;
use App\models\position;
use App\models\work_day;
define('DOCROI','-999999999');

class SalaryController extends Controller
{
    
    function GetListSalary(){

        $data['empolyees']=employee::join('position','employee.position_id','=','position.position_id')
        ->join('department','employee.department_id','=','department.department_id')
        ->join('level','employee.level_id','=','level.level_id')
        ->where('employee.isDelete','=',0)
        ->orWhere('employee.isDelete','=',null)
        ->orderBy('employee.employee_id','desc')
        ->get();
        $data['years']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();
        $data['department']=department::where('isDelete','=',0)->orWhere('isDelete','=',null)->get();

        $work=work_day::join('employee','employee.employee_id','=','work_day.employee_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->leftjoin('bonus_info','bonus_info.employee_id','=','employee.employee_id')
        ->leftjoin('bonus_detail','bonus_detail.bonus_id','=','bonus_info.bonus_id')
        ->leftjoin('fine_info','fine_info.employee_id','=','employee.employee_id')
        ->leftjoin('fine_detail','fine_detail.fine_id','=','fine_info.fine_id')
        ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->where('work_day.isDelete','=',0)
        ->orWhere('work_day.isDelete','=',null)
        ->orderBy('work_day.ordinal_id','desc')
        ->get();
        
        $works=work_day::join('employee','employee.employee_id','=','work_day.employee_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->leftjoin('bonus_info','bonus_info.employee_id','=','employee.employee_id')
        ->leftjoin('bonus_detail','bonus_detail.bonus_id','=','bonus_info.bonus_id')
        ->leftjoin('fine_info','fine_info.employee_id','=','employee.employee_id')
        ->leftjoin('fine_detail','fine_detail.fine_id','=','fine_info.fine_id')
        ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->where('work_day.isDelete','=',0)
        ->orWhere('work_day.isDelete','=',null)
        ->orderBy('work_day.ordinal_id','desc')
        ->select('work_day.employee_id','employee.full_name','work_day.day_worked','work_day.overtime','position.position_name','department.department_name','salary_month.salary_month','salary_year.salary_year')
        ->get();

        
        

        $array=array();
        foreach($work as $row){
            if($row->bonus==null && $row->fine==null){
                 $basic_salary=$row->basic_salary;
                $depart_salary=$row->salary_coefficient;
                $level_salary=$row->coefficient_salary;
                $day_worked=$row->day_worked;
                $overtime=$row->overtime;
                $bonus=0;
                $fine=0;
                $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
                $total_format=number_format($total_salary);
            
                $array[]=$total_format;
            }
         if($row->bonus==null && $row->fine!=null){
                $basic_salary=$row->basic_salary;
           $depart_salary=$row->salary_coefficient;
           $level_salary=$row->coefficient_salary;
           $day_worked=$row->day_worked;
           $overtime=$row->overtime;
           $bonus=0;
           $fine=$row->fine;
           $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
           $total_format=number_format($total_salary);
           
            $array[]=$total_format;
        }
         if($row->bonus!=null && $row->fine==null){
            $basic_salary=$row->basic_salary;
            $depart_salary=$row->salary_coefficient;
            $level_salary=$row->coefficient_salary;
            $day_worked=$row->day_worked;
            $overtime=$row->overtime;
            $bonus=$row->bonus;
            $fine=0;
            $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
            $total_format=number_format($total_salary);
           
            $array[]=$total_format;
        }
            if($row->bonus!=null && $row->fine!=null) {
                $basic_salary=$row->basic_salary;
                $depart_salary=$row->salary_coefficient;
                $level_salary=$row->coefficient_salary;
                $day_worked=$row->day_worked;
                $overtime=$row->overtime;
                $bonus=$row->bonus;
                $fine=$row->fine;
                $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
                $total_format=number_format($total_salary);
            
                $array[]=$total_format;
        }        
        }

        return view('employees.salary.listSalary',$data)->with('works',$works)->with('array',$array);
    }

    function GetAddSalary(){
        $data['department']=department::where('isDelete','=',0)->orWhere('isDelete','=',null)->get();
        $data['years']=salary_year::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('salary_year','asc')->get();

        $workk=work_day::join('employee','employee.employee_id','=','work_day.employee_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->leftjoin('bonus_info','bonus_info.employee_id','=','employee.employee_id')
        ->leftjoin('bonus_detail','bonus_detail.bonus_id','=','bonus_info.bonus_id')
        ->leftjoin('fine_info','fine_info.employee_id','=','employee.employee_id')
        ->leftjoin('fine_detail','fine_detail.fine_id','=','fine_info.fine_id')
        ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->where('work_day.isDelete','=',0)
        ->orWhere('work_day.isDelete','=',null)
        ->orderBy('work_day.ordinal_id','desc')
        ->select('department.department_name','salary_month.salary_month','salary_year.salary_year')
        
         ->groupBy('department.department_name')
         ->groupBy('salary_month.salary_month')
         ->groupBy('salary_year.salary_year')
        
        ->get();
        //return response()->json($workk);

        $work=work_day::join('employee','employee.employee_id','=','work_day.employee_id')
        ->leftjoin('position','position.position_id','=','employee.position_id')
        ->leftjoin('level','level.level_id','=','employee.level_id')
        ->leftjoin('department','department.department_id','=','employee.department_id')
        ->leftjoin('bonus_info','bonus_info.employee_id','=','employee.employee_id')
        ->leftjoin('bonus_detail','bonus_detail.bonus_id','=','bonus_info.bonus_id')
        ->leftjoin('fine_info','fine_info.employee_id','=','employee.employee_id')
        ->leftjoin('fine_detail','fine_detail.fine_id','=','fine_info.fine_id')
        ->join('salary_month','salary_month.salary_id','=','work_day.salary_id')
        ->leftjoin('salary_year','salary_year.year_id','=','salary_month.year_id')
        ->where('work_day.isDelete','=',0)
        ->orWhere('work_day.isDelete','=',null)
        ->orderBy('work_day.ordinal_id','desc')
        ->get();

        
        $array=array();

        $department=array();
        $month=array();
        $year=array();

        foreach($work as $row)
        {
            if($row->bonus==null && $row->fine==null)
            {
                 $basic_salary=$row->basic_salary;
                $depart_salary=$row->salary_coefficient;
                $level_salary=$row->coefficient_salary;
                $day_worked=$row->day_worked;
                $overtime=$row->overtime;
                $bonus=0;
                $fine=0;
                $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
                $total_format=$total_salary;
            
                $array[]=$total_format;
            }
         if($row->bonus==null && $row->fine!=null)
         {
                $basic_salary=$row->basic_salary;
           $depart_salary=$row->salary_coefficient;
           $level_salary=$row->coefficient_salary;
           $day_worked=$row->day_worked;
           $overtime=$row->overtime;
           $bonus=0;
           $fine=$row->fine;
           $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
           $total_format=$total_salary;
           
            $array[]=$total_format;
        }
         if($row->bonus!=null && $row->fine==null)
         {
            $basic_salary=$row->basic_salary;
            $depart_salary=$row->salary_coefficient;
            $level_salary=$row->coefficient_salary;
            $day_worked=$row->day_worked;
            $overtime=$row->overtime;
            $bonus=$row->bonus;
            $fine=0;
            $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
            $total_format=$total_salary;
           
            $array[]=$total_format;
        }
            if($row->bonus!=null && $row->fine!=null)
             {
                $basic_salary=$row->basic_salary;
                $depart_salary=$row->salary_coefficient;
                $level_salary=$row->coefficient_salary;
                $day_worked=$row->day_worked;
                $overtime=$row->overtime;
                $bonus=$row->bonus;
                $fine=$row->fine;
                $total_salary=ceil((($basic_salary*($day_worked+$overtime/24)+$bonus-$fine)*$depart_salary*$level_salary)/100)*100;
                $total_format=$total_salary;
            
                $array[]=$total_format;
        }  
            $departments=$row->department_id;
            $months=$row->salary_month;
            $years=$row->year_id;
            $month[]=$months;
            $year[]=$years;
            $department[]=$departments;
        }
        
 
        $count=count($department);//14
       
        $mang=array();
        for($j=0;$j<$count;$j++)
        {
            if((int)$array[$j]!=DOCROI)
            {
                $tong=(int)$array[$j];
                for($t=$j+1;$t<$count;$t++)
                {
                    if(($department[$j]==$department[$t]) && ($month[$j]==$month[$t]) && ($year[$j]==$year[$t]))
                    {
                        $tong+=(int)$array[$t];
                       
                        $array[$j]=DOCROI;
                        $array[$t]=DOCROI;
                       
                    }

                    
                }
                 $sumSalary=number_format($tong);
               $mang[]=$sumSalary;
                   
                   
                   
                }
          
            }

        return view('employees.salary.addSalary',$data)->with('workk',$workk)->with('mang',$mang);
    }
 
}
