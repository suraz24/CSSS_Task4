<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';   //define the table
  protected $primaryKey = "id";
  public $incrementing = false;
  protected $fillable = ['name'];

  public function resturants() {
      return $this->hasMany('App\Restaurant', 'category_id');
  }
}
