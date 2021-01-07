<!DOCTYPE html>
<html lang="en">

{{-- Settings data  --}}
@php

  $settings_data = App\Models\Setting::find(1);
  $logo_json = $settings_data -> logo;
  $logo = json_decode($logo_json);

  $social_json = $settings_data -> social;
  $social = json_decode($social_json);
@endphp

  @include('frontend.layouts.head')

  <body>

    {{-- header  --}}
    @include('frontend.layouts.header')

    {{-- Main content  --}}
    @section('main-content')

    @show
    <!-- Footer-->
    @include('frontend.layouts.footer')

    <!-- end of footer-->
    @include('frontend.layouts.partials.scripts')
  </body>


<!-- Mirrored from themes.hody.co/html/comet/index-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:39:31 GMT -->
</html>
