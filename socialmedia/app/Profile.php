<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";
    protected $guarded = [];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function post()
    {
        return $this->hasMany('App\Post','profile_id');
    }

    public function page(){
        return $this->hasMany('App\Post','profile_id');
    }

    public function photo(){

    }
}
