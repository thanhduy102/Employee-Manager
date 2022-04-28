<?php

namespace App\Http\Controllers;
use App\models\contract;
use App\models\employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\ContractRequest;
class ContractController extends Controller
{
    //
  function GetListContract(){

    $contract=new contract;

    $data['contract']=contract::join('employee','employee.employee_id','=','contract.employee_id')
    ->where('contract.isDelete','=',0)
    ->orWhere('contract.isDelete','=',null)
    ->orderBy('contract_id','desc')->get();

    $contract=contract::join('employee','employee.employee_id','=','contract.employee_id')
    ->where('contract.isDelete','=',0)
    ->orWhere('contract.isDelete','=',null)
    ->orderBy('contract_id','desc')->get();

    $data['contractCount']=contract::join('employee','employee.employee_id','=','contract.employee_id')
    ->where('contract.isDelete','=',0)
    ->orWhere('contract.isDelete','=',null)
    ->count('contract_id');


    $dt=Carbon::now();
    $data['date']=$dt->toDateString();
    $array=array();
     foreach($contract as $row){
       $date_start=date_create($row->sign_day);
       $date_end=date_create($row->expiration_day);
       $inter=date_diff($date_start,$date_end);
       
      $a=$inter->format('%a');
      $array[]=$a;
      
     }
   
    return view('employees.contract.listContracts',$data)->with('array',$array);
  }
  function GetAddContract()
  {
    $data['employee']=employee::where('isDelete','=',0)
    ->orWhere('isDelete','=',null)
    ->orderBy('employee_id','desc')->get();
    return view('employees.contract.addContracts',$data);
  }

  function PostAddContract(ContractRequest $request){
    $contract=new contract;
    $contract->employee_id=$request->txt_employee;
    $contract->type_contract=$request->txt_type_contract;

    $sign_day=Carbon::parse($request->sign_day)->format('Y-m-d');
    $expiration_day=Carbon::parse($request->expiration_date)->format('Y-m-d');
    $contract->sign_day=$sign_day;
    $contract->expiration_day=$expiration_day;

    $contract->save();
    return redirect('/admin/list-contract')->with("thongbao","Đã thêm mới thành công!");
  }


  function GetEditContract($contract_id){

    $data['contract_id']=contract::find($contract_id);
    $data['employee']=employee::where('isDelete','=',0)
    ->orWhere('isDelete','=',null)
    ->orderBy('employee_id','desc')->get();

    return view('employees.contract.editContract',$data);
  }

  function PostEditContract(ContractRequest $request,$contract_id)
  {
    $contract=contract::find($contract_id);
    
    $contract->employee_id=$request->txt_employee;
    $contract->type_contract=$request->txt_type_contract;

    $sign_day=Carbon::parse($request->sign_day)->format('Y-m-d');
    $expiration_day=Carbon::parse($request->expiration_date)->format('Y-m-d');
    $contract->sign_day=$sign_day;
    $contract->expiration_day=$expiration_day;

    $contract->save();

    return redirect('/admin/list-contract')->with("thongbao","Đã cập nhật thành công!");
  }


  function DeleteContract($contract_id)
  {
      $contract=contract::find($contract_id);
      $contract->isDelete=1;
      $contract->save();

      return redirect('/admin/list-contract')->with("thongbao","Xóa thành công!");
  }
}
