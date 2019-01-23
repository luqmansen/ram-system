@extends('layouts.mainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<link rel="stylesheet" href={{URL::asset('css/caledar.css')}}>
<style>
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
                                    @if (!Auth::guest())
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
				center: 'agendaDay,agendaWeek,month',
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

</script>
<script>
        $(function() {
            $(".toggle-menu").remove();
        });    
</script>
@endsection