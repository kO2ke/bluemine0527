<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Thread;
use Auth;
use Log;

class OpenThreadController extends Controller
{
    //
    public function didLand($id) {
        $thread = Thread::with(['owner','posts.owner','children','parent'])->find($id);
        return view("thread", compact("thread"));
    }

    public function createThread(Request $request){
        $thread = new Thread();
        $thread->title       = $request->title;
        if ($request->thread_id != 0){
            $thread->parent_id   = $request->thread_id;
        }
        $thread->user_id     = Auth::user()->id;
        $thread->description = $request->description;
        $thread->save();
        if ($request->thread_id == 0){
            return redirect("/");
        }else{
            $strId = (string)$request->thread_id;
            var_dump($strId);
            return redirect("/thread/id=".$strId);
        }
    }

    public function createPost(Request $request)
    {
        $post = new Post();
        $post->user_id   = Auth::user()->id;
        $post->thread_id = $request->thread_id;
        $post->content = $request->content;
        $post->save();

        return redirect("/thread/id=".(string)$request->thread_id);
    }
}
