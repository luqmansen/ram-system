@extends('layouts.mainLayout')

@section('title')
<title>Manage Reservations | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<style>
	/* @media screen and (max-width: 762px) {
		.ico {
			top:0px !important;
		}
	}
	@media screen and (max-width: 652px) {
		.ico {
			top:36px !important;
		}
	}
	@media screen and (max-width: 374px) {
		.ico {
			top:74px !important;
		}
	}
	@media screen and (max-width: 353px) {
		.ico {
			top:74px !important;
		}
	} */
	.unclickable{
		pointer-events:none;
	}

	/* th{
		padding-left:2px;padding-right:2px;
	} */
			
</style>
@endsection

@section('bodyWrapper')
<body class="leftMenu nav-collapse">
<div id="wrapper">
		<!--
		/////////////////////////////////////////////////////////////////////////
		//////////     HEADER  CONTENT     ///////////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="header">
		
				<div class="logo-area clearfix">
						<a href="#" class="logo"></a>
				</div>
				<!-- //logo-area-->
				
				<div class="tools-bar">
						<ul class="nav navbar-nav nav-main-xs">
								<li><a href="#menu" class="icon-toolsbar"><i class="fa fa-bars"></i></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right tooltip-area">
                            <li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
											<em><strong>Hi</strong>, {{ Auth::user()->name }}    </em> <i class="dropdown-icon fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right icon-right arrow">
												<li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form></li>
										</ul>
										<!-- //dropdown-menu-->
								</li>
								<li class="visible-lg">
									<a href="#" class="h-seperate fullscreen" data-toggle="tooltip" title="Full Screen" data-container="body"  data-placement="left">
										<i class="fa fa-expand"></i>
									</a>
								</li>
						</ul>
				</div>
				<!-- //tools-bar-->
				
		</div>
		<!-- //header-->

        <!--
		/////////////////////////////////////////////////////////////////////////
		//////////     MAIN SHOW CONTENT     //////////
		//////////////////////////////////////////////////////////////////////
		-->
		<div id="main">
				
				<div id="content">
						<div class="row">
								<div class="col-lg-12">
										<section class="panel">
												<textarea class="form-control" id="sms"  rows="5" style="display:none">
														There's one new reservation!<br>
														Please reload this page to see it. 
												</textarea>
												<header class="panel-heading">
														<h2><strong>Manage</strong> Reservations</h2>
												</header>
												<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
												</div>
												<div class="panel-body">
														<form>
															{{ csrf_field() }}
                                                            <ul style="padding-bottom:10px">
                                                                <h4><strong>Pending</strong> Reservation</h4>
		                                                    {{-- <button  type="button" id="export-excel-button" class="btn btn-success "><i class="fa fa-external-link-square"></i> Export .xls</button>
		                                                    <a type="button" id="export-pdf-button" class="btn btn-danger"><i class="fa fa-external-link-square"></i> Export .pdf</a> --}}
															</ul>
																<table class="table table-striped table-responsive"  id="table-reservations">
																		<thead>
																				<tr>
																				{{-- <th  class="text-center " >ID <i class="fa fa-sort-amount-desc"></i></th> --}}
                                                                                <th  class="text-center " >Name <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Room <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Date <i class="fa fa-sort-amount-desc"></i></th>
                                                                                <th class="text-center ">Start Hour<i class="fa fa-sort"></i></th>
																				<th class="text-center ">End Hour <i class="fa fa-sort"></i></th>
																				<th class="text-center unclickable">Action </th>
																				
																				</tr>
																		</thead>
																		<tbody align="center">
																			@foreach($reservations as $row)
																			<tr  id="tablerow{{$row->id}}">
																				{{-- <td>{{$row->id}}</td> --}}
																				<td>{{$row->name}}</td>
                                                                                <td>{{$row->room_name}}</td>
                                                                                <td>{{$row->date}}</td>
                                                                                <td>{{$row->start_hour}}</td>
                                                                                <td>{{$row->end_hour}}</td>
																				<td class="center">
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Detail" class="btn btn-success detail-button" data-effect="md-scale"><i class="fa fa-search"></i></button>
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Approve" class="btn btn-primary approve-button" data-effect="md-scale"><i class="fa fa-check"></i></button>
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Cancel" class="btn btn-danger cancel-button" data-effect="md-scale"><i class="fa fa-times"></i></button>
                                                                                </td>
																			</tr>
																			@endforeach

																			<!--
																			////////////////////////////////////////////////////////////////////////
																			//////////     MODAL DETAIL   //////////
																			//////////////////////////////////////////////////////////////////////
																			-->
																			<div id="md-detail" class=" modal fade">
																				<div class="modal-header bg-success bd-success-darken ">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
																						<h4 class="modal-title">Reservation Detail</h4>
																				</div>
																				<!-- //modal-header-->
																				<div class="modal-body">
																					<form role="form">
																						{{ csrf_field() }}
																								<div class="form-group">
																										<label>Reservation ID</label>
																										<h5 id="detail-id">-</h5>
																								</div>
																								<div class="form-group">
																										<label>Name</label>
																										<h5 id="detail-name">-</h5>
																								</div>
																								<div class="form-group">
																										<label>Telephone</label>
																										<h5 id="detail-telephone">-</h5>
																								</div>
																								<div class="form-group">
																										<label>Email</label>
																										<h5 id="detail-email">-</h5>
																								</div>
																								<div class="form-group">
																									<label>Room</label>
																									<h5 id="detail-room_name">-</h5>
																								</div>	
																								<div class="form-group">
																									<label>Date</label>
																									<h5 id="detail-date">-</h5>
																								</div>
																								<div class="form-group">
																									<label>Start Hour</label>
																									<h5 id="detail-start_hour">-</h5>
																								</div>
																								<div class="form-group">
																									<label>End Hour</label>
																									<h5 id="detail-end_hour">-</h5>
																								</div>
																								<div class="form-group">
																									<label>Description</label>
																									<h5 id="detail-description">-</h5>
																								</div>
																								<div class="form-group">
																									<label>Note</label>
																									<h5 id="detail-note">-</h5>
																								</div>
																								<div class="form-group">
																									<label>Status</label>
																									<h5 id="detail-status">-</h5>
																								</div>
																								<div class="form-group">
																									<label>Request Letter</label><br>
																									<a class="btn btn-primary" id="detail-file_name">Download / View</a>
																								</div>
																								<div class="form-group">
																										<label>Created at</label>
																										<h5 id="detail-created-at">-</h5>
																								</div>
																								<div class="form-group">
																										<label>Updated at</label>
																										<h5 id="detail-updated-at">-</h5>
																								</div>
																								
																							<div class="modal-footer" style="padding-bottom:0px">
																									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
																							</div>
																						</form>
																				</div>
																				<!-- //modal-body-->
																			</div>
																			<!-- //modal-->
																			
																		</tbody>
																</table>
														</form>
                                                </div>
                                                <hr>
                                                <div class="panel-body" style="margin-top:30px">
														<form>
															{{ csrf_field() }}
                                                            <ul style="padding-bottom:10px">
                                                                <h4><strong>Active</strong> Reservation</h4>
		                                                    {{-- <button  type="button" id="export-excel-button" class="btn btn-success "><i class="fa fa-external-link-square"></i> Export .xls</button>
		                                                    <a type="button" id="export-pdf-button" class="btn btn-danger"><i class="fa fa-external-link-square"></i> Export .pdf</a> --}}
															</ul>
																<table class="table table-striped table-responsive"  id="table-areservations">
																		<thead>
																				<tr>
																				{{-- <th  class="text-center " >ID <i class="fa fa-sort-amount-desc"></i></th> --}}
                                                                                <th  class="text-center " >Name <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Room <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Date <i class="fa fa-sort-amount-desc"></i></th>
                                                                                <th class="text-center ">Start Hour<i class="fa fa-sort"></i></th>
																				<th class="text-center ">End Hour <i class="fa fa-sort"></i></th>
																				<th class="text-center unclickable">Action </th>
																				
																				</tr>
																		</thead>
																		<tbody align="center">
																			@foreach($areservations as $row)
																			<tr  id="tablerow{{$row->id}}">
																				{{-- <td>{{$row->id}}</td> --}}
																				<td>{{$row->name}}</td>
                                                                                <td>{{$row->room_name}}</td>
                                                                                <td>{{$row->date}}</td>
                                                                                <td>{{$row->start_hour}}</td>
                                                                                <td>{{$row->end_hour}}</td>
																				<td class="center">
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Detail" class="btn btn-success detail-button" data-effect="md-scale"><i class="fa fa-search"></i></button>
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Cancel" class="btn btn-danger cancel-button" data-effect="md-scale"><i class="fa fa-times"></i></button>
                                                                                </td>
																			</tr>
																			@endforeach																			
																		</tbody>
																</table>
														</form>
												</div>
                                                <hr>
                                                <div class="panel-body" style="margin-top:30px">
														<form>
															{{ csrf_field() }}
                                                            <ul style="padding-bottom:10px">
                                                                <h4><strong>Cancelled</strong> Reservation</h4>
		                                                    {{-- <button  type="button" id="export-excel-button" class="btn btn-success "><i class="fa fa-external-link-square"></i> Export .xls</button>
		                                                    <a type="button" id="export-pdf-button" class="btn btn-danger"><i class="fa fa-external-link-square"></i> Export .pdf</a> --}}
															</ul>
																<table class="table table-striped table-responsive"  id="table-creservations">
																		<thead>
																				<tr>
																				{{-- <th  class="text-center " >ID <i class="fa fa-sort-amount-desc"></i></th> --}}
                                                                                <th  class="text-center " >Name <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Room <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Date <i class="fa fa-sort-amount-desc"></i></th>
                                                                                <th class="text-center ">Start Hour<i class="fa fa-sort"></i></th>
																				<th class="text-center ">End Hour <i class="fa fa-sort"></i></th>
																				<th class="text-center unclickable">Action </th>
																				
																				</tr>
																		</thead>
																		<tbody align="center">
																			@foreach($creservations as $row)
																			<tr  id="tablerow{{$row->id}}">
																				{{-- <td>{{$row->id}}</td> --}}
																				<td>{{$row->name}}</td>
                                                                                <td>{{$row->room_name}}</td>
                                                                                <td>{{$row->date}}</td>
                                                                                <td>{{$row->start_hour}}</td>
                                                                                <td>{{$row->end_hour}}</td>
																				<td class="center">
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Detail" class="btn btn-success detail-button" data-effect="md-scale"><i class="fa fa-search"></i></button>
                                                                                </td>
																			</tr>
																			@endforeach																			
																		</tbody>
																</table>
														</form>
												</div>
										</section>
								</div>

						</div>
						<!-- //content > row-->
						
				</div>
				<!-- //content-->
				
				
		</div>
		<!-- //main-->

		<button style="visibility:hidden" id="notification-button" type="button" class="btn btn-default notific" data-theme="theme-inverse" data-sticky="true">theme-inverse</button>
		<audio style="visibility:hidden" id="notification-sound">
				<source src="{{asset('notification.mp3')}}" type="audio/mpeg">
		</audio>
		
		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu"  data-search="close">
				<ul>
                        <li><a href="{{url('adminPanel')}}">
							<span><i class="icon  fa fa-calendar"></i>  Reservations Calendar </a></span>
						</li>
				        <li><a href="{{url('manageRooms')}}">
							<span><i class="icon  fa fa-square"></i>  Manage Rooms </a></span>
						</li>
						<li><a href="{{url('manageCustomers')}}">
							<span><i class="icon  fa fa-users"></i> Manage Customers </a></span>
						</li>
						<li><a href="{{url('manageReservations')}}">
							<span><i class="icon  fa fa-file-o"></i> Manage Reservations </a></span>
						</li>
						<li><a href="{{url('history')}}">
							<span><i class="icon  fa fa-laptop"></i> View Log / History </a></span>
						</li>
				</ul>
		</nav>
		<!-- //nav left menu-->
		
		
