<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Homepage;
use App\Models\Category;
use Illuminate\Http\Request;



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

    //Show single post
    public function blogSingle($slug){

      $single_post = Post::where('slug', $slug) -> first();

      return view('frontend.blog-single', compact('single_post'));
    }


    //Search post by Category
    public function blogSearchByCategory($slug){

    $cats =  Category::where('slug', $slug) -> first();

      return view('frontend.category-search', compact('cats'));
    }

    //Search post
    public function postSearch(Request $request){
      $search_data = $request -> search;
      $posts = Post::where('title','like','%'.$search_data.'%') -> orWhere('content','like','%'.$search_data.'%') -> get();
      return view('frontend.search',compact('posts'));
    }








}
