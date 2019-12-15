<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    public function posts()
    {
        return $this->hasMany("App\Post");
    }

    public function owner(){
        return $this->belongsTo("App\User","user_id");
    }

    public function  parent(){
        return $this->belongsTo("App\Thread","parent_id");
    }

    public function  children(){
        return $this->hasMany("App\Thread","parent_id");
    }
}
