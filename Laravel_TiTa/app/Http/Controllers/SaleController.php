<?php

namespace App\Http\Controllers;

use App\GiamGia;
use App\Menu;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $menu =Menu::pluck('tensp','id');
        return view('TiTa.Sale.index',compact('menu'));
    }

    public function readata(){

        $sale = GiamGia::join('menu','giamgia.menu_id','=','menu.id')
            ->select('giamgia.id','giamgia.phantram','menu.tensp','menu.giaold','menu.gianew')
            ->get();
        return view('TiTa.Sale.list',compact('sale'));
    }

    public function AddSale(Request $request) {
        if ($request->ajax()){
            $ct = GiamGia::create($request->all());
            return response($ct->all());
        }
    }

    public function EditSale(Request $request){
        if ($request->ajax()){
            $ctkho = GiamGia::find($request->id);
            return response($ctkho);
        }
    }

    public function UpdateSale(Request $request){
        if ($request->ajax()){
            $ctikho = GiamGia::find($request->id);
            $ctikho->update($request->all());
            return response($ctikho);
        }
    }

    public function DestroySale(Request $request){
        if ($request->ajax()){
            GiamGia::destroy($request->id);
            return response(['message'=>'Đã Xoá']);
        }
    }
}
