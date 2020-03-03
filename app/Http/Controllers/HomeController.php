<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UploadImageRequest;
use Intervention\Image\Facades\Image;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home',compact('user'));
    }

    public function updateIcon(UploadImageRequest $request){
        $user = Auth::user();
        $user = User::cast($user);
        if ($request["photo"]) {
            $photo = $request->file('photo');
            $img = Image::make($photo);
            $img->fit(200)->save($user->makeIconPath());
            $img->fit(50) ->save($user->makeIconMiniPath());
            return redirect("home")->with('success','Updated your Icon');
        }
        return redirect("home");
    }
}
