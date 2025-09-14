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
		        <a class="nav-link" href="{{url('/')}}">হোম </a>
		       <!-- <a class="nav-link" href="{{url('/')}}">Home</a> -->
		      </li>
		      
		      <!-- <li class="nav-item">
		        <a class="nav-link" href="{{url('all-categories')}}">Categories</a>
		      </li> -->
		      
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          আমাদের সম্পর্কে
		        </a>
		       <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          About Us
		        </a> -->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/institute-learning-permission')}}">প্রতিষ্ঠান পাঠদানের অনুমতি  </a>
		          <a class="dropdown-item" href="{{url('page/history')}}">প্রতিষ্ঠান পরিচিতি </a>
		          <a class="dropdown-item" href="{{url('page/study-in-mbhs')}}">কেন MBHS এ পড়বেন </a> 
		           <!--<a class="dropdown-item" href="{{url('page/study-in-mbhs')}}">Why Study In mbhs</a> -->
		          <a class="dropdown-item" href="{{url('page/vision-and-mission')}}">ভিসন এবং মিশন </a>
		          <a class="dropdown-item" href="{{url('page/chairman-message')}}">চেয়ারম্যান এর বার্তা </a>
		          <!--<a class="dropdown-item" href="{{url('page/head-master-principal-message')}}">Head Master/ Principal  Message</a> -->
		          <a class="dropdown-item" href="{{url('page/head-master-message')}}">প্রধান শিক্ষক এর বার্তা </a>
		          <a class="dropdown-item" href="{{url('page/governing-body')}}">পরিচালনা পর্ষদ </a>
		          <a class="dropdown-item" href="{{url('page/organogram')}}">অরগানোগ্রাম </a> 
		          <!--<a class="dropdown-item" href="{{url('page/Organization Introduction')}}">Organization Introduction</a> -->
		          <a class="dropdown-item" href="{{url('page/our-location')}}">আমাদের অবস্থান </a>
		          <a class="dropdown-item" href="{{url('page/future-plan')}}">ভবিষ্যৎ পরিকল্পনা </a>
		          <a class="dropdown-item" href="{{url('page/beautiful-campus')}}">সুন্দর ক্যাম্পাস </a>
		          <a class="dropdown-item" href="{{url('page/infrastructure')}}">অবকাঠামো </a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          প্রশাসনিক
		        </a>
		        
		       <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Academic
		        </a> -->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/others-publication')}}">অন্যান্য প্রকাশনা </a>
		          <a class="dropdown-item" href="{{url('page/curriculum')}}">Curriculum</a>
		          <a class="dropdown-item" href="{{url('page/academic-calendar')}}">প্রাতিষ্ঠানিক দিনপঞ্জি r</a>
		          <a class="dropdown-item" href="{{url('page/scholarship')}}">উপবৃত্তি </a>
		          <a class="dropdown-item" href="{{url('page/result')}}">Result</a>
		          <a class="dropdown-item" href="{{url('page/public-exam-result')}}">পাবলিক পরীক্ষার ফলাফল </a>
		          <a class="dropdown-item" href="{{url('page/student')}}">Student</a>
		          <a class="dropdown-item" href="{{url('page/list-of-holidays')}}">ছুটির তালিকা </a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          ভর্তি
		        </a>
		        
		       <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Admission
		        </a>-->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/admission-notice')}}">ভর্তি বিজ্ঞপ্তি </a>
		          <a class="dropdown-item" href="{{url('page/guidelines')}}">নির্দেশনা </a>
		          <a class="dropdown-item" href="{{url('page/admission-form')}}">ভর্তি ফর্ম </a>
		          <a class="dropdown-item" href="{{url('page/admission-result')}}">ভর্তি ফলাফল </a>
		          <a class="dropdown-item" href="{{url('page/apply-now')}}">ভর্তির আবেদন </a>
		          <a class="dropdown-item" href="{{url('page/admission-contents')}}">ভর্তি বিষয়বস্তু</a>
		          <a class="dropdown-item" href="{{url('page/fast-facts')}}">Fast Facts</a>
		          <a class="dropdown-item" href="{{url('page/fee-payment')}}">ফি </a>
		          <a class="dropdown-item" href="{{url('page/scholarships')}}">উপবৃত্তি </a>
		          <a class="dropdown-item" href="{{url('page/transfer-procedures')}}">Transfer Procedures</a>
		          <a class="dropdown-item" href="{{url('page/study-bmsc-shksc')}}">MBHS এ পড়াশোনা </a>
		          <a class="dropdown-item" href="{{url('page/admission-circular')}}">ভর্তি বিজ্ঞপ্তি </a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          প্রতিষ্ঠানের নিয়ম-কানুন
		        </a>
		        
		         <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Rules Regulation
		        </a> -->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="{{url('page/instruction-for-parents')}}">পিতামাতার প্রতি নির্দেশনা </a>
		          <a class="dropdown-item" href="{{url('page/instruction-for-students')}}">ছাত্রছাত্রীদের প্রতি নির্দেশনা </a>
		          <a class="dropdown-item" href="{{url('page/fee-and-expenditure')}}">ফি এবং বায় </a>
		          <a class="dropdown-item" href="{{url('page/fee-payment-procedure')}}">ফি পরিশোধের নিয়ম </a>
		          <a class="dropdown-item" href="{{url('page/uniform')}}">পোশাক </a>
		          <a class="dropdown-item" href="{{url('page/house')}}">বাসা</a>
		          <a class="dropdown-item" href="{{url('page/discipline')}}">শৃঙ্খলা  </a>
		        </div>
		      </li>

		        <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          তথ্য
		        </a>
		        
		        <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Information
		        </a>-->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">বিজ্ঞপ্তি বোর্ড </a>
		          <a class="dropdown-item" href="#">পেমেন্ট পদ্ধতি </a>
		          <a class="dropdown-item" href="{{url('page/branch')}}">শাখা</a>
		          <a class="dropdown-item" href="#">খবর ও ঘটনাবলী </a>
		          <a class="dropdown-item" href="#">আমাদের অর্জন </a>
		          <a class="dropdown-item" href="{{url('page/information-service')}}">তথ্য সেবা</a>
		          <a class="dropdown-item" href="#">Library</a>
		          <a class="dropdown-item" href="{{url('page/teaching-service')}}">পাঠদান সংক্রান্ত তথ্য</a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          ফটো গ্যালারি
		        </a>
		        
		         <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Events
		        </a>-->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">বার্ষিক সাংস্কৃতিক</a>
		          <a class="dropdown-item" href="#">বার্ষিক খেলাধুলা </a>
		          <a class="dropdown-item" href="#">আন্তঃ প্রতিযোগীতা </a>
		          <a class="dropdown-item" href="#">শিক্ষা সফর </a>
		          <a class="dropdown-item" href="#">বার্ষিক বনভোজন </a>
		          <a class="dropdown-item" href="#">নবীনবরণ </a>
		          <a class="dropdown-item" href="#">বিদায় অনুষ্ঠান </a>
		          <a class="dropdown-item" href="#">বাবা দিবস </a>
		          <a class="dropdown-item" href="#">বিশেষ দিনের উৎযাপন </a>
		          <a class="dropdown-item" href="#">কলেজ সাময়িকী </a>
		          <a class="dropdown-item" href="#">একাডেমিক কার্যক্রম </a>
		        </div>
		      </li>

		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          ক্লাব সমূহ
		        </a>
		        
		       <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Co- Curriculum
		        </a>-->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">চিত্র ও সাংস্কৃতিক ক্লাব </a>
		          <a class="dropdown-item" href="#">MBHS</a>
		          <a class="dropdown-item" href="#">ব্যবসায়িক ক্লাব  </a>
		          <a class="dropdown-item" href="#">সংস্কৃতি </a>
		          <a class="dropdown-item" href="#">বিতর্ক ক্লাব </a>
		          <a class="dropdown-item" href="#">গার্লস গাইড </a>
		          <a class="dropdown-item" href="#">গ্রিন থাম্ব </a>
		          <a class="dropdown-item" href="#">তথ্য প্রযুক্তি ক্লাব </a>
		          <a class="dropdown-item" href="#">ভাষা ক্লাব </a>
		          <a class="dropdown-item" href="#">গণিত ক্লাব </a>
		        </div>
		      </li>
		      <!--<li class="nav-item">
		       <a class="nav-link" href="{{url('all-teachers')}}">Teachers</a>
		      </li>-->
		       <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          শিক্ষকমন্ডলী
		        </a>
		        
		        <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Teachers
		        </a>-->
		        
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="{{url('teachers')}}?employee_type=mpo_teacher">এমপিও শিক্ষক</a>
		          <a class="dropdown-item" href="{{url('teachers')}}?employee_type=non_mpo_teacher">নন এমপিও শিক্ষক</a>
		          <a class="dropdown-item" href="{{url('teachers')}}?employee_type=office_staff">অফিস  সহকারী</a>
		          
		         <!-- <a class="dropdown-item" href="{{url('teachers')}}?employee_type=mpo_teacher">MPO Teacher</a>
		          <a class="dropdown-item" href="{{url('teachers')}}?employee_type=non_mpo_teacher">Non Mpo Teacher</a>
		          <a class="dropdown-item" href="{{url('teachers')}}?employee_type=office_staff">Office Staff</a>-->
		        </div>
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
		        <a class="nav-link" href="{{url('admin/login')}}">লগইন </a>
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