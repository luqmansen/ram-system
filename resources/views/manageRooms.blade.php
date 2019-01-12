@extends('layouts.mainLayout')

@section('title')
<title>Manage Rooms | Room Reservation & Monitoring System</title>
@endsection

@section('customStyle')
<style>
	@media screen and (max-width: 762px) {
		.ico {
			top:40px !important;
		}
	}
	@media screen and (max-width: 760px) {
		.ico {
			top:36px !important;
		}
	}
	@media screen and (max-width: 363px) {
		.ico {
			top:74px !important;
		}
	}
	@media screen and (max-width: 353px) {
		.ico {
			top:74px !important;
		}
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
                                                <h2><strong>Manage</strong> Rooms</h2>
                                        </header>
                                        <div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
                                                
                                                <ul class="tooltip-area">
                                                </ul>
                                        </div>
                                        <div class="panel-body">
                                                <form>
													<ul style="padding-bottom:10px">
													<a href="#" type="button" class="btn btn-primary "><i class="fa fa-plus"></i> Add room</a>
                                                    <a href="#" type="button" id="export-excel-button" class="btn btn-success "><i class="fa fa-external-link-square"></i> Export .xls</a>
                                                    <a href="#" type="button" id="export-pdf-button" class="btn btn-danger"><i class="fa fa-external-link-square"></i> Export .pdf</a>
													<button id="delete-selected-button" type="button" class="btn btn-danger btn-transparent md-effect delete-selected pull-right" data-effect="md-scale"><i class="fa fa-trash-o"></i> Delete selected data</button>
													<span class="pull-right">
														<span><input id="selectall" style="margin-top:15px" type="checkbox"></span>
														<label  style="padding:8px 20px 10px 10px;position:relative;top:-3px;"> Select all data</label>
														
													</span>
													
													</ul>
                                                    
                                                        <table class="table table-striped" id="table-example">
                                                                <thead>
                                                                        <tr>
																				<th class="center" align="center">	</th>
                                                                                <th  class="text-center ok">ID <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ok">Room Name <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ok">Capacity With Table <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ok">Capacity Without Table <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ok">Action</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                        @foreach($rooms as $room)
                                                                        <tr  id="tablerow{{$room->id}}">
																				<td><input name="selectdata" type="checkbox" value="{{$room->id}}"></td>
                                                                                <td>{{$room->id}}</td>
                                                                                <td>{{$room->name}}</td>
                                                                                <td>{{$room->table_capacity}}</td>
                                                                                <td>{{$room->chair_capacity}}</td>
                                                                                <td class="center">
                                                                                    <a href="#" type="button" class="btn btn-success btn-transparent"><i class="fa fa-edit"></i> Edit</a>
                                                                                    <button type="button" value="{{$room->id}}" class="btn btn-danger btn-transparent md-effect" data-effect="md-scale"><i class="fa fa-trash-o"></i> Delete</button>
                                                                                </td>
																		</tr>	
																		<!--
																		////////////////////////////////////////////////////////////////////////
																		//////////     MODAL DELETE    //////////
																		//////////////////////////////////////////////////////////////////////
																		-->
																		<div id="md-effect{{$room->id}}" class="modal fade" tabindex="-1" data-width="450">
																				<div class="modal-header bg-inverse bd-inverse-darken">
																						<h4 class="modal-title">Confirmation</h4>
																				</div>
																				<!-- //modal-header-->
																				<div class="modal-body">
																					<p>Are you sure you want to delete room {{$room->name}}?</p>
																					<div class="modal-footer">
																							<button type="button" id="cancel-delete-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
																							
																							<button type="button" id="delete{{$room->id}}" value="{{$room->id}}" class="btn btn-danger delete-yes">Yes</button>
																					</div>
																				</div>
																				<!-- //modal-body-->
																		</div>
																		<!-- //modal-->     
																		@endforeach
																		<!--
																		////////////////////////////////////////////////////////////////////////
																		//////////     MODAL DELETE SELECTED   //////////
																		//////////////////////////////////////////////////////////////////////
																		-->
																		<div id="delete-selected" class=" modal fade" tabindex="-1" data-width="450">
																				<div class="modal-header bg-inverse bd-inverse-darken">
																						<h4 class="modal-title">Confirmation</h4>
																				</div>
																				<!-- //modal-header-->
																				<div class="modal-body">
																					<p>Are you sure you want to delete selected room?</p>
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
		
		
		<!--
		//////////////////////////////////////////////////////////////
		//////////     LEFT NAV MENU     //////////
		///////////////////////////////////////////////////////////
		-->
		<nav id="menu"  data-search="close">
				<ul>
                        <li><a href="{{url('home')}}">
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
<!-- Library datable -->
<script type="text/javascript" src="assets/plugins/datable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datable/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready((function() {
		// Call dataTable in this page only
		var table = $('#table-example').dataTable();
		table.fnSort([[1,'asc']]);
		$('table[data-provide="data-table"]').dataTable();
	}));
</script>
<script>
var touchWrapper=document.getElementById("wrapper");
if(touchWrapper){
	var wrapper= Hammer( touchWrapper );
	 wrapper.on("dragright", function(event) {	// hold , tap, doubletap ,dragright ,swipe, swipeup, swipedown, swipeleft, swiperight
		if((event.gesture.deltaY<=7 && event.gesture.deltaY>=-7) && event.gesture.deltaX >100){
			$('nav#menu').trigger( 'open.mm' );
		}
	 });
	 wrapper.on("dragleft", function(event) {
		if((event.gesture.deltaY<=5 && event.gesture.deltaY>=-5) && event.gesture.deltaX <-100){
			$('nav#contact-right').trigger( 'open.mm' );
		}
	 });
}
</script>

<!-- modal script -->
<script type="text/javascript">
$(function() {
			
			$(".md-effect").click(function(event){
					event.preventDefault();
					var id=$(this).val();
					var modal='#md-effect'+id;
					var data=$(this).data();
					$(modal).attr('class','modal fade').addClass(data.effect).modal('show');
			}); 

			$(".delete-selected").click(function(event){
					event.preventDefault();
					var data=$(this).data();
					$('#delete-selected').attr('class','modal fade').addClass(data.effect).modal('show');
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
				var tr="#tablerow"+id;
				$.ajax({
					url: '/roomDelete/'+id,
					type:"GET",
					dataType:"json",
					success:function(data) {
						$('#table-example').dataTable().fnDeleteRow($(tr)[0]);
						var modal='#md-effect'+id;
						$(modal).attr('class','modal fade').modal('hide');					   						
						}
					}
				);
				
			});

			//Export Excel Script
			$('#export-excel-button').click(function(){
				window.location.href="{{url('/exportRoomTable')}}"
			});

			//Export PDF Script
			$('#export-pdf-button').click(function(){
				window.location.href="{{url('/exportRoomPdf')}}"
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
					$.ajax({
					url: '/roomsDelete/',
					type:"GET",
					data: 'ids='+join_selected_values,
					dataType:"json",
					success:function(data) {
						$("input[name=selectdata]:checked").each(function() { 
							var val=$(this).val();
							var tr="#tablerow"+val;
							console.log(tr);
							$('#table-example').dataTable().fnDeleteRow($(tr)[0]);
						});					   						
						$("#delete-selected").attr('class','modal fade').modal('hide');
						}
					}
				);

					
				});
			});

			

			
			  

	});


	
</script>
@endsection