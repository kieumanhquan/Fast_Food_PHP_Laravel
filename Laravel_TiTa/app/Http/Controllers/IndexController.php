<?php

namespace App\Http\Controllers;

use App\Cart;
use App\ChiTietDatHang;
use App\ChiTietTuyChon;
use App\DanhMuc;
use App\DatHang;
use App\LuaChon;
use App\DiaChiKhachHang;
use App\Images;
use App\Maps;
use App\GiamGia;
use App\Menu;
use App\TuyChon;
use Illuminate\Http\Request;
use App\Http\Requests\IndRequest;
use Session;

class IndexController extends Controller
{

    public function getdh($type){
      $donhang=DatHang::join('diachikhachhang','diachikhachhang.id','=','donhang.diachikh_id')
          ->select('donhang.id','donhang.tongtien','diachikhachhang.hoten','diachikhachhang.sdt','diachikhachhang.email','diachikhachhang.diachi','diachikhachhang.maps_id')
          ->where('donhang.id', $type)
          ->get();
      $chitietdh = ChiTietDatHang::join('menu','menu.id','=','chitietdathang.menu_id')
          ->join('images','menu.id','=','images.menu_id')
          ->select('chitietdathang.id','chitietdathang.order_id','chitietdathang.luachon_id','chitietdathang.soluong','menu.tensp','menu.gianew','chitietdathang.tongtien','images.image')
          ->where('chitietdathang.order_id',$type)
          ->get();
      $chitiet=ChiTietTuyChon::join('luachon','luachon.id','=','chitiettuychon.luachon_id')
          ->join('tuychon','tuychon.matuychon','=','chitiettuychon.tuychon_id')
          ->select('chitiettuychon.luachon_id','tuychon.tentuychon','tuychon.menu_id')
          ->get();
      return view('Hambuger.Page.Getdonhang',compact('donhang','chitietdh','chitiet','test'));
    }

    public function menu(){
        $menu = Menu::join('images','images.menu_id','=','menu.id')
            ->join('giamgia','giamgia.menu_id','=','menu.id')
            ->select('menu.id','images.image','giamgia.phantram','menu.giaold','menu.gianew','menu.tensp','menu.mota','menu.soluong')
            ->paginate(3);

//        dd($menu);
        $danhmuc =  Menu::where('danhmuc_id','=',1)->paginate(3);
        $danhmuc1 = Menu::where('danhmuc_id','=',2)->paginate(9);
        $danhmuc2 = Menu::where('danhmuc_id','=',6)->paginate(9);
        $danhmuc3 = Menu::where('danhmuc_id','=',7)->paginate(9);
        $danhmuc4 = Menu::where('danhmuc_id','=',8)->paginate(9);
        return view('Hambuger.Page.trangchu',compact('menu','menu1','danhmuc','danhmuc1','danhmuc2','danhmuc3','danhmuc4','menu_theoloai'));
    }

    public function loaimenu($type){
        $menu_theoloai = Menu::join('images','images.menu_id','=','menu.id')
            ->select('menu.id','menu.soluong','images.menu_id','images.image','menu.giaold','menu.mota','menu.gianew','menu.tensp')
            ->where('menu.danhmuc_id',$type)
            ->get();
        $sale = GiamGia::select('menu_id','phantram')
            ->get();
        $menu = Menu::join('images','images.menu_id','=','menu.id')
                ->join('giamgia','giamgia.menu_id','=','menu.id')
                ->select('menu.id','images.image','giamgia.phantram','menu.giaold','menu.gianew','menu.tensp','menu.mota','menu.soluong')
                ->get();
        $note = TuyChon::join('menu','tuychon.menu_id','=','menu.id')
                ->select('menu.id','tuychon.tentuychon','tuychon.menu_id')
                ->get();
        $danhmuc = DanhMuc::all();
        return view('Hambuger.Page.loaimenu',compact('menu_theoloai','danhmuc','menu','note','sale'));
    }

    public function getedit(Request $request){
        if ($request->ajax()){
            $ctkho = Menu::join('images','images.menu_id','=','menu.id')
                ->join('giamgia','giamgia.menu_id','=','menu.id')
                ->select('menu.id','menu.giaold','menu.gianew','images.image')
                ->find($request->id);
            return response($ctkho);
        }
    }

    public function getAddtoCar(Request $req,$id){
        $product = Menu::join('images','images.menu_id','=','menu.id')
            ->select('menu.id','menu.gianew','menu.giaold','menu.tensp','images.image')
            ->find($id);
        $old = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($old);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(Request $request){
        $notea = TuyChon::join('menu','tuychon.menu_id','=','menu.id')
              ->select('menu.id','tuychon.matuychon','tuychon.tentuychon','tuychon.menu_id','menu.tensp')
              ->get();
        $map = Maps::pluck('maps','id');
        $menu = Menu::select('id')->get();
        $luachon = TuyChon::select('id','menu_id','tentuychon');
        return view('Hambuger.Page.dathang',compact('map','luachon','notea','menu'));
    }

    public function postCheckout(IndRequest $req){
        $cart = Session::get('cart');

        $customer = new DiaChiKhachHang();
        $customer->hoten = $req->hoten;
        $customer->sdt = $req->sdt;
        $customer->email = $req->email;
        $customer->diachi = $req->diachi;
        $customer->maps_id = $req->maps;
        $customer->save();

        $bill = new DatHang();
        $bill->diachikh_id = $customer->id;
        $bill->nhanvien_id = 1;
        $bill->tinhtrang = 1;
        $bill->tongtien = 0;
        $bill->pp_thanhtoan = $req->payment_method;
        $bill->ghichu = $req->ghichu;
        $bill->save();

        $luachon = new LuaChon();
        $luachon->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new ChiTietDatHang();
            $bill_detail->order_id = $bill->id;
            $bill_detail->menu_id = $key;
            $bill_detail->soluong = $value['qty'];
            $bill_detail->tongtien = 0;
            $bill_detail->luachon_id = $luachon->id;
            $bill_detail->save();
        }

        foreach ($req->check as $tuychon_id) {
          $note = new ChiTietTuyChon();
          $note->luachon_id = $luachon->id;
          $note->tuychon_id = $tuychon_id;
          $note->save();
        }
        Session::forget('cart');
        return redirect()->route('getdh',['id' => $bill->id])->with('thongbao','Đặt Thành Công');
        // return response()->json(['Đặt hàng thành công' => $bill->id], 200);
    }

    public function getdeldh($iid){
      $menu = ChiTietDatHang::find($iid);
      $menu->delete($iid);
      return redirect()->back()->with(['message'=> 'Successfully deleted!!']);
    }

    public function checkout(){
      return view('Hambuger.Page.checkout');

    }

}
