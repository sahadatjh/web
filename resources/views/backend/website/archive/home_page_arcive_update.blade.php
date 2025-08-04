
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
      <i class="fas fa-table"></i> Update Home Page Archive
      <a href="{{url('admin/home_page_archives')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

        <form method="post" action="{{url('admin/home_page_archive_update_save/'.$data->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
              <tr>
                  <th>Title</th>
                  <td><input type="text" value="{{$data->title}}" name="title" class="form-control" placeholder="Title" /></td>
              </tr>
              <tr>
                  <th>Image</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs/home_archive')}}/{{$data->image_path}}" /></p>
                    <input type="hidden" value="{{$data->image_path}}" name="old_image" />
                    <input type="file" name="image" />
                    <br>
                    <span>Note: Image width 480px and height 480px</span>
                  </td>
              </tr>
              <tr>
                  <td colspan="2">
                      <input type="submit" class="btn btn-primary" />
                  </td>
              </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
