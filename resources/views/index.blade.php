@extends('layouts.mainLayout')
@section('title')
<title>Homepage | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<style>
 #main ,.tab-content{
	 z-index:auto;
	 }

/*!
 * FullCalendar v1.6.4 Stylesheet
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */
 @import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');
td.fc-day {

background:#FFF !important;
font-family: 'Roboto', sans-serif;

}
td.fc-today {
	background:#FFF !important;
	position: relative;


}

.fc-first th{
	font-family: 'Roboto', sans-serif;
    background:#9675ce !important;
	color:#FFF;
	font-size:14px !important;
	font-weight:500 !important;

	}
.fc-event-inner {
	font-family: 'Roboto', sans-serif;
    background: #03a9f3!important;
    color: #FFF!important;
    font-size: 12px!important;
    font-weight: 500!important;
    padding: 5px 0px!important;
}

.fc {
	direction: ltr;
	text-align: left;
	}
	
.fc table {
	border-collapse: collapse;
	border-spacing: 0;
	}
	
html .fc,
.fc table {
	font-size: 1em;
	font-family: "Helvetica Neue",Helvetica;

	}
	
.fc td,
.fc th {
	padding: 0;
	vertical-align: top;
	}



/* Header
------------------------------------------------------------------------*/

.fc-header td {
	white-space: nowrap;
	padding: 15px 10px 0px;
}

.fc-header-left {
	width: 25%;
	text-align: left;
}
	
.fc-header-center {
	text-align: center;
	}
	
.fc-header-right {
	width: 25%;
	text-align: right;
	}
	
.fc-header-title {
	display: inline-block;
	vertical-align: top;
	margin-top: -5px;
}
	
.fc-header-title h2 {
	margin-top: 0;
	white-space: nowrap;
	font-size: 32px;
    font-weight: 100;
    margin-bottom: 10px;
		font-family: 'Roboto', sans-serif;
}
	span.fc-button {
    font-family: 'Roboto', sans-serif;
    border-color: #9675ce;
	color: #9675ce;
}
.fc-state-down, .fc-state-active {
    background-color: #9675ce !important;
	color: #FFF !important;
}
.fc .fc-header-space {
	padding-left: 10px;
	}
	
.fc-header .fc-button {
	margin-bottom: 1em;
	vertical-align: top;
	}
	
/* buttons edges butting together */

.fc-header .fc-button {
	margin-right: -1px;
	}
	
.fc-header .fc-corner-right,  /* non-theme */
.fc-header .ui-corner-right { /* theme */
	margin-right: 0; /* back to normal */
	}
	
/* button layering (for border precedence) */
	
.fc-header .fc-state-hover,
.fc-header .ui-state-hover {
	z-index: 2;
	}
	
.fc-header .fc-state-down {
	z-index: 3;
	}

.fc-header .fc-state-active,
.fc-header .ui-state-active {
	z-index: 4;
	}
	
	
	
/* Content
------------------------------------------------------------------------*/
	
.fc-content {
	clear: both;
	zoom: 1; /* for IE7, gives accurate coordinates for [un]freezeContentHeight */
	}
	
.fc-view {
	width: 100%;
	overflow: hidden;
	}
	
	

/* Cell Styles
------------------------------------------------------------------------*/

    /* <th>, usually */
.fc-widget-content {  /* <td>, usually */
	border: 1px solid #e5e5e5;
	}
.fc-widget-header{
    border-bottom: 1px solid #EEE; 
}	
.fc-state-highlight { /* <td> today cell */ /* TODO: add .fc-today to <th> */
	/* background: #fcf8e3; */
}

.fc-state-highlight > div > div.fc-day-number{
    background-color: #ff3b30;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 4px;
}
	
.fc-cell-overlay { /* semi-transparent rectangle while dragging */
	background: #bce8f1;
	opacity: .3;
	filter: alpha(opacity=30); /* for IE */
	}
	


/* Buttons
------------------------------------------------------------------------*/

.fc-button {
	position: relative;
	display: inline-block;
	padding: 0 .6em;
	overflow: hidden;
	height: 1.9em;
	line-height: 1.9em;
	white-space: nowrap;
	cursor: pointer;
	}
	
