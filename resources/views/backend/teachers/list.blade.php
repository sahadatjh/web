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
      <i class="fas fa-table"></i> Teacher List
      <a href="{{url('admin/create-teacher')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
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
              <th>Name</th>
              <th>Photo</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Blood Group</th>
              <th>Nationality</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Photo</th>
              <th>Email</th>
              <th>Mobile Number</th>
              <th>Blood Group</th>
              <th>Nationality</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($data as $teacher)
              <tr>
                <td>{{$i}}</td>
                <td>{{$teacher->name}}</td>
                <td>
                  <img src="{{ asset('imgs/teacher_image').'/'.$teacher->photo }}" width="100" />
                </td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->mobile_number}}</td>
                <td>{{$teacher->blood_group}}</td>
                <td>{{$teacher->nationality}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/teacher/'.$teacher->id.'/edit')}}">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/teacher/'.$teacher->id.'/delete')}}">Delete</a>
                </td>
              </tr>
              @php
                $i++;
              @endphp
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
