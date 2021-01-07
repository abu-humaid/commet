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
									<h4 class="card-title">Site Logo</h4>
								</div>
								<div class="card-body">
                  @php
                    $social = $settings -> social;
                    $social_data = json_decode($social);
                  @endphp

									<form action="{{ route('social.update') }}" method="post" >
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Facebook</label>
											<div class="col-md-10">
												<input type="text" name="fb" value="{{ $social_data -> fb }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Twitter</label>
											<div class="col-md-10">
												<input type="text" name="tr" value="{{ $social_data -> tr }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Linkedin</label>
											<div class="col-md-10">
												<input type="text" name="in" value="{{ $social_data -> in }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Instagram</label>
											<div class="col-md-10">
												<input type="text" name="ins" value="{{ $social_data -> ins }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Dribbble</label>
											<div class="col-md-10">
												<input type="text" name="drbl" value="{{ $social_data -> drbl }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2"></label>
											<div class="col-md-10">
												<button class="btn btn-primary" type="submit">Update Social Media</button>
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
