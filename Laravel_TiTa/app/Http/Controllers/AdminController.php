<?php

namespace App\Http\Controllers;

use App\ChiTietKho;
use App\DanhMuc;
use App\DatHang;
use App\DiaChiKhachHang;
use App\GiamGia;
use App\KhoHang;
use App\Menu;
use Illuminate\Http\Request;
use Validator;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gettrangchu(){
        $alldm = DanhMuc::all();
        $alldh = DatHang::all();
        $allmenu = Menu::all();
        $allkhohang = KhoHang::all();
        $allgiamgia = GiamGia::all();
        return view('TiTa.Trangchu.index',compact('alldm','alldh','allmenu','allkhohang','allgiamgia'));
    }

    public function morris(){
        $khohang = KhoHang::join('nhanviens','nhanviens.id','=','khohang.nhanvien_id')
            ->select('khohang.id','khohang.sanphamkho','khohang.giasanpham','khohang.soluong','khohang.tongtienkho','nhanviens.name','khohang.created_at')
            ->get();
        $detailkhohang = ChiTietKho::join('khohang','khohang.id','=','chitietkho.khohang_id')
            ->join('menu','menu.id','=','chitietkho.menu_id')
            ->select('chitietkho.id','chitietkho.soluong','chitietkho.gianhap','menu.tensp','khohang.sanphamkho','chitietkho.created_at')
            ->get();
        $menu = Menu::join('danhmuc','danhmuc.id','=','menu.danhmuc_id')
            ->select('menu.id','menu.tensp','menu.giaold','menu.gianew','menu.soluong','menu.created_at','danhmuc.tendanhmuc')
            ->get();
        $sale = GiamGia::join('menu','menu.id','=','giamgia.menu_id')
            ->select('giamgia.id','giamgia.phantram','menu.tensp','giamgia.updated_at')
            ->get();
        return view('TiTa.Trangchu.morris',compact('khohang','detailkhohang','menu','sale'));
    }

    public function getcart(){
        $alldh = DatHang::select('id','tinhtrang','tongtien')->where('tinhtrang', '=', 1);
        return view('TiTa.Trangchu.cart',compact('alldh'));
    }

    public function search(Request $request){
        $danhmuc = DanhMuc::pluck('tendanhmuc','id');
        if ($request->has('search')){
            $data=Menu::join('danhmuc','danhmuc.id','=','menu.danhmuc_id')
                ->select('menu.id','menu.tensp','menu.mota','menu.soluong','menu.giaold','danhmuc.tendanhmuc','menu.created_at')
                ->where('menu.danhmuc_id','=',$request->type)
                ->orWhere('menu.tensp',"LIKE","%".$request->search."%")
                ->orWhere('danhmuc.tendanhmuc',"LIKE","%".$request->search."%")
                ->paginate(9);
        }else{
            $data=Menu::join('danhmuc','danhmuc.id','=','menu.danhmuc_id')
                ->paginate(5);
        }
        return view('TiTa.Menu.search',compact('data','danhmuc'));
    }

}
