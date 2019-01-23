@extends('layouts.mainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<link rel="stylesheet" href={{URL::asset('css/caledar.css')}}>
<style>
	
   /* Modal Header */
	.modal-header {
	padding: 2px 16px;
	background-color: #5cb85c;
	color: white;
	}

	/* Modal Body */
	.modal-body {padding: 2px 2px;}

	/* Modal Footer */
	.modal-footer {
	padding: 2px 16px;
	background-color: #5cb85c;
	color: white;
	}

	/* Modal Content */
	.modal-content {
	position: relative;
	background-color: #fefefe;
	margin: auto;
	padding: 0;
	border: 1px solid #888;
	width: 100%;
	height: 200%;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	animation-name: animatetop;
	animation-duration: 0.1s
	}

	/* Add Animation */
	@keyframes animatetop {
	from {top: -300px; opacity: 0}
	to {top: 0; opacity: 1}
	}
   </style>


@endsection

@section('bodyWrapper')
<body class="full-lg">
<div id="wrapper" style="margin-left:0px">
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
									<div class="row">
										   <div class="col-lg-8" >		
											</div>
									</div>
							</div>
					</div>
				</div>
				
		<div id="myModal" class="modal">
				<!-- Modal content -->
			<div class="modal-content">
					<div class="modal-header">
					  <span class="close">&times;</span>
					  <h2>Modal Header</h2>
					</div>
					<div class="modal-body">
					  <p>Some text in the Modal Body</p>
					  <p>Some other text...</p>
					</div>
					<div class="modal-footer">
					  <h3>Modal Footer</h3>
					</div>
				  </div>
				</div>
	
		
</div>
<!-- //wrapper-->
@endsection

@section('customScript')
<script>
	var modal = document.getElementById('myModal');
	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() {
	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
		}
	}
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
            // $url = "/reservation/"+$day+'/'+$month+'/'+$year;
			// window.location.href= $url;
			$date =   $year + '-' + $month + '-' + $day;
			console.log($date);
			getDate($date);
			var modal = document.getElementById('myModal');
			modal.style.display = "block";
            },
			
            header: {
				left: '',
				center: 'title',
				right: 'prev,next today'
			},
			editable: false,
            droppable: true,
            selectable: true,
			height :650, 
			contentHeight : 650,
            aspectRatio:1.35,
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
            events: [
            {
            title  : 'Ruang A Penuh',
            start  : '2019-01-7'
            }
                    ]
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

	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        
	// fungsi untuk buat ajax request ketika user pilih tanggal tertentu
	function getDate($date) 
	{
			$.ajax({
			type : 'get',
			url : '/',
			data:{'date':$date},
			success:function(data)
			{
					// $('#disabledTime').html(data);  
					// ajaxResult.push(data); 
					alert(data);
					return data;     
			}
		});
	}


</script>
<script>
        $(function() {
            $(".toggle-menu").remove();
        });    
</script>
@endsection