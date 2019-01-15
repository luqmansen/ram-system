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

		
		
	   $('#calendar').fullCalendar({
		   	dayClick: function(date, jsEvent, view) { 
			var hari = date.getDate();
			m = String(hari);
			//Fungsi agar hari formatnya jadi 2 digit, soalnya formatting ikut di dokumentasinya ribet 
			if (m < 2){
				$day = '0'+ hari; 
			} else {
				$day = hari;
			};

			var bulan = date.getMonth() +1;
			n = String(bulan);
			//Ini juga
			if (n < 2){
				$month = '0'+ bulan; 
			} else {
				$month = bulan;
			};
			$year = date.getFullYear();
            
			$url = "/reservation/"+$day+'/'+$month+'/'+$year;
			window.location.href= $url;  
        },
			
			header: {
				left: 'title',
				center: '',
				right: ''
			},
			editable: true,
            droppable: true,
            selectable: true,
			height :650, 
			contentHeight : 650,
			aspectRatio:1.5,
			
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