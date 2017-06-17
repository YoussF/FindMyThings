<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIND MY THINGS</title>
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



      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

      <!-- Core stylesheets -->
      <link href="{{ asset('design_theme/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('design_theme/css/pixeladmin.min.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('design_theme/css/widgets.min.css') }}" rel="stylesheet" type="text/css">

      <!-- Theme -->
      <link href="{{ asset('design_theme/css/themes/clean.min.css') }}" rel="stylesheet" type="text/css">

      <!-- Pace.js -->
      <script src="{{ asset('design_theme/pace/pace.min.js') }}"></script>
      <style type="text/css">

      </style>
  </head>
  <body class="list-comments">
      
      @yield('left_menu')
      <!-- Navbar -->
  <nav class="navbar px-navbar">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">FIND MY THINGS</a>
    </div>


    @if (!Auth::guest())
      <div class="collapse navbar-collapse" id="px-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
                    </li>
        <li  class="px-nav-item" >
          <a href="/settings"><i class="px-nav-icon ion-ios-gear"></i><span class="px-nav-label">Settings</span></a>
        </li>        
        <li class="px-nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" ><i class="px-nav-icon ion-android-exit"></i><span class="px-nav-label">Logout</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
          </ul>
        </li>
      </ul>
        </ul>

      </div>

    @endif

  </nav>
      @yield('content')
  <!-- ========= MODAL ========= -->
  @include('design.home.components.registerAED')

  <!-- Load jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <script async >
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                container: 'body'
            });
        });
        var input = document.getElementById('locationField');
        options = {
            'types': [ "belgium" ],
            'language' : 'fr'
        };
        //autocomplete = new google.maps.places.Autocomplete(input, options);
    </script>

  <!-- Core scripts -->
  <script src="{{ asset('design_theme/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('design_theme/js/pixeladmin.min.js') }}"></script>

  <!-- Your scripts -->
  <script src="{{ asset('design_theme/js/app.js') }}"></script>

  <script src="{{ asset('front_theme/js/vuejs.js') }}"></script>
  <script src="{{ asset('front_theme/js/main.js') }}"></script>

  <script src="{{ asset('js/markercluster.js') }}"></script>


    <script>
        $('#defineLocBrowser').click(function(e) {
            e.preventDefault();
            // Ask for location
            var geocoder = new google.maps.Geocoder;
            getLocation();

            $(this).children().removeClass('fa-map-marker').addClass('fa-spinner').addClass('fa-pulse');


            function getLocation() {
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }
            function showPosition(position) {
                var latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if(results[1]) {
                            var data = {
                                'location': results[0].formatted_address
                            };
                            $.ajax({
                                type: "POST",
                                url: "/location/set",
                                data: data,
                                success: function (result) {
                                    $('#locationField').val(data.location);
                                    $('#defineLocBrowser').hide();
                                    $('.removeLocation').show();
                                }
                            });
                        }
                    }
                });
            }
        });
    </script>

<script>
    $('.removeLocation').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/location/reset",
            success: function (result) {
                $('#locationField').val('');
                $('.removeLocation').hide();
                $('#defineLocBrowser').show();
            }
        });
    });

    $('.list-comments').on('click', '.loadComments', function (e) {
        var aed_id = $(this).attr('aed-id');
        //get info from database
        $.ajax({
            type: "GET",
            url: "/aedinfo/" + aed_id,
            success: function (result) {
                //init values
                $('#aedname').val(result.aedname);
                $('#model').val(result.model);
                $('#locationField').val(result.street_fr + ' ' + result.num + ' ' + result.postcode);
                $('#pos_long').val(result.lon);
                $('#pos_lat').val(result.lat);
                $('#datetimepicker4').val(result.aedexpiration);
                $('#infplace').val(result.infplace_fr);
          }
        });
    });
</script>
  </body>
</html>