<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function posetedAt(){
        $this->belongsTo("App\Thread");
    }
}
