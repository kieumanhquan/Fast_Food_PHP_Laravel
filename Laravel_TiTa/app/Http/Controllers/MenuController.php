<?php

namespace App\Http\Controllers;

use App\DanhMuc;
use App\Images;
use App\Menu;
use App\Http\Requests\MenuRequest;
use Request;
use File;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getAdd(){
        $danhmuc = DanhMuc::select('tendanhmuc','id','danhmuccha_id')->get()->toArray();
        return view('TiTa.Menu.add',compact('danhmuc'));
    }

    public function postAdd(MenuRequest $menu_request){
        $menu = new Menu();
        $menu->tensp = $menu_request->txtmenu;
        $menu->soluong=0;
        $menu->giaold=0;
        $menu->gianew=0;
        $menu->mota=$menu_request->txtmota;
        $menu->danhmuc_id=$menu_request->sltDanhmuc;
        $menu->save();
        $images_id = $menu->id;
        if($menu_request->hasFile('fImages')){
            $files = $menu_request->file('fImages');
            foreach ($files as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move('resources/uploads/detail/',$file_name);
                $charlies_files = new Images();
                $charlies_files->menu_id = $images_id;
                $charlies_files->image = $file_name;
                $charlies_files->save();
            }
        }
        return redirect()->route('xemmenu')->with(['flash_message'=>'Thêm Thành Công']);
    }

    public function findPage(){
        return Menu::join('danhmuc','danhmuc.id','=','menu.danhmuc_id')
            ->select('menu.id','menu.tensp','menu.soluong','menu.giaold','menu.gianew','menu.mota','danhmuc.tendanhmuc','menu.created_at')->paginate(5);
    }
    public function getList(){
        $data = $this->findPage();
        return view('TiTa.Menu.list',compact('data'));
    }
    public function Page(){
        $data = $this->findPage();
        return view('TiTa.Menu.Page',compact('data'));
    }

    public function getDelete($id){
        $menu_detail = Menu::find($id)->images->toArray();
        foreach ($menu_detail as $value){
            File::delete('resources/uploads/detail/'.$value["image"]);
        }
        $menu = Menu::find($id);
        $menu->delete($id);
        return redirect()->route('xemmenu')->with(['flash_message'=>'Xoá Thành Công']);
    }

    public function getEdit($id){
        $danhmuc = DanhMuc::select('id','tendanhmuc','danhmuccha_id')->get()->toArray();
        $menu = Menu::find($id);
        $menu_image = Menu::find($id)->images;
        return view('TiTa.Menu.edit',compact('danhmuc','menu','menu_image'));
    }

    public function postEdit($id,Request $request){
        $menu = Menu::find($id);
        $menu->tensp = Request::input('txtmenu');
        $menu->mota=Request::input('txtmota');
        $menu->danhmuc_id=Request::input('sltDanhmuc');
        $menu->save();
        if(!empty(Request::file('fImages'))){
            foreach (Request::file('fImages') as $file){
                $product_img = new Images();
                if (isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->menu_id = $id;
                    $file->move('resources/uploads/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('xemmenu')->with(['flash_message'=>'Sửa Thành Công']);
    }

    public function getDelImg($id){
        if (Request::ajax()){
            $idHinh=(int)Request::get('idHinh');
            $image_detail = Images::find($idHinh);
            if (!empty($image_detail)){
                $img = 'resources/uploads/detail/'.$image_detail->image;
                if (File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }


}