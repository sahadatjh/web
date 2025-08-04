
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
              <i class="fas fa-table"></i> Update Teacher
              <a href="{{url('admin/teacher_list')}}" class="float-right btn btn-sm btn-dark">All Teachers</a>
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

                <form method="post" action="{{url('admin/teacher-update-save/'.$data->id)}}" enctype="multipart/form-data">
                  @csrf
                  <table class="table table-bordered">
                      <tr>
                          <td>Name: <input type="text" name="name" class="form-control" value="{{$data->name}}" required/></td>
                          <td>Religion: <input type="text" name="religion" class="form-control" value="{{$data->religion}}" /></td>
                          <td>Nationality: <input type="text" name="nationality" class="form-control" value="{{$data->nationality}}" required/></td>
                          <td>
                            Photo: <input type="file" name="image" />
                            <input type="hidden" value="{{$data->photo}}" name="old_image" />
                            <span><img width="80" height="60" src="{{asset('imgs/teacher_image')}}/{{$data->photo}}" /></span>
                             <br>
                            <span>Note: Image width must be 300px and height 300px</span>
                          </td>
                      </tr>
                      <tr>
                          <td>Institute Name: <input type="text" name="institute_name" class="form-control" value="{{$data->institute_name}}" /></td>
                          <td>Present Post: <input type="text" name="present_post" class="form-control" value="{{$data->present_post}}" /></td>
                          <td>Date Of Birth: <input type="date" name="date_of_birth" class="form-control" value="{{$data->date_of_birth}}" /></td>
                          <td>mobile Number: <input type="text" name="mobile_number" class="form-control" value="{{$data->mobile_number}}" required/></td>
                      </tr>

                      <tr>
                          <td>Institution Serial Number: <input type="text" name="institution_serial_number" class="form-control" value="{{$data->institution_serial_number}}" /></td>
                          <td>Index Number: <input type="text" name="index_number" class="form-control" value="{{$data->index_number}}" /></td>
                          <td>Subject Teacher: <input type="text" name="subject_teacher" class="form-control" value="{{$data->subject_teacher}}" /></td>
                          <td>Joining Date: <input type="date" name="joining_date" class="form-control" value="{{$data->joining_date}}" /></td>
                      </tr>

                      <tr>
                          <td>Blood Group: <input type="text" name="blood_group" class="form-control" value="{{$data->blood_group}}" /></td>
                          <td>Father Name: <input type="text" name="father_name" class="form-control" value="{{$data->father_name}}" required/></td>
                          <td>Mother Name: <input type="text" name="mother_name" class="form-control" value="{{$data->mother_name}}" required/></td>
                          <td>Mailling Address: <input type="text" name="mailling_address" class="form-control" value="{{$data->mailling_address}}" /></td>
                      </tr>

                      <tr>
                          <td>Permanent Address: <input type="text" name="permanent_address" class="form-control" value="{{$data->permanent_address}}" /></td>
                          <td>Email: <input type="email" name="email" class="form-control" value="{{$data->email}}" required/></td>
                          <td>Sms Mobile: <input type="text" name="sms_mobile" class="form-control" value="{{$data->sms_mobile}}" /></td>
                      </tr>

                      <tr>
                          <table class="table table-bordered education_table">
                              <thead>
                                <tr>
                                      <th>INSTITUTION NAME</th>
                                      <th>EXAM NAME</th>
                                      <th>PASSING YEAR</th>
                                      <th>G.P.A</th>
                                      <th><span class="btn btn-primary addRow">Add</span></th>
                                    
                                </tr>
                              </thead>
                              <tbody class="education_body">

                                @php
                                  $ix = 0;
                                @endphp

                                @foreach ($teacher_educations as $index => $detail)

                                @php
                                  $ix++;
                                  $id_no = "tr_".$ix;
                                @endphp
                                <tr id="{{$id_no}}">
                                    <td> <input type="text" name="institution_name[]" class="form-control" value="{{$detail->institution_name}}" required/></td>
                                    <td> <input type="text" name="exam_name[]" class="form-control" value="{{$detail->exam_name}}"  required/></td>
                                    <td><input type="text" name="passing_year[]" class="form-control" value="{{$detail->passing_year}}"  required/></td>
                                    <td><input type="text" name="cgpa[]" class="form-control" value="{{$detail->cgpa}}"  required/></td>
                                    <td><span class="btn btn-danger" onclick="deleteRow(1)">Delete</span></td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </tr>

                      <tr>
                          <td colspan="4">
                              <input type="submit" class="btn btn-primary" value="Update" />

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

      