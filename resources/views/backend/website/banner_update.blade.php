
@extends('layout')
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
      <i class="fas fa-table"></i> Update Banner
      <a href="{{url('admin/banners')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

        <form method="post" action="{{url('admin/banner-update-save/'.$data->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
              <tr>
                  <th>Name</th>
                  <td><input type="text" value="{{$data->name}}" name="name" class="form-control" /></td>
              </tr>
              <tr>
                  <th>Image</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs/banner_image')}}/{{$data->image_path}}" /></p>
                    <input type="hidden" value="{{$data->image_path}}" name="old_image" />
                    <input type="file" name="image" />
                    <br>
                    <span>Note: Image width 1200px and height 400px</span>
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
