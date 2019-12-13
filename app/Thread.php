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

    public function  parentThread(){
        return $this->belongsTo("App\Thread","parent_id");
    }

    public function  childThread(){
        return $this->hasMany("App\Thread","parent_id");
    }
}
