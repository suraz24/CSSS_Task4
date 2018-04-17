<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';   //define the table
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $fillable = ['name', 'email', 'password', 'country_id'];

    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function posts()
    {
      return $this->hasMany('App\Post', 'user_id', 'id');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function roles()
    {
      return $this->belongsToMany('App\Role', 'role_user');
    }

}