.fc-state-default { /* non-theme */
	border: 1px solid;
	}

.fc-state-default.fc-corner-left { /* non-theme */
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px;
	}

.fc-state-default.fc-corner-right { /* non-theme */
	border-top-right-radius: 4px;
	border-bottom-right-radius: 4px;
	}

/*
	Our default prev/next buttons use HTML entities like ‹ › « »
	and we'll try to make them look good cross-browser.
*/

.fc-text-arrow {
	margin: 0 .4em;
	font-size: 2em;
	line-height: 23px;
	vertical-align: baseline; /* for IE7 */
	}

.fc-button-prev .fc-text-arrow,
.fc-button-next .fc-text-arrow { /* for ‹ › */
	font-weight: bold;
	}
	
/* icon (for jquery ui) */
	
.fc-button .fc-icon-wrap {
	position: relative;
	float: left;
	top: 50%;
	}
	
.fc-button .ui-icon {
	position: relative;
	float: left;
	margin-top: -50%;
	
	*margin-top: 0;
	*top: -50%;
	}


.fc-state-default {
	border-color: #ff3b30;
	color: #ff3b30;	
}
.fc-button-month.fc-state-default, .fc-button-agendaWeek.fc-state-default, .fc-button-agendaDay.fc-state-default{
    min-width: 67px;
	text-align: center;
	transition: all 0.2s;
	-webkit-transition: all 0.2s;
}
.fc-state-hover,
.fc-state-down,
.fc-state-active,
.fc-state-disabled {
	color: #333333;
	background-color: #FFE3E3;
	}

.fc-state-hover {
	color: #ff3b30;
	text-decoration: none;
	background-position: 0 -15px;
	-webkit-transition: background-position 0.1s linear;
	   -moz-transition: background-position 0.1s linear;
	     -o-transition: background-position 0.1s linear;
	        transition: background-position 0.1s linear;
	}

.fc-state-down,
.fc-state-active {
	background-color: #ff3b30;
	background-image: none;
	outline: 0;
	color: #FFFFFF;
}

.fc-state-disabled {
	cursor: default;
	background-image: none;
	background-color: #FFE3E3;
	filter: alpha(opacity=65);
	box-shadow: none;
	border:1px solid #FFE3E3;
	color: #ff3b30;
	}

	

/* Global Event Styles
------------------------------------------------------------------------*/

.fc-event-container > * {
	z-index: 8;
	}

.fc-event-container > .ui-draggable-dragging,
.fc-event-container > .ui-resizable-resizing {
	z-index: 9;
	}
	 
.fc-event {
	border: 1px solid #FFF; /* default BORDER color */
	background-color: #FFF; /* default BACKGROUND color */
	color: #919191;               /* default TEXT color */
	font-size: 12px;
	cursor: default;
}
.fc-event.chill{
    background-color: #f3dcf8;
}
.fc-event.info{
    background-color: #c6ebfe;
}
.fc-event.important{
    background-color: #FFBEBE;
}
.fc-event.success{
    background-color: #BEFFBF;
}
.fc-event:hover{
    opacity: 0.7;
}
a.fc-event {
	text-decoration: none;
	}
	
a.fc-event,
.fc-event-draggable {
	cursor: pointer;
	}
	
.fc-rtl .fc-event {
	text-align: right;
	}

.fc-event-inner {
	width: 100%;
	height: 100%;
	overflow: hidden;
	line-height: 15px;
	}
	
.fc-event-time,
.fc-event-title {
	padding: 0 1px;
	}
	
.fc .ui-resizable-handle {
	display: block;
	position: absolute;
	z-index: 99999;
	overflow: hidden; /* hacky spaces (IE6/7) */
	font-size: 300%;  /* */
	line-height: 50%; /* */
	}
	
	
	
/* Horizontal Events
------------------------------------------------------------------------*/

.fc-event-hori {
	border-width: 1px 0;
	margin-bottom: 1px;
	}

.fc-ltr .fc-event-hori.fc-event-start,
.fc-rtl .fc-event-hori.fc-event-end {
	border-left-width: 1px;
	/*
border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
*/
	}

