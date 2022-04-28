<?php

namespace App\Http\Controllers;
use App\Http\Requests\FineDetailRequest;
use Illuminate\Http\Request;
use App\models\fineDetail;
class FineDetailController extends Controller
{
    //
    function GetListFineDetail(){

        $data['fineDetail']=fineDetail::where('isDelete','=',0)->orWhere('isDelete','=',null)->orderBy('fine_id','desc')->get();
        $data['fineDetailCount']=fineDetail::where('isDelete','=',0)->orWhere('isDelete','=',null)->count('fine_id');

        return view('employees.finedetail.listFineDetail',$data);
    }

    function GetAddFineDetail(){

        return view('employees.finedetail.addFineDetail');
    }
    function PostAddFineDetail(FineDetailRequest $request){

        $fineDetail= new fineDetail;

        $fineDetail->fine_reason=$request->txt_finename;
        $fineDetail->fine=$request->txt_fine;

        $fineDetail->save();

        return redirect('/admin/list-fine-detail')->with("thongbao","Thêm thành công!");

        //return view('employees.finedetail.addFineDetail');
    }

    function GetEditFineDetail($fine_id){

        $data['fine_id']=fineDetail::find($fine_id);

        return view('employees.finedetail.editFineDetail',$data);
    }

    function PostEditFineDetail(FineDetailRequest $request, $fine_id){
        $fineDetail=fineDetail::find($fine_id);

        $fineDetail->fine_reason=$request->txt_finename;
        $fineDetail->fine=$request->txt_fine;

        $fineDetail->save();

        return redirect('/admin/list-fine-detail')->with("thongbao","Đã chỉnh sửa thành công!");
    }

    function DeleteFineDetail($fine_id){
        $fineDetail=fineDetail::find($fine_id);

        $fineDetail->isDelete=1;
        $fineDetail->save();

        return redirect('/admin/list-fine-detail')->with("thongbao","Xóa thành công!");
    }

}
