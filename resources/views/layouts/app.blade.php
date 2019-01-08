<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta information -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<!-- Title-->
<title> Sistem Reservasi Ruangan UCCP</title>
<style>
 #main ,.tab-content{
	 z-index:auto;
	 }
</style>

</head>
<body>
<div id="wrapper">
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     HEADER  CONTENT     ///////////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="header">
		
				<div class="logo-area clearfix">
						<a href="#" class="" style=" font-size: 40px; margin: 0 auto; font-weight: bold; color: white">UCCP</a>
				</div>
				<!-- //logo-area-->
				
				<div class="tools-bar">
						<ul class="nav navbar-nav nav-main-xs">
								<li><a href="#menu" class="icon-toolsbar"><i class="fa fa-bars"></i></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right tooltip-area">
								<li><a href="#menu-right" data-toggle="tooltip" title="Right Menu" data-container="body" data-placement="left"><i class="fa fa-align-right"></i></a></li>
								<li class="hidden-xs hidden-sm"><a href="#" class="h-seperate">Help</a></li>
								<li><button class="btn btn-circle btn-header-search" ><i class="fa fa-search"></i></button></li>
								<li><a href="#" class="nav-collapse avatar-header">
												<img alt="" src="assets/img/avatar.png"  class="circle">
												<span class="badge">3</span>
										</a>
								</li>
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
											<em><strong>Hi</strong>, Nutprawee </em> <i class="dropdown-icon fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right icon-right arrow">
												<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
												<li><a href="#"><i class="fa fa-cog"></i> Setting </a></li>
												<li><a href="#"><i class="fa fa-bookmark"></i> Bookmarks</a></li>
												<li><a href="#"><i class="fa fa-money"></i> Make a Deposit</a></li>
												<li class="divider"></li>
												<li><a href="#"><i class="fa fa-sign-out"></i> Signout </a></li>
										</ul>
										<!-- //dropdown-menu-->
								</li>
								<li class="visible-lg">
									<a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body"  data-placement="left">
										<i class="fa fa-expand"></i>
									</a>
								</li>
						</ul>
				</div>
				<!-- //tools-bar-->
				
		</div>
		<!-- //header-->
		
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     SLIDE LEFT CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="nav">
				<div id="nav-scroll">
						<div class="avatar-slide">
						
								<span class="easy-chart avatar-chart"  data-size="118">
										<span class=""></span>
										<img alt="" src="assets/img/avatar.png" class="circle">
								</span>
								<!-- //avatar-chart-->
								
								<div class="avatar-detail">
										<p> ADMIN 1 : JUKI
<!-- FETCH ADMIN->NAME FORM DB                                        -->
                                        </p>
							</div>
				        </div>
				</div>
        </div>
		
		@include('inc.calendar')


		<!--
		///////////////////////////////////////////////////////////////////
		//////////     MODAL MESSAGES     //////////
		///////////////////////////////////////////////////////////////
		-->
		
		<nav id="menu">
				<ul>
					<li><a href="#"><i class="icon  fa fa-inbox"></i> Manage User</a></li>
                    <li><a href="#"><i class="icon  fa fa-inbox"></i> View History</a></li>
                </ul>
		</nav>
</div>
<!-- //wrapper-->
</body>
</html>