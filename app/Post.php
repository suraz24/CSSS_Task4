<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';   //define the table
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $fillable = ['content', 'restaurant_id', 'user_id'];

    public function restaurant() {
        return $this->belongsTo('App\Restaurant', 'restaurant_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }
}
