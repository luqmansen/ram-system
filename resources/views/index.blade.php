@extends('layouts.userMainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2.2.0/src/js.cookie.min.js"></script>
{{-- <link rel="stylesheet" href={{URL::asset('css/caledar.css')}}> --}}
<link rel="stylesheet" href={{URL::asset('css/customFC.css')}}>

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

.home-navbar.scrolled {
	background-color:#ffffff;
	border-bottom:5px solid #005b9f;
}
.hidden{
	display: none;
}
#welcome-banner-never:hover{
	text-decoration: underline;
}
#welcome-banner{
	background-image: linear-gradient(to bottom right, #005b9f, #00849f);
}
table.ada tr th {
	padding-right: 30px;
	
}
table.ada tr:nth-child(even) {
	background: #d3d3d3;
	
}
</style>
@endsection

@section('contentBody')

<body style="background-color:#f1f2f6;background-image:url(assets/img/BG-1.png);background-repeat:no-repeat;background-position:center bottom;background-size:100%;">
<div class="main-content hidden" style="">
		<nav class="navbar navbar-expand-lg navbar-fixed-top transparent" id="home-navbar"> 
				<a class="navbar-brand" href="/">
						<img src="assets/img/logo_.png" height="38" alt="Logo UCCP">
					</a>
					<i class="far fa-question-circle ml-auto" style="color:#005b9f;padding-right:10px;cursor:pointer;" data-toggle="tooltip" title="Klik untuk memunculkan bantuan"></i>
		</nav>
		<div class="container py-3 mt-3 hidden" id="welcome-banner" style="border-radius:10px;color:#ffffff">
			<div class="row">
				<div class="col-12 text-right">
						<i style="cursor:pointer" id="welcome-banner-close" class="fas fa-times"></i>
				</div>
			</div>
			{{-- row --}}
			<div class="row align-items-center py-5 my-5">
				<div class="col-sm-12 col-md-6">
					<img class="img-fluid" src="assets/img/welcome-img.png" height="300" alt="Logo UCCP">
				</div>
				<div class="col-sm-12 col-md-6">
						<h1>Selamat Datang</h1>
						<h1>di Sistem Reservasi Ruangan</h1>
						<h5>PT Undip Citra Ciptaprima</h5>
						<hr>
						<p>Scroll ke bawah untuk memulai atau klik <i class="far fa-question-circle"></i> di pojok kanan atas laman untuk menampilkan bantuan.</p>
				</div>
			</div>
			{{-- row --}}
			<div class="row text-center py-2">
				<div class="col-12">
					<i class="fas fa-angle-down animated slideOutDown infinite"></i>
				</div>
			</div>
			<div class="row align-items-end">
				<div class="col-12">
					<p id="welcome-banner-never" style="cursor:pointer;font-size:10px;">jangan tampilkan lagi</p>
				</div>
			</div>
			{{-- row --}}
		</div>
		{{-- container --}}
		<div class="container">
				<div id="wrapper" style="margin-left:0px">	
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id='myButton' style="display:none"></button>
						<button type="button" class="btn btn-primary" onclick="CustomerPage(); return false" id='customerForm' style="display:none"></button>
								<div id="main">
											<div class="row mt-5 mb-1">
												<div class="col-12" >
														{{-- <button id="my-today-button" class="btn" style="background-color:#FFF">Today</button> --}}
														<i class="far fa-arrow-alt-circle-left fa-2x" id="my-prev-button" style="cursor:pointer"></i>
														<i class="far fa-arrow-alt-circle-right fa-2x" id="my-next-button" style="cursor:pointer"></i>
														<h3 id="externalTitle" style="display:inline-block;padding-left:20px; width:248px;"></h3>
												</div>
											</div>
											{{-- row --}}
											<div class="row justify-content-center align-items-center">
												<div class="col-12" style="background-color:rgba(255, 255, 255, 0.7);border-radius:20px;">
														<div class="tabbable">		
																<div class="tab-content">
																	<div id="calendar" ></div>				
																</div>
														</div>
												</div>
											</div>
											<div class="row">														
														<!-- Modal -->
														<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																			<div class="alert alert-success kosong" style="display:none" role="alert">
																					Belum ada peminjaman
																				</div>
																			<table class='ada' style='display:none;width:100%; overflow-y:hidden'>
																					<thead>
																					<tr>
																						<th align="center">Ruangan</th>
																						<th align="center">Waktu Mulai</th>
																						<th align="center">Waktu Selesai</th>
																						
																					</tr>
																					</thead>
																					<tbody id="myTable">
														
																				</tbody>
																			</table>
																			<hr>
																			<div class="container">
																					<h5 for="myID" style="float:left">Reservasi Ruangan : </h5>
																					<select class="form-control" name="id_room" id=idDropDown data-toggle="tooltip" data-placement="top" data-html="true">
																						@foreach ($room as $row)
																							<option class="more_info"value="{{$row->id}}" title="Kapasitas {{$row->chair_capacity}} (hanya kursi), {{$row->table_capacity}} (Kursi + Meja)  ">{{$row->room_name}}</option>
																						@endforeach
																					</select>
																			</div>
																	</div>
																	<div class="modal-footer">
																			<button id='lanjutkan' type="button" class="btn btn-primary" data-dismiss="modal">Lanjutkan</button>
																		</div>
																		{{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
																		
																		{{-- <a id='lanjutkan'  role="button" class="btn btn-primary" style="color:white">Lanjutkan</a> --}}
																	</div>
																</div>
															</div>
														</div>
											</div>
												<!-- The Modal -->
							<!-- //wrapper-->
		</div>
		</div>
		<div class="container-fluid" style="background-color:#2f3542;">
			<div class="row pt-3 mt-5" >
				<div class="col-md-6" id="footer-copyright"><p style="color:#dfe4ea;font-size:14px;">PT UCCP All Rights Reserved 2019</p></div>
				<div class="col-md-6 text-right" id="footer-link"><a href="https://uccprima.id" style="color:#dfe4ea;font-size:14px;padding-bottom:3px"	>PT Undip Citra Ciptaprima Main Site <i class="fas fa-external-link-square-alt"></i></a></div>
			</div>
		</div>
		{{-- container-fluid --}}
		{{-- container --}}
</div>
{{-- main-content --}}
<img id="loading" src="assets/img/gear.gif" alt="page loading" style="height:30px;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);">
@endsection

@section('customScript')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.js"></script>
<script>

$( document ).ready(function(){
	var wb = Cookies.get('welcome-banner');
	if(wb != 1){
		$('#welcome-banner').removeClass('hidden');
	}
});
$( document ).ready(function(){
	$('.main-content').removeClass('hidden');
	$('#loading').addClass('hidden');
	// Cookies.remove('welcome-banner');
});

$('#welcome-banner-never').on('click', function(){
	Cookies.set('welcome-banner', '1', { expires: 30 });
	$('#welcome-banner').hide();
});
$('#welcome-banner-close').on('click', function(){
	$('#welcome-banner').hide();
});
</script>

<script>
var widths = $('body').width();
if (widths <= 767){
	$('#footer-copyright').addClass('text-center');
		$('#footer-link').addClass('text-center').css('padding-bottom','10px');
		$('#footer-link').removeClass('text-right');
}

$( window ).resize(function() {
  var width = $('body').width();
	if (width >= 768){
		$('#footer-copyright').removeClass('text-center');
		$('#footer-link').removeClass('text-center').css('padding-bottom','10px');
		$('#footer-link').addClass('text-right');
	} else{
		$('#footer-copyright').addClass('text-center');
		$('#footer-link').addClass('text-center').css('padding-bottom','10px');
		$('#footer-link').removeClass('text-right');
	}
});

</script>

<!-- Script tooltip -->
<script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
<script>
	$(function () {
  $(document).scroll(function () {
	  var $nav = $("#home-navbar");
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
		$nav.toggleClass('transparent', $(this).scrollTop() > $nav.height());
	});
});
</script>
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
						$('#myTable').append($("<tr><td>"+ data[i].room_name + "</td>" +
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
				center: '',
				right: ''
			},
			viewRender: function(view) {
        var title = view.title;
        $("#externalTitle").html(title);
      },
			editable: false,
            droppable: true,
            selectable: true,
			contentHeight : 800,
			height : 800, 
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
		$('#my-prev-button').click(function() {
			$('#calendar').fullCalendar('prev');
		});
		$('#my-next-button').click(function() {
			$('#calendar').fullCalendar('next');
		});
		$('#my-today-button').click(function() {
			$('#calendar').fullCalendar('today');
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
@if  (session('status'))
<script>
Swal({
		 type: 'success',
		 title: 'Berhasil',
		 text: 'Tiket berhasil dimasukan!',
		 showConfirmButton: false,
		 timer: 1500
 });
</script>
@endif
@endsection