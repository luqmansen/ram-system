@extends('layouts.mainLayout')

@section('title')
<title>Admin Panel | Room Reservation & Monitoring System</title>
@endsection

@section('bodyWrapper')
<body class="full-lg">
<div id="wrapper">

<div id="loading-top">
		<div id="canvas_loading"></div>
		<span>Checking...</span>
</div>

<div id="main">
		<div class="container">
				<div class="row">
						<div class="col-lg-12">
						
								<div class="account-wall">
										<section class="align-lg-center">
										<div class="site-logo"></div>
										<h1 class="login-title"><span>wel</span>come <small> Room Reservation & Monitoring System</small></h1>
										</section>
										<form id="form-signin" class="form-signin" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
												<section>
														<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                                <input  type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" required autofocus>
														</div>
														<div class="input-group">
																<div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                                <input id="password" type="password" class="form-control"  name="password" placeholder="Password" required>
														</div>
														<button class="btn btn-lg btn-theme-inverse btn-block" type="submit" id="sign-in">Sign in</button>
												</section>
												<section class="clearfix">
														<div class="iCheck pull-left"  data-color="red">
														<input type="checkbox" {{ old('remember') ? 'checked' : '' }} checked>
														<label>Remember</label>
														</div>
														<a href="{{ route('password.request') }}" class="pull-right help">Forget Password? </a>
												</section>
										</form>
										<a href="http://www.uccprima.id" class="footer-link">&copy; 2019 PT Undip Citra Cipta Prima &trade; </a>
								</div>	
								<!-- //account-wall-->
								
						</div>
						<!-- //col-sm-6 col-md-4 col-md-offset-4-->
				</div>
				<!-- //row-->
		</div>
		<!-- //container-->
		
</div>
<!-- //main-->

		
</div>
<!-- //wrapper-->
@endsection

@section('customScript')
<script type="text/javascript">
$(function() {
		   //Login animation to center 
			function toCenter(){
					var mainH=$("#main").outerHeight();
					var accountH=$(".account-wall").outerHeight();
					var marginT=(mainH-accountH)/2;
						   if(marginT>30){
							   $(".account-wall").css("margin-top",marginT-15);
							}else{
								$(".account-wall").css("margin-top",30);
							}
				}
				toCenter();
				var toResize;
				$(window).resize(function(e) {
					clearTimeout(toResize);
					toResize = setTimeout(toCenter(), 500);
				});
				
			//Canvas Loading
			  var throbber = new Throbber({  size: 32, padding: 17,  strokewidth: 2.8,  lines: 12, rotationspeed: 0, fps: 15 });
			  throbber.appendTo(document.getElementById('canvas_loading'));
			  throbber.start();
	
			
			$("#form-signin").submit(function(event){
					// event.preventDefault();
					var main=$("#main");
					//scroll to top
					main.animate({
						scrollTop: 0
					}, 500);
					main.addClass("slideDown");
			
			});
	});
</script>

@if ($errors->has('email'))
    <script>
        $(function() {
            $.notific8('Check Username or Password again !! ',{ life:5000,horizontalEdge:"bottom", theme:"danger" ,heading:" ERROR :); "});
        });    
    </script>
@endif
@if ($errors->has('password'))
    <script>
        $(function() {
                $.notific8('Check Username or Password again !! ',{ life:5000,horizontalEdge:"bottom", theme:"danger" ,heading:" ERROR :); "});
        });    
    </script>
@endif

@endsection