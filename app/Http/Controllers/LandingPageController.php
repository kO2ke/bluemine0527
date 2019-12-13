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

        $children = Thread::whereNull("parent_id")
                                    ->orderBy("updated_at")
                                    ->take(10)
                                    ->get();

        $recentTh = Thread::orderBy("updated_at")->take(10)->get();

        return view('welcome', compact('children', "recentTh", "landingImg"));
    }
}

