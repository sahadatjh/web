@extends('frontlayout')
@section('title','All Teachers')
@section('content')
		<div class="row">

			<!-- Left Spacer -->
    		<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="row mb-5"> 
					@if(count($teachers)>0)
						@foreach($teachers as $teacher)
						<div class="col-md-3 mb-5">
							<div class="card card-product d-flex flex-column h-100">
							  <a href="#"><img src="{{ asset('imgs/teacher_image').'/'.$teacher->photo }}" class="card-img-top" alt="{{$teacher->name}}" /></a>
							  <div class="card-body" style="background-color: #ed7d31 !important;">
							    <h5 class="card-title" class="text-truncate"><a href="#">
							    	<span class="name-title">{{$teacher->name}}
							    	</span>
							    </a></h5>
							    <h5 class="card-title" class="text-truncate"><a href="#">
							    	<span class="content-label">Designation:</span> 
							    	<span class="content-title">{{$teacher->present_post}}</span>
							    </a></h5>
							    <h5 class="card-title" class="text-truncate"><a href="#">
							    	<span class="content-label">Subject:</span> 
							    	<span class="content-title">{{$teacher->subject_teacher}}</span>
							    </a></h5>
							    <h5 class="card-title" class="text-truncate"><a href="#">
							    	<span class="content-label">Mobile No:</span>  
							    	<span class="content-title">{{$teacher->mobile_number}}</span>
							    </a>
								</h5>
							    <h5 class="card-title" class="text-truncate"><a href="#">
							    	<span class="content-label">Email:</span>  
							    	<span class="content-title">{{$teacher->email}}</span>
							    </a></h5>
							  </div>
							</div>
						</div>
						@endforeach
					@else
					<p class="alert alert-danger">No Category Found</p>
					@endif
				</div>
				<!-- Pagination -->
				{{$teachers->links()}}
			</div>

			<!-- Left Spacer -->
    		<div class="col-md-1"></div>

			<!-- Right SIdebar -->
			<!-- <div class="col-md-4"> -->
				<!-- Recent Posts -->

				<!-- <div class="card mb-4">
					<h5 class="card-header">Recent Posts</h5>
					<div class="list-group list-group-flush">
						@if($recent_posts)
							@foreach($recent_posts as $post)
								<a href="#" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div> -->

				<!-- Popular Posts -->

				<!-- <div class="card mb-4">
					<h5 class="card-header">Popular Posts</h5>
					<div class="list-group list-group-flush">
						<a href="#" class="list-group-item">Post 1</a>
						<a href="#" class="list-group-item">Post 2</a>
					</div>
				</div> -->
			<!-- </div> -->
		</div>

		<style type="text/css">

			.card-product {
			    border: 4px solid;
			    border-color: #b5d56a !important;
			    box-shadow: #b5d56a;
			    background-color: #fff;
			    border-radius: 5px !important;
			}

			.card-body a .name-title{
				color: #fff !important;
				font-size: 1.25rem;
			    font-weight: 700;
			    display: block;
			}
			
			.card-body a .content-label{
				color: #fff !important;
			}
			.card-body a{
				font-size: 14px;
				color: #666 !important;
			}

		</style>
@endsection('content')