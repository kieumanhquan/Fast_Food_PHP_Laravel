<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietKho extends Model
{
    protected $table = 'chitietkho';

    protected $fillable = ['id','soluong','gianhap','khohang_id','menu_id'];

    public $timestamps = true;

    public function menu(){
        return $this->belongsTo('App\Menu');
    }

    public function khohang(){
        return $this->belongsTo('App\KhoHang');
    }

}
