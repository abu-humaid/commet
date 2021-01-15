@extends('layouts.app')


@section('main-content')
  <!-- Page Wrapper -->

  {{-- Json data decode  --}}
  @php
    $vision_json = $homepage -> vision;
    $vision_data = json_decode($vision_json);
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
      <div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Vision Section</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('vision.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
										<div class="form-group row">
											<label class="col-form-label col-md-2">Image</label>
											<div class="col-md-10">
												<img class="bg-dark" style="width:200px;" src="{{ URL::to('/') }}/media/homepage/vision/{{ $vision_data -> vision_image }}" alt="">
                        <input type="hidden" name="old_vision_img" value="{{ $vision_data -> vision_image }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="vision_image" class="custom-file-input" id="validatedCustomFile" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Sub Title</label>
											<div class="col-md-10">
												<input type="text" name="sub_title" value="{{ $vision_data -> sub_title }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
												<input type="text" name="title" value="{{ $vision_data -> title }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading One</label>
											<div class="col-md-10">
												<input type="text" name="heading_one" value="{{ $vision_data -> heading_one }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content One</label>
											<div class="col-md-10">
                        <textarea name="content_one" class="form-control" rows="6" cols="80">{{ $vision_data -> content_one }}</textarea>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading Two</label>
											<div class="col-md-10">
												<input type="text" name="heading_two" value="{{ $vision_data -> heading_two }}"  class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content Two</label>
											<div class="col-md-10">
                        <textarea name="content_two" class="form-control" rows="6" cols="80">{{ $vision_data -> content_two }}</textarea>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading Three</label>
											<div class="col-md-10">
												<input type="text" name="heading_three" value="{{ $vision_data -> heading_three }}"  class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content Three</label>
											<div class="col-md-10">
                        <textarea name="content_three" class="form-control" rows="6" cols="80">{{ $vision_data -> content_three }}</textarea>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading Four</label>
											<div class="col-md-10">
												<input type="text" name="heading_four" value="{{ $vision_data -> heading_four }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content Four</label>
											<div class="col-md-10">
                        <textarea name="content_four" class="form-control" rows="6" cols="80">{{ $vision_data -> content_four }}</textarea>
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2"></label>
											<div class="col-md-10">
												<button class="btn btn-primary" type="submit">Update Vision</button>
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