.fc-ltr .fc-event-hori.fc-event-end,
.fc-rtl .fc-event-hori.fc-event-start {
	border-right-width: 1px;
	/*
border-top-right-radius: 3px;
	border-bottom-right-radius: 3px;
*/
	}
	
/* resizable */
	
.fc-event-hori .ui-resizable-e {
	top: 0           !important; /* importants override pre jquery ui 1.7 styles */
	right: -3px      !important;
	width: 7px       !important;
	height: 100%     !important;
	cursor: e-resize;
	}
	
.fc-event-hori .ui-resizable-w {
	top: 0           !important;
	left: -3px       !important;
	width: 7px       !important;
	height: 100%     !important;
	cursor: w-resize;
	}
	
.fc-event-hori .ui-resizable-handle {
	_padding-bottom: 14px; /* IE6 had 0 height */
	}
	
	
	
/* Reusable Separate-border Table
------------------------------------------------------------*/

table.fc-border-separate {
	border-collapse: separate;
	}
	
.fc-border-separate th,
.fc-border-separate td {
	border-width: 1px 0 0 1px;
	}
	
.fc-border-separate th.fc-last,
.fc-border-separate td.fc-last {
	border-right-width: 1px;
	}
	

.fc-border-separate tr.fc-last td {
	
}
.fc-border-separate .fc-week .fc-first{
    border-left: 0;
}
.fc-border-separate .fc-week .fc-last{
    border-right: 0;
}
.fc-border-separate tr.fc-last th{
    border-bottom-width: 1px;
    border-color: #cdcdcd;
    font-size: 16px;
    font-weight: 300;
	line-height: 30px;
}
.fc-border-separate tbody tr.fc-first td,
.fc-border-separate tbody tr.fc-first th {
	border-top-width: 0;
	}
	
	

/* Month View, Basic Week View, Basic Day View
------------------------------------------------------------------------*/

.fc-grid th {
	text-align: center;
	}

.fc .fc-week-number {
	width: 22px;
	text-align: center;
	}

.fc .fc-week-number div {
	padding: 0 2px;
	}
	
.fc-grid .fc-day-number {
	float: right;
	padding: 0 2px;
	}
	
.fc-grid .fc-other-month .fc-day-number {
	opacity: 0.3;
	filter: alpha(opacity=30); /* for IE */
	/* opacity with small font can sometimes look too faded
	   might want to set the 'color' property instead
	   making day-numbers bold also fixes the problem */
	}
	
.fc-grid .fc-day-content {
	clear: both;
	padding: 2px 2px 1px; /* distance between events and day edges */
	}
	
/* event styles */
	
.fc-grid .fc-event-time {
	font-weight: bold;
	}
	
/* right-to-left */
	
.fc-rtl .fc-grid .fc-day-number {
	float: left;
	}
	
.fc-rtl .fc-grid .fc-event-time {
	float: right;
	}
	
	

/* Agenda Week View, Agenda Day View
------------------------------------------------------------------------*/

.fc-agenda table {
	border-collapse: separate;
	}
	
.fc-agenda-days th {
	text-align: center;
	}
	
.fc-agenda .fc-agenda-axis {
	width: 50px;
	padding: 0 4px;
	vertical-align: middle;
	text-align: right;
	white-space: nowrap;
	font-weight: normal;
	}

.fc-agenda .fc-week-number {
	font-weight: bold;
	}
	
.fc-agenda .fc-day-content {
	padding: 2px 2px 1px;
	}
	
/* make axis border take precedence */
	
.fc-agenda-days .fc-agenda-axis {
	border-right-width: 1px;
	}
	
.fc-agenda-days .fc-col0 {
	border-left-width: 0;
	}
	
/* all-day area */
	
.fc-agenda-allday th {
	border-width: 0 1px;
	}
	
.fc-agenda-allday .fc-day-content {
	min-height: 34px; /* TODO: doesnt work well in quirksmode */
	_height: 34px;
	}
	
/* divider (between all-day and slots) */
	
.fc-agenda-divider-inner {
	height: 2px;
	overflow: hidden;
	}
	
.fc-widget-header .fc-agenda-divider-inner {
	background: #eee;
	}
	
/* slot rows */
	
.fc-agenda-slots th {
	border-width: 1px 1px 0;
	}
	
