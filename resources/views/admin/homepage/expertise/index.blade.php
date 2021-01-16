@extends('layouts.app')


@section('main-content')
  <!-- Page Wrapper -->

  {{-- Json data decode  --}}
  @php
    $expertise_json = $homepage -> expertise;
    $expertise_data = json_decode($expertise_json);
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
									<h4 class="card-title">Expertise</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('expertise.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
										<div class="form-group row">
											<label class="col-form-label col-md-2">Background Image</label>
											<div class="col-md-10">
												<img class="bg-dark" style="width:200px" src="{{ URL::to('/') }}/media/homepage/expertise/{{ $expertise_data -> bg_img }}" alt="">
                        <input type="hidden" name="old_bg_img" value="{{ $expertise_data -> bg_img }}">
                      </div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Background Image</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="bg_img" class="custom-file-input" id="validatedCustomFile" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Sub Heading</label>
											<div class="col-md-10">
												<input type="text" name="sub_heading" value="{{ $expertise_data -> sub_heading }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading</label>
											<div class="col-md-10">
												<input type="text" name="heading" value="{{ $expertise_data -> heading }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Title One</label>
											<div class="col-md-10">
												<input type="text" name="title_one" value="{{ $expertise_data -> title_one }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content One</label>
											<div class="col-md-10">
												<input type="text" name="content_one" value="{{ $expertise_data -> content_one }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Title Two</label>
											<div class="col-md-10">
												<input type="text" name="title_two" value="{{ $expertise_data -> title_two }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content Two</label>
											<div class="col-md-10">
												<input type="text" name="content_two" value="{{ $expertise_data -> content_two }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Title Three</label>
											<div class="col-md-10">
												<input type="text" name="title_three" value="{{ $expertise_data -> title_three }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content Three</label>
											<div class="col-md-10">
												<input type="text" name="content_three" value="{{ $expertise_data -> content_three }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Title Four</label>
											<div class="col-md-10">
												<input type="text" name="title_four" value="{{ $expertise_data -> title_four }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content Four</label>
											<div class="col-md-10">
												<input type="text" name="content_four" value="{{ $expertise_data -> content_four }}" class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2"></label>
											<div class="col-md-10">
												<button class="btn btn-primary" type="submit">Update Expertise</button>
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
