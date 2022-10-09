<?php

namespace App\Http\Controllers;

use App\ChiTietKho;
use App\Http\Requests\KhoTonRequest;
use App\KhoHang;
use App\Menu;
use App\NhanVienAdmin;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function getList() {
        $nhanvien =NhanVienAdmin::pluck('name','id');
        $trang = KhoHang::paginate(9);
        $data = KhoHang::join('nhanviens','nhanviens.id','=','khohang.nhanvien_id')
            ->select('khohang.id','khohang.sanphamkho','khohang.soluong','khohang.giasanpham','khohang.tongtienkho','nhanviens.name','khohang.created_at')
            ->get();
        return view('TiTa.Warehouse.list',compact('data','trang','nhanvien'));
    }

    public function getAddKho() {
        $nhanvien =NhanVienAdmin::pluck('name','id');
        $kho = KhoHang::select('id','sanphamkho','soluong','giasanpham','tongtienkho')->get()->toArray();
        return view('TiTa.Warehouse.add',compact('kho','nhanvien'));
    }

    public function postAddKho(KhoTonRequest $request){
        $khohang = new KhoHang();
        $khohang->sanphamkho=$request->txtsanpham;
        $khohang->soluong=$request->txtsoluong;
        $khohang->giasanpham=$request->txtgiamua;
        $khohang->tongtienkho=1;
        $khohang->nhanvien_id=$request->sltKho;
        $khohang->save();
        return redirect()->route('xemkho')->with(['flash_message'=>'Thêm Thành Công']);
    }

    public function getEditKho(Request $request){
        if ($request->ajax()){
            $nhanviens = KhoHang::find($request->id);
            return response($nhanviens);
        }
    }

    public function postEditKho(Request $request){
        if ($request->ajax()){
            $ctikho = KhoHang::find($request->id);
            $ctikho->update($request->all());
            return response($ctikho);
        }
    }

    public function getListDetail() {
        $menu =Menu::pluck('tensp','id');
        $kho =KhoHang::pluck('sanphamkho','id');
        $data = ChiTietKho::join('khohang', 'chitietkho.khohang_id', '=', 'khohang.id')
            ->join('menu', 'chitietkho.menu_id', '=', 'menu.id')
            ->select('chitietkho.id','chitietkho.soluong','chitietkho.gianhap','khohang.sanphamkho','menu.tensp','chitietkho.created_at')
            ->get();
        return view('TiTa.DetailWarehouse.list',compact('data','kho','menu'));
    }

    public function AddDetail(Request $request) {
        if ($request->ajax()){
            $ct = ChiTietKho::create($request->all());
            return response($ct);
        }
    }

    public function EditDetail(Request $request){
        if ($request->ajax()){
            $ctkho = ChiTietKho::find($request->id);
            return response($ctkho);
        }
    }

    public function UpdateDetail(Request $request){
        if ($request->ajax()){
            $ctikho = ChiTietKho::find($request->id);
            $ctikho->update($request->all());
            return response($ctikho);
        }
    }

    public function DestroyDetail(Request $request){
        if ($request->ajax()){
            ChiTietKho::destroy($request->id);
            return response(['message'=>'Đã Xoá']);
        }
    }

    public function getDeleteKho($id){
        $menu = KhoHang::find($id);
        $menu->delete($id);
        return redirect()->route('xemkho')->with(['flash_message'=>'Xoá Thành Công']);
    }
}