.fc-agenda-slots td {
	border-width: 1px 0 0;
	background: none;
	}
	
.fc-agenda-slots td div {
	height: 20px;
	}
	
.fc-agenda-slots tr.fc-slot0 th,
.fc-agenda-slots tr.fc-slot0 td {
	border-top-width: 0;
	}
	
.fc-agenda-slots tr.fc-minor th.ui-widget-header {
	*border-top-style: solid; /* doesn't work with background in IE6/7 */
	}
	


/* Vertical Events
------------------------------------------------------------------------*/

.fc-event-vert {
	border-width: 0 1px;
	}

.fc-event-vert.fc-event-start {
	border-top-width: 1px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	}

.fc-event-vert.fc-event-end {
	border-bottom-width: 1px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 3px;
	}
	
.fc-event-vert .fc-event-time {
	white-space: nowrap;
	font-size: 10px;
	}

.fc-event-vert .fc-event-inner {
	position: relative;
	z-index: 2;
	}
	
.fc-event-vert .fc-event-bg { /* makes the event lighter w/ a semi-transparent overlay  */
	position: absolute;
	z-index: 1;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #fff;
	opacity: .25;
	filter: alpha(opacity=25);
	}
	
.fc .ui-draggable-dragging .fc-event-bg, /* TODO: something nicer like .fc-opacity */
.fc-select-helper .fc-event-bg {
	display: none\9; /* for IE6/7/8. nested opacity filters while dragging don't work */
	}
	
/* resizable */
	
.fc-event-vert .ui-resizable-s {
	bottom: 0        !important; /* importants override pre jquery ui 1.7 styles */
	width: 100%      !important;
	height: 8px      !important;
	overflow: hidden !important;
	line-height: 8px !important;
	font-size: 11px  !important;
	font-family: monospace;
	text-align: center;
	cursor: s-resize;
	}
	
.fc-agenda .ui-resizable-resizing { /* TODO: better selector */
	_overflow: hidden;
	}
	
thead tr.fc-first{
    background-color: #f7f7f7;
}
table.fc-header{
    background-color: #FFFFFF;
    border-radius: 6px 6px 0 0;
}

.fc-week .fc-day > div .fc-day-number{
    font-size: 15px;
    margin: 2px;
    min-width: 19px;
    padding: 6px;
    text-align: center;
       width: 30px;
    height: 30px;
}
.fc-sun, .fc-sat{
    color: #b8b8b8;
}

.fc-week .fc-day:hover .fc-day-number{
    background-color: #B8B8B8;
    border-radius: 50%;
    color: #FFFFFF;
    transition: background-color 0.2s;
}
.fc-week .fc-day.fc-state-highlight:hover .fc-day-number{
    background-color:  #ff3b30;
}
.fc-button-today{
    border: 1px solid rgba(255,255,255,.0);
}
.fc-view-agendaDay thead tr.fc-first .fc-widget-header{
    text-align: right;
    padding-right: 10px;
}

/*!
 * FullCalendar v1.6.4 Print Stylesheet
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */

/*
 * Include this stylesheet on your page to get a more printer-friendly calendar.
 * When including this stylesheet, use the media='print' attribute of the <link> tag.
 * Make sure to include this stylesheet IN ADDITION to the regular fullcalendar.css.
 */
 
 
 /* Events
-----------------------------------------------------*/
 
.fc-event {
	background: #fff !important;
	color: #000 !important;
	}
	
/* for vertical events */
	
.fc-event-bg {
	display: none !important;
	}
	
.fc-event .ui-resizable-handle {
	display: none !important;
	}

#calendar {
/* 		float: right; */
        margin: 0 auto;
        /* width: 900px; */
        background-color: #FFFFFF;
            border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
        -webkit-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
-moz-box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
box-shadow: 0px 0px 21px 2px rgba(0,0,0,0.18);
        }

body {
    margin-bottom: 40px;
    text-align: center;
    font-size: 14px;
    font-family: 'Roboto', sans-serif;
    background:url(http://www.digiphotohub.com/wp-content/uploads/2015/09/bigstock-Abstract-Blurred-Background-Of-92820527.jpg);
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