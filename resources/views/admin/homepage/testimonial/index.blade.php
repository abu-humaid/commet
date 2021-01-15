@extends('layouts.app')


@section('main-content')
  <!-- Page Wrapper -->

  {{-- Json data decode  --}}
  @php
    $homepage_data = App\Models\Homepage::find(1);
    $testimonial_json = $homepage_data -> testimonials;
    $testimonial_data = json_decode($testimonial_json);

  @endphp

<div class="page-wrapper">

  <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">Welcome To {{ Auth::user() -> name }}</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item active">Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->
      @include('validate')

    <div class="row">
      <div class="col-lg-10">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Testimonials</h4>
								</div>
								<div class="card-body">
                  <form action="{{ route('testimonials.store') }}" method="post" >
                    @csrf
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
												<input type="text" name="title" value="{{ $testimonial_data -> title }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Testimonial Sliders</label>
											<div class="col-md-10">
												<div class="testimonials-slider-container">

                          @foreach ($testimonial_data -> testimonials as $testimonial )
                            <div id="testimonials-card-{{ $testimonial -> testimonial_code }}" class="card">
                              <div data-toggle="collapse" data-target="#slide-{{ $testimonial -> testimonial_code }}" class="card-header">

                                <h3>Testimonial-{{ $testimonial -> testimonial_code }} <button id="testimonials-slide-remove-btn" remove_id="{{ $testimonial -> testimonial_code }}" class="close">&times;</button></h3>

                              </div>
                              <div id="slide-{{ $testimonial -> testimonial_code }}" class="collapse">
                                <div  class="card-body">
                                  <div class="form-group">
                                    <label for="">Quote</label>
                                    <input type="text" name="quote[]" value="{{ $testimonial -> quote }}" class="form-control">
                                    <input type="hidden" name="testimonial_code[]" value="{{ $testimonial -> testimonial_code }}" >
                                  </div>
                                  <div class="form-group">
                                    <label for="">Quote Author</label>
                                    <input type="text" name="quote_author[]" value="{{ $testimonial -> quote_author }}" class="form-control">
                                  </div>

                                </div>
                              </div>
                            </div>
                          @endforeach


                        </div>
											</div>
										</div>



                    <div class="form-group row">
                      <label class="col-form-label col-md-2">Add Slide</label>
											<div class="col-md-10">
												<button id="testimonials-slide-button" class="btn btn-primary" type="text">Add New Slide <i class="fa fa-plus ml-1" aria-hidden="true"></i></button>
											</div>
										</div>

                    <div class="form-group row">

											<div class="col-md-12 text-right">
												<button  class="btn btn-primary" type="submit">Save</button>
											</div>
										</div>



									</form>

								</div>
							</div>
						</div>
    </div>


  </div>
</div>
  <!-- /Page Wrapper -->
@endsection
