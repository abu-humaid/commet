<?php

namespace App\Http\Controllers;


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

    public function blogSingle($slug){

      $single_post = Post::where('slug', $slug) -> first();

      return view('frontend.blog-single', compact('single_post'));
    }

}
