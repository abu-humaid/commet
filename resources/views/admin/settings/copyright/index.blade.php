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
									<h4 class="card-title">Copyright Data</h4>
								</div>
								<div class="card-body">


									<form action="{{ route('copyright.update') }}" method="post" >
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
											<label class="col-form-label col-md-2">Copyright</label>
											<div class="col-md-10">
												<input type="text" name="copyright" value="{{ $settings -> copyright }}"  class="form-control">
											</div>
										</div>

                    <div class="form-group row">
											<label class="col-form-label col-md-2"></label>
											<div class="col-md-10">
												<button class="btn btn-primary" type="submit">Update Copyright</button>
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
