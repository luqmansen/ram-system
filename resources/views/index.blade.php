@extends('layouts.mainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
{{-- <link href={{URL::asset('maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}} rel="stylesheet" id="bootstrap-css"> --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery-ui.css')}}" />
<link rel="stylesheet" href={{URL::asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css")}} integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href={{URL::asset('assets/css/style.css')}}>
<link rel="stylesheet" href={{URL::asset('css/caledar.css')}}>
<link rel="stylesheet" href={{URL::asset('css/modal.css')}}>

@endsection

@section('bodyWrapper')
@include('inc.messages')
<body class="full-lg">
		
<div id="wrapper" style="margin-left:0px">	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id='myButton' style="display:none"></button>
	<div id="main">
			<div id="main">
				<ul class="nav nav-tabs" data-provide="tabdrop">
								@if (!Auth::guest())
									<li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="#" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
                                        <li class="active"><a href="#" data-view="month" data-toggle="tab" class="change-view">Month</a></li>
                                        <li><a href="#" data-view="agendaWeek" data-toggle="tab" class="change-view">Week</a></li>
                                        <li><a href="#" data-view="agendaDay" data-toggle="tab" class="change-view">Day</a></li>
                                        <li><a href="#" class="change-today">Today</a></li>
                                    @endif
							</ul>
					<div class="tabbable">		
							<div class="tab-content">
										<div id="calendar" ></div>				
							</div>
					</div>
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
						<div class="row">
							<div class="col-sm">
								<h5 style="margin 0 auto ;float:left">Reservasi Ruangan : </h5>
								{{-- {!! Form::Label('id_room', 'Ruangan :', ['style'=>'float:left;']) !!} --}}
							</div>
							<div class="col-sm">
								<select data-toggle="popover" class="btn btn-secondary dropdown-toggle"  data-container="body" data-html="true" style="float:center" name="id_room"  id="idDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded='true'>
									@foreach($room as $row)
									<option value="{{$row->id}}">{{$row->name}}</option>
									@endforeach
								</select>
								<div id="popover-content-idDropDown" class="hide">
										<div class="list-group" style="overflow-y:auto; margin:0; border:0">
											@foreach ($room as $row)
												<a  class="list-group-item list-group-item-action flex-column align-items-start" style="margin: 0" >
													<div class=" ">
														<p class="">Ruang {{$row->name}}</p>
													</div>
													<small class="">Kapasitas Hanya Kursi {{$row->chair_capacity}}.</small> <br>
													<small class="">Kapasitas Kursi + Meja {{$row->table_capacity}}.</small>
												</a>
											@endforeach
										</div>
								</div>
							</div>		  
						</div>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> --}}

<script>
	

	
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

	function clearModal()
	{
		$('#myTable').empty();
	};


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
				$url = "/reservation/customerform/"+$day+'/'+$month+'/'+$year+'/'+$room;
				window.location.href=$url;
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
	


</script>
<script>
        $(function() {
            $(".toggle-menu").remove();
        });    
</script>

@endsection