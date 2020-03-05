<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;
    //
    public function posts()
    {
        return $this->hasMany("App\Post")->latest();
    }

    public function owner(){
        return $this->belongsTo("App\User","user_id");
    }

    public function  parent(){
        return $this->belongsTo("App\Thread","parent_id")->withTrashed();
    }

    public function  children(){
        return $this->hasMany("App\Thread","parent_id")->withTrashed();
    }

    public function isDeleted(){
        return isset($this->deleted_at);
    }
}
