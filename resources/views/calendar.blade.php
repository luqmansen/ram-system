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
			$date = date.getDate()+date.getMonth()+date.getFullYear();
            // alert($date);
			
			// $.ajax({
			// 			url: '/roomsDelete/',
			// 			type:"GET",
			// 			data: 'ids='+join_selected_values,
			// 			dataType:"json",
			// 			success:function(data) {
			// 				$("input[name=selectdata]:checked").each(function() { 
			// 					var val=$(this).val();
			// 					var tr="#tablerow"+val;
			// 					// console.log(tr);
			// 					$('#table-example').dataTable().fnDeleteRow($(tr)[0]);
			// 				});					   						      
			// 				$("#delete-selected").attr('class','modal fade').modal('hide');
			// 				}
			// 			});
					
	// 		function postName(e){
	// 			e.preventDefault();

	// 			var name = $date;
	// 			var params = "name="+name;

	// 			var xhr = new XMLHttpRequest();
	// 			xhr.open('POST', 'room-detail.php', true);
	// 			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	// 			xhr.onload = function(){
	// 				console.log(this.responseText);
	// 			}

    //   xhr.send(params);
    // }
			$url = "/reservation/"+$date;
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