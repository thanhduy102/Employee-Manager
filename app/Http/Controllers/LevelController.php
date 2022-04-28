<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddLevelRequest;
use App\Http\Requests\EditLevelRequest;
use Illuminate\Http\Request;
use App\models\level;
use App\Http\Controllers\Controller;
class LevelController extends Controller
{
    //
    function GetListLevel(){

        $data['listLevel']=level::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('level_id','desc')->get();
        $data['listLevelCount']=level::where('isDelete','=',0)->orWhere('isDelete','=',null)->count('level_id');
        //return response()->json($data);

        return view('employees.level.listLevels',$data);
    }
    function GetAddLevel(){

        return view('employees.level.addLevels');
         
    }

    function PostAddLevel(AddLevelRequest $request){

        $level=new level;
        $level->level_name=$request->txt_level;
        $level->coefficient_salary=$request->txt_hesoluong;
        $level->save();

        return redirect('/admin/list-level')->with("thongbao","Đã thêm thành công!");
         
    }
    function GetEditLevel($level_id){
        $data['level_id']=level::find($level_id);
        return view('employees.level.editLevel',$data);
         
    }

    function PostEditLevel(EditLevelRequest $request,$level_id){

        $level=level::find($level_id);
        $level->level_name=$request->txt_level;
        $level->coefficient_salary=$request->txt_hesoluong;
        $level->save();

        return redirect("/admin/list-level")->with("thongbao","Đã chỉnh sửa thành công!");
    }

    function DeleteLevel($level_id){
        $level=level::find($level_id);
        $level->isDelete=1;
        $level->save();

        return redirect()->back()->with("thongbao","Đã xóa thành công!");
    }
}
