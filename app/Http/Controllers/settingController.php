<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class settingController extends Controller
{
    //Settng index
    public function settingIndex(){

      $settings = Setting::find(1);
      return view('admin.settings.logo.index', compact('settings'));

    }

    public function updateLogo(Request $request){


      //Old data for unlink
      $all_old_data = Setting::find(1);
      $logo_json = $all_old_data -> logo;
      $logo_data = json_decode($logo_json);
      $old_logo_lt_name = $logo_data -> logo_light;
      $old_logo_dk_name = $logo_data -> logo_dark;

      //Logo light
      $logo_light =  $request -> file('logo_light');
      $logo_lt_name = '';
      if ($request -> hasFile('logo_light')) {
        $logo_lt_name = md5(time().rand()).'.'. $logo_light -> getClientOriginalExtension();
        $logo_light -> move(public_path('media/settings/logo'), $logo_lt_name);
        unlink('media/settings/logo/'.$old_logo_lt_name);
      }else {
        $logo_lt_name = $old_logo_lt_name;
      }
      //Logo dark
      $logo_dark =  $request -> file('logo_dark');

      $logo_dk_name = '';
      if ($request -> hasFile('logo_dark')) {
        $logo_dk_name = md5(time().rand()).'.'. $logo_dark -> getClientOriginalExtension();
        $logo_dark -> move(public_path('media/settings/logo'), $logo_dk_name);
        unlink('media/settings/logo/'.$old_logo_dk_name);
      }else {
        $logo_dk_name = $old_logo_dk_name;
      }



      //Data array
      $all_logo_data = [

        'logo_light' => $logo_lt_name,
        'logo_light_size' => $request -> logo_light_size,
        'logo_dark' => $logo_dk_name,
        'logo_dark_size' => $request -> logo_dark_size,

      ];

      $logo_json = json_encode($all_logo_data);

      $settings = Setting::find(1);
      $settings -> logo = $logo_json;
      $settings -> update();

      return redirect() -> route('logo.setting') -> with('success', 'Logo updated successful !! ');

    }

    // Social index
    public function socialIndex(){
      $settings = Setting::find(1);
      return view('admin.settings.social.index', compact('settings'));
    }

    //Social data
    public function updateSocial(Request $request){

      $social_data = [
        'fb' => $request -> fb,
        'tr' => $request -> tr,
        'in' => $request -> in,
        'ins' => $request -> ins,
        'drbl' => $request -> drbl,
      ];

     $social_json  = json_encode($social_data);

     $settings = Setting::find(1);
     $settings -> social = $social_json;
     $settings -> update();

       return redirect() -> route('social.setting') -> with('success', 'Logo updated successful !! ');

    }

    //Copyright show
    public function copyrightIndex(){
      $settings = Setting::find(1);
      return view('admin.settings.copyright.index', compact('settings'));
    }

    //Copyright data
    public function updateCopyright(Request $request){

      $settings = Setting::find(1);
      $settings -> copyright = $request -> copyright;
      $settings -> update();

      return redirect() -> route('copyright.setting') -> with('success', 'Copyright updated successful !! ');

    }
}
