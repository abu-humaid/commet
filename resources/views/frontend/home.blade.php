@extends('frontend.layouts.app')

@section('main-content')
  <!-- Home section-->
  @php
    //Client section data
    $clients_json = $homepage -> clients;
    $client_data = json_decode($clients_json);

    //Slider section data
    $slider_json = $homepage -> slider;
    $slider_data = json_decode($slider_json);

    //Who we are section data
    $we_are_json = $homepage -> who_we_are;
    $we_are_data = json_decode($we_are_json);

    //Vision section data
    $vision_json = $homepage -> vision;
    $vision_data = json_decode($vision_json);

    //Vision section data
    $testimonial_json = $homepage -> testimonials;
    $testimonial_data = json_decode($testimonial_json);

    //Expertise section data
    $expertise_json = $homepage -> expertise;
    $expertise_data = json_decode($expertise_json);

  @endphp
  <section id="home">
    <!-- Video background-->
    <div id="video-wrapper" data-fallback-bg="frontend/images/bg/5.jpg">
      <div data-property="{videoURL: '{{ $slider_data -> svideo }}'}" class="player"></div>
    </div>
    <!-- end of video background-->
    <!-- Home Slider-->
    <div id="home-slider" class="flexslider">
      <ul class="slides">

        @foreach ($slider_data -> slider as $slide)

          <li>
            <div class="slide-wrap">
              <div class="slide-content text-left bold-text">
                <div class="container">
                  <h6>{{ $slide -> sub_title }}</h6>
                  <h1 class="upper">{{ $slide -> title }}<span class="red-dot"></span></h1>
                  <p><a href="{{ $slide -> btn_01_link }}" class="btn btn-light-out">{{ $slide -> btn_01_title }}</a>
                  <a href="{{ $slide -> btn_02_link }}" class="btn btn-color btn-full">{{ $slide -> btn_02_title }}</a>
                  </p>
                </div>
              </div>
            </div>
          </li>
        @endforeach

      </ul>
    </div>
    <!-- end of home slider-->
  </section>
  <!-- end of home section-->
  <section id="about">
    <div class="container">
      <div class="title center">
        <h4 class="upper">{{ $we_are_data -> sub_heading }}</h4>
        <h2>{{ $we_are_data -> heading }}<span class="red-dot"></span></h2>
        <hr>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead-text serif text-center">{{ $we_are_data -> content }}</p>
          </div>
        </div>
        <!-- end of row-->
      </div>
      <!-- end of section content-->
    </div>
    <!-- end of container-->
  </section>
  <section class="p-0 b-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-4 img-side img-left mb-0">
          <div class="img-holder">
            <img src="{{ URL::to('/') }}/media/homepage/expertise/{{ $expertise_data -> bg_img }}" alt="" class="bg-img">
            <div class="centrize">
              <div class="v-center">
                <div class="title txt-xs-center">
                  <h4 class="upper">{{ $expertise_data -> sub_heading }}</h4>
                  <h3>{{ $expertise_data -> heading }}<span class="red-dot"></span></h3>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of side background image-->
        <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
          <div class="services">
            <div class="row">
              <div class="col-sm-6 border-bottom border-right">
                <div class="service"><i class="icon-focus"></i><span class="back-icon"><i class="icon-focus"></i></span>
                  <h4>{{ $expertise_data -> title_one }}</h4>
                  <hr>
                  <p class="alt-paragraph">{{ $expertise_data -> content_one }}</p>
                </div>
                <!-- end of service-->
              </div>
              <div class="col-sm-6 border-bottom">
                <div class="service"><i class="icon-layers"></i><span class="back-icon"><i class="icon-layers"></i></span>
                  <h4>{{ $expertise_data -> title_two }}</h4>
                  <hr>
                  <p class="alt-paragraph">{{ $expertise_data -> content_two }}</p>
                </div>
                <!-- end of service-->
              </div>
              <div class="col-sm-6 border-bottom border-right">
                <div class="service"><i class="icon-mobile"></i><span class="back-icon"><i class="icon-mobile"></i></span>
                  <h4>{{ $expertise_data -> title_three }}</h4>
                  <hr>
                  <p class="alt-paragraph">{{ $expertise_data -> content_three }}</p>
                </div>
                <!-- end of service-->
              </div>
              <div class="col-sm-6 border-bottom">
                <div class="service"><i class="icon-globe"></i><span class="back-icon"><i class="icon-globe"></i></span>
                  <h4>{{ $expertise_data -> title_four }}</h4>
                  <hr>
                  <p class="alt-paragraph">{{ $expertise_data -> content_four }}</p>
                </div>
                <!-- end of service-->
              </div>
            </div>
          </div>
          <!-- end of row-->
        </div>
      </div>
      <!-- end of row -->
    </div>
  </section>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-sm-4 img-side img-right">
          <div class="img-holder">
            <img src="{{ URL::to('/') }}/media/homepage/vision/{{ $vision_data -> vision_image }}" alt="" class="bg-img">
          </div>
        </div>
        <!-- end of side background image-->
      </div>
      <!-- end of row-->
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-8">
          <div class="title">
            <h4 class="upper">{{ $vision_data -> sub_title }}</h4>
            <h3>{{ $vision_data -> title }}<span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="text-box">
                <h4 class="upper small-heading">{{ $vision_data -> heading_one }}</h4>
                <p>{{ $vision_data -> content_one }}</p>
              </div>
              <!-- end of text box-->
            </div>
            <div class="col-sm-6">
              <div class="text-box">
                <h4 class="upper small-heading">{{ $vision_data -> heading_two }}</h4>
                <p>{{ $vision_data -> content_two }}</p>
              </div>
              <!-- end of text box-->
            </div>
            <div class="col-sm-6">
              <div class="text-box">
                <h4 class="upper small-heading">{{ $vision_data -> heading_three }}</h4>
                <p>{{ $vision_data -> content_three }}</p>
              </div>
              <!-- end of text box-->
            </div>
            <div class="col-sm-6">
              <div class="text-box">
                <h4 class="upper small-heading">{{ $vision_data -> heading_four }}</h4>
                <p>{{ $vision_data -> content_four }}</p>
              </div>
              <!-- end of text box-->
            </div>
          </div>
          <!-- end of row              -->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>
  <section id="portfolio" class="pb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="title m-0 txt-xs-center txt-sm-center">
            <h2 class="upper">Selected Works<span class="red-dot"></span></h2>
            <hr>
          </div>
        </div>
        <div class="col-md-6">
          <ul id="filters" class="no-fix mt-25">
            <li data-filter="*" class="active">All</li>
            <li data-filter=".branding">Branding</li>
            <li data-filter=".graphic">Graphic</li>
            <li data-filter=".printing">Printing</li>
            <li data-filter=".video">Video</li>
          </ul>
          <!-- end of portfolio filters-->
        </div>
      </div>
      <!-- end of row-->
    </div>
    <div class="section-content pb-0">
      <div id="works" class="four-col wide mt-50">
        <div class="work-item branding video">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/1.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Neleman Cava</h3>
                    <p>Branding, Video</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item graphic printing">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/7.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Sweet Lane</h3>
                    <p>Graphic, Printing</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item printing branding">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/6.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Jeff Burger</h3>
                    <p>Printing, Branding</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item video graphic">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/9.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Juice Meds</h3>
                    <p>Video, Graphic</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item branding graphic">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/11.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Prisma</h3>
                    <p>Graphic, Branding</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item printing graphic">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/10.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Delirio Tropical</h3>
                    <p>Printing, Graphic</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item printing branding">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/8.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Amendoas</h3>
                    <p>Printing, Branding</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="work-item graphic video">
          <div class="work-detail">
            <a href="portfolio-single-1.html">
              <img src="frontend/images/portfolio/3.jpg" alt="">
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3>Hnina</h3>
                    <p>Graphic, Video</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- end of portfolio grid-->
    </div>
  </section>
  {{-- Our clients section  --}}
  <section>
    <div class="container">
      <div class="title center">
        <h4 class="upper">{{ $client_data -> sub_heading }}</h4>
        <h3>{{ $client_data -> heading }}<span class="red-dot"></span></h3>
        <hr>
      </div>
      <div class="section-content">
        <div class="boxes clients">
          <div class="row">
            <div class="col-sm-4 col-xs-6 border-right border-bottom">
              <img src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_one }}" alt="" data-animated="true" class="client-image">
            </div>
            <div class="col-sm-4 col-xs-6 border-right border-bottom">
              <img src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_two }}" alt="" data-animated="true" data-delay="500" class="client-image">
            </div>
            <div class="col-sm-4 col-xs-6 border-bottom">
              <img src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_three }}" alt="" data-animated="true" data-delay="1000" class="client-image">
            </div>
            <div class="col-sm-4 col-xs-6 border-right">
              <img src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_four }}" alt="" data-animated="true" class="client-image">
            </div>
            <div class="col-sm-4 col-xs-6 border-right">
              <img src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_five }}" alt="" data-animated="true" data-delay="500" class="client-image">
            </div>
            <div class="col-sm-4 col-xs-6">
              <img src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_six }}" alt="" data-animated="true" data-delay="1000" class="client-image">
            </div>
          </div>
          <!-- end of row-->
        </div>
      </div>
      <!-- end of section content-->
    </div>
  </section>
  {{-- Testimonial section  --}}
  <section class="parallax">
    <div data-parallax="scroll" data-image-src="frontend/images/bg/6.jpg" class="parallax-bg"></div>
    <div class="parallax-overlay pb-50 pt-50">
      <div class="container">
        <div class="title center">
          <h3>{{ $testimonial_data -> title }}<span class="red-dot"></span></h3>
          <hr>
        </div>
        <div class="section-content">
          <div id="testimonials-slider" data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-outside">
            <ul class="slides">
              {{-- Testimonial sliders --}}
              @foreach ($testimonial_data -> testimonials as $testimonial)
                <li>
                  <blockquote>
                    <p>{{ $testimonial -> quote }}</p>
                    <footer>{{ $testimonial -> quote_author }}</footer>
                  </blockquote>
                </li>
              @endforeach


            </ul>
          </div>
        </div>
      </div>
      <!-- end of container-->
    </div>
  </section>
  <section>
    <div class="container">
      <div class="title center">
        <h4 class="upper">We have a few tips for you.</h4>
        <h2>The Blog<span class="red-dot"></span></h2>
        <hr>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            @php
              $all_post = App\Models\Post::latest() -> take(2) -> get();
            @endphp
            @foreach ($all_post as $post)
              <div class="blog-post">
                <div class="post-body">
                  <h3 class="serif"><a href="{{ route('blog.single', $post -> slug) }}">{{ $post -> title }}</a></h3>
                  <hr>
                  <p class="serif">{!! $post -> content !!}</p>
                  <div class="post-info upper"><a href="{{ route('blog.single', $post -> slug) }}">Read More</a><span class="pull-right black-text">{{ date('F d, Y', strtotime($post -> created_at) ) }}</span>
                  </div>
                </div>
                <!-- end of blog post-->
              </div>
            @endforeach


          </div>
        </div>
        <!-- end of row-->
        <div class="clearfix"></div>
        <div class="mt-25">
          <p class="text-center"><a href="{{ route('blog.index') }}" class="btn btn-color-out">View Full Blog   </a>
          </p>
        </div>
      </div>
      <!-- end of container-->
    </div>
  </section>
@endsection
