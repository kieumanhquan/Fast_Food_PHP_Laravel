<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaChiKhachHang extends Model
{
    protected $table = 'diachikhachhang';

    protected $fillable = ['id','hoten','sdt','email','diachi','maps_id'];

    public $timestamps = true;

    public function maps(){
        return $this->hasMany('App\Maps');
    }

    public function dathang(){
        return $this->hasMany('App\DatHang');
    }
}
