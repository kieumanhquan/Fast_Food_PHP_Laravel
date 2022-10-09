<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVienAdmin extends Model
{

    protected $table = 'nhanviens';

    protected $fillable = ['name','CMND','diachi','chucvu','sdt','email','password'];

    public $timestamps = true;

    public function dathang(){
        return $this->hasMany('App\DatHang');
    }

    public function khohang(){
        return $this->hasMany('App\KhoHang');
    }
}
