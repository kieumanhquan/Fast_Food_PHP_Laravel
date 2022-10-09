<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmuc';

    protected $fillable = ['tendanhmuc','danhmuccha_id'];

    public $timestamps = true;

    public function menu(){
        return $this->hasMany('App\Menu');

    }
}
