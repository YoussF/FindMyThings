<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>FIND MY THINGS</title>
		<!-- Bootstrap -->
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
		 <script type="text/javascript">
		 var pos_lat,pos_long;
		 function locat(){
			 //console.log(clusters);
			// clusters.styles_.forEach(function(marker){marker.url = "{{asset('img/picto_heart.png')}}"; console.log(marker);});
			// googleAddListener('idle');
				// Try HTML5 geolocation.
			    if (navigator.geolocation) {
			      navigator.geolocation.getCurrentPosition(function(position) {
			        var pos = {
			          lat: position.coords.latitude,
			          lng: position.coords.longitude
			        };
			        pos_lat= position.coords.latitude;
			        pos_long = position.coords.longitude;
			        $("#pos_lat").val(pos_lat);
			        $("#pos_long").val(pos_long);
			        var infoWindow = new google.maps.InfoWindow({map: map});
			        infoWindow.setPosition(pos);
			        infoWindow.setContent('You are here');
			        map.setCenter(pos);
			        map.setZoom(13);
			        var marker = new google.maps.Marker({
						position: new google.maps.LatLng(pos),
						map: map,
						
					});
			      }, function() {
			        handleLocationError(true, iw_map, map.getCenter());
			      });
			    } else {
			      // Browser doesn't support Geolocation
			      handleLocationError(false, iw_map, map.getCenter());
			    }
			}
		 
		 
		 </script>
	</head>
	<body  class="inmap innerpage">
		
		
			@include('layouts.navbar')
		
				@include('layouts.header')
				
				@yield('content')

		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<!--scroll animate block-->
		<script src="{{ asset('js/wow.min.js') }}"></script>
		<!--Other main scripts-->
		<script src="{{ asset('js/all_scr.js') }}"></script>
		<!--Flickr-->
		<script src="{{ asset('js/jflickrfeed.js') }}"></script>
		<!--Bootstrap js-->  
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('js/markercluster.js') }}"></script>
		<!--Slider Revolution-->
		<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
		<!--Parallax-->
		<script type="text/javascript" src="{{ asset('js/jquery.parallax-0.2-min.js') }}"></script>
	</body>
</html>