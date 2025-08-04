@extends('layout')
@section('meta_desc',$meta_desc)
@section('title',$title)
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> About Us
      <!-- <a href="{{url('admin/create_about_us')}}" class="float-right btn btn-sm btn-dark">Add Data</a> -->
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
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $about_us)
              <tr>
                <td>{{$about_us->id}}</td>
                <td>{{$about_us->title}}</td>
                <td>{{$about_us->created_at}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/about_us/'.$about_us->id.'/edit')}}">Update</a>
                  <!-- <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/about_us/'.$about_us->id.'/delete')}}">Delete</a> -->
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
