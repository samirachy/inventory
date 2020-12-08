@extends('layout.admin-master')
@section('title')
    Category
@endsection
@section('content')
    <h1 class="h3 mb-1 text-gray-800">All Category</h1></br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><a href="{{action('AdminController@create_category')}}" class="btn btn-sm btn-primary">Create</a></h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cat as $samira)
                <tr>
                <td>{{$samira->id}}</td>
                  <td>{{$samira->name}}</td>
                  <td><a href="{{action('AdminController@update_category',['id'=>$samira->id])}}" class="btn btn-sm btn-primary">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="{{action('AdminController@delete',['id'=>$samira->id])}}" class="btn btn-sm btn-danger">Del</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
@endsection