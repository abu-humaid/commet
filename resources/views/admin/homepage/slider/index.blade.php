@extends('layouts.app')


@section('main-content')
  <!-- Page Wrapper -->

  {{-- Json data decode  --}}
  @php
    $homepage_data = App\Models\Homepage::find(1);
    $slider_json = $homepage_data -> slider;
    $slider_data = json_decode($slider_json);

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
									<h4 class="card-title">All Slider</h4>
								</div>
								<div class="card-body">
                  <form action="{{ route('slider.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Video Link</label>
											<div class="col-md-10">
												<input type="text" name="svideo" value="{{ $slider_data -> svideo }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Sliders</label>
											<div class="col-md-10">
												<div class="comet-slider-container">

                          @foreach ($slider_data -> slider as $slide )
                            <div id="slider-card-{{ $slide -> slider_code }}" class="card">
                              <div data-toggle="collapse" data-target="#slide-{{ $slide -> slider_code }}" class="card-header">

                                <h3>Slider-{{ $slide -> slider_code }} <button id="comet-slide-remove-btn" remove_id="{{ $slide -> slider_code }}" class="close">&times;</button></h3>

                              </div>
                              <div id="slide-{{ $slide -> slider_code }}" class="collapse">
                                <div  class="card-body">
                                  <div class="form-group">
                                    <label for="">Sub-title</label>
                                    <input type="text" name="sub_title[]" value="{{ $slide -> sub_title }}" class="form-control">
                                    <input type="hidden" name="slider_code[]" value="{{ $slide -> slider_code }}" >
                                  </div>
                                  <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title[]" value="{{ $slide -> title }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Button 01 Title</label>
                                    <input type="text" name="btn_01_title[]" value="{{ $slide -> btn_01_title }}" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Button 01 Link</label>
                                    <input type="text" name="btn_01_link[]" value="{{ $slide -> btn_01_link }}"  class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Button 02 Title</label>
                                    <input type="text" name="btn_02_title[]" value="{{ $slide -> btn_02_title }}"  class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Button 02 Link</label>
                                    <input type="text" name="btn_02_link[]" value="{{ $slide -> btn_02_link }}"  class="form-control">
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
												<button id="comet-slide-button" class="btn btn-primary" type="text">Add New Slide <i class="fa fa-plus ml-1" aria-hidden="true"></i></button>
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
