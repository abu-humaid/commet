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
                    $we_are_json_data = $homepage -> who_we_are;
                    $we_are_data = json_decode($we_are_json_data);
                  @endphp
									<form action="{{ route('we_are.update') }}" method="post" >
                    @csrf
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Sub-Heading</label>
											<div class="col-md-10">
												<input type="text" name="sub_heading" value="{{ $we_are_data -> sub_heading }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Heading</label>
											<div class="col-md-10">
												<input type="text" name="heading" value="{{ $we_are_data -> heading }}" class="form-control">
											</div>
										</div>
                    <div class="form-group row">
											<label class="col-form-label col-md-2">Content</label>
											<div class="col-md-10">
                        <textarea name="content"  class="form-control" rows="8" cols="80">{{ $we_are_data -> content }}</textarea>

											</div>
										</div>


                    <div class="form-group row">
											<label class="col-form-label col-md-2"></label>
											<div class="col-md-10">
												<button class="btn btn-primary" type="submit">Update</button>
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
