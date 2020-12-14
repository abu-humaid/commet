@extends('layouts.app')

@section('main-content')
  <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">Welcome To Adimin!</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item active">Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

    <div class="row">
      <div class="col-lg-10">
        @include('validate')
        <a class="btn btn-sm btn-primary" data-toggle="modal" href="#tag_modal">Add New Tag</a>
        <br><br>
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">All Tags</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped mb-0">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Tag Name</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_data as $data)
                      <tr>
                        <td>{{ $loop -> index + 1 }}</td>
                        <td>{{ $data -> name }}</td>
                        <td>{{ $data -> slug }}</td>
                        <td>
                          @if ($data -> status == 'Published')
                            <span class="badge badge-success">Published</span>
                          @else
                            <span class="badge badge-danger">Unpublished</span>
                          @endif
                        </td>
                        <td>
                          @if ($data -> status == 'Published')
                            <a class="btn btn-sm btn-danger" href="{{ route('tag-unpublished', $data -> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>

                          @else
                            <a class="btn btn-sm btn-success" href="{{ route('tag-published', $data -> id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                          @endif

                          <a id="tag_edit" class="btn btn-warning btn-sm" edit_id ="{{ $data -> id }}" data-toggle="modal" href="#tag_modal_update">Edit</a>

                          <form class="d-inline" action="#" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                          </form>

                        </td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div id="tag_modal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Tag</h4>
            <button class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="modal-body">
            <form   action="{{ route('tag.store') }}" method="post">
              @csrf
              <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Name">
              </div>
              <div class="form-group">
                <input class="btn btn-block btn-primary" type="submit" value="Add">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="tag_modal_update" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Tag</h4>
            <button class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="modal-body">
            <form   action="{{ route('tag.update') }}" method="post">
              @csrf
              <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Name">
                <input class="form-control" type="hidden" name="id" placeholder="Name">
              </div>
              <div class="form-group">
                <input class="btn btn-block btn-primary" type="submit" value="Update">
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
