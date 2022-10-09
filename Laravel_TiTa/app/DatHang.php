<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatHang extends Model
{
    protected $table = 'donhang';

    protected $fillable = ['tinhtrang','pp_thanhtoan','tongtien','ghichu','diachikh_id','nhanvien_id'];

    public $timestamps = true;

    public function diachikhachhang(){
        return $this->belongsTo('App\DiaChiKhachHang');
    }

    public function chitietdathang(){
        return $this->hasMany('App\ChiTietDatHang','order_id');
    }

    public function nhanvien(){
        return $this->belongsTo('App\NhanVienAdmin');
    }
}
