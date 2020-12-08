<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function welcome(){
        return view('shared.user.welcome');
    }
   public function index(){
       return view('layout.user-master');
   }
}
