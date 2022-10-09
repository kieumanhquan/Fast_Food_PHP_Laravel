<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuyChon extends Model
{
  protected $table = 'tuychon';

  protected $fillable = ['matuychon','menu_id','tentuychon'];

  public $timestamps = true;

  public function chitiettuychon(){
      return $this->hasMany('App\ChiTietTuyChon');
  }

  public function menu(){
      return $this->belongsTo('App\Menu');
  }
}