</div>
<!-- //wrapper-->
@endsection

@section('customScript')
<!-- Script swipe navbar -->
<script>
	var touchWrapper=document.getElementById("wrapper");
	if(touchWrapper){
		var wrapper= Hammer( touchWrapper );
		wrapper.on("dragright", function(event) {	// hold , tap, doubletap ,dragright ,swipe, swipeup, swipedown, swipeleft, swiperight
			if((event.gesture.deltaY<=7 && event.gesture.deltaY>=-7) && event.gesture.deltaX >100){
				if($(window).width() < 991 ){
					$('nav#menu').trigger( 'open.mm' );
				}	
			}
		});
		wrapper.on("dragleft", function(event) {
			if((event.gesture.deltaY<=5 && event.gesture.deltaY>=-5) && event.gesture.deltaX <-100){
				$('nav#contact-right').trigger( 'open.mm' );
			}
		});
	}
</script>

<!-- Script DataTable -->
<!-- Library datable -->
<script type="text/javascript" src="assets/plugins/datable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datable/dataTables.bootstrap.js"></script>
<script type="text/javascript">

	$(function() {

		// Call dataTable in this page only
		var table = $('#table-reservations').dataTable();
		table.fnSort([[2,'desc']]);
        $('table[data-provide="data-table"]').dataTable();

        var table1 = $('#table-creservations').dataTable();
		table.fnSort([[2,'desc']]);
        $('table[data-provide="data-table"]').dataTable();
        
        var table2 = $('#table-areservations').dataTable();
		table.fnSort([[2,'desc']]);
		$('table[data-provide="data-table"]').dataTable();

		$('th').click(function(){
			$('.fa-sort-amount-asc, .fa-sort-amount-desc').attr('class','fa fa-sort');
			$(this).find('i').attr('class', 'fa fa-sort-amount-desc');
			if($(this).hasClass('sorting_asc'))			{
				$(this).find('i').attr('class', 'fa fa-sort-amount-asc');
			}
		});
	});
