<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["content", "user_id", "thread_id"];
    //
    public function posetedAt(){
        return $this->belongsTo("App\Thread");
    }

    public function owner()
    {
        return $this->belongsTo("App\User", "user_id");
    }
}
