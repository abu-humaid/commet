@extends('layouts.app')

@section('main-content')
  <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col-sm-12">
            <h3 class="page-title">Welcome To Admin!</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item active">Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

<div class="row">
  <div class="col-lg-12">
    @include('validate')
    <a class="btn btn-sm btn-primary" data-toggle="modal" href="#post_modal">Add New Post</a>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">All Posts</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table data-table table-striped mb-0">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Post Title</th>
                  <th>Slug</th>
                  <th>Content</th>
                  <th>Categories</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($all_data as $data)
                  <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td>{{ $data -> title }}</td>
                    <td>{{ $data -> slug }}</td>
                    <td>{!! $data -> content !!}</td>
                    <td>
                      @foreach ($data -> categories as $category)
                          {{ $category -> name }} |
                      @endforeach
                    </td>

                    <td>
                      @if (!empty($data -> featured_image))
                        <img style="width:60px; height:60px;" src="{{ URL::to('/')}}/media/posts/{{ $data -> featured_image }} " alt="">
                      @endif


                    </td>
                    <td>
                      @if ($data -> status == 'Published')
                        <span class="badge badge-success">Published</span>
                      @else
                        <span class="badge badge-danger">Unpublished</span>
                      @endif
                    </td>
                    <td>{{ $data -> created_at -> diffForHumans() }}</td>
                    <td>
                      @if ($data -> status == 'Published')
                        <a class="btn btn-sm btn-danger" href="{{ route('post-unpublished', $data -> id) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>

                      @else
                        <a class="btn btn-sm btn-success" href="{{ route('post-published', $data -> id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      @endif

                      <a id="post_edit" class="btn btn-warning btn-sm" edit_id ="{{ $data -> id }}" data-toggle="modal" href="#post_modal_update">Edit</a>

                      <form class="d-inline" action="{{ route('post.destroy', $data -> id) }}" method="post">
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

    <div id="post_modal" class="modal  fade">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Post</h4>
            <button class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="modal-body">
            <form   action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="">Categories</label><br>

                @foreach ($categories as $category)
                  <input name="category[]" type="checkbox" id="cn" value="{{ $category -> id }}"> <label class="mr-1" for="cn">{{ $category -> name }}</label>
                @endforeach



              </div>
              <div class="form-group">
                <label class="display-4"for="fimage"><i class="fa fa-camera " aria-hidden="true"></i></label>
                <input class="d-none" type="file" name="fimg" id="fimage" >
                <img class="mw-100 d-block" id="post_fimage_load" src="" alt="">
              </div>
              <div class="form-group">
                <textarea id="post_editor" name="content"></textarea>
              </div>
              <div class="form-group">
                <input class="btn btn-block btn-primary" type="submit" value="Add">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="post_modal_update" class="modal fade">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Category</h4>
            <button class="close" data-dismiss='modal'>&times;</button>
          </div>
          <div class="modal-body">
            <form   action="{{ route('category.update') }}" method="post">
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
