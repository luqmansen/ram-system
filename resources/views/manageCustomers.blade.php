@extends('layouts.mainLayout')

@section('title')
<title>Manage Customers | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<style>
	@media screen and (max-width: 762px) {
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
	}
	.unclickable{
		pointer-events:none;
	}
		
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
												<header class="panel-heading">
														<h2><strong>Manage</strong> Customers </h2>
												</header>
												<div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
														<ul class="tooltip-area">
																<li><a href="javascript:void(0)" class="btn btn-collapse" title="Collapse"><i class="fa fa-sort-amount-asc"></i></a></li>
																<li><a href="javascript:void(0)" class="btn btn-reload"  title="Reload"><i class="fa fa-retweet"></i></a></li>
																<li><a href="javascript:void(0)" class="btn btn-close" title="Close"><i class="fa fa-times"></i></a></li>
														</ul>
												</div>
												<div class="panel-body">
														<textarea class="form-control" id="sms"  rows="5" style="display:none">
																There's one new reservation!<br>
																Please navigate to Manage Reservations page to see it. 
														</textarea>
														<form>
															{{ csrf_field() }}
															<ul style="padding-bottom:10px">
		                                                    <a href="{{url('/exportCustomersTable')}}" type="button" id="export-excel-button" class="btn btn-success "><i class="fa fa-external-link-square"></i> Export .xls</a>
		                                                    <a href="{{url('/exportCustomersPdf')}}" type="button" id="export-pdf-button" class="btn btn-danger"><i class="fa fa-external-link-square"></i> Export .pdf</a>
															<button id="delete-selected-button" type="button" class="btn btn-danger btn-transparent delete-selected pull-right" data-effect="md-scale"><i class="fa fa-trash-o"></i> Delete selected data</button>
															<span class="pull-right">
																<span><input id="selectall" style="margin-top:15px" type="checkbox"></span>
																<label  style="padding:8px 20px 10px 10px;position:relative;top:-3px;"> Select all data</label>
																
															</span>
															
															</ul>
																<table class="table table-striped" id="table-customers">
																		<thead>
																				<tr>
																				<th class="center unclickable" align="center">	</th>
                                                                                <th  class="text-center " >ID <i class="fa fa-sort-amount-asc"></i></th>
                                                                                <th class="text-center ">Name <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Telephone <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Email <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center  unclickable">Action</th>
																				</tr>
																		</thead>
																		<tbody align="center">
																			@foreach($customers as $row)
																			<tr  id="tablerow{{$row->id}}">
																				<td><input name="selectdata" type="checkbox" value="{{$row->id}}"></td>
                                                                                <td>{{$row->id}}</td>
                                                                                <td id="item{{$row->id}}">{{$row->name}}</td>
                                                                                <td>{{$row->telephone}}</td>
                                                                                <td>{{$row->email}}</td>
                                                                                <td class="center">
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Detail" class="btn btn-success detail-button" data-effect="md-scale"><i class="fa fa-search"></i></button>
                                                                                    <button type="button" value="{{$row->id}}" data-toggle="tooltip" title="Delete" class="btn btn-danger md-effect" data-effect="md-scale"><i class="fa fa-trash-o"></i></button>
                                                                                </td>
																			</tr>
																			@endforeach
																			<!--
																			////////////////////////////////////////////////////////////////////////
																			//////////     MODAL DELETE    //////////
																			//////////////////////////////////////////////////////////////////////
																			-->
																			<div id="md-effect" class="modal fade" tabindex="-1" data-width="450">
																					<div class="modal-header bg-theme bd-theme-darken">
																							<h4 class="modal-title">Confirmation</h4>
																					</div>
																					<!-- //modal-header-->
																					<div class="modal-body">
																						<p>Are you sure you want to delete customer <strong id="delete-item"></strong>?</p>
																						<div class="modal-footer">
																								<button type="button" id="cancel-delete-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
																								<button type="button" id="delete-btn" class="btn btn-danger">Yes</button>
																						</div>
																					</div>
																					<!-- //modal-body-->
																			</div>
																			<!-- //modal-->

																			<!--
																			////////////////////////////////////////////////////////////////////////
																			//////////     MODAL DETAIL   //////////
																			//////////////////////////////////////////////////////////////////////
																			-->
																			<div id="md-detail" class=" modal fade">
																				<div class="modal-header bg-success bd-success-darken ">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
																						<h4 class="modal-title">Customer's Detail</h4>
																				</div>
																				<!-- //modal-header-->
																				<div class="modal-body">
																					<form role="form">
																						{{ csrf_field() }}
																								<div class="form-group">
																										<label>ID</label>
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

																			<!--
																			////////////////////////////////////////////////////////////////////////
																			//////////     MODAL DELETE SELECTED   //////////
																			//////////////////////////////////////////////////////////////////////
																			-->
																			<div id="delete-selected" class=" modal fade" tabindex="-1" data-width="450" data-header-color="#736086">
																					<div class="modal-header bg-theme bd-theme-darken">
																							<h4 class="modal-title">Confirmation</h4>
																					</div>
																					<!-- //modal-header-->
																					<div class="modal-body">
																						<p>Are you sure you want to delete selected customer?</p>
																						<div class="modal-footer">
																								<button type="button" id="cancel-delete-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
																								
																								<button type="button" id="delete-selected-confirmation" value="" class="btn btn-danger">Yes</button>
																						</div>
																					</div>
																					<!-- //modal-body-->
																			</div>
																			<!-- //modal-->

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

		<footer id="site-footer" class="fixed hidden-xs">
			<section>		
		
			<!-- START Copyright -->
			<div id="copyright">
				<p>PT UCCP All Rights Reserved 2019</p>
			</div>
			<!-- END Copyright -->
			
			</section>
		</footer>
		
		
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
		var table = $('#table-customers').dataTable();
		table.fnSort([[1,'asc']]);
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
				//SCRIPT DELETE
				$("tbody").on('click', '.md-effect',function(event){
						event.preventDefault();
						//SHOW DELETE MODAL
						var id,tr = undefined;
						id=$(this).val();
						var itemid='#item'+id;
						var item=$(itemid).html();
						var data=$(this).data();
						$('#delete-item').text(item);
						$('#delete-btn').val(id);
						$('#md-effect').attr('class','modal fade').addClass(data.effect).modal('show');
				});
				//SEND DELETE QUERY THROUGH AJAX
				$('#delete-btn').click(function(){
							id=$(this).val();
							tr="#tablerow"+id;
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								}
							});
							$.ajax({
								url: '/customerDelete',
								type:"POST",
								dataType:"json",
								data:{id:id},
								success:function(data) {
									//HIDE DELETE QUERY ON DELETION SUCCESS
									$('#table-customers').dataTable().fnDeleteRow($(tr)[0]);
									$('#table-customers').dataTable().fnDraw();
									$('#md-effect').attr('class','modal fade').modal('hide');					   						
									}
								}
							);
				});

				//SCRIPT EDIT
				$("tbody").on('click', '.detail-button',function(event){
						event.preventDefault();
						//SHOW DELETE MODAL
						var id=$(this).val();
						var data=$(this).data();
						//AJAX SCRIPT
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$.ajax({
							url: '/customerDetail',
							type:"POST",
							data: {id:id},
							dataType:"json",
							success:function(data) {
								console.log(data);
								$('#detail-id').html(data[0].id);
								$('#detail-name').html(data[0].name);
								$('#detail-telephone').html(data[0].telephone);
								$('#detail-email').html(data[0].email);
								$('#detail-created-at').html(data[0].created_at);
								$('#detail-updated-at').html(data[0].updated_at);
								$('#md-detail').attr('class','modal fade').addClass(data.effect).modal('show');
							}
						});
				}); 

				$(".delete-selected").click(function(event){
						event.preventDefault();
						var data=$(this).data();
						var allVals = []; 
						$("input[name='selectdata']:checked").each(function() { 
							allVals.push($(this).val());
						});
						if(allVals.length > 0){
							$('#delete-selected').attr('class','modal fade').addClass(data.effect).modal('show');
						}
				});

				// $('#cancel-delete-btn').click(function(){
				// 	$("#md-effect").attr('class','modal fade').addClass(data.effect).modal('hide')
				// })
				
				$.ajaxSetup ({
					// Disable caching of AJAX responses
					cache: false
				});
				var $modal = $('#md-ajax');
				$('.md-ajax-load').on('click', function(){
					$('body').modalmanager('loading');
					setTimeout(function(){
						$modal.find(".modal-body").load('data/md-ajax-load.html', '', function(){
						$modal.modal();
						});
					}, 2000);
				});

				// AJAX Script
				$(".delete-yes").click(function(event){
					event.preventDefault();
					var id=$(this).val();
					
					
				});

				//Select All Script
				$('#selectall').click(function() {    
					$('input[name=selectdata]').prop('checked', this.checked);    
				});

				//Delete Selected Script
				$("#delete-selected-button").click(function(){
					var allVals = []; 
					$("input[name='selectdata']:checked").each(function() { 
						allVals.push($(this).val());
					});
					$("#delete-selected-confirmation").click(function(){
						var join_selected_values = allVals.join(",");
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$.ajax({
						url: '/customersDelete',
						type:"POST",
						data: 'ids='+join_selected_values,
						dataType:"json",
						success:function(data) {
							$("input[name=selectdata]:checked").each(function() { 
								var val=$(this).val();
								var tr="#tablerow"+val;
								// console.log(tr);
								$('#table-customers').dataTable().fnDeleteRow($(tr)[0]);
							});					   						
							$("#delete-selected").attr('class','modal fade').modal('hide');
							}
						});
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