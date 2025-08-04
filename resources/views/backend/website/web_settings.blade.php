
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
      <i class="fas fa-table"></i> Web Settings
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

        <form method="post" action="{{url('admin/web_settings_save')}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">

              <tr>
                  <th>School Name</th>
                  <td><input type="text" value="{{$data->school_name}}" name="school_name" class="form-control" /></td>
              </tr>

             <tr>
                <th>Address</th>
                <td><input type="text" value="{{$data->address}}" name="address" class="form-control" /></td>
             </tr>

             <tr>
                <th>School Code</th>
                <td><input type="text" value="{{$data->school_code}}" name="school_code" class="form-control" /></td>
             </tr>

              <tr>
                  <th>Logo</th>
                  <td>
                    <p class="my-2"><img width="80" src="{{asset('imgs/web_settings')}}/{{$data->logo}}" /></p>
                    <input type="hidden" value="{{$data->logo}}" name="old_logo" />
                    <input type="file" name="logo" />
                    <br>
                    <span>Note: Image width 340px and height 400px</span>
                  </td>
              </tr>

              <tr>
                <th>Phone</th>
                <td><input type="text" value="{{$data->phone}}" name="phone" class="form-control" /></td>
             </tr>

             <tr>
                <th>Email</th>
                <td><input type="text" value="{{$data->email}}" name="email" class="form-control" /></td>
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
