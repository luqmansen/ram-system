@extends('layouts.mainLayout')

@section('bodyWrapper')
<body class="leftMenu nav-collapse">
<div id="wrapper">
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     HEADER  CONTENT     ///////////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="header">
		
				<div class="logo-area clearfix">
						<a href="#" class="logo"></a>
				</div>
				<!-- //logo-area-->
				
				<div class="tools-bar">
						<ul class="nav navbar-nav navbar-right tooltip-area">
                            <li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
											<em><strong>Hi</strong>, {{ Auth::user()->name }}    </em> <i class="dropdown-icon fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right icon-right arrow">
												<li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form></li>
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
				<div id="nav-title">
					<h3><strong>Hi</strong>, Nutprawee</h3>
				</div>
				<!-- //nav-title-->
				<div id="nav-scroll">
						<div class="avatar-slide">
						
								<span class="easy-chart avatar-chart" data-color="theme-inverse" data-percent="69" data-track-color="rgba(255,255,255,0.1)" data-line-width="5" data-size="118">
										<span class="percent"></span>
										<img alt="" src="assets/img/avatar.png" class="circle">
								</span>
								<!-- //avatar-chart-->
								
								<div class="avatar-detail">
										<p><button class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i> Edit Profile</button></p>
										<p><a href="#">@ Chaing Mai , TH</a></p>
										<span>12,110 Sales</span>
										<span>106 Follower</span>
								</div>
								<!-- //avatar-detail-->
								
								<div class="avatar-link btn-group btn-group-justified">
										<a class="btn" href="profile.html"  title="Portfolio"><i class="fa fa-briefcase"></i></a>
										<a class="btn"  data-toggle="modal" href="#md-notification" title="Notification">
												<i class="fa fa-bell-o"></i><em class="green"></em>
										</a>
										<a class="btn"  data-toggle="modal" href="#md-messages"  title="Messages">
												<i class="fa fa-envelope-o"></i><em class="active"></em>
										</a>
										<a class="btn" href="#menu-right" title="Contact List"><i class="fa fa-book"></i></a>
								</div>
								<!-- //avatar-link-->
								
						</div>
						<!-- //avatar-slide-->
						
						
						<div class="widget-collapse dark">
								<header>
										<a data-toggle="collapse" href="#collapseSummary"><i class="collapse-caret fa fa-angle-up"></i> Summary Order </a>
								</header>
								<section class="collapse in" id="collapseSummary">
										<div class="collapse-boby" style="padding:0">
										
												<div class="widget-mini-chart align-xs-left">
														<div class="pull-right" >
																<div class="sparkline mini-chart" data-type="bar" data-color="theme" data-bar-width="10" data-height="35">2,3,4,5,7,4,5</div>
														</div>
														<p>This week's balance</p>
														<h4>$12,788</h4>
												</div>
												<!-- //widget-mini-chart -->
												
												<div class="widget-mini-chart align-xs-right">
														<div class="pull-left">
																<div class="sparkline mini-chart" data-type="bar" data-color="warning" data-bar-width="10" data-height="45">2,3,7,5,4,6,6,3</div>
														</div>
														<p>This week sales</p>
														<h4>1,325 item</h4>
												</div>
												<!-- //widget-mini-chart -->
												
										</div>
										<!-- //collapse-boby-->
										
								</section>
								<!-- //collapse-->
						</div>
						<!-- //widget-collapse-->
						
						
						
						<div class="widget-collapse dark">
								<header>
										<a data-toggle="collapse" href="#collapseTasks"><i class="collapse-caret fa fa-angle-down"></i> (2) Tasks processing </a>
								</header>
								<section class="collapse" id="collapseTasks">
								
										<div class="collapse-boby">
										
												<div class="widget-slider">
														<p>Upload status</p>
														<div class="progress progress-dark progress-xs tooltip-in">
																<div class="progress-bar bg-darkorange" aria-valuetransitiongoal="75"></div>
														</div>
														<label class="progress-label">Master.zip 4 / 5 </label>
														<!-- //progress-->
														
														<div class="progress progress-dark progress-xs">
																<div class="progress-bar bg-theme-inverse" aria-valuetransitiongoal="45"></div>
														</div>
														<label class="progress-label lasted">Profile 2 / 5 </label>
														<!-- //progress-->
														
												</div>
												<!-- //widget-slider-->
												
										</div>
										<!-- //collapse-boby-->
										
								</section>
								<!-- //collapse-->
						</div>
						<!-- //widget-collapse-->
						
						
						
						<div class="widget-collapse dark">
								<header>
										<a data-toggle="collapse" href="#collapseSetting"><i class="collapse-caret fa fa-angle-up"></i> Setting Option </a>
								</header>
								<section class="collapse in" id="collapseSetting">
										<div class="collapse-boby" style="padding:0">
										
												<ul class="widget-slide-setting">
														<li>
																<div class="ios-switch theme pull-right">
																		<div class="switch"><input type="checkbox" name="option"></div>
																</div>
																<label>Switch <span>OFF</span></label>
																<small>Lorem ipsum dolor sit amet</small>
														</li>
														<li>
																<div class="ios-switch theme-inverse pull-right">
																		<div class="switch"><input type="checkbox" name="option_1" checked></div>
																</div>
																<label>Switch <span>ON</span></label>
																<small>Lorem ipsum dolor sit amet</small>
														</li>
												</ul>
												<!-- //widget-slide-setting-->
												
										</div>
										<!-- //collapse-boby-->
										
								</section>
								<!-- //collapse-->
						</div>
						<!-- //widget-collapse-->
						
						
				</div>
				<!-- //nav-scroller-->
		</div>
        <!-- //nav-->
        
        <!--
		/////////////////////////////////////////////////////////////////////////
		//////////     MAIN SHOW CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="main">
        
        <div id="content">
        
                <div class="row">
                
                        <div class="col-lg-12">
                                <section class="panel">
                                        <header class="panel-heading">
                                                <h2><strong>Manage</strong> Rooms</h2>
                                        </header>
                                        <div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
                                                
                                                <ul class="tooltip-area">
                                                        <li><a href="javascript:void(0)" type="button" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
                                                        <li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
                                                </ul>
                                        </div>
                                        <div class="panel-body">
                                                <form>
                                                    <a href="#" type="button" class="btn btn-primary btn-transparent"><i class="fa fa-plus"></i> Add room</a>
                                                    <a href="#" type="button" class="btn btn-success btn-transparent"><i class="fa fa-external-link-square"></i> Export .xls</a>
                                                    <a href="#" type="button" class="btn btn-danger btn-transparent"><i class="fa fa-external-link-square"></i> Export .pdf</a>
                                                        <table class="table table-striped" id="table-example">
                                                                <thead>
                                                                        <tr>
                                                                                <th  class="text-center">ID</th>
                                                                                <th class="text-center">Room Name</th>
                                                                                <th class="text-center">Capacity With Table</th>
                                                                                <th class="text-center">Capacity Without Table</th>
                                                                                <th class="text-center">Action</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                        @foreach($rooms as $room)
                                                                        <tr class="odd gradeX">
                                                                                <td>{{$room->id}}</td>
                                                                                <td>{{$room->name}}</td>
                                                                                <td>{{$room->table_capacity}}</td>
                                                                                <td>{{$room->chair_capacity}}</td>
                                                                                <td class="center">
                                                                                    <a href="#" type="button" class="btn btn-success btn-transparent"><i class="fa fa-edit"></i> Edit</a>
                                                                                    <a href="#" type="button" class="btn btn-danger btn-transparent"><i class="fa fa-trash-o"></i> Delete</a>
                                                                                </td>
                                                                        </tr>
                                                                        @endforeach
                                                                </tbody>
                                                        </table>
                                                </form>
                                        </div>
                                </section>
                        </div>

                </div>
                <!-- //content > row-->
                
        </div>
        <!-- //content-->
		
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     TOP SEARCH CONTENT     ///////
		//////////////////////////////////////////////////////////////////////
		-->
		<div class="widget-top-search">
			<span class="icon"><a href="#" class="close-header-search"><i class="fa fa-times"></i></a></span>
			<form id="top-search">
					<h2><strong>Quick</strong> Search</h2>
					<div class="input-group">
							<input  type="text" name="q" placeholder="Find something..." class="form-control" />
							<span class="input-group-btn">
							<button class="btn" type="button" title="With Sound"><i class="fa fa-microphone"></i></button>
							<button class="btn" type="button" title="Visual Keyboard"><i class="fa fa-keyboard-o"></i></button>
							<button class="btn" type="button" title="Advance Search"><i class="fa fa-th"></i></button>
							</span>
					</div>
			</form>
		</div>
		<!-- //widget-top-search-->
		
		
		
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     MAIN SHOW CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="main">
				
				<div id="content">
				
						<div class="row">
						
								<div class="col-lg-8" ></div>
								<!-- //content > row > col-lg-8 -->
								
								<div class="col-lg-4"></div>
								<!-- //content > row > col-lg-4 -->
								
						</div>
						<!-- //content > row-->
						
				</div>
				<!-- //content-->
				
				
		</div>
		<!-- //main-->
		
		
		
		<!--
		///////////////////////////////////////////////////////////////////
		//////////     MODAL MESSAGES     //////////
		///////////////////////////////////////////////////////////////
		-->
		<div id="md-messages" class="modal fade md-slideUp bg-theme-inverse" tabindex="-1" data-width="450">
				<div class="modal-header bd-theme-inverse-darken">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title"><i class="fa fa-inbox"></i> Inbox messages</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body" style="padding:0">
						<div class="widget-im">
								<ul>
										<li>
												<section  class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<i class="fa fa-paperclip"></i>
																</span>
																<span>
																		<i class="fa fa-reply-all"></i>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
																</span>
																<span>
																		<time datetime="2013-11-16">1 : 52 am</time>
																</span>
														</div>
														<h4><a href="javascript:void(0)">Edlado Holder</a>
														</h4>
														<div class="im-thumbnail"><img alt="" src="assets/img/avatar2.png" /></div>
														<label></label>
														<div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
														</div>
												</div>
										</li>
										<li>
												<section  class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<i class="fa fa-paperclip"></i>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
																</span>
																<span>
																		<time datetime="2013-11-16">12 : 00 pm</time>
																</span>
														</div>
														<h4><a href="javascript:void(0)">Laine Franchi</a>
														</h4>
														<div class="im-thumbnail"><i class="glyphicon glyphicon-user"></i></div>
														<div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<a href="javascript:void(0)" class="im-delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
																</span>
																<span>
																		<time datetime="2013-11-16">4 : 45 pm</time>
																</span>
														</div>
														<h4><a href="javascript:void(0)">Cinda Collar</a>
														</h4>
														<div class="im-thumbnail"><img alt="" src="assets/img/avatar.png" /></div>
														<label data-color="theme"></label>
														<div class="pre-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="yes">YES.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">NO.</a>
														</div>
												</div>
										</li>
								</ul>
								<button class="btn btn-inverse btn-block btn-lg" title="See More"><i class="fa fa-plus"></i></button>
						</div>
						<!-- //widget-im-->
				</div>
				<!-- //modal-body-->
		</div>
		<!-- //modal-->
		
		
		
		<!--
		//////////////////////////////////////////////////////////////////////////
		//////////     MODAL NOTIFICATION     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="md-notification" class="modal fade md-stickTop bg-danger" tabindex="-1" data-width="500">
				<div class="modal-header bd-danger-darken">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
						<h4 class="modal-title"><i class="fa fa-bell-o"></i> Notification</h4>
				</div>
				<!-- //modal-header-->
				<div class="modal-body" style="padding:0">
						<div class="widget-im notification">
								<ul>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago lasted" datetime="2014">when you opened the page</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Your request approved</h4>
														<div class="im-thumbnail bg-theme-inverse"><i class="fa fa-check"></i></div>
														<div class="pre-text">One Button (click to remove this)</div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago" datetime="2013-11-17T14:24:17Z">timeago</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Dashboard new design!! you want to see now ? </h4>
														<div class="im-thumbnail bg-theme"><i class="fa fa-bell-o"></i></div>
														<div class="pre-text">Two Button (with link and click to close this) Lorem ipsum dolor sit amet, consectetur adipisicing elit, </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse" href="dashboard.html">Go Now.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago" datetime="2013-11-17T01:24:17Z">timeago</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Error 404 <small>( File not  found )</small></h4>
														<div class="im-thumbnail bg-warning"><i class="fa fa-exclamation-triangle"></i></div>
														<div class="pre-text">Two Button (click to  action and remove) </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="accept">Accept.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="actionNow">Fixed now.</a>
														</div>
												</div>
										</li>
										<li>
												<section class="thumbnail-in">
														<div class="widget-im-tools tooltip-area pull-right">
																<span>
																		<time class="timeago" datetime="2013-09-17T09:24:17Z">timeago</time>
																</span>
																<span>
																		<a href="javascript:void(0)" class="im-action" data-toggle="tooltip" data-placement="left" title="Action"><i class="fa fa-keyboard-o"></i></a>
																</span>
														</div>
														<h4>Upgrade Premium ?</h4>
														<div class="im-thumbnail bg-inverse">
																<i class="fa fa-cogs"></i></div>
														<div class="pre-text"> Three button (test action) </div>
												</section>
												<div class="im-confirm-group">
														<div class=" btn-group btn-group-justified">
																<a class="btn btn-inverse im-confirm" href="javascript:void(0)" data-confirm="actionNow">Now.</a>
																<a class="btn btn-theme im-confirm" href="javascript:void(0)" data-confirm="no">Later.</a>
																<a class="btn btn-danger im-confirm" href="javascript:void(0)" data-confirm="yes">Delete.</a>
														</div>
												</div>
										</li>
								</ul>
						</div>
						<!-- //widget-im-->
				</div>
				<!-- //modal-body-->
		</div>
		<!-- //modal-->
		
		
		
		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu"  data-search="close">
				<ul>
                        <li><a href="{{url('home')}}">
							<span><i class="icon  fa fa-calendar"></i>  Reservations Calendar </a></span>
						</li>
				        <li><a href="{{url('manageRooms')}}">
							<span><i class="icon  fa fa-square"></i>  Manage Rooms </a></span>
						</li>
						<li><a href="{{url('manageCustomers')}}">
							<span><i class="icon  fa fa-users"></i> Manage Customers </a></span>
						</li>
						<li><a href="{{url('manageReservations')}}">
							<span><i class="icon  fa fa-file-o"></i> Manage Reservations </a></span>
						</li>
						<li><a href="{{url('history')}}">
							<span><i class="icon  fa fa-laptop"></i> View Log / History </a></span>
						</li>
				</ul>
		</nav>
		<!-- //nav left menu-->
		
		
</div>
<!-- //wrapper-->
@endsection

@section('customScript')
<script>
var touchWrapper=document.getElementById("wrapper");
if(touchWrapper){
	var wrapper= Hammer( touchWrapper );
	 wrapper.on("dragright", function(event) {	// hold , tap, doubletap ,dragright ,swipe, swipeup, swipedown, swipeleft, swiperight
		if((event.gesture.deltaY<=7 && event.gesture.deltaY>=-7) && event.gesture.deltaX >100){
			$('nav#menu').trigger( 'open.mm' );
		}
	 });
	 wrapper.on("dragleft", function(event) {
		if((event.gesture.deltaY<=5 && event.gesture.deltaY>=-5) && event.gesture.deltaX <-100){
			$('nav#contact-right').trigger( 'open.mm' );
		}
	 });
}
</script>
@endsection