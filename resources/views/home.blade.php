@extends('frontlayout')
@section('title','Home Page')
@section('content')
		<div class="row mb-5">
			<div class="col-md-3 height-300">
				<div class="row"> 
					<div class="card principal-msg" width="200">

						<?php 
						$left_banner_contents = null;
						$right_banner_contents = null;
						foreach ($banners_contents as $key => $banners_content) {
							if($banners_content->position == "left"){
								$left_banner_contents = $banners_content;
							}else{
								$right_banner_contents = $banners_content;
							}
						}

						?>

						<div class="text-center">
							<?php
								if(isset($left_banner_contents->image)){ ?>
									<img class="rounded" src="{{ asset('imgs/banner_contents').'/'.$left_banner_contents->image }}" width="50%" height="100">
								<?php }else{ ?>
									<img class="rounded" src="https://dummyimage.com/1200x400/000/fff" width="50%" height="100">
								<?php }
							?>
							
						</div>
						<p class="h-100">
							<?php
							if(isset($left_banner_contents->contents)){
								echo $left_banner_contents->contents;
							}else{
								echo "In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content";
							}
							?>
							
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 border height-300">

				<!-- bbbbbbbbbbbbbb -->

				<div class="row"> 

					<div class="slider_containter">

						<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">

						  	<?php if(!empty($banners)){
						  		$sl = 1;
						  		foreach ($banners as $key => $banner) {
						  		
						  	 ?>
						  	<div class="carousel-item <?php if($sl == 1){echo 'active';}?>" data-interval="10000">
						      <img src="{{ asset('imgs/banner_image').'/'.$banner->image_path }}" class="d-block w-100 height-300" alt="...">
						    </div>

						    <?php $sl++; } 
							}else{?>

						    <div class="carousel-item active" data-interval="10000">
						      <img src="https://dummyimage.com/1200x400/000/fff" class="d-block w-100 height-300" alt="...">
						    </div>
						    <div class="carousel-item" data-interval="10000">
						      <img src="https://dummyimage.com/1200x400/ccc/000" class="d-block w-100 height-300" alt="...">
						    </div>
						    <div class="carousel-item" data-interval="10000">
						      <img src="https://dummyimage.com/1200x400/000/fff" class="d-block w-100 height-300" alt="...">
						    </div>
						     <?php }?>

						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					  
					</div>
				</div>
				<!-- /.container -->


			</div>
			<div class="col-md-3 height-300">
				<div class="row">
					<div class="card chairman-msg" width="200">
						<div class="text-center">
							
							<?php
								if(isset($right_banner_contents->image)){ ?>
									<img class="rounded" src="{{ asset('imgs/banner_contents').'/'.$right_banner_contents->image }}" width="50%" height="100">
								<?php }else{ ?>
									<img class="rounded" src="https://dummyimage.com/1200x400/000/fff" width="50%" height="100">
								<?php }
							?>
						</div>
						<p class="h-100">
							<?php
							if(isset($right_banner_contents->contents)){
								echo $right_banner_contents->contents;
							}else{
								echo "In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content meaningful content";
							}
							?>
						</p>
					</div>
				</div>
			</div>
		</div>


		<div class="row">

			<div class="col-md-8">

				<!-- About us Section -->
				<div class="row about_us">
					<div class="col-md-12 mb-5"> 
						<div class="card text-center">
						  <h4>About Us</h4>
						  <h5><?php echo $about_us->title;?></h5>
						  <div class="card-body">
						    <p><?php echo $about_us->contents;?></p>
						  </div>
						</div>
					</div>
				</div>
				<!-- End About us section -->

				<!-- Necessary Links Section -->
				<div class="row about_us">
					<div class="col-md-6 mb-5"> 
						<!-- Online Fee Payment -->
						<div class="card mb-4">
							<h5 class="card-header">Online Fee Payment</h5>
							<div class="list-group list-group-flush">
								@foreach($online_fee_payments as $online_fee_payment)
								<a target="_blank" href="{{$online_fee_payment->link}}" class="list-group-item">{{$online_fee_payment->title}}</a>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-5"> 
						<!-- Online Exam Info -->
						<div class="card mb-4">
							<h5 class="card-header">Online Result</h5>
							<div class="list-group list-group-flush">
								@foreach($online_results as $online_result)
								<a target="_blank" href="{{$online_result->link}}" class="list-group-item">{{$online_result->title}}</a>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<!-- End Necessary Links -->

				<!-- <div class="row mb-5"> 
					@if(count($posts)>0)
						@foreach($posts as $post)
						<div class="col-md-4">
							<div class="card">
							  <a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('imgs/thumb/'.$post->thumb)}}" class="card-img-top" alt="{{$post->title}}" /></a>
							  <div class="card-body">
							    <h5 class="card-title"><a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h5>
							  </div>
							</div>
						</div>
						@endforeach
					@else
					<p class="alert alert-danger">No Post Found</p>
					@endif
				</div> -->
				<!-- Pagination -->
				<!-- {{$posts->links()}} -->
			</div>
			<!-- Right SIdebar -->
			<div class="col-md-4">
				<!-- Search -->
				<!-- <div class="card mb-4">
					<h5 class="card-header">Search</h5>
					<div class="card-body">
						<form action="{{url('/')}}">
							<div class="input-group">
							  <input type="text" name="q" class="form-control" />
							  <div class="input-group-append">
							    <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
							  </div>
							</div>
						</form>
					</div>
				</div> -->
				<!-- Recent Posts -->
				<div class="card mb-4">
					<h5 class="card-header">Notice</h5>
					<div class="list-group list-group-flush">
						@if($recent_posts)
							@foreach($recent_posts as $post)
								<a href="#" class="list-group-item">{{$post->title}}</a>
							@endforeach
						@endif
					</div>
				</div>
				<!-- Popular Events -->
				<div class="card mb-4">
					<h5 class="card-header">Events</h5>
					<div class="list-group list-group-flush">
						@foreach($all_events as $all_event)
						<a target="_blank" href="{{$all_event->link}}" class="list-group-item">{{$all_event->title}}</a>
						@endforeach
					</div>
				</div>
				<!-- Online Exam Info -->
				<div class="card mb-4">
					<h5 class="card-header">Online Exam Info</h5>
					<div class="list-group list-group-flush">
						@foreach($online_exam as $online_exm)
						<a target="_blank" href="{{$online_exm->link}}" class="list-group-item">{{$online_exm->title}}</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach($home_page_arcive as $home_archive)
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{ asset('imgs/home_archive').'/'.$home_archive->image_path }}">
				</div>
			</div>
			@endforeach
			<!-- <div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mb-4">
					<img src="{{asset('imgs/dummy')}}/400x250.png">
				</div>
			</div> -->
		</div>
@endsection('content')