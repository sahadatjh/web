<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('lib')}}/bs4/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/custom.css?v={{ date('d') }}" />
    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('lib')}}/jquery-3.5.1.min.js"></script>
    <!-- BS4 Js -->
    <script type="text/javascript" src="{{asset('lib')}}/bs4/bootstrap.bundle.min.js"></script>

</head>
<body>
	<nav class="navbar-expand-lg navbar-dark bg-color-top">
		<!-- <div class="container text-white"> -->
		<div class="text-white ml-4 mr-4">
			<div class="row">
				<div class="col-md-6">
					<span>Date: Friday, October 9, 2023 Ph: <?php echo $website_settings->phone;?>,  Mail: <?php echo $website_settings->email;?></span>
				</div>
				<div class="col-md-6 text-right">
					<span>Mujib Coner, Sof, Coreer, Login : Student Protal For Payment</span>
				</div>
			</div>
		</div>
	</nav>

	<nav class="navbar-expand-lg navbar-dark bg-color-top-head">
		<div class="container text-white">
		<!-- <div class="text-white ml-4 mr-4"> -->
			<div class="row">
				<div class="col-md-2 header-logo">
					<!-- <span class="img-span-logo"><img src="{{asset('imgs/dummy')}}/logo.png?v={{ date('d') }}"></span> -->
					<span class="img-span-logo"><img src="{{asset('imgs/web_settings')}}/{{$website_settings->logo}}?v={{ date('d') }}"></span>
					<br>
					<span>ESTD : 1954 ;</span>
				</div>
				<div class="col-md-8 text-center header-text">
					<!-- <p style="float: left;padding-top: 20px;">ESTD : 1954 ;</p> -->

					<span class="school-name" style="font-size: 50px; font-weight: bold;">{{$website_settings->school_name}}</span><br>
					<span>{{$website_settings->address}}</span><br>
					<span>{{$website_settings->school_code}}</span>
				</div>
				<div class="col-md-2 text-right header-logo">
					<span class="img-span-logo"><img src="{{asset('imgs/web_settings')}}/{{$website_settings->logo}}?v={{ date('d') }}"></span><br>
					<span>EIIN : 0000000</span>
				</div>
			</div>
		</div>
	</nav>
	<?php 
		$notice = "";
		foreach ($recent_posts as $key => $value) {
			$notice .= $value->title."                           ";
		};
	?>
	<nav class="navbar-expand-lg navbar-dark bg-color-marque">
		<!-- <div class="container text-white"> -->
		<div class="text-white ml-4 mr-4">
			<div class="row">
				<div class="col-md-12 marquee-content">
					<marquee style="white-space: pre;" class="marquee-self">{{$notice}}</marquee>
				</div>
			</div>
		</div>
	</nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-main-nav">
    	<!-- <div class="container"> -->
    	<div class="">
		  <!-- <a class="navbar-brand" href="{{url('/')}}">MSM Lab</a> -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{url('/')}}">Home</a>
		      </li>
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="{{url('all-categories')}}">Categories</a>
		      </li> -->
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          About Us
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/at-a-glance')}}">At a Glance</a>
		          <a class="dropdown-item" href="{{url('page/history')}}">History</a>
		          <a class="dropdown-item" href="{{url('page/study-in-mbhs')}}">Why Study In mbhs</a> 
		           <!--<a class="dropdown-item" href="{{url('page/study-in-mbhs')}}">Why Study In mbhs</a> -->
		          <a class="dropdown-item" href="{{url('page/vision-and-mission')}}">Vision & Mission</a>
		          <a class="dropdown-item" href="{{url('page/chairman-message')}}">Chairman Message</a>
		          <!--<a class="dropdown-item" href="{{url('page/head-master-principal-message')}}">Head Master/ Principal  Message</a> -->
		          <a class="dropdown-item" href="{{url('page/head-master-message')}}">Head Master Message</a>
		          <a class="dropdown-item" href="{{url('page/governing-body')}}">Governing body</a>
		          <a class="dropdown-item" href="{{url('page/organogram')}}">Organogram</a> 
		          <!--<a class="dropdown-item" href="{{url('page/Organization Introduction')}}">Organization Introduction</a> -->
		          <a class="dropdown-item" href="{{url('page/our-location')}}">Our Location</a>
		          <a class="dropdown-item" href="{{url('page/future-plan')}}">Future Plan</a>
		          <a class="dropdown-item" href="{{url('page/beautiful-campus')}}">The Beautiful Campus</a>
		          <a class="dropdown-item" href="{{url('page/infrastructure')}}">Infrastructure</a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Academic
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/others-publication')}}">Others Publication</a>
		          <a class="dropdown-item" href="{{url('page/curriculum')}}">Curriculum</a>
		          <a class="dropdown-item" href="{{url('page/academic-calendar')}}">Academic Calendar</a>
		          <a class="dropdown-item" href="{{url('page/scholarship')}}">Scholarship</a>
		          <a class="dropdown-item" href="{{url('page/result')}}">Result</a>
		          <a class="dropdown-item" href="{{url('page/public-exam-result')}}">Public Exam Result</a>
		          <a class="dropdown-item" href="{{url('page/digital-contents')}}">Digital Contents</a>
		          <a class="dropdown-item" href="{{url('page/list-of-holidays')}}">List Of Holidays</a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Admission
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/admission-notice')}}">Admission Notice</a>
		          <a class="dropdown-item" href="{{url('page/guidelines')}}">Guidelines</a>
		          <a class="dropdown-item" href="{{url('page/admission-form')}}">Admission Form</a>
		          <a class="dropdown-item" href="{{url('page/admission-result')}}">Admission Result</a>
		          <a class="dropdown-item" href="{{url('page/apply-now')}}">Apply Now</a>
		          <a class="dropdown-item" href="{{url('page/admission-contents')}}">Admission Contents</a>
		          <a class="dropdown-item" href="{{url('page/fast-facts')}}">Fast Facts</a>
		          <a class="dropdown-item" href="{{url('page/fee-payment')}}">Fee & Payment</a>
		          <a class="dropdown-item" href="{{url('page/scholarships')}}">Scholarships</a>
		          <a class="dropdown-item" href="{{url('page/transfer-procedures')}}">Transfer Procedures</a>
		          <a class="dropdown-item" href="{{url('page/study-bmsc-shksc')}}">Study at BMSC/SHKSC</a>
		          <a class="dropdown-item" href="{{url('page/admission-circular')}}">Admission Circular</a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Rules Regulation
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/instruction-for-parents')}}">Instruction for Parents</a>
		          <a class="dropdown-item" href="{{url('page/instruction-for-students')}}">Instruction for Students</a>
		          <a class="dropdown-item" href="{{url('page/fee-and-expenditure')}}">Fee & Expenditure</a>
		          <a class="dropdown-item" href="{{url('page/fee-payment-procedure')}}">Fee Payment Procedure</a>
		          <a class="dropdown-item" href="{{url('page/uniform')}}">Uniform</a>
		          <a class="dropdown-item" href="{{url('page/house')}}">House</a>
		          <a class="dropdown-item" href="{{url('page/discipline')}}">Discipline </a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Information
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Notice Board</a>
		          <a class="dropdown-item" href="#">Payment Procedure</a>
		          <a class="dropdown-item" href="#">Facilities</a>
		          <a class="dropdown-item" href="#">News & Events</a>
		          <a class="dropdown-item" href="#">Our Achievements</a>
		          <a class="dropdown-item" href="#">Policies & Guidelines</a>
		          <a class="dropdown-item" href="#">Library</a>
		          <a class="dropdown-item" href="#">Health & Environmental info </a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Events
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Annual Cultural</a>
		          <a class="dropdown-item" href="#">Annual Sports</a>
		          <a class="dropdown-item" href="#">Inter Competition</a>
		          <a class="dropdown-item" href="#">Study Tour</a>
		          <a class="dropdown-item" href="#">Annual Picnic</a>
		          <a class="dropdown-item" href="#">Nobin Boron</a>
		          <a class="dropdown-item" href="#">Farewell</a>
		          <a class="dropdown-item" href="#">Parents Day</a>
		          <a class="dropdown-item" href="#">Special Day Celebration</a>
		          <a class="dropdown-item" href="#">College Magazine</a>
		          <a class="dropdown-item" href="#">Academic Activities</a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Co- Curriculum
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Arts & Cultural Club</a>
		          <a class="dropdown-item" href="#">BNCC</a>
		          <a class="dropdown-item" href="#">Business Club</a>
		          <a class="dropdown-item" href="#">Cultural</a>
		          <a class="dropdown-item" href="#">Debate Club</a>
		          <a class="dropdown-item" href="#">Girls Guide</a>
		          <a class="dropdown-item" href="#">Green Thumb</a>
		          <a class="dropdown-item" href="#">ICT Club</a>
		          <a class="dropdown-item" href="#">Language Club</a>
		          <a class="dropdown-item" href="#">Mathematics Club</a>
		        </div>
		      </li>
		      <li class="nav-item">
		       <a class="nav-link" href="{{url('all-teachers')}}">Teachers</a>
		      </li>

		      <!-- li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Dropdown link
		        </a>
		        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <li><a class="dropdown-item" href="#">Action</a></li>
		          <li><a class="dropdown-item" href="#">Another action</a></li>
		          <li class="dropdown-submenu">
		            <a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
		            <ul class="dropdown-menu">
		              <li><a class="dropdown-item" href="#">Submenu action</a></li>
		              <li><a class="dropdown-item" href="#">Another submenu action</a></li>


		              <li class="dropdown-submenu">
		                <a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
		                <ul class="dropdown-menu">
		                  <li><a class="dropdown-item" href="#">Subsubmenu action1</a></li>
		                  <li><a class="dropdown-item" href="#">Another subsubmenu action1</a></li>
		                </ul>
		              </li>
		              <li class="dropdown-submenu">
		                <a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
		                <ul class="dropdown-menu">
		                  <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
		                  <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
		                </ul>
		              </li>



		            </ul>
		          </li>
		        </ul>
		      </li> -->

		      @guest
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('login')}}">Login</a>
		      </li>
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="{{url('register')}}">Register</a>
		      </li> -->
		      @else
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('save-post-form')}}">Add Post</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{url('manage-posts')}}">Manage Posts</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{url('logout')}}">Logout</a>
		      </li>
		      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            	</form>
		      @endguest
		    </ul>
		  </div>
		</div>
	</nav>
	<!-- Get latest posts -->
	<!-- <main class="container mt-4"> -->
	<main class="m-4">
		@yield('content')
	</main>

	<!-- Footer -->
	<footer class="footer page-footer font-small footer_background pt-4">
	  <!-- Footer Links -->
	  <div class="container-fluid text-center text-md-left">
	    <!-- Grid row -->
	    <div class="row">
	      <!-- Grid column -->
	      <div class="col-md-6 mt-md-0 mt-3">
	        <!-- Content -->
	        <h5 class="text-uppercase">Short Content</h5>
	        <p>Here you can use rows and columns to organize your footer content.</p>
	      </div>
	      <!-- Grid column -->
	      <hr class="clearfix w-100 d-md-none pb-3">
	      <!-- Grid column -->
	      <div class="col-md-3 mb-md-0 mb-3">
	        <!-- Links -->
	        <h5 class="text-uppercase">Links</h5>
	        <ul class="list-unstyled">
	          <li>
	            <a href="#!">Link 1</a>
	          </li>
	          <li>
	            <a href="#!">Link 2</a>
	          </li>
	          <li>
	            <a href="#!">Link 3</a>
	          </li>
	          <li>
	            <a href="#!">Link 4</a>
	          </li>
	        </ul>
	      </div>
	      <!-- Grid column -->

	      <!-- Grid column -->
	      <div class="col-md-3 mb-md-0 mb-3">
	        <!-- Links -->
	        <h5 class="text-uppercase">Links</h5>
	        <ul class="list-unstyled">
	          <li>
	            <a href="{{url('all-categories')}}">Categories</a>
	          </li>
	          <li>
	            <a href="#!">Link 2</a>
	          </li>
	          <li>
	            <a href="#!">Link 3</a>
	          </li>
	          <li>
	            <a href="#!">Link 4</a>
	          </li>
	        </ul>
	      </div>
	      <!-- Grid column -->
	    </div>
	    <!-- Grid row -->
	  </div>
	  <!-- Footer Links -->

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">© 2023 Copyright:
	    <a href="/"> MSM.com</a>
	  </div>
	  <!-- Copyright -->
	</footer>
	<!-- Footer -->

	<style type="text/css">
		
		/*Css for multilevel navbae menu*/
		.dropdown-submenu {
		  position: relative;
		}

		.dropdown-submenu a::after {
		  transform: rotate(-90deg);
		  position: absolute;
		  right: 6px;
		  top: .8em;
		}

		.dropdown-submenu .dropdown-menu {
		  top: 0;
		  left: 100%;
		  margin-left: .1rem;
		  margin-right: .1rem;
		}

	</style>

	 <!-- Script for multilevel navbae menu -->
    <script type="text/javascript">
      
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass('show');
        });


        return false;
      });
    </script>

</body>
</html>