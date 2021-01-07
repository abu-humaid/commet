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
      <div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Our Clients</h4>
								</div>
								<div class="card-body">
                  @php
                    $clients_json_data = $homepage -> clients;
                    $client_data = json_decode($clients_json_data);
                  @endphp
									<form action="{{ route('clients.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Sub-Heading</label>
											<div class="col-md-10">
												<input type="text" name="sub_heading" value="{{ $client_data -> sub_heading }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading</label>
											<div class="col-md-10">
												<input type="text" name="heading" value="{{ $client_data -> heading }}" class="form-control">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Image One</label>
											<div class="col-md-10">
												<img style="width:150px;" src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_one }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image One</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="img_one" class="custom-file-input" id="validatedCustomFile" >
    													<input type="hidden" name="old_img_one" value="{{ $client_data -> img_one }}" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">Image Two</label>
											<div class="col-md-10">
												<img style="width:150px;" src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_two }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image Two</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="img_two" class="custom-file-input" id="validatedCustomFile" >
                              <input type="hidden" name="old_img_two" value="{{ $client_data -> img_two }}" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Image Theree</label>
											<div class="col-md-10">
												<img style="width:150px;" src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_three }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image Theree</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="img_three" class="custom-file-input" id="validatedCustomFile" >
                              <input type="hidden" name="old_img_three" value="{{ $client_data -> img_three }}" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">Image Four</label>
											<div class="col-md-10">
												<img style="width:150px;" src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_four }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image Four</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="img_four" class="custom-file-input" id="validatedCustomFile" >
                              <input type="hidden" name="old_img_four" value="{{ $client_data -> img_four }}" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Image Five</label>
											<div class="col-md-10">
												<img style="width:150px;" src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_five }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image Five</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="img_five" class="custom-file-input" id="validatedCustomFile" >
                              <input type="hidden" name="old_img_five" value="{{ $client_data -> img_five }}" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Image Six</label>
											<div class="col-md-10">
												<img style="width:150px;" src="{{ URL::to('/') }}/media/homepage/clients/{{ $client_data -> img_six }}" alt="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Upload Image Six</label>
											<div class="col-md-10">
                        <div class="custom-file">
    													<input type="file" name="img_six" class="custom-file-input" id="validatedCustomFile" >
                              <input type="hidden" name="old_img_six" value="{{ $client_data -> img_six }}" >
    													<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
    													<div class="invalid-feedback">Example invalid custom file feedback</div>
    										</div>
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
