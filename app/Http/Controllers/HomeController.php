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
}
