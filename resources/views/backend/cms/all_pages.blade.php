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
      <i class="fas fa-table"></i>
      {{$parent_menu}}
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
              <th>Create Date</th>
              <th>Update Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Create Date</th>
              <th>Update Date</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @php
                $ix = 1;
              @endphp
              @foreach($data as $content)
              <tr>
                <td>{{$ix}}</td>
                <td>{{$content->page_name}}</td>
                <td>{{$content->created_at}}</td>
                <td>{{$content->updated_at?$content->updated_at:'N/A'}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/cms_page/'.$content->id.'/edit')}}">Update</a>
                </td>
              </tr>
              @php
                $ix++;
              @endphp
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
