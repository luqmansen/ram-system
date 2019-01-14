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

		
		<div id="main">
			<div id="main">
				<ul class="nav nav-tabs" data-provide="tabdrop">
									<li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
									<li><a href="#" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
									<li class="active"><a href="#" data-view="month" data-toggle="tab" class="change-view">Month</a></li>
									<li><a href="#" data-view="agendaWeek" data-toggle="tab" class="change-view">Week</a></li>
									<li><a href="#" data-view="agendaDay" data-toggle="tab" class="change-view">Day</a></li>
									<li><a href="#" class="change-today">Today</a></li>
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

		
		
		// // fungsi untuk post value clicked day
		// function getDate(e){
		// 		e.preventDefault();
				
		// 		var xhr = new XMLHttpRequest();
		// 		xhr = date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
		// 		xhr.open('POST', 'room-detail.blade.php', true );
		// 		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		// 		xhr.onload = function(){
		// 			console.log(this.xhr);
		// 		}

		// 		xhr.send();
		// 	}

		
	   $('#calendar').fullCalendar({
			dayClick: function(date, jsEvent, view) { 
			$date = date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
            

			function getDate(e){
				e.preventDefault();
				
				var date = date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();

				var xhr = new XMLHttpRequest();
				xhr.open('POST', '../reservation/room-detail.blade.php', true );
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

				xhr.onload = function(){
					console.log(this.responseText);
				}

				xhr.send($date);
			}
			console.log($date);
			// alert($date);
			window.location.href="/reservation/";  
        },
			
			header: {
				left: 'title',
				center: '',
				right: ''
			},
			editable: true,
            droppable: true,
            selectable: true
			
		
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