@extends('layout')
@section('meta_desc',$meta_desc)
@section('title',$title)
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Banner Contents
      <!-- <a href="{{url('admin/create-banner-content')}}" class="float-right btn btn-sm btn-dark">Add Data</a> -->
    </div>
    <div class="card-body">
      <div class="table-responsive">

        @if($errors)
          @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
          @endforeach
        @endif

        @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
                
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Position</th>
              <th>Image</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Position</th>
              <th>Image</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $banner_content)
              <tr>
                <td>{{$banner_content->id}}</td>
                <td>{{$banner_content->position}}</td>
                <td>
                  <img src="{{ asset('imgs/banner_contents').'/'.$banner_content->image }}" width="100" />
                </td>
                <td>{{$banner_content->created_at}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/banner-content/'.$banner_content->id.'/edit')}}">Update</a>
                  <!-- <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/banner-content/'.$banner_content->id.'/delete')}}">Delete</a> -->
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
