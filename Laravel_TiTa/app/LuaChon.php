<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuaChon extends Model
{
  protected $table = 'luachon';

  protected $fillable = ['id','created_at'];

  public $timestamps = true;

  public function chitiettuychon(){
      return $this->hasMany('App\ChiTiettuychon');
  }

  public function chitietdathang(){
      return $this->hasMany('App\ChiTietDatHang');
  }

}
