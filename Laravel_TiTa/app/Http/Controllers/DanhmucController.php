<?php

namespace App\Http\Controllers;

use App\DatHang;
use Illuminate\Http\Request;
use App\Http\Requests\DanhmucRequest;
use App\DanhMuc;

class DanhmucController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAdd() {
        $danhmuccha = DanhMuc::select('id','tendanhmuc','danhmuccha_id')->get()->toArray();
        return view('TiTa.Danhmuc.add',compact('danhmuccha'));
    }

    public function postAdd(DanhmucRequest $request){
        $danhmuc = new DanhMuc;
        $danhmuc->tendanhmuc=$request->txtdanhmuc;
        $danhmuc->danhmuccha_id=$request->sltDanhmuccha;
        $danhmuc->save();
        return redirect()->route('xemdanhmuc')->with(['flash_message'=>'Thêm Thành Công']);
    }

    public function getList() {
        $trang = DanhMuc::paginate(9);
        $data = DanhMuc::select('id','tendanhmuc','danhmuccha_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('TiTa.Danhmuc.list',compact('data','trang'));
    }

    public function getDelete($id){
        $danhmuccha = DanhMuc::where('danhmuccha_id',$id)->count();
        if ($danhmuccha==0){
        $danhmuc = DanhMuc::find($id);
        $danhmuc->delete($id);
        return redirect()->route('xemdanhmuc')->with(['flash_message'=>'Xoá Thành Công']);
        }else{
            echo "  <script type='text/javascript'>
                        alert('Xin Lỗi ! Bạn không thể xoá thực đơn chính');
                        window.location = '";
            echo route('xemdanhmuc');
            echo "'
                    </script>";
        }
    }

    public function getEdit($id){
        $data =DanhMuc::findOrFail($id)->toArray();
        $danhmuc =DanhMuc::select('id','tendanhmuc','danhmuccha_id')->get()->toArray();
        return view('TiTa.Danhmuc.edit',compact('danhmuc','data'));
    }

    public function postEdit($id,Request $request){
        $this->validate($request,
            ["txtdanhmuc"=>"required"],
            ["txtdanhmuc.required"=>"Nhập Thông Tin"]
        );
        $danhmuc = DanhMuc::find($id);
        $danhmuc->tendanhmuc=$request->txtdanhmuc;
        $danhmuc->danhmuccha_id=$request->sltDanhmuccha;
        $danhmuc->save();
        return redirect()->route('xemdanhmuc')->with(['flash_message'=>'Sửa Thành Công']);
    }
}