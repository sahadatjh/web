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
      <i class="fas fa-table"></i> Online Fee Payment
      <a href="{{url('admin/create_online_fee_payment')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
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
              <th>Link</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Link</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $online_fee_payment)
              <tr>
                <td>{{$online_fee_payment->id}}</td>
                <td>{{$online_fee_payment->title}}</td>
                <td>{{$online_fee_payment->link}}</td>
                <td>{{$online_fee_payment->created_at}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/online_fee_payment/'.$online_fee_payment->id.'/edit')}}">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/online_fee_payment/'.$online_fee_payment->id.'/delete')}}">Delete</a>
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
