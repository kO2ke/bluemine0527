<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Thread;
use Auth;
use Log;

class OpenThreadController extends Controller
{
    public function didLand($id) {
        $thread = Thread::withTrashed()->find($id);
        if(!isset($thread)){
            return redirect("/");
        }
        $thread->load('owner','posts.owner','children','parent');
        if ($thread->parent == null){
            $parentRoute = "/";
            $parentTitle = "TOP";
        }else{
            $parentRoute = route('thread.show',['id'=>$thread->parent->id]);
            $parentTitle = $thread->parent->title;
        }
        return view("thread", compact("thread", "parentRoute", "parentTitle"));
    }

    public function searchThread(Request $request){
        $searchText = $request->searchText;
        $title      = 'Searched by '.'"'.$searchText.'"';
        $results    = Thread::where('title', 'like', "%{$searchText}%")->latest()->paginate(15);
        return view("searchResult", compact("searchText", "results","title"));
    }

    public function recentThreads(){
        $title      = 'All Recent Thread';
        $results    = Thread::latest()->paginate(15);
        return view("searchResult", compact("results","title"));
    }

    public function topThreads(){
        $title      = 'All TOP Thread';
        $results    = Thread::whereNull("parent_id")->latest()->paginate(15);
        return view("searchResult", compact("results","title"));
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

    public function editThread(Request $request)
    {
        $thread = Thread::find($request->thread_id);

        if(isset($thread) == false){
            return redirect("/");
        }

        $thread->title       = $request->title;
        $thread->description = $request->description;
        $thread->save();

        if ($request->thread_id == 0){
            return redirect("/");
        }else{
            $strId = (string)$request->thread_id;
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

    public function deleteThread(Request $request)
    {
        $thread = Thread::find($request->thread_id);
        if(isset($thread)){
            $thread->delete();
        }
        return redirect("/thread/id=".(string)$request->thread_id);
    }

    public function restoreThread(Request $request)
    {
        $thread = Thread::withTrashed()->find($request->thread_id);
        if(isset($thread)){
            $thread->restore();
        }
        return redirect("/thread/id=".(string)$request->thread_id);
    }
}
