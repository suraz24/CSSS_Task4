<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  protected $table = 'countries';   //define the table
  protected $primaryKey = "id";
  public $incrementing = false;
  protected $fillable = ['name'];

  public function resturants() {
      return $this->hasMany('App\Restaurant', 'country_id', 'id');
  }

  public function users() {
     return $this->hasMany('App/User','country_id','id');
  }
}
