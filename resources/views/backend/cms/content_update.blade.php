
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
      <i class="fas fa-table"></i> {{$title}}
      <a href="{{url('admin/cms_pages/' . $parent_menu)}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

        <form method="post" action="{{url('admin/cms_page_update/'.$data->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <table class="table table-bordered">
              <tr>
                  <th>Title</th>
                  <td>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$title}}" readonly />
                  </td>
              </tr>

              <tr>
                  <th>Attachemnt Title</th>
                  <td>
                    <input type="text" class="form-control" name="attachment_title" placeholder="Attachemnt Title" value="{{$data->attachment_title}}" />
                  </td>
              </tr>


              <tr>
                  <th>Attachment(Only PDF)</th>
                  <td>
                    <input type="file" class="form-control" name="attachment" />
                    
                      @php
                        if($data->attachment_path != ""){
                          @endphp
                            <a target="_blank" href="{{ asset('attachments/files').'/'.$data->attachment_path }}"><span class="btn btn-info">Existing Attachment</span></a>
                          @php
                        }
                      @endphp
                    
                  </td>
              </tr>

              <tr>
                  <th>Detail</th>
                  <td>
                    <textarea name="contents" rows="10" cols="80" id="details_conent">{{$data->details}}</textarea>
                    
                  </td>
              </tr>

               <input type="hidden" id="image_up" value="{{ route('admin.ckeditor_upload', ['_token' => csrf_token()]) }}">

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
