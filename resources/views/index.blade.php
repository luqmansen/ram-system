@extends('layouts.mainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
{{-- <link href={{URL::asset('maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}} rel="stylesheet" id="bootstrap-css"> --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery-ui.css')}}" />
<link rel="stylesheet" href={{URL::asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css")}} integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href={{URL::asset("https://use.fontawesome.com/releases/v5.7.0/css/all.css")}}>
<!-- Bootstrap core CSS -->
<link href={{URL::asset("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css")}} rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href={{URL::asset("https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/css/mdb.min.css")}} rel="stylesheet">

<link rel="stylesheet" href={{URL::asset('assets/css/style.css')}}>
<link rel="stylesheet" href={{URL::asset('css/modal.css')}}>
<link rel="stylesheet" href={{URL::asset('css/caledar.css')}}>

<style>
.more_info {
  border-bottom: 1px dotted;
  position: relative;
}

.more_info .title {
  position: absolute;
  top: 20px;
  background: silver;
  padding: 4px;
  left: 0;
  white-space: nowrap;
}
</style>
{{-- style for footer --}}
<style>
footer {
  background-color: #232c3b;
  min-height: 350px;
  font-family: 'Open Sans', sans-serif;
	padding-top: 30px;
	text-align: left;
	
}

.footerleft {
  margin-top: 20px;
  padding: 0 36px;
}

.logofooter {
  margin-bottom: 10px;
  font-size: 25px;
  color: white;
  font-weight: 700;
}

.footerleft p {
  color: white;
  font-size: 12px !important;
  font-family: 'Open Sans', sans-serif;
  margin-bottom: 15px;
}

.footerleft p i {
  width: 20px;
  color: #fff;
}

.paddingtop-bottom {
  margin-top: 20px;
}

.footer-ul {
  list-style-type: none;
  padding-left: 0px;
  margin-left: 2px;
}

.footer-ul li {
  line-height: 29px;
  font-size: 12px;
  margin-top: 5px;
}

.footer-ul li a {
  font-size: 17px;
  text-decoration: none;
  font-weight: 200;
  color: #fff;
  transition: color 0.2s linear 0s, background 0.2s linear 0s;
  display: block;
  padding-bottom: 5px;
  border-bottom: 1px dotted #fff;
}

.footer-ul i {
  margin-right: 10px;
}

.footer-ul li a:hover {
  transition: color 0.2s linear 0s, background 0.2s linear 0s;
  color: #73b0f4;
}

.social:hover {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -o-transform: scale(1.1);
}

.icon-ul {
  list-style-type: none !important;
  margin: 0px;
  padding: 0px;
}

.icon-ul li {
  line-height: 75px;
  width: 100%;
  float: left;
}

.icon {
  float: left;
  margin-right: 5px;
}

.copyright {
  min-height: 40px;
  background-color: #141d29;
}

.copyright p {
  text-align: center;
  color: white;
  padding: 10px 0;
  margin-bottom: 0px;
}

.heading7 {
  position: relative;
  margin: 0 0 25px;
  color: #fff;
  padding-bottom: 5px;
  font-weight: 900;
  font-size: 24px;
  line-height: 28px;
}

.heading7:before {
  content: " ";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 60px;
  height: 1px;
  background-color: #fff;
}

.post p a {
  font-size: 12px;
  color: white !important;
  line-height: 20px;
}

.post p a span {
  display: block;
  color: #8f8f8f !important;
}

.bottom_ul {
  list-style-type: none;
  float: right;
  margin-bottom: 0px;
}

.bottom_ul li {
  float: left;
  line-height: 40px;
}

.bottom_ul li:after {
  content: "/";
  color: white;
  margin-right: 8px;
  margin-left: 8px;
}

.bottom_ul li a {
  color: white;
  font-size: 12px;
}

.post a:hover {

  text-decoration: none;
}

.btn-insta {
  color: white !important;
  background: transparent;
}

.fields {
  color: white;
  font-size: 15px;
  text-decoration: none;
}

</style>
@endsection

@include('inc.messages')
@section('bodyWrapper')
<body class="full-lg">
<div id="wrapper" style="margin-left:0px">	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id='myButton' style="display:none"></button>
	<button type="button" class="btn btn-primary" onclick="CustomerPage(); return false" id='customerForm' style="display:none"></button>
	<div id="main">
			<div id="main">
				<ul class="nav nav-tabs" data-provide="tabdrop">
								{{-- @if (!Auth::guest())
									<li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="#" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
                                        <li class="active"><a href="#" data-view="month" data-toggle="tab" class="change-view">Month</a></li>
                                        <li><a href="#" data-view="agendaWeek" data-toggle="tab" class="change-view">Week</a></li>
                                        <li><a href="#" data-view="agendaDay" data-toggle="tab" class="change-view">Day</a></li>
                                        <li><a href="#" class="change-today">Today</a></li>
								@endif --}}
							</ul>
				<!--Main Navigation-->
					<nav class="navbar navbar-expand-lg navbar-dark default-color">	
							<a class="navbar-brand" href="#"><strong>Navbar</strong></a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
								aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item active">
										<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Features</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Pricing</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Opinions</a>
									</li>
								</ul>
								<ul class="navbar-nav nav-flex-icons">
									<li class="nav-item">
										<a class="nav-link"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link"><i class="fab fa-twitter"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link"><i class="fab fa-instagram"></i></a>
									</li>
								</ul>
							</div>
						</nav>
						<div class="col-md-2"></div>
						<div class="col-md-8 col-sm-12">
							{{-- MAIN CALENDAR CONTENT --}}
						<div class="tabbable">		
							<div class="tab-content">
										<div id="calendar" ></div>				
							</div>
					</div>
						</div>
						<div class="col-md-2"></div>


<!--Main Navigation-->
					<!-- Footer -->
					<div class="col-sm-12">
					<footer>
							<div class="container">
									<div class="row">
											<div class="col-md-4 col-sm-6 footerleft ">
													<h6 class="heading7">About Us</h6>
													<p><a href="//madgeek.in">Madgeek</a> is a Website development company from Bangalore. Madgeek builds interactive, astonishing,
															responsive
															and feature rich responsive website solution.</p>
													<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><i class="fa fa-map-pin"></i>
															<span itemprop="streetAddress">Mahadevi Nilaya, 10th cross, Raghavendra matha Road, Chikkabanavara</span>,
					
															<span itemprop="addressLocality">Bangalore</span>
															<span itemprop="addressRegion">, Karnataka</span>,
															<span itemprop="addressCountry">India</span><br/>
															<span itemprop="postalCode">KA - 560090</span></p>
													<p><i class="fa fa-phone"></i> Phone (India) :
															<span itemprop="telephone"><a href="tel:+91 8861031253" class="fields"
																														title="Contact Madgeek Pvt Ltd"> +91 8861031253</a></span></p>
													<p><i class="fa fa-envelope"></i> E-mail :
															<span itemprop="email"><a href="mailto:hello@madgeek.in" class="fields"
																												title="Madgeek Offic">hello@madgeek.in</a></span></p>
					
													<span itemprop="openingHoursSpecification" itemscope
																itemtype="http://schema.org/OpeningHoursSpecification"><p><i
																					class="fa fa-calendar" aria-hidden="true"></i> Work Days:
					<span itemprop="dayOfWeek" itemscope itemtype="http://schema.org/DayOfWeek">
					<span itemprop="name">MON, TUE, WED, THUR, FRI</span></span></p>
													<p><i class="fa fa-clock-o" aria-hidden="true"></i> Opening time:
					<span itemprop="opens" content="Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30">09:00 AM</span>  <i
																			class="fa fa-clock-o" aria-hidden="true"></i>
															Closing time:
					<span itemprop="closes" content="Please insert valid ISO 8601 date/time here. Examples: 2015-07-27 or 2015-07-27T15:30">06:00 PM</span></p></span>
											</div>
											<div class="col-md-2 col-sm-6 paddingtop-bottom">
													<h6 class="heading7">Useful Links</h6>
													<ul class="footer-ul">
															<li><a href="//madgeek.in" title="MadGeek About Us"> <i class="fa fm fa-angle-double-right"></i> About Us</a>
															</li>
															<li><a href="//madgeek.in" title="MadGeek Privacy Policy"> <i class="fa fm fa-angle-double-right"></i> Privacy
																			Policy</a></li>
															<li><a href="//madgeek.in" title="madGeek Terms & Conditions"> <i class="fa fm fa-angle-double-right"></i>
																			T & Conditions</a></li>
															<li><a href="//madgeek.in" title="MadGeek Contact us"> <i
																							class="fa fm fa-angle-double-right"></i> Contact Us</a></li>
															<li><a href="//madgeek.in" title="MadGeek SiteMap"> <i class="fa fm fa-angle-double-right"></i> Sitemap</a>
															</li>
															<li><a href="//madgeek.in" title="MadGeek Web Store"><i
																							class="fa fm fa-angle-double-right"></i> Madgeek Store</a></li>
													</ul>
											</div>
											<div class="col-md-3 col-sm-6 paddingtop-bottom">
													<h6 class="heading7">Facebook</h6>
													<div class="fb-page" data-href="https://www.facebook.com/madgeek.in/" data-tabs="timeline"
															 data-small-header="true" data-width="270px" data-hide-cover="true"
															 data-height="260px"
															 data-show-facepile="true">
															<blockquote cite="https://www.facebook.com/madgeek.in/" class="fb-xfbml-parse-ignore"><a
																					href="https://www.facebook.com/madgeek.in/">Madgeek</a></blockquote>
													</div>
											</div>
											<div class="col-md-3 col-sm-6 paddingtop-bottom">
													<h6 class="heading7">Contact</h6>
													<ul class="footer-ul">
															<li>
																	<div class="fb-like" data-href="https://www.facebook.com/madgeek.in" data-layout="standard"
																			 data-width="250px"
																			 data-action="recommend" data-size="small" data-show-faces="true" data-share="true"></div>
															</li>
															<li>
																	<a href="https://twitter.com/madgeek_in" class="twitter-follow-button"
																		 data-show-count="false">Follow @madgeek_in</a>
																	<script defer async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
															</li>
															<li>
																	<div class="g-follow" data-href="https://plus.google.com/107750645446351770147"
																			 data-rel="relationshipType"></div>
																	<script src="https://apis.google.com/js/platform.js" async defer></script>
															</li>
															<li>
																	<script defer src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
																	<script defer type="IN/FollowCompany" data-id="7599317" data-counter="right" async></script>
															</li>
															<li>
																	<a class="btn btn-default btn-insta" href="https://www.instagram.com/madgeek.in/" rel="external"
																		 target="_blank"><i class="fa fa-lg fa-instagram"></i> Follow madgeek.in</a>
															</li>
													</ul>
											</div>
									</div>
							</div>
					</footer>
				</div>
					<div class="copyright">
							<div class="container">
									<div class="col-md-12 col-sm-12">
											<p>© 2017 - All Rights with <a href="//madgeek.in">Madgeek Pvt. Ltd.</a> | CIN : U74999KA2017PTC103746</p>
									</div>
							</div>
					</div>
					<!-- ./Footer -->
				</div>
				
		<!-- The Modal -->
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			
			  <!-- Modal Header -->
			  <div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1 class="modal-title">Detail Ruangan</h1>
			  </div>
			  
			  <!-- Modal body -->
			  <div class="modal-body" style="overflow-y: scroll">
					<h3 class="card-title kosong" style='display:none'>Ruangan Belum Dipesan </h3>
					<h4 class="card-text kosong" style='display:none;'>Segera reservasi sekarang.</h4>
					<table class='ada' style='display:none; overflow-y:hidden'>
							<thead>
							<tr>
								<th>Ruangan</th>
								<th>Waktu Mulai</th>
								<th>Waktu Selesai</th>
								
							</tr>
							</thead>
							<tbody id="myTable">

						</tbody>
					</table>
			  </div>
			  
			  <!-- Modal footer -->
			  <div class="modal-footer">
				<div class="form-group">
					<div class="container">
							<h5 for="myID" style="float:left">Reservasi Ruangan : </h5>
							<select class="form-control" name="id_room" id=idDropDown data-toggle="tooltip" data-placement="top" data-html="true">
								@foreach ($room as $row)
									<option class="more_info"value="{{$row->id}}" title="Kapasitas {{$row->chair_capacity}} (hanya kursi), {{$row->table_capacity}} (Kursi + Meja)  ">{{$row->room_name}}</option>
								@endforeach
							</select>
						  </div>
				</div>
				{{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
				<a id='lanjutkan'  role="button" class="btn btn-primary" style="color:white">Lanjutkan</a>
			  </div>
			</div>
		  </div>
		</div>
		
	  </div>
<!-- //wrapper-->

@endsection

@section('customScript')
<!-- JQuery -->
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.1/js/mdb.min.js"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.js"></script>

<script>
	

	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

	function clearModal()
	{
		$('#myTable').empty();
	};

	function CustomerPage()
	{
		alert('henlo');
	}

	function getDate(date) 
	{
		$.ajax({
			type: 'POST',
			url: "/",
			data:{date:date},
			cache:false,
			ifModified:true,
			success: function (data) {
				
				if(Array.isArray(data) && data.length){
					for (i = 0; i< data.length; ++i)
					{
						console.log(data[i].date);
						$('.kosong').attr('style', 'display:none');
						$('.ada').attr('style', 'display:show');
						$('#myTable').append($("<tr><td>"+ data[i].name + "</td>" +
												"<td>" + data[i].start_hour + "</td>" + 
												"<td>" + data[i].end_hour  + 
												"</td> </tr>"));	
					};
				} 
				else 
				{
					console.log('data not exist');
					$('.ada').attr('style', 'display:none');
					$('.kosong').attr('style', 'display:show');
				}
				$('#myButton').click();
			}
		});
	};

	$(document).ready(function() {	

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

	
	   $('#calendar').fullCalendar({
		   	dayClick: function(date, jsEvent, view) { 
			var hari = date.getDate();
			m = String(hari);
			//Fungsi agar hari formatnya jadi 2 digit
			if (m < 2){
				$day = '0'+ hari; 
			} else {
				$day = hari;
			};

			var bulan = date.getMonth() +1;
			n = String(bulan);
			
			if (n < 2){
				$month = '0'+ bulan; 
			} else {
				$month = bulan;
			};

			$year = date.getFullYear();
            // window.location.href= $url;
			$date =   $year + '-' + $month + '-' + $day;
			// console.log($date);
			
			clearModal();
			$(document).ready(function(){
				getDate($date);
				});
			$('#lanjutkan').on('click',function(){
				$room = $("#idDropDown").val();
				$.ajax(
					{
						type: 'POST',
						url: "/getDate",
						data:{
							day:$day,
							month:$month,
							year:$year,
							room:$room
							},
						cache:false,
						ifModified:true,
						success: function (data) 
						{
							// console.log(data[0]);
							$url = "/reservation/customerform/"+data[0]+'/'+data[1]+'/'+data[2]+'/'+data[3];
							window.location.href=$url;
						}
					});
			});
            },
			
            header: {
				left: '',
				center: 'title',
				right: 'prev,next today'
			},
			editable: false,
            droppable: true,
            selectable: true,
			contentHeight : 600,
			height : 600, 
            aspectRatio: 1.35,
            axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
            // events: [
            // {
            // title  : 'Ruang A Penuh',
            // start  : '2019-01-7'
            // }
            //         ]
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
	// Pop over ruangan detail
	$("[data-toggle=popover]").each(function(i, obj) 
	{
		$(this).popover(
		{
			html: true,
			content: function() 
				{
				var id = $(this).attr('id')
				return $('#popover-content-' + id).html();
				}
		});
	});
// close popover when click anywhere on page
	$('html').on('click', function(e) 
	{
		if (typeof $(e.target).data('original-title') == 'undefined') 
		{
    		$('[data-original-title]').popover('hide');
  		}
	});
	// i dont remember what is this, just leave it here
	$(function()
	{
            $(".toggle-menu").remove();
	});  
	

</script>

<script>
	$("option[title]").click(function () {
		var $title = $(this).find(".title");
		if (!$title.length) {
			$(this).append('<option class="title">' + $(this).attr("title") + '</option>');
		} else {
			$title.remove();
		}
		});​
	
</script>
@endsection