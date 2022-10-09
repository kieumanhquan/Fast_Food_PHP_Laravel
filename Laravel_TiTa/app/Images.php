<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $fillable = ['image','menu_id'];

    public $timestamps = true;

    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
