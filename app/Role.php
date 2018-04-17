<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';   //define the table
  protected $primaryKey = "id";
  public $incrementing = false;
  protected $fillable = ['name'];

  public function user() {
      return $this->belongsToMany('App\User', 'role_user')->withTimestamps();
  }
}
