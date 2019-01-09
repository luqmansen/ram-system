@extends('layouts.mainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<style>
 #main ,.tab-content{
	 z-index:auto;
	 }
</style>
@endsection

@section('bodyWrapper')
<body class="full-lg">
<div id="wrapper" style="margin-left:0px">
	
		
		
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     SLIDE LEFT CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		
		
		
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
				<div class="tabbable">
						<ul class="nav nav-tabs" data-provide="tabdrop">
								<li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
								<li class="active"><a href="#" data-view="month" data-toggle="tab" class="change-view">Month</a></li>
								<li><a href="#" data-view="agendaWeek" data-toggle="tab" class="change-view">Week</a></li>
								<li><a href="#" data-view="agendaDay" data-toggle="tab" class="change-view">Day</a></li>
								<li><a href="#" class="change-today">Today</a></li>
						</ul>
						<div class="tab-content">
								<div class="row">
								
										<div class="col-lg-8" >
												<div id="calendar"></div>
										</div>
										<!-- //content > row > col-lg-8 -->
										
										<div class="col-lg-4">
												<div id="external-events">
														<h3><strong>EVENTS</strong> Draggable </h3>
														<hr>
														<span class="external-event label bg-warning">Recognition dinners</span>
														<span class="external-event label bg-theme">Book discussions</span>
														<span class="external-event label bg-inverse">Fashion shows</span>
														<span class="external-event label bg-info">Exhibitions and fairs</span>
														<span class="external-event label bg-theme-inverse">Historic building tours</span>
														<span class="external-event label bg-primary">Dances</span>
														<span class="external-event label bg-purple">Fashion shows</span>
														<span class="external-event label bg-green">Exhibitions and fairs</span>
														<span class="external-event label bg-palevioletred">Guided walks</span>
												</div>
												<hr>
														<a class="btn btn-inverse" data-toggle="modal" href="#md-add-event"><i class="fa fa-plus"></i></a>
														<button class="btn btn-inverse slide-trash"><i class="fa fa-trash-o"></i></button>
										</div>
										<!-- //content > row > col-lg-4 -->
										
								</div>
								<!-- //content > row-->
						</div>
						<!-- //tab-content -->
				</div>
				<!-- //tabbable -->
				

		</div>
        <!-- //main-->
        
        <footer id="site-footer" class="fixed">
			<section>
			
			<!-- START Home button -->
			<ul id="footer-menu" class="dropdown dropdown-basic dropdown-up">
				<li><a href="#" class="home icon"><i class="fa fa-home"></i></a></li>
			</ul>
			<!-- END Home button -->
			
			<!-- START Simple menu -->
			<ul id="footer-menu" class="dropdown dropdown-basic dropdown-up">
				<li><div class="main-item">Simple menu <span>+</span></div>
					<ul class="fade-in">
						<div class="dropdown-box lvl-1">
							<!-- First level -->
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Link 1</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Link 2</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Link 3</a></li>
						</div>
					</ul>
				</li>
			</ul>
			<!-- END Simple menu -->
			
			<!-- START Extended menu -->
			<ul id="footer-menu" class="dropdown dropdown-basic dropdown-up">
				<li><div class="main-item">Extended menu <span>+</span></div>
					<ul class="fade-in">
						<div class="dropdown-box lvl-1">
							<!-- First level -->
							<li><a href="#" class="menu"><i class="fa fa-home"></i>Home</a></li>
							<li><a href="#" class="menu"><i class="fa fa-picture-o"></i> Portfolio</a></li>
							<li class="has-menu"><a href="#" class="menu"><i class="fa fa-cog"></i> Our services</a>
								<!-- Second level -->
								<ul class="fade-in">
									<div class="dropdown-box lvl-2">
										<li><a href="#" class="menu"><i class="fa fa-globe"></i> Webdesign & development</a></li>
										<li class="has-menu"><a href="#" class="menu"><i class="fa fa-magic"></i> Graphic and Stationary</a>
											<ul class="fade-in">
												<div class="dropdown-box lvl-3">
													<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Logo design</a></li>
													<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Identity design</a></li>
													<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Stationary and print</a></li>
													<li class="menu-title"><span>&#xf0d0;</span>Submenu 2</li>
												</div>
											</ul>
										</li>
										<li><a href="#" class="menu"><i class="fa fa-briefcase"></i> Branding & Marketing</a></li>
										<li class="has-menu"><a href="#" class="menu"><i class="fa fa-camera"></i> Photography & Editing</a>
											<!-- Third level -->
											<ul class="fade-in">
												<div class="dropdown-box lvl-3">
													<li class="content-full-width">
														<div id="inner-block-1">
															<a href="#" class="overlay-img">
																<img src="assets/photos_preview/footer/photography/pic-1.jpg" />
																<div class="overlay-icon icon"><i class="fa fa-search-plus"></i></div>
															</a>
															<div class="content">
																<div class="title">My newest photo</div>
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting text.</p>
															</div>
														</div>
													</li>
													<li class="content-full-width">
														<div id="inner-block-1">
															<a href="#" class="overlay-img">
																<img src="assets/photos_preview/footer/photography/pic-2.jpg" />
																<div class="overlay-icon icon"><i class="fa fa-search-plus"></i></div>
															</a>
															<div class="content">
																<div class="title">My other photo</div>
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting text.</p>
															</div>
														</div>
														<div class="clrfx-1"></div>
													</li>
													<li class="menu-title"><span>&#xf030;</span>Submenu 2</li>
												</div>
											</ul>
										</li>
										<li><a href="#" class="menu"><i class="fa fa-search-plus"></i> Custom solutions</a></li>
										<li class="menu-title"><span>&#xf013;</span>Submenu 1</li>
									</div>
								</ul>
							</li>
							<li class="has-menu"><a href="#" class="menu"><i class="fa fa-play"></i> Latest videos</a>
								<!-- Second level -->
								<ul class="fade-in">
									<div class="dropdown-box lvl-2">
										<li class="no-hover">
											<iframe class="video-medium" width="440" height="300" src="http://www.youtube.com/embed/M34OelgSlKI" frameborder="0" allowfullscreen></iframe>
										</li>
										<li class="menu-title"><span><i class="fa fa-play"></i></span>Menu with video</li>
									</div>
								</ul>
							</li>
							<li><a href class="menu"><i class="fa fa-heart-o"></i> Special stuff</a></li>
							<li class="has-menu"><a href="#" class="menu"><i class="fa fa-pencil"></i> We also blog</a>
								<ul class="fade-in">
									<div class="dropdown-box lvl-2">
										<!-- Second level -->
										<li id="tabs" class="no-hover">
											<!-- START tabs pagination -->
											<input id="tab-1" type="radio" class="tab-1-selector first" name="tab-group-1" checked="checked" />
											<label for="tab-1" class="tab-label-1">1</label>
	
											<input id="tab-2" type="radio" class="tab-2-selector second" name="tab-group-1" />
											<label for="tab-2" class="tab-label-2">2</label>
	
											<input id="tab-3" type="radio" class="tab-3-selector third" name="tab-group-1" />
											<label for="tab-3" class="tab-label-3">3</label>
	
											<input id="tab-4" type="radio" class="tab-4-selector fourth" name="tab-group-1" />
											<label for="tab-4" class="tab-label-4">4</label>
											<!-- END tabs pagination -->
	
											<!-- START tabs content -->
											<div class="tab-wrapper">
												<div class="tab-1">
													<img src="assets/photos_preview/footer/blog/pic-3.jpg" />
													<div class="content">
														<div class="title">Display with style</div>
														<div class="category">Posted in <a href="#" class="link-1">Lorem ipsum category</a></div>
														<p>Display any content with style within CSS3 animated tabs, which can hold videos, images, text or tables for clean and visible content presentation.</p>
														<cite class="bubble-1">This is a simple, yet stylish speach bubble for additional visual impact for some special content.</cite>
														<p><a href="#" class="button-2">Read more <i class="fa fa-external-link"></i></a></p>
													</div>
													<div class="clrfx-3"></div>
													<div class="small-info">Photo by Capelle</div>
												</div>
												<div class="tab-2">
													<img src="assets/photos_preview/footer/blog/pic-4.jpg" />
													<div class="content">
														<div class="title">Tab 2 title</div>
														<div class="category">Posted in <a href="#" class="link-1">Lorem ipsum category</a></div>
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text since 1500s.</p>
														<cite class="bubble-1">It has survived not only five centuries, but also the leap into electronic typesetting.</cite>
														<p><a href="#" class="button-2">Read more <i class="fa fa-external-link"></i></a></p>
													</div>
													<div class="small-info">Photo by Capelle</div>
												</div>
												<div class="tab-3">
													<img src="assets/photos_preview/footer/blog/pic-2.jpg" />
													<div class="content">
														<div class="title">Tab 3 title</div>
														<div class="category">Posted in <a href="#" class="link-1">Lorem ipsum category</a></div>
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text since 1500s.</p>
														<cite class="bubble-1">It has survived not only five centuries, but also the leap into electronic typesetting.</cite>
														<p><a href="#" class="button-2">Read more <i class="fa fa-external-link"></i></a></p>
													</div>
													<div class="small-info">Photo by Capelle</div>
												</div>
												<div class="tab-4">
													<img src="assets/photos_preview/footer/blog/pic-1.jpg" />
													<div class="content">
														<div class="title">Tab 4 title</div>
														<div class="category">Posted in <a href="#" class="link-1">Lorem ipsum category</a></div>
														<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text since 1500s.</p>
														<cite class="bubble-1">It has survived not only five centuries, but also the leap into electronic typesetting.</cite>
														<p><a href="#" class="button-2">Read more <i class="fa fa-external-link"></i></a></p>
													</div>
													<div class="small-info">Photo by Capelle</div>
												</div>
											</div>
											<!-- END tabs content -->
										</li>
										<li class="menu-title"><span><i class="fa fa-pencil"></i></span>Content in tabs</li>
									</div>
								</ul>
							</li>
							<li class="has-menu"><a href="#" class="menu"><i class="fa fa-envelope-o"></i> Contact us</a>
								<!-- Second level -->
								<ul class="fade-in">
									<div class="dropdown-box lvl-2">
										<li class="no-hover">
											<div id="form-1">
												<p class="title">Hi there</p>
												<p class="form-intro">Display your visitors quick contact form so they can get in touch easily.</p>
												<!-- START contact form -->
												<form action="" autocomplete="on" name="contact-1" id="contact-1" method="post">
													<div class="field">
														<select name="subject" id="subject">
															<option disabled="disabled" selected="selected" class="disabled">Regarding</option>
															<option value="Sales">1. We need an offer</option>
															<option value="Marketing">2. We have a proposal</option>
															<option value="Tech support">3. Support and help</option>
														</select>
														<p class="icon"><i class="fa fa-file"></i></p>
													</div>
													<div class="field">
														<input name="name" placeholder="Your name" type="text" id="name" class="form-1" required />
														<p class="icon"><i class="fa fa-user"></i></p>
													</div>
													<div class="field">
														<input name="email" placeholder="Email address" type="email" id="email" class="form-1" required />
														<p class="icon"><i class="fa fa-envelope"></i></p>
													</div>
													<div class="field">
														<input name="company" placeholder="Company" type="text" id="company" class="form-1" required />
														<p class="icon"><i class="fa fa-briefcase"></i></p>
													</div>
													<div class="field">
														<textarea name="message" placeholder="Enter your message" id="message" class="message" required /></textarea>
													</div>
													<input type="submit" value="Send" class="btn btn-danger" form="contact-1" />
													<input type="checkbox" id="send-copy" name="send-copy" class="check" />
													<label for="send-copy" class="check"><span></span>Send a copy to my email</label>
												</form>
												<!-- END contact form -->
											</div>
										</li>
										<li class="menu-title"><span>&#xf0e0;</span>Contact form</li>
									</div>
								</ul>
							</li>
							<li><a href="#" class="menu"><i class="fa fa-users"></i> Meet the team</a></li>
							<li><a href="#" class="menu"><i class="fa fa-gavel"></i> Legal notice</a></li>
						</div>
					</ul>
				</li>
			</ul>
			<!-- END Extended menu -->
		
			
			<!-- START Left menu -->
			<ul id="footer-menu" class="dropdown dropdown-basic dropdown-up">
				<li><div class="main-item">Left menu <span>+</span></div>
					<!-- First level -->
					<ul class="fade-in">
						<div class="dropdown-box lvl-1">
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Home</a></li>
							<li class="has-menu"><a href="#" class="menu"><i class="fa fa-angle-right"></i>Our services</a>
								<!-- Second level -->
								<ul class="fade-in">
									<div class="dropdown-box lvl-2">
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Webdesign and development</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Graphic and Stationary design</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Logo design</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Identity design</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Stationary and print</a></li>
										<li class="menu-title"><span><i class="fa fa-location-arrow"></i></span> Submenu  title</li>
									</div>
								</ul>
							</li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Portfolio</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> News</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Meet the team</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Contact us</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Daily specials</a></li>
						</div>
					</ul>
				</li>
			</ul>
			<!-- END Left menu -->
			
			<!-- START Right menu -->
			<ul id="footer-menu" class="dropdown dropdown-basic dropdown-up">
				<li><div class="main-item">Right menu <span>+</span></div>
					<!-- First level -->
					<ul class="fade-in right">
						<div class="dropdown-box lvl-1 right">
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Home</a></li>
							<li class="has-menu right"><a href="#" class="menu"><i class="fa fa-angle-right"></i> Our services</a>
								<!-- Second level -->
								<ul class="fade-in right">
									<div class="dropdown-box lvl-2 right">
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Webdesign and development</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Graphic and Stationary design</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Logo design</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Identity design</a></li>
										<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Stationary and print</a></li>
										<li class="menu-title"><span>&#xf124;</span>Submenu  title</li>
									</div>
								</ul>
							</li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Portfolio</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> News</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Meet the team</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Contact us</a></li>
							<li><a href="#" class="menu"><i class="fa fa-angle-right"></i> Daily specials</a></li>
						</div>
					</ul>
				</li>
			</ul>
			<!-- END Right menu -->
		
		
			<!-- START Copyright -->
			<div id="copyright">
				<p>© Copyright  2014 // <a href="#" class="link-1">zicedemo</a></p>
				<div class="social-bar">
					<a href="#" class="icon tip"><i class="fa fa-facebook"></i> <span>Find us on Facebook</span></a>
					<a href="#" class="icon tip"><i class="fa fa-twitter"></i> <span>Tweet with us</span></a>
					<a href="#" class="icon tip"><i class="fa fa-google-plus"></i> <span>Find us on Google</span></a>
					<a href="#" class="icon tip"><i class="fa fa-linkedin"></i> <span>Meet up on Linkedin</span></a>
				</div>
			</div>
			<!-- END Copyright -->
			
			</section>
		</footer>
		
								<div id="slide-trash">
									<section><i class=" fa fa-trash-o"></i><span>Drop here to detele</span></section>
								</div>
		
		
		
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
		/////////////////////////////////////////////////////////////////
		//////////     RIGHT NAV MENU     //////////
		/////////////////////////////////////////////////////////////
		-->
		<nav id="menu-right">
				<ul>
						<li class="Label label-lg">Theme color</li>
						<li>
							<span class="text-center">
								<div id="style1" class="color-themes col1"></div>
								<div id="style2" class="color-themes col2" ></div>
								<div id="style3" class="color-themes col3" ></div>
								<div id="style4" class="color-themes col4" ></div>
								<div id="none" class="color-themes col5" ></div>
							</span>
						</li>
						<li class="Label label-lg">Contact Group</li>
						<li data-counter-color="theme">
								<span><i class="icon fa fa-smile-o"></i> Friends</span>
								<ul>
										<li class="Label">A</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Alexa 
														<small>Johnson</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Alexander 
														<small>Brown</small>
												</a>
										</li>
										<li class="Label">F</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/3.jpg" /> Fred
														<small>Smith</small>
												</a>
										</li>
										<li class="Label">J</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/4.jpg" /> James
														<small>Miller</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Jefferson
														<small>Jackson</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/6.jpg" /> Jordan
														<small>Lee</small>
												</a>
										</li>
										<li class="Label">K</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/7.jpg" /> Kim
														<small>Adams</small>
												</a>
										</li>
										<li class="Label">M</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/8.jpg" /> Meagan
														<small>Miller</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Melissa
														<small>Johnson</small>
												</a>
										</li>
										<li class="Label">N</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/10.jpg" /> Nicole
														<small>Smith</small>
												</a>
										</li>
										<li class="Label">S</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Samantha
														<small>Harris</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="block">
														<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Scott
														<small>Thompson</small>
												</a>
										</li>
								</ul>
						</li>
						<li>
								<span><i class="icon  fa fa-home"></i> Family</span>
								<ul>
										<li class="Label">A</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/3.jpg" /> Adam
														<small>White</small>
												</a>
										</li>
										<li class="Label">B</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/4.jpg" /> Ben
														<small>Robinson</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Bruce
														<small>Lee</small>
												</a>
										</li>
										<li class="Label">E</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/6.jpg" /> Eddie
														<small>Williams</small>
												</a>
										</li>
										<li class="Label">J</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/7.jpg" /> Jack
														<small>Johnson</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/8.jpg" /> John
														<small>Jackman</small>
												</a>
										</li>
										<li class="Label">M</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Martina
														<small>Thompson</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/10.jpg" /> Matthew
														<small>Watson</small>
												</a>
										</li>
										<li class="Label">O</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Olivia
														<small>Taylor</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Owen
														<small>Wilson</small>
												</a>
										</li>
								</ul>
						</li>
						<li data-counter-color="theme-inverse">
								<span><i class="icon  fa fa-briefcase"></i> Work colleagues</span>
								<ul>
										<li class="Label">D</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/3.jpg" /> David
														<small>Harris</small>
												</a>
										</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/4.jpg" /> Dennis
														<small>King</small>
												</a>
										</li>
										<li class="Label">E</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Eliza
														<small>Walker</small>
												</a>
										</li>
										<li class="Label">L</li>
										<li class="img">
												<a href="#" class="busy">
														<img alt="" src="assets/photos_preview/50/people/6.jpg" /> Larry
														<small>Turner</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/7.jpg" /> Lisa<br />
														<small>Wilson</small>
												</a>
										</li>
										<li class="Label">M</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/8.jpg" /> Michael
														<small>Jordan</small>
												</a>
										</li>
										<li class="Label">R</li>
										<li class="img">
												<a href="#">
														<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Rachelle
														<small>Cooper</small>
												</a>
										</li>
										<li class="img">
												<a href="#" class="online">
														<img alt="" src="assets/photos_preview/50/people/10.jpg" /> Rick
														<small>James</small>
												</a>
										</li>
								</ul>
						</li>
						<li class="Label label-lg">Total week Earnings</li>
						<li>
								<span><i class="icon  fa fa-bar-chart-o"></i> See This week</span>
								<ul>
										<li class="Label">themeforest</li>
										<li><span><i class="label label-warning pull-right">HTML</i> Earnings $395 </span></li>
										<li><span> Earnings $485 </span></li>
										<li><span><i class="label label-info pull-right">Wordpress</i> Earnings $1,589 </span></li>
										<li class="Label">codecanyon </li>
										<li><span><i class="label label-danger pull-right">Item 6537086</i> Earnings $897</span></li>
										<li><span>Sunday Earnings $395</span></li>
										<li class="Label">Other</li>
										<li><span><i class="label label-success  pull-right">up 35%</i> Total Earnings $5,025</span></li>
								</ul>
						</li>
						<li>
								<span>
									<div class="widget-mini-chart align-xs-right">
											<div class="pull-left">
													<div class="sparkline mini-chart" data-type="bar" data-color="warning" data-bar-width="10" data-height="45">2,3,7,5,4,6,6,3</div>
											</div>
											<p>This week Earnings</p>
											<h4>$11,987</h4>
									</div>
									<!-- //widget-mini-chart -->			
								</span>
						</li>
						<li class="Label label-lg">Processing </li>
						<li>
								<span>								
									<p>Server Processing</p>
									<div class="progress progress-dark progress-stripes progress-xs">
											<div class="progress-bar bg-danger" aria-valuetransitiongoal="37"></div>
									</div>
									<label class="progress-label">Today , CPU 37%</label>
									<!-- //progress-->
									<div class="progress progress-dark progress-xs">
											<div class="progress-bar bg-warning" aria-valuetransitiongoal="23"></div>
									</div>
									<label class="progress-label lasted">Today , Server load  22.85%</label>
									<!-- //progress-->
								</span>
						</li>
						<li class="Label label-lg">Quick Friends Chat </li>
						<li class="img">
								<a href="#" class="online">
										<img alt="" src="assets/photos_preview/50/people/1.jpg" /> Olivia
										<small>Taylor</small>
								</a>
						</li>
						<li class="img">
								<a href="#" class="online">
										<img alt="" src="assets/photos_preview/50/people/2.jpg" /> Owen
										<small>Wilson</small>
								</a>
						</li>
						<li class="img">
								<a href="#">
										<img alt="" src="assets/photos_preview/50/people/8.jpg" /> Meagan
										<small>Miller</small>
								</a>
						</li>
						<li class="img">
								<a href="#" class="busy">
										<img alt="" src="assets/photos_preview/50/people/9.jpg" /> Melissa
										<small>Johnson</small>
								</a>
						</li>
						<li class="img">
								<a href="#" class="online">
										<img alt="" src="assets/photos_preview/50/people/5.jpg" /> Samantha
										<small>Harris</small>
								</a>
						</li>
						<li class="Label label-lg">visitors Real Time</li>
						<li>
								<span>
									<div class="widget-chart">
											<div id="realtimeChart" class="demo-placeholder" style="height:150px"></div>
											<div id="realtimeChartCount" class="align-lg-center"><span>0</span> visitors on site </div>
									</div><!-- // widget-chart -->
								</span>
						</li>
				</ul>
		</nav>
		<!-- //nav right menu-->
		
		
