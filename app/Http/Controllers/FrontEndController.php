<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontEndController extends Controller
{
    public function homePage(){
      return view('frontend.home');
    }

    public function blogPage(){
      $all_post = Post::latest() -> get();
      return view('frontend.blog', compact('all_post'));
    }

    public function blogSingle(){
      return view('frontend.blog-single');
    }

}
