<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = ['tensp','soluong','giaold','gianew','mota','danhmuc_id'];

    public $timestamps = true;

    public function danhmuc(){
        return $this->belongsTo('App\DanhMuc');
    }

    public function images(){
        return $this->hasMany('App\Images');
    }

    public function giamgia(){
        return $this->hasMany('App\GiamGia');
    }

    public function chitietdathang(){
    return $this->hasMany('App\ChiTietDatHang');
    }

    public function chitietghichu(){
        return $this->hasMany('App\ChiTietGhiChu');
    }

    public function chitietkho(){
        return $this->hasMany('App\ChiTietKho');
    }

    public function tuychon(){
        return $this->hasMany('App\TuyChon');
    }
}
