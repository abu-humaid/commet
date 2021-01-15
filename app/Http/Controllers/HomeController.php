<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homepage;

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
        return view('home');
    }

    //Home index for backend
    public function homeClients(){
      $homepage = Homepage::find(1);
      return view('admin.homepage.clients.index', compact('homepage'));
    }

    //Update clients
    public function updateClients(Request $request){

      //Old data
      $old_img_one = $request -> old_img_one;
      $old_img_two = $request -> old_img_two;
      $old_img_three = $request -> old_img_three;
      $old_img_four = $request -> old_img_four;
      $old_img_five = $request -> old_img_five;
      $old_img_six = $request -> old_img_six;
      //Image one
      $img_one =  $request -> file('img_one');
      $img_one_name = '';
      if ($request -> hasFile('img_one')) {
        $img_one_name = md5(time().rand()).'.'. $img_one -> getClientOriginalExtension();
        $img_one -> move(public_path('media/homepage/clients'), $img_one_name);
        unlink('media/homepage/clients/'.$old_img_one);
      }else {
        $img_one_name = $old_img_one;
      }

      //Image two
      $img_two =  $request -> file('img_two');
      $img_two_name = '';
      if ($request -> hasFile('img_two')) {
        $img_two_name = md5(time().rand()).'.'. $img_two -> getClientOriginalExtension();
        $img_two -> move(public_path('media/homepage/clients'), $img_two_name);
        unlink('media/homepage/clients/'.$old_img_two);
      }else {
        $img_two_name = $old_img_two;
      }

      //Image three
      $img_three =  $request -> file('img_three');
      $img_three_name = '';
      if ($request -> hasFile('img_three')) {
        $img_three_name = md5(time().rand()).'.'. $img_three -> getClientOriginalExtension();
        $img_three -> move(public_path('media/homepage/clients'), $img_three_name);
        unlink('media/homepage/clients/'.$old_img_three);
      }else {
        $img_three_name = $old_img_three;
      }

      //Image Four
      $img_four =  $request -> file('img_four');
      $img_four_name = '';
      if ($request -> hasFile('img_four')) {
        $img_four_name = md5(time().rand()).'.'. $img_four -> getClientOriginalExtension();
        $img_four -> move(public_path('media/homepage/clients'), $img_four_name);
        unlink('media/homepage/clients/'.$old_img_four);
      }else {
        $img_four_name = $old_img_four;
      }

      //Image Four
      $img_five =  $request -> file('img_five');
      $img_five_name = '';
      if ($request -> hasFile('img_five')) {
        $img_five_name = md5(time().rand()).'.'. $img_five -> getClientOriginalExtension();
        $img_five -> move(public_path('media/homepage/clients'), $img_five_name);
        unlink('media/homepage/clients/'.$old_img_five);
      }else {
        $img_five_name = $old_img_five;
      }

      //Image Four
      $img_six =  $request -> file('img_six');
      $img_six_name = '';
      if ($request -> hasFile('img_six')) {
        $img_six_name = md5(time().rand()).'.'. $img_six -> getClientOriginalExtension();
        $img_six -> move(public_path('media/homepage/clients'), $img_six_name);
        unlink('media/homepage/clients/'.$old_img_six);
      }else {
        $img_six_name = $old_img_six;
      }

      $all_client_data = [

        'sub_heading' => $request -> sub_heading,
        'heading' => $request -> heading,
        'img_one' => $img_one_name,
        'img_two' => $img_two_name,
        'img_three' => $img_three_name,
        'img_four' => $img_four_name,
        'img_five' => $img_five_name,
        'img_six' => $img_six_name,
      ];

      $client_json = json_encode($all_client_data);

      $homepage = Homepage::find(1);
      $homepage -> clients = $client_json;
      $homepage -> update();

      return redirect() -> route('clients.index') -> with('success', 'Clients data updated successful !! ');

    }

    //Homepage slides index
    public function indexSlider(){

      return view('admin.homepage.slider.index');
    }

    //Sliders store
    public function storeSlider(Request $request){


       $slider_number = count($request -> title);

       $slider = [];
       for ($i=0; $i < $slider_number; $i++) {

         $slider_array = [
           'sub_title' => $request -> sub_title[$i],
           'slider_code' => $request -> slider_code[$i],
           'title' => $request -> title[$i],
           'btn_01_title' => $request -> btn_01_title[$i],
           'btn_02_title' => $request -> btn_02_title[$i],
           'btn_01_link' => $request -> btn_01_link[$i],
           'btn_02_link' => $request -> btn_02_link[$i],
         ];

         array_push($slider, $slider_array);

       }


       $slider_array = [
          'svideo' => $request -> svideo,
          'slider' => $slider,

       ];

       $slider_json = json_encode($slider_array);

       $homepage_data = Homepage::find(1);
       $homepage_data -> slider = $slider_json;
       $homepage_data -> update();

       return redirect() -> route('sliders.index') -> with('success', 'Slider data updated successful !! ');

    }

    //Who we are section
    public function indexWe_are(){

      $homepage = Homepage::find(1);
      return view('admin.homepage.we_are.index', compact('homepage'));

    }

    //who we are update
    public function updateWe_are(Request $request){

      $we_are_array = [

        'sub_heading' => $request -> sub_heading,
        'heading' => $request -> heading,
        'content' => $request -> content,

      ];

      $we_are_json = json_encode($we_are_array);

      $homepage_data = Homepage::find(1);
      $homepage_data -> who_we_are = $we_are_json;
      $homepage_data -> update();

      return redirect() -> route('we_are.index') -> with('success', 'Who we are data updated successful !! ');

    }

    //Homepage Vision section
    public function indexVision(){

      $homepage = Homepage::find(1);
      return view('admin.homepage.vision.index', compact('homepage'));

    }

    //Homepage vision update
    public function updateVision(Request $request){

      $old_vision_img = $request -> old_vision_img;

      $vision_image = $request -> file('vision_image');

      $vision_img_name = '';
      if ($request -> hasFile('vision_image')) {
          $vision_img_name = md5(time().rand()).'.'.$vision_image -> getClientOriginalExtension();
          $vision_image -> move(public_path('media/homepage/vision'), $vision_img_name);
          unlink('media/homepage/vision/'.$old_vision_img);
      } else {
        $vision_img_name = $old_vision_img;
      }


      $vision_array = [

          'vision_image' => $vision_img_name,
          'sub_title' => $request -> sub_title,
          'title' => $request -> title,
          'heading_one' => $request -> heading_one,
          'content_one' => $request -> content_one,
          'heading_two' => $request -> heading_two,
          'content_two' => $request -> content_two,
          'heading_three' => $request -> heading_three,
          'content_three' => $request -> content_three,
          'heading_four' => $request -> heading_four,
          'content_four' => $request -> content_four,

      ];

      $vision_json = json_encode($vision_array);

      $homepage_data = Homepage::find(1);
      $homepage_data -> vision = $vision_json;
      $homepage_data -> update();

      return redirect() -> route('vision.index') -> with('success', 'Vision data updated successful !! ');

    }

    //Homepage testimonials section
    public function indexTestimonials(){

      return view('admin.homepage.testimonial.index');
    }

    //Homepage testimonial section store
    public function storeTestimonials(Request $request){

      $testimonial_num = count($request -> quote_author);

      $testimonials = [];
      for ($i=0; $i < $testimonial_num; $i++) {

        $testimonial_array = [

          'quote' => $request -> quote[$i],
          'quote_author' => $request -> quote_author[$i],
          'testimonial_code' => $request -> testimonial_code[$i],

        ];

        array_push($testimonials, $testimonial_array);

      }

      $testimonial_array = [

          'title' => $request -> title,
          'testimonials' => $testimonials,

      ];

      $testimonial_json = json_encode($testimonial_array);

      $homepage_data = Homepage::find(1);
      $homepage_data -> testimonials = $testimonial_json;
      $homepage_data -> update();

      return redirect() -> route('testimonials.index') -> with('success', 'Testimonials data updated successful !! ');



    }




}