</script>
<!-- Script tooltip -->
<script>
	$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
<!-- Script Modal -->
<script type="text/javascript">
	$(function() {
				//SCRIPT DETAIL
				$("tbody").on('click', '.detail-button',function(event){
						event.preventDefault();
						//SHOW DETAIL MODAL
						var id=$(this).val();
						var data=$(this).data();
						//AJAX SCRIPT
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						})
						$.ajax({
							url: '/reservationDetail',
							type:"POST",
							data: {id:id},
							dataType:"json",
							success:function(data) {
								$('#detail-id').html(data[0].id);
								$('#detail-name').html(data[0].name);
								$('#detail-telephone').html(data[0].telephone);
								$('#detail-email').html(data[0].email);
								$('#detail-room_name').html(data[0].room_name);
								$('#detail-date').html(data[0].date);
								$('#detail-start_hour').html(data[0].start_hour);
								$('#detail-end_hour').html(data[0].end_hour);
								$('#detail-description').html(data[0].description);
								$('#detail-note').html(data[0].note);
								$('#detail-status').html(data[0].status);
								$('#detail-file_name').attr('href',data[0].file_name);
								var download =  "RequestLetterReservation"+data[0].id;
								$('#detail-file_name').attr('download',download);
								$('#detail-created-at').html(data[0].created_at);
								$('#detail-updated-at').html(data[0].updated_at);
								$('#md-detail').attr('class','modal fade').addClass(data.effect).modal('show');
							}
						});
                }); 
                //SCRIPT APPROVE
				$("tbody").on('click', '.approve-button',function(event){
						event.preventDefault();
						//SHOW DETAIL MODAL
						var id=$(this).val();
						var data=$(this).data();
						//AJAX SCRIPT
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						})
						$.ajax({
							url: '/reservationApprove',
							type:"POST",
							data: {id:id},
							dataType:"json",
							success:function(data) {
                                var row='#tablerow'+id;
                                var table = $('#table-reservations').dataTable();
                                table.fnDeleteRow($(row)[0]);
                                Swal({
                                    type: 'success',
                                    title: 'Success',
                                    text: 'Reservation approved!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                
							}
						});
                }); 
                //SCRIPT CANCEL
				$("tbody").on('click', '.cancel-button',function(event){
						event.preventDefault();
						//SHOW DETAIL MODAL
						var id=$(this).val();
						var data=$(this).data();
						//AJAX SCRIPT
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						})
						$.ajax({
							url: '/reservationCancel',
							type:"POST",
							data: {id:id},
							dataType:"json",
							success:function(data) {
                                var row='#tablerow'+id;
                                var table = $('#table-reservations').dataTable();
                                table.fnDeleteRow($(row)[0]);
                                Swal({
                                    type: 'success',
                                    title: 'Success',
                                    text: 'Reservation Canceled!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                
							}
						});
                });
                 //SCRIPT REVIVE
				$("tbody").on('click', '.revive-button',function(event){
						event.preventDefault();
						//SHOW DETAIL MODAL
						var id=$(this).val();
						var data=$(this).data();
						//AJAX SCRIPT
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						})
						$.ajax({
							url: '/reservationRevive',
							type:"POST",
							data: {id:id},
							dataType:"json",
							success:function(data) {
                                var row='#tablerow'+id;
                                var table = $('#table-creservations').dataTable();
                                table.fnDeleteRow($(row)[0]);
                                Swal({
                                    type: 'success',
                                    title: 'Success',
                                    text: 'Reservation Revived!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(function(){
                                    location.reload();
                                },1500);
                                
							}
						});
				}); 
    });
</script>
<script>
	setInterval(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: '/notif',
			type:"POST",
			dataType:"json",
			success:function(data) {
				if(data=='ok'){
					$('#notification-button').click();
					$('#notification-sound').get(0).play();		
				}
			}
		});

	}, 5000);
	$(".notific").on('click',function(){
		var nclick=$(this), data=nclick.data();
		data.verticalEdge=data.vertical || 'right';
		data.horizontalEdge=data.horizontal  || 'top';
		$.notific8($("#sms").val(), data)	;
	});
</script>
@endsection