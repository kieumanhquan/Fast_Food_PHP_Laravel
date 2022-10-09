<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    protected $table = 'khohang';

    protected $fillable = ['sanphamkho','soluong','giasanpham','tongtienkho','nhanvien_id'];

    public $timestamps = true;

    public function nhanvien(){
        return $this->belongsTo('App\NhanVienAdmin');
    }

    public function chitietkho(){
        return $this->hasMany('App\ChiTietKho');
    }
}