<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function homePage(){
      return view('frontend.home');
    }
    public function blogPage(){
      return view('frontend.blog');
    }
    public function blogSingle(){
      return view('frontend.blog-single');
    }

}
