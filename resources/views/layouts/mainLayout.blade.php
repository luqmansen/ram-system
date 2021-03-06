<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">

<!-- Title-->
@section('title')
<title>Room Reservation & Monitoring System</title>
@show
<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">
<link rel="shortcut icon" href="{{asset('assets/ico/favicon.ico')}}">
<!-- CSS Stylesheet-->
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/bootstrap/bootstrap.min.css')}}" />
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/bootstrap/bootstrap-themes.css')}}" />
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}" />

<!-- Styleswitch if  you don't chang theme , you can delete -->
<link type="text/css" rel="alternate stylesheet" media="screen" title="style1" href="{{asset('assets/css/styleTheme1.css')}}" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style2" href="{{asset('assets/css/styleTheme2.css')}}" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style3" href="{{asset('assets/css/styleTheme3.css')}}" />
<link type="text/css" rel="alternate stylesheet" media="screen" title="style4" href="{{asset('assets/css/styleTheme4.css')}}" />
  @yield('customStyle')
</head>

<!-- opening tag <body> nya belom ada jadi harus di deklarasi lagi di view yang meng-extends layout ini -->
  @section('bodyWrapper')
    <body>
      @yield('content')
  @show

  <!--
////////////////////////////////////////////////////////////////////////
//////////     JAVASCRIPT  LIBRARY     //////////
/////////////////////////////////////////////////////////////////////
-->
@section('jsScript')		
<!-- Jquery Library -->
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- Modernizr Library For HTML5 And CSS3 -->
<script type="text/javascript" src="{{asset('assets/js/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/mmenu/jquery.mmenu.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/styleswitch.js')}}"></script>
<!-- Library 10+ Form plugins-->
<script type="text/javascript" src="{{asset('assets/plugins/form/form.js')}}"></script>
<!-- Datetime plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/datetime/datetime.js')}}"></script>
<!-- Library Chart-->
<script type="text/javascript" src="{{asset('assets/plugins/chart/chart.js')}}"></script>

<script src="{{asset('assets/plugins/fullcalendar/fullcalendar.js')}}"></script>
<link href="{{asset('assets/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
<!-- Library  5+ plugins for bootstrap -->
<script type="text/javascript" src="{{asset('assets/plugins/pluginsForBS/pluginsForBS.js')}}"></script>
<!-- Library 10+ miscellaneous plugins -->
<script type="text/javascript" src="{{asset('assets/plugins/miscellaneous/miscellaneous.js')}}"></script>
<!-- Library Themes Customize-->
<script type="text/javascript" src="{{asset('assets/js/caplet.custom.js')}}"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
<script>
$( window ).resize(function() {
		if($(window).width() > 990 ){
			$('nav#menu').trigger( 'close.mm' );
	}	
	});
</script>
@show

  @yield('customScript')
</body>
</html>