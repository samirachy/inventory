@extends('layout.admin-master')
@section('title')
    Blog
@endsection
@section('content')
<h1 class="h3 mb-1 text-gray-800">All Blog</h1></br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><a href="{{action('BlogController@create_blog')}}" class="btn btn-sm btn-primary">Create</a></h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($blog as $samira)
                <tr>
                <td>{{$samira->id}}</td>
                  <td>
                    @if($samira->imageName=='default.jpg')
                    <img width="50" height="40" src="{{asset('public/image/default.jpg')}}" alt="blog-image">
                    @else
                    <img width="50" height="40" src="{{asset('public/uploads/blog/'.$samira->imageName)}}" alt="blog-image">
                    </td>
                  @endif
                  <td>{{$samira->category['name']}}</td>
                  <td>{{$samira->title}}</td>
                  <td>{{str_limit($samira->description,10,'....')}}</td>
                  <td><a href="{{action('BlogController@update_blog',['id'=>$samira->id])}}" class="btn btn-sm btn-primary">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="{{action('BlogController@delete',['id'=>$samira->id])}}" class="btn btn-sm btn-danger">Del</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection