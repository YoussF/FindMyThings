<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My City – Place page</title>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
		<!--Main styles-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
		<!--Adaptive styles-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/adaptive.css') }}">
		<!--Swipe menu-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/pushy.css') }}">
		<!--fonts-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
		<!--animation css-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
		<!-- Slider Revolution -->
		<link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css') }}" media="screen" />
		<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
		<script src="{{ asset('https://use.fontawesome.com/f07d164c30.js') }}"></script>
		 <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

</head>
<body onload="initialize()" class="inner_page innerpage">
<div class="bg_parallax" id="inb">
<!--navigation swipe-->
<div class="menu-btn">&#9776;</div>
<nav class="pushy pushy-left">
	<div class="profile">
		@if (Auth::guest())
			<a href="#" class="log_btn">Log in</a>
		@else
			<div class="avatar"><img src="{{Auth::user()->getAvatar()}}" alt="#"></div>
			<h3><a href="/">{{Auth::user()->getName()}}</a></h3>
			<p style="text-align: center;color: white;">
					<i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->getGroupName()}} <br>
				<i class="fa fa-star" aria-hidden="true"></i> {{Auth::user()->getScore()}}
			</p>

			<a href="{{ route('logout') }}"
			onclick="event.preventDefault();
			document.getElementById('logout-form').submit();" class="log_btn">
			Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
			</form>
		@endif
		<ul class="side_menu" style="margin-top: 30px;">
			<li><a href="/"><i class="fa fa-map-marker" aria-hidden="true"></i> Map</a></li>
			<li><a href="/pending-aed"><i class="fa fa-file-text-o" aria-hidden="true"></i> Pending AED</a></li>
			<li><a href="/validate-aed"><i class="fa fa-file" aria-hidden="true"></i> Validate AED</a></li>

			@if(Auth::user()->isInvitated())
				<li>
					<a href="/invitation/{{Auth::user()->getInvitation()->group_id}}" disabled>
						<i class="fa fa-users" aria-hidden="true"></i> 
						Group invitation 
						<i class="fa fa-exclamation-circle" aria-hidden="true" style="color:#f2dede!important;"></i>
					</a>
				</li>
			@endif
			
			<li><a href="/settings"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
		</ul>
	</div>
</nav>



<div class="site-overlay"></div>
<div id="container">
<!--header-->
<div class="container-fluid header inner_head" style="margin-top: -85px;">
<div class="fixed_w">
<div class="row" >
<div class="col-md-12">
<a href="/" class="logo" style="color: #FFFFFF;font-size:24px;">&nbsp; CITIZEN MAP</a>
</div>
</div>
</div>
</div>
<div class="container page_info">

</div>
<div class="container contant">
<div class="row cont">
<!-- Left column-->
<div class="col-md-3 mobile_none sidebar" style="text-align:center;">
	<img src="{{Auth::user()->getAvatar()}}" alt="" style="margin-top:60px;" width="50%;">
	<p style="margin-top:20px;color:white;font-size:18px;">
		{{Auth::user()->getName()}} <br>
		<i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->getGroupName()}} <br>
		<i class="fa fa-star" aria-hidden="true"></i> {{Auth::user()->getScore()}}
	</p>
<div>
<!--map place point-->


</div>
</div>
<!--content-->
<div class="col-md-12 basic">

<!--Share this place btn and total visitors-->
<div class="share_block ">
<div class="pull-right">
<div>
<span>Total Score</span>
{{Auth::user()->getScore()}}
</div>
<div>
<span>Total AED validated</span>
{{Auth::user()->getAedCpt()}}
</div>
</div>
</div>


<div class="reviews">
<!--reviews-->

@yield('content')

</div>
</div>
</div>
</div>
</div>
</div>




<!--
#################################
- SCRIPT FILES -
#################################
-->
<!--Google maps API linl-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCsbzuJDUEOoq-jS1HO-LUXW4qo0gW9FNs"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!--scroll animate block-->
<script src="js/wow.min.js"></script>
<!--Other main scripts-->
<script src="js/all_scr.js"></script>
<!--Flickr-->
<script src="js/jflickrfeed.js"></script>
<!--Bootstrap js-->  
<script src="js/bootstrap.min.js"></script>
<!--Map js-->
<script type="text/javascript" src="js/map_place.js"></script>
<script type="text/javascript" src="js/infobox.js"></script>
<!--Slider Revolution-->
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!--Parallax-->
<script type="text/javascript" src="js/jquery.parallax-0.2-min.js"></script>
<!--Parallax bg-->
<script type="text/javascript">
   "use strict";
$('#inb').parallax({
'elements': [
{
'selector': '#inb',
'properties': {
'x': {
'background-position-x': {
'initial': 0,
'multiplier': 0.03,
'invert': true
}
},
'y': {
'background-position-y': {
'initial': 30,
'multiplier': 0.03,
'invert': true
}
}
}
}
]
});
</script>

</body>
</html>