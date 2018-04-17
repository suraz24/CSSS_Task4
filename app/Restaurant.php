<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';   //define the table
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $fillable = ['name', 'phone', 'address1', 'address2', 'suburb', 'state','numberofseats', 'country_id','category_id'];

    public function country() {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function posts() {
        return $this->hasMany('App/Post', 'restaurant_id', 'id');
    }
}
