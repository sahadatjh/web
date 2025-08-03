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
      <i class="fas fa-table"></i> Home Page Archive
      <a href="{{url('admin/create_home_page_archive')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
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
              <th>Title</th>
              <th>Image</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Image</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $home_archive)
              <tr>
                <td>{{$home_archive->id}}</td>
                <td>{{$home_archive->title}}</td>
                <td>
                  <img src="{{ asset('imgs/home_archive').'/'.$home_archive->image_path }}" width="100" />
                </td>
                <td>{{$home_archive->created_at}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/home_page_archives/'.$home_archive->id.'/edit')}}">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/home_page_archives/'.$home_archive->id.'/delete')}}">Delete</a>
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
