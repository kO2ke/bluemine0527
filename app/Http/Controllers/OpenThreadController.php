<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class OpenThreadController extends Controller
{
    //
    public function didLand($id) {
        $thread    = Thread::find($id);
        $children  = $thread->  childThread;
        $parent    = $thread-> parentThread;
        $posts     = $thread->        posts;
        return view("thread", compact("thread", "children", "parent", "posts"));
    }
}
