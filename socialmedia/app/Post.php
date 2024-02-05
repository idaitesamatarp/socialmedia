<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $guarded = [];

    public function pembuat(){
        return $this->belongsTo('App\Profile','profile_id');
    }

    public function comment(){
        return $this->hasMany('App\Comment', 'post_id');
    }
}
