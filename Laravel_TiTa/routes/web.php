<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'Admin'],function (){
    Route::group(['prefix'=>'/'],function (){
        Route::get('/',['as'=>'trangchu','uses'=>'AdminController@gettrangchu']);
        Route::get('/cart',['as'=>'cart','uses'=>'AdminController@getcart']);
        Route::get('/morris',['as'=>'morris','uses'=>'AdminController@morris']);
        Route::get('login',['as'=>'adminlogin','uses'=>'AdminLoginController@getLogin']);
        Route::post('login',['as'=>'postlogin','uses'=>'AdminLoginController@postLogin']);
        Route::get('logout',['as'=>'adminlogout','uses'=>'AdminLoginController@getSignOut']);
    });
    Route::group(['prefix'=>'danhmuc'],function (){
        Route::get('/',['as'=>'xemdanhmuc','uses'=>'DanhmucController@getList']);
        Route::get('add',['as'=>'themdanhmuc','uses'=>'DanhmucController@getAdd']);
        Route::post('add',['as'=>'postthemdanhmuc','uses'=>'DanhmucController@postAdd']);
        Route::get('delete/{id}',['as'=>'xoadanhmuc','uses'=>'DanhmucController@getDelete']);
        Route::get('edit/{id}',['as'=>'suadanhmuc','uses'=>'DanhmucController@getEdit']);
        Route::post('edit/{id}',['as'=>'postsuadanhmuc','uses'=>'DanhmucController@postEdit']);
    });
    Route::group(['prefix'=>'menu'],function(){
        Route::get('/',['as'=>'xemmenu','uses'=>'MenuController@getList']);
        Route::get('/pagea',['as'=>'xemmenupag','uses'=>'MenuController@Page']);
        Route::get('add',['as'=>'themmenu','uses'=>'MenuController@getAdd']);
        Route::post('add',['as'=>'postthemmenu','uses'=>'MenuController@postAdd']);
        Route::get('delete/{id}',['as'=>'xoamenu','uses'=>'MenuController@getDelete']);
        Route::get('edit/{id}',['as'=>'suamenu','uses'=>'MenuController@getEdit']);
        Route::post('edit/{id}',['as'=>'postsuamenu','uses'=>'MenuController@postEdit']);
        Route::get('delimg/{id}',['as'=>'menuDelImg','uses'=>'MenuController@getDelImg']);
        Route::get('sale',['as'=>'xemsale','uses'=>'SaleController@index']);
        Route::get('sale/data',['as'=>'xemsaledata','uses'=>'SaleController@readata']);
        Route::post('saleadd',['as'=>'saleadd','uses'=>'SaleController@AddSale']);
        Route::get('saleedit',['as'=>'saleedit','uses'=>'SaleController@EditSale']);
        Route::post('saleupdate',['as'=>'saleupdate','uses'=>'SaleController@UpdateSale']);
        Route::post('destroy',['as'=>'xoasale','uses'=>'SaleController@DestroySale']);
        Route::get('/search',['as'=>'search','uses'=>'AdminController@search']);
    });
    Route::group(['prefix'=>'nhanvien'],function (){
        Route::get('/',['as'=>'xemnhanvien','uses'=>'QuanlyController@getnvien']);
        Route::get('/read-data',['as'=>'xemnv','uses'=>'QuanlyController@reddata']);
        Route::get('add',['as'=>'themnhanvien','uses'=>'QuanlyController@getAdd']);
        Route::post('add',['as'=>'postthemnhanvien','uses'=>'QuanlyController@postAdd']);
        Route::get('listt',['as'=>'xemttnhanvien','uses'=>'QuanlyController@getxemttnv']);
        Route::get('edit/{id}',['as'=>'suanhanvien','uses'=>'QuanlyController@getEdit']);
        Route::post('edit/{id}',['as'=>'postsuanhanvien','uses'=>'QuanlyController@postEdit']);
        Route::get('/searchkh',['as'=>'searchclients','uses'=>'QuanlyController@searchclients']);
    });
    Route::group(['prefix'=>'donhang'],function (){
        Route::get('/',['as'=>'xemdonhang','uses'=>'DonHangController@getdhang']);
        Route::get('ttkh',['as'=>'suadonhang','uses'=>'DonHangController@getedit']);
        Route::get('xuly',['as'=>'xulydh','uses'=>'DonHangController@getxuly']);
        Route::post('detailxuly',['as'=>'xulydh1','uses'=>'DonHangController@UpdateXuLy']);
        Route::get('edit/{id}',['as'=>'xulycart','uses'=>'DonHangController@getcart']);
        Route::post('edit/{id}',['as'=>'xulycart','uses'=>'DonHangController@postcart']);
        Route::get('pdf/{id}',['as'=>'pdf','uses'=>'DonHangController@PDF']);
    });
    Route::group(['prefix'=>'khohang'],function (){
        Route::get('/',['as'=>'xemkho','uses'=>'WareHouseController@getList']);
        Route::get('add',['as'=>'themkho','uses'=>'WareHouseController@getAddKho']);
        Route::post('add',['as'=>'postthemkho','uses'=>'WareHouseController@postAddKho']);
        Route::get('delete/{id}',['as'=>'xoakho','uses'=>'WareHouseController@getDeleteKho']);
        Route::get('editkho',['as'=>'suakho','uses'=>'WareHouseController@getEditKho']);
        Route::post('editkhoton',['as'=>'postsuakho','uses'=>'WareHouseController@postEditKho']);
        Route::get('detail',['as'=>'detail','uses'=>'WareHouseController@getListDetail']);
        Route::post('detailadd',['as'=>'detailadd','uses'=>'WareHouseController@AddDetail']);
        Route::get('detailedit',['as'=>'detailedit','uses'=>'WareHouseController@EditDetail']);
        Route::post('detailupdate',['as'=>'detailupdate','uses'=>'WareHouseController@UpdateDetail']);
        Route::post('destroy',['as'=>'xoadetail','uses'=>'WareHouseController@DestroyDetail']);
    });
});
Route::group(['prefix'=>'Hambuger'],function (){
    Route::group(['prefix'=>'/'],function (){
        Route::get('/',['as'=>'menu','uses'=>'IndexController@menu']);
        Route::get('/loai/{type}',['as'=>'loaimenu','uses'=>'IndexController@loaimenu']);
        Route::get('/Getdh/{id}',['as'=>'getdh','uses'=>'IndexController@getdh']);
        Route::get('deldh/{iid}',['as'=>'xoadh','uses'=>'IndexController@getdeldh']);
        Route::get('/ttsp',['as'=>'ttmenu','uses'=>'IndexController@getedit']);
        Route::get('add/{id}',['as'=>'themgiohang','uses'=>'IndexController@getAddtoCar']);
        Route::get('del-cart/{id}',['as'=>'xoagiohang', 'uses'=>'IndexController@getDelItemCart']);
        Route::get('dathang',['as'=>'dathang', 'uses'=>'IndexController@getCheckout']);
        Route::post('dathang',['as'=>'dathang', 'uses'=>'IndexController@postCheckout']);
        Route::get('dathang1',['as'=>'dathang1', 'uses'=>'IndexController@checkout']);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
