<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';   //define the table
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $fillable = ['content', 'post_id', 'user_id'];

    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
