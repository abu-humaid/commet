@extends('layouts.app')


@section('main-content')
  <!-- Page Wrapper -->

  {{-- Json data decode  --}}

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
                  <form action="#" method="" >

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Upload Video</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="" class="custom-file-input" id="validatedCustomFile" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
                    
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Sliders</label>
											<div class="col-md-10">
												<div class="comet-slider-container">

                          {{-- <div class="card">
                            <div data-toggle="collapse" data-target="#slide-1" class="card-header">
                              <h3>Slider-1</h3>
                            </div>
                            <div id="slide-1" class="collapse">
                              <div  class="card-body">
                                <div class="form-group">
                                  <label for="">Sub-title</label>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Title</label>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Button 01 Title</label>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Button 01 Link</label>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Button 02 Title</label>
                                  <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="">Button 02 Link</label>
                                  <input type="text" class="form-control">
                                </div>

                              </div>
                            </div>
                          </div> --}}

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
