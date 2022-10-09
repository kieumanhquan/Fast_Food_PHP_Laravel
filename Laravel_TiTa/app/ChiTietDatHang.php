<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDatHang extends Model
{
    protected $table = 'chitietdathang';

    protected $fillable = ['soluong','thanhtien','menu_id','order_id','luachon_id','created_at'];

    // protected $primaryKey = 'order_id';

    public $timestamps = true;

    public function menu(){
        return $this->belongsTo('App\Menu');
    }

    public function dathang(){
        return $this->belongsTo('App\DatHang');
    }

    public function luachon(){
        return $this->belongsTo('App\LuaChon');
    }
}
