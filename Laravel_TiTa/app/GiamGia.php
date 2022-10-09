<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiamGia extends Model
{
    protected $table = 'giamgia';

    protected $fillable = ['id','menu_id','phantram'];

    public $timestamps = true;

    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
