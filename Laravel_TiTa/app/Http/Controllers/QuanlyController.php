<?php

namespace App\Http\Controllers;

use App\DiaChiKhachHang;
use App\NhanVienAdmin;
use Illuminate\Http\Request;
use App\Http\Requests\QuanlyRequest;


class QuanlyController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function getnvien(){
        $pid=NhanVienAdmin::pluck('name','id');
        return view('TiTa.Nhanvien.index',compact('pid'));
    }
    public function reddata(){
        $nvien = NhanVienAdmin::select('id','name','CMND','diachi','chucvu','sdt','email','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('TiTa.Nhanvien.list',compact('nvien'));
    }

    public function getAdd(){
        return view('TiTa.Nhanvien.add');
    }

    public function postAdd(QuanlyRequest $request){
        $user = new NhanVienAdmin();
        $user->name = $request->txttennv;
        $user->sdt=$request->txtsdt;
        $user->email=$request->txtemail;
        $user->password=bcrypt($request->txtpassword);
        $user->chucvu=$request->sltChucvu;
        $user->CMND = $request->txtcmnd;
        $user->diachi= $request->txtdiachi;
        $user->save();
        return redirect()->route('xemnhanvien')->with(['flash_message'=>'Thêm Thành Công']);
    }


    public function getEdit($id){
        $nvien =NhanVienAdmin::findOrFail($id)->toArray();
        $chucvu =NhanVienAdmin::select('id','chucvu')->get()->toArray();
        return view('TiTa.Nhanvien.edit',compact('nvien','chucvu'));
    }
    public function postEdit($id,Request $request){
        $this->validate($request,
            ["txtdiachi"=>"required"],
            ["txtdiachi.required"=>"Nhập địa chỉ"],
            ["txtsdt"=>"required"],
            ["txtsdt.required"=>"Nhập số điện thoại"],
            ["txtemail"=>"required"],
            ["txtemail.required"=>"Nhập email"]
        );
        $user =NhanVienAdmin::find($id);
        $user->chucvu=$request->sltChucvu;
        $user->diachi=$request->txtdiachi;
        $user->sdt=$request->txtsdt;
        $user->email=$request->txtemail;
        $user->save();
        return redirect()->route('xemnhanvien')->with(['flash_message'=>'Sửa Thành Công']);
    }

    public function searchclients(Request $request){
        if ($request->has('search')){
            $data=DiaChiKhachHang::join('maps','maps.id','=','diachikhachhang.maps_id')
                ->select('diachikhachhang.id','diachikhachhang.hoten','diachikhachhang.sdt','diachikhachhang.email','diachikhachhang.diachi','maps.maps','diachikhachhang.created_at')
                ->where('diachikhachhang.id')
                ->orWhere('diachikhachhang.hoten',"LIKE","%".$request->search."%")
                ->orWhere('diachikhachhang.sdt',"LIKE","%".$request->search."%")
                ->orWhere('diachikhachhang.email',"LIKE","%".$request->search."%")
                ->paginate(5);
        }else{
            $data=DiaChiKhachHang::join('maps','maps.id','=','diachikhachhang.maps_id')
                ->select('diachikhachhang.id','diachikhachhang.hoten','diachikhachhang.sdt','diachikhachhang.email','diachikhachhang.diachi','maps.maps','diachikhachhang.created_at')
                ->paginate(5);
        }
        return view('TiTa.KhachHang.Search',compact('data'));
    }

}
