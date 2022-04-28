<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddPositionRequest;
use Illuminate\Http\Request;

use App\models\position;

class PositionController extends Controller
{
    function GetListPosition(){

        $data['position']=position::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('position_id','desc')->get();
        $data['positionCount']=position::where('isDelete','=',0)->orWhere('isDelete','=',null)->count('position_id');

        return view('employees.position.listPositions',$data);
    }

    function GetAddPosition(){
        
        return view('employees.position.addPositions');
    }
    function PostAddPosition(AddPositionRequest $request){
        
        $position=new position;
        $position->position_name=$request->txt_position;
        $position->basic_salary=$request->txt_basicsalary;
        $position->save();

        return redirect('/admin/list-position')->with("thongbao","Thêm mới thành công!");
    }

    function GetEditPosition($position_id){
        
        $data['position_id']=position::find($position_id);

        return view('employees.position.editPosition',$data);
    }

    function PostEditPosition(AddPositionRequest $request,$position_id){

        $position=position::find($position_id);
        $position->position_name=$request->txt_position;
        $position->basic_salary=$request->txt_basicsalary;
        $position->save();

        return redirect('/admin/list-position')->with("thongbao","Đã chỉnh sửa thành công!");
    }

    function DeletePosition($position_id){
        $position=position::find($position_id);

        $position->isDelete=1;

        $position->save();

        return redirect('/admin/list-position')->with("thongbao","Đã xóa thành công!");

    }
}
