<?php

namespace App\Http\Controllers;
use App\Http\Requests\BonusDetailRequest;
use Illuminate\Http\Request;
use App\models\bonusDetail;
class BonusDetailController extends Controller
{
    //
    function GetListBonusDetail(){

        $data['bonus_detail']=bonusDetail::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('bonus_id','desc')->get();
        $data['bonus_detail_count']=bonusDetail::where('isDelete','=',0)->orWhere('isDelete','=',null)->count('bonus_id');

        return view('employees.bonusdetail.listBonusDetail',$data);
    }


    function GetAddBonusDetail(){
        return view('employees.bonusdetail.addBonusDetail');
    }


    function PostAddBonusDetail(BonusDetailRequest $request){
        
        $bonusDetail=new bonusDetail;
        $bonusDetail->bonus_reason=$request->txt_bonusname;
        $bonusDetail->bonus=$request->txt_bonus;

        $bonusDetail->save();

        return redirect('/admin/list-bonus-detail')->with("thongbao","Đã thêm thành công!");
    }


    function GetEditBonusDetail($bonus_id){

        $data['bonus_id']=bonusDetail::find($bonus_id);
        return view('employees.bonusdetail.editBonusDetail',$data);
    }

    function PostEditBonusDetail(BonusDetailRequest $request,$bonus_id){

        $bonusDetail=bonusDetail::find($bonus_id);
        $bonusDetail->bonus_reason=$request->txt_bonusname;
        $bonusDetail->bonus=$request->txt_bonus;

        $bonusDetail->save();
        return redirect('/admin/list-bonus-detail')->with("thongbao","Đã chỉnh sửa thành công!");
    }

    function DeleteBonusDetail($bonus_id){

        $bonusDetail=bonusDetail::find($bonus_id);

        $bonusDetail->isDelete=1;

        $bonusDetail->save();

        return redirect('/admin/list-bonus-detail')->with("thongbao","Đã xóa thành công!");
    }
}
