<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Thread;

class LandingPageController extends Controller
{
    public function didLand()
    {
        $landingImages = glob("./img/landing/*.jpg");
        $randnum       = array_rand($landingImages);
        $landingImg    = $landingImages[$randnum];

<<<<<<< HEAD
        $top_threads = Thread::whereNull("parent_id")
=======
        $children = Thread::whereNull("parent_id")
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc
                                    ->orderBy("updated_at")
                                    ->take(10)
                                    ->get();

<<<<<<< HEAD
        return view('welcome', compact('top_threads', "landingImg"));
=======
        $recentTh = Thread::orderBy("updated_at")->take(10)->get();

        return view('welcome', compact('children', "recentTh", "landingImg"));
>>>>>>> 2c52662bb030f7f96aea6fc6972a8b0cab479afc
    }
}

