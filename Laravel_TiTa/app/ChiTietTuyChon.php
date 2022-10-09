<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietTuyChon extends Model
{
  protected $table = 'chitiettuychon';

  protected $fillable = ['tuychon_id','luachon_id','created_at'];

  public $timestamps =false;

  public function tuychon(){
      return $this->belongsTo('App\TuyChon');
  }

  public function luachon(){
      return $this->belongsTo('App\luachon');
  }


}