</div>
<!-- //wrapper-->
@endsection

@section('customScript')
<script>
	$(document).ready(function() {	

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$("#addEvent").submit(function(event){
			event.preventDefault();
			if($("#event_title").val()){
				var events=$('<span class="external-event  label" data-color="'+$("#color_select").val()+'">'+$("#event_title").val() +'</span>');
				events.css({'background-color': $("#color_select").val() || "#CCC" , 'margin-right': "3px"});
				$("#external-events").append(events);
				$("#external-events span.external-event").draggable({
					zIndex: 999,
					revert: true,     
					revertDuration: 0 ,
					drag: function() { $("#slide-trash").addClass("active") },
					stop: function() { $("#slide-trash").removeClass("active") }
				});
				$(this)[0].reset();
				$('#md-add-event').modal('hide');
			}else{
				$.notific8('Please enter <strong>event  title</strong> ',{ life:5000, theme:"danger" ,heading:"ERROR :);" });
				$("#event_title").focus();
			}
		});
		$('#external-events span.external-event').draggable({
				zIndex: 999,
				revert: true,     
				revertDuration: 0 ,
				drag: function() { $("#slide-trash").addClass("active") },
				stop: function() { $("#slide-trash").removeClass("active") }
		});
		
	    $( "#slide-trash" ).droppable({
		 accept: "#external-events span.external-event , .fc-event",
		 hoverClass: "active-hover",
		 drop: function( event, ui ) {
			 ui.draggable.remove();
			 $(this).removeClass( "active" );
		 }
	    });
		var isElemOverDiv = function(draggedItem, dropArea) {
			// Prep coords for our two elements
			var a = $(draggedItem).offset;	
			a.right = $(draggedItem).outerWidth + a.left;
			a.bottom = $(draggedItem).outerHeight + a.top;
			
			var b = $(dropArea).offset;
			a.right = $(dropArea).outerWidth + b.left;
			a.bottom = $(dropArea).outerHeight + b.top;
		
			// Compare
			if (a.left >= b.left
				&& a.top >= b.top
				&& a.right <= b.right
				&& a.bottom <= b.bottom) { return true; }
			return false;
		}
		$('#calendar').fullCalendar({
/*			    eventClick: function(calEvent, jsEvent, view) {
			
				  alert('Event: ' + calEvent._id);
				  alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				  alert('View: ' + view.name);
				$(this).fullCalendar('removeEvents',calEvent._id);
				  // change the border color just for fun
				//  $(this).css('border-color', 'red');
			
			    },*/
			eventDragStop: function(event, jsEvent, ui, view) {			
				var x = isElemOverDiv(ui, $('#slide-trash'));
				alert(x);			
				if (x) {
					alert("delete");
					$('#calendar').fullCalendar('removeEvents', event.id);
				}			
			},
			header: {
				left: 'title',
				center: '',
				right: ''
			},
			editable: true,
            droppable: true,
            selectable: true, 
			// events: [
			// 	{
			// 		title: 'All Day Event',
			// 		start: new Date(y, m, 1),
			// 		end: new Date(y, m, 2),
			// 		color:"#f37864"
			// 	},
			// 	{
			// 		title: 'Long Event',
			// 		start: new Date(y, m, d-10),
			// 		end: new Date(y, m, d-7),
			// 		color:"#1bc6b0"
			// 	},
			// 	{
			// 		title: 'Meeting',
			// 		start: new Date(y, m, d, 10, 30),
			// 		allDay: false,
			// 		color:"#7ace30"
			// 	},
			// 	{
			// 		title: 'Birthday Party',
			// 		start: new Date(y, m, d-5, 19, 0),
			// 		end: new Date(y, m, d-4, 22, 30),
			// 		allDay: false,
			// 		color:"#ffcc33"
			// 	},
			// 	{
			// 		title: 'Lunch',
			// 		start: new Date(y, m, d, 12, 15),
			// 		end: new Date(y, m, d, 14, 0),
			// 		allDay: false,
			// 		color:"#62707d"
			// 	}
			// ],
			drop: function(date, allDay) { 
                        var  copiedEventObject = {
                                title: $(this).text(),
                                start: date,
                                allDay: allDay,
                                color: $(this).css('background-color')
                            };
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				$(this).remove();
            },
            dayClick: function(){
                window.location.href="#form";
            }
		});
		$(".change-view").click(function(){
			 var data=$(this).data();
			$('#calendar').fullCalendar( 'changeView', data.view ); 
		});
		$(".change-today").click(function(){
			$('#calendar').fullCalendar( 'today' );
		});
		$(".change").click(function(){
			  var data=$(this).data();
			$('#calendar').fullCalendar( data.change );
		});
		
	});

</script>
<script>
        $(function() {
            $(".toggle-menu").remove();
        });    
</script>
@endsection