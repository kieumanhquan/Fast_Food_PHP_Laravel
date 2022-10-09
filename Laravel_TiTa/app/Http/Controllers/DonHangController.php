<?php

namespace App\Http\Controllers;

use App\ChiTietDatHang;
use App\ChiTietTuyChon;
use App\DatHang;
use App\TuyChon;
use App\DiaChiKhachHang;
use App\NhanVienAdmin;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getdhang() {
        $nhanvien =NhanVienAdmin::pluck('name','id');
        $donhang = DatHang::select('id','tinhtrang','ghichu','diachikh_id','tongtien','created_at')
            ->where('tinhtrang', '=', 1)
            ->get();
        $ctdh = DatHang::select('id','tinhtrang','ghichu','diachikh_id','tongtien','created_at')
            ->where('tinhtrang', '>=', 2)
            ->get();
        $alldh = DatHang::join('diachikhachhang','donhang.diachikh_id','=','diachikhachhang.id')
            ->join('nhanviens','donhang.nhanvien_id','=','nhanviens.id')
            ->select('donhang.id','donhang.tinhtrang','donhang.tongtien','donhang.ghichu','nhanviens.chucvu','diachikhachhang.diachi','diachikhachhang.hoten','diachikhachhang.sdt','nhanviens.name','donhang.created_at')
            ->get();
        return view('TiTa.DonHang.donhang',compact('donhang','ctdh','dath','alldh','trang','nhanvien'));

    }

    public function getedit(Request $request){
        if ($request->ajax()){
            $ctkho = DatHang::join('diachikhachhang','donhang.diachikh_id','=','diachikhachhang.id')
                ->select('donhang.id','diachikhachhang.maps_id','diachikhachhang.hoten','diachikhachhang.sdt','diachikhachhang.email','diachikhachhang.diachi','donhang.created_at')
                ->find($request->id);
            return response($ctkho);
        }
    }

    public function getxuly(Request $request){
        if ($request->ajax()){
            $nhanviens = DatHang::join('nhanviens','nhanviens.id','=','donhang.nhanvien_id')
                ->select('donhang.id','donhang.diachikh_id','donhang.nhanvien_id','donhang.tinhtrang','donhang.tongtien','donhang.ghichu')
                ->find($request->id);
            return response($nhanviens);
        }
    }

    public function getcart($id){
        $dh = DatHang::find($id);
        $dh_note = DatHang::find($id)->chitiettuychon;
        $dh_cart = DatHang::find($id)->chitietdathang;
        $donhang = DatHang::join('chitietdathang','chitietdathang.order_id','=','donhang.id')
            ->join('luachon','chitietdathang.luachon_id','=','luachon.id')
            ->join('menu','chitietdathang.menu_id','=','menu.id')
            ->join('images','menu.id','=','images.menu_id')
            ->join('diachikhachhang','diachikhachhang.id','=','donhang.diachikh_id')
            ->select('chitietdathang.id','donhang.tongtien','chitietdathang.luachon_id','menu.tensp','menu.gianew','chitietdathang.soluong','images.image','diachikhachhang.hoten','diachikhachhang.maps_id','diachikhachhang.sdt','diachikhachhang.diachi','diachikhachhang.email')
            ->where('donhang.id',$id)
            ->get();
        $chitiet=ChiTietTuyChon::join('luachon','luachon.id','=','chitiettuychon.luachon_id')
            ->join('tuychon','tuychon.matuychon','=','chitiettuychon.tuychon_id')
            ->select('chitiettuychon.luachon_id','tuychon.tentuychon','tuychon.menu_id')
            ->get();
        $dckh = DatHang::join('diachikhachhang','diachikhachhang.id','=','donhang.diachikh_id')
            ->join('nhanviens','nhanviens.id','=','donhang.nhanvien_id')
            ->select('donhang.id','donhang.tinhtrang','donhang.tongtien','diachikhachhang.hoten','diachikhachhang.diachi','diachikhachhang.maps_id','nhanviens.name','nhanviens.chucvu','nhanviens.sdt')
            ->where('donhang.id','=',$id)
            ->get();
        return view('TiTa.DonHang.cart',compact('dh','dh_note','dh_cart','dckh','chitiet','donhang'));
    }

    public function postedit(Request $request){
        if ($request->ajax()){
            $ctikho = DatHang::firstOrFail($request->id);
            $ctikho->update($request->all());
            return response($ctikho);
        }
    }

    public function UpdateXuLy(Request $request){
        if ($request->ajax()){
            $ctikho = DatHang::find($request->id);
            $ctikho->update($request->all());
            return response($ctikho);
        }
    }

    public function PDF($id){
        $dh = DatHang::find($id);
        $donhang = DatHang::join('chitietdathang','chitietdathang.order_id','=','donhang.id')
            ->join('luachon','chitietdathang.luachon_id','=','luachon.id')
            ->join('menu','chitietdathang.menu_id','=','menu.id')
            ->join('images','menu.id','=','images.menu_id')
            ->join('diachikhachhang','diachikhachhang.id','=','donhang.diachikh_id')
            ->select('chitietdathang.id','donhang.tongtien','chitietdathang.luachon_id','menu.tensp','menu.mota','menu.gianew','chitietdathang.soluong','images.image','diachikhachhang.hoten','diachikhachhang.maps_id','diachikhachhang.sdt','diachikhachhang.diachi','diachikhachhang.email','diachikhachhang.created_at')
            ->where('donhang.id',$id)
            ->get();
        $chitiet=ChiTietTuyChon::join('luachon','luachon.id','=','chitiettuychon.luachon_id')
            ->join('tuychon','tuychon.matuychon','=','chitiettuychon.tuychon_id')
            ->select('chitiettuychon.luachon_id','tuychon.tentuychon','tuychon.menu_id')
            ->get();

        ;
        return view('TiTa.DonHang.PDF',compact('dh','dh_note','dh_cart','dckh','chitiet','donhang'));
    }
}
