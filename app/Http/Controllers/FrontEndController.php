<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Homepage;
use App\Models\Category;

class FrontEndController extends Controller
{
    public function homePage(){
      $homepage = Homepage::find(1);
      return view('frontend.home', compact('homepage'));
    }


    public function blogPage(){
      $all_post = Post::latest() -> get();
      return view('frontend.blog', compact('all_post'));
    }

    public function blogSingle($slug){

      $single_post = Post::where('slug', $slug) -> first();

      return view('frontend.blog-single', compact('single_post'));
    }

    public function blogSearchByCategory($slug){

    $cats =  Category::where('slug', $slug) -> first();

    // foreach ($cats -> posts as $post) {
    //   echo $post -> title;
    // }

      return view('frontend.search', compact('cats'));
    }








}
