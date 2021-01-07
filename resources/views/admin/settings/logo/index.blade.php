@extends('layouts.app')


@section('main-content')
  <!-- Page Wrapper -->

  {{-- Json data decode  --}}
  @php
    $logo_data_json = $settings -> logo;
    $logo_data = json_decode($logo_data_json);
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
									<h4 class="card-title">Site Logo</h4>
								</div>
								<div class="card-body">
									<form action="{{ route('logo.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
										<div class="form-group row">
											<label class="col-form-label col-md-2">Logo light</label>
											<div class="col-md-10">
												<img class="bg-dark" style="width:{{ $logo_data -> logo_light_size }}px" src="{{ URL::to('/') }}/media/settings/logo/{{ $logo_data -> logo_light }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Logo light</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="logo_light" class="custom-file-input" id="validatedCustomFile" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">logo Size</label>
											<div class="col-md-10">
												<input type="text" name="logo_light_size" value="{{ $logo_data -> logo_light_size }}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Logo Dark</label>
											<div class="col-md-10">
												<img style="width:{{ $logo_data -> logo_light_size }}px" src="{{ URL::to('/') }}/media/settings/logo/{{ $logo_data -> logo_dark }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Logo Dark</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="logo_dark" class="custom-file-input" id="validatedCustomFile" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">logo Size</label>
											<div class="col-md-10">
												<input type="text" name="logo_dark_size" value="{{ $logo_data -> logo_dark_size }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2"></label>
											<div class="col-md-10">
												<button class="btn btn-primary" type="submit">Update Logo</button>
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
