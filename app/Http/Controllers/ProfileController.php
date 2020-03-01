<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class ProfileController extends Controller
{
   public function show($id){
       if($id == Auth::user()->id){
           return redirect('home');
       }
       $user = User::find($id);
       return view('profile',compact('user'));
   }
}
