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
                                                <h2><strong>Manage</strong> Rooms</h2>
                                        </header>
                                        <div class="panel-tools fully color" align="right" data-toolscolor="#6CC3A0">
                                                
                                                <ul class="tooltip-area">
                                                </ul>
                                        </div>
                                        <div class="panel-body">
                                                <form>
												{{ csrf_field() }}
													<ul style="padding-bottom:10px">
													<a href="#" type="button" id="add-room-button" class="btn btn-primary "><i class="fa fa-plus"></i> Add room</a>
                                                    <a href="{{url('/exportRoomTable')}}" type="button" id="export-excel-button" class="btn btn-success "><i class="fa fa-external-link-square"></i> Export .xls</a>
                                                    <a href="{{url('/exportRoomPdf')}}" type="button" id="export-pdf-button" class="btn btn-danger"><i class="fa fa-external-link-square"></i> Export .pdf</a>
													<button id="delete-selected-button" type="button" class="btn btn-danger btn-transparent delete-selected pull-right" data-effect="md-scale"><i class="fa fa-trash-o"></i> Delete selected data</button>
													<span class="pull-right">
														<span><input id="selectall" style="margin-top:15px" type="checkbox"></span>
														<label  style="padding:8px 20px 10px 10px;position:relative;top:-3px;"> Select all data</label>
														
													</span>
													
													</ul>
                                                    
                                                        <table class="table table-striped" id="table-example">
                                                                <thead>
                                                                        <tr>
																				<th class="center unclickable" align="center">	</th>
                                                                                <th  class="text-center " >ID <i class="fa fa-sort-amount-asc"></i></th>
                                                                                <th class="text-center ">Room Name <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Capacity With Table <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center ">Capacity Without Table <i class="fa fa-sort"></i></th>
                                                                                <th class="text-center  unclickable">Action</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                        @foreach($rooms as $room)
                                                                        <tr  id="tablerow{{$room->id}}">
																				<td><input name="selectdata" type="checkbox" value="{{$room->id}}"></td>
                                                                                <td>{{$room->id}}</td>
                                                                                <td id="item{{$room->id}}">{{$room->name}}</td>
                                                                                <td>{{$room->table_capacity}}</td>
                                                                                <td>{{$room->chair_capacity}}</td>
                                                                                <td class="center">
                                                                                    <button type="button" value="{{$room->id}}" data-toggle="tooltip" title="Edit" class="btn btn-warning edit-button" data-effect="md-scale"><i class="fa fa-edit"></i></button>
                                                                                    <button type="button" value="{{$room->id}}" data-toggle="tooltip" title="Delete" class="btn btn-danger md-effect" data-effect="md-scale"><i class="fa fa-trash-o"></i></button>
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
																					<p>Are you sure you want to delete room <strong id="delete-item"></strong>?</p>
																					<div class="modal-footer">
																							<button type="button" id="cancel-delete-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
																							<button type="button" id="delete-btn"  class="btn btn-danger">Yes</button>
																					</div>
																				</div>
																				<!-- //modal-body-->
																		</div>
																		<!-- //modal-->
																		<!--
																		////////////////////////////////////////////////////////////////////////
																		//////////     MODAL EDIT   //////////
																		//////////////////////////////////////////////////////////////////////
																		-->
																		<div id="modal-edit" class=" modal fade container">
																				<div class="modal-header bg-warning bd-warning-darken">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
																						<h4 class="modal-title">Edit Room (id room = <strong id="edit-item-id"></strong>)</h4>
																				</div>
																				<!-- //modal-header-->
																				<div class="modal-body">

																				<form role="form">
																				{{ csrf_field() }}
																						<div class="form-group">
																								<label>Room Name</label>
																										<input autofocus type="text" class="form-control rounded inputEdit" placeholder="{{$room->name}}" id="nameEdit">
																						</div>
																						<div class="form-group">
																								<label>Capacity With Table</label>
																										<input autofocus type="number" class="form-control rounded inputEdit" placeholder="{{$room->table_capacity}}" id="table_capacityEdit">
																										<p class="help-block">number of maximum capacity which room could served with a pair of table and chair.</p>
																						</div>
																						<div class="form-group">
																								<label>Capacity Without Table</label>
																										<input autofocus type="number" class="form-control rounded inputEdit" placeholder="{{$room->chair_capacity}}" id="chair_capacityEdit">
																										<p class="help-block">number of maximum capacity which room could served with only chair.(exclude capacity with table)</p>
																						</div>
																					<div class="modal-footer">
																							<button type="button" id="" class="btn btn-default" data-dismiss="modal">Cancel</button>
																							<button type="button" id="edit-btn" value="{{$room->id}}" class="btn btn-primary edit-data-button">Update Data</button>
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
																					<p>Are you sure you want to delete selected room?</p>
																					<div class="modal-footer">
																							<button type="button" id="cancel-delete-btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
																							
																							<button type="button" id="delete-selected-confirmation" value="" class="btn btn-danger">Yes</button>
																					</div>
																				</div>
																				<!-- //modal-body-->
																		</div>
																		<!-- //modal-->
																		<!--
																		////////////////////////////////////////////////////////////////////////
																		//////////     MODAL ADD   //////////
																		//////////////////////////////////////////////////////////////////////
																		-->
																		<div id="modal-add" class=" modal fade container">
																				<div class="modal-header bg-primary bd-primary-darken">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
																						<h4 class="modal-title">Add Room</h4>
																				</div>
																				<!-- //modal-header-->
																				<div class="modal-body">

																				<form role="form">
																				{{ csrf_field() }}
																						<div class="form-group">
																								<label>Room Name</label>
																										<input autofocus type="text" class="form-control rounded inputAdd" name="name">
																						</div>
																						<div class="form-group">
																								<label>Capacity With Table</label>
																										<input autofocus type="number" class="form-control rounded inputAdd" name="table_capacity">
																										<p class="help-block">number of maximum capacity which room could served with a pair of table and chair.</p>
																						</div>
																						<div class="form-group">
																								<label>Capacity Without Table</label>
																										<input autofocus type="number" class="form-control rounded inputAdd" name="chair_capacity">
																										<p class="help-block">number of maximum capacity which room could served with only chair.(exclude capacity with table)</p>
																						</div>
																					<div class="modal-footer">
																							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																							<button type="button" id="add-btn"  class="btn btn-primary">Update Data</button>
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
<!-- Library datable -->
<script type="text/javascript" src="assets/plugins/datable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datable/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready((function() {
		// Call dataTable in this page only
		var table = $('#table-example').dataTable();
		table.fnSort([[1,'asc']]);
		$('table[data-provide="data-table"]').dataTable();

		$('th').click(function(){
			$('.fa-sort-amount-asc, .fa-sort-amount-desc').attr('class','fa fa-sort');
			$(this).find('i').attr('class', 'fa fa-sort-amount-desc');
			if($(this).hasClass('sorting_asc'))			{
				$(this).find('i').attr('class', 'fa fa-sort-amount-asc');
			}
		});
	}));
</script>

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

<!-- Script tooltip -->
<script>
	$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();   
	});
</script>

<!-- Script Modal -->
<script type="text/javascript">
	//SCRIPT DELETE
	$(".md-effect").click(function(event){
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
					url: '/roomDelete',
					type:"POST",
					dataType:"json",
					data:{id:id},
					success:function(data) {
						//HIDE DELETE QUERY ON DELETION SUCCESS
						$('#table-example').dataTable().fnDeleteRow($(tr)[0]);
						$('#table-example').dataTable().fnDraw();
						$('#md-effect').attr('class','modal fade').modal('hide');					   						
						}
					}
				);
			})

	//SCRIPT EDIT
	$(".edit-button").click(function(event){
			event.preventDefault();
			//SHOW DELETE MODAL
			var id=$(this).val();
			var data=$(this).data();
			$('#edit-item-id').text(id);
			$('#modal-edit').attr('class','modal fade container').addClass(data.effect).modal('show');
			//SUBMIT ON ENTER
			$('.inputEdit').keypress(function (e) {
				var key = e.which;
				if(key == 13)  // the enter key code
				{
					// console.log(btnid);
					$('#edit-btn').click(); 
					return false;
				}
			});
			//SEND DELETE QUERY THROUGH AJAX
			$('#edit-btn').click(function(event){
				var name = $('#nameEdit').val();
				var table_capacity = $('#table_capacityEdit').val();
				var chair_capacity = $('#chair_capacityEdit').val();
				//RETURN FALSE IF FORM INPUT FILL EMPTY
				if(!name && !table_capacity && !chair_capacity)
				{
					var modal ="#modal-edit"+id;
					$(modal).modal('hide');
					// alert('input cannot be empty');	
					Swal({
						type: 'error',
						title: 'Error',
						text: 'Input cannot be empty!',
						showConfirmButton: false,
						timer: 1500
					});
					return false	;
				}
				//AJAX SCRIPT
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: '/roomEdit',
					type:"POST",
					data: {id:id, name:name, table_capacity:table_capacity, chair_capacity:chair_capacity},
					dataType:"json",
					success:function(data) {
						var tr = "#tablerow"+id;
						var table = $('#table-example').dataTable();
						table.fnUpdate(name,$(tr)[0],2);
						table.fnUpdate(table_capacity,$(tr)[0],3);
						table.fnUpdate(chair_capacity,$(tr)[0],4);
						$('#nameEdit').attr("placeholder",name);
						$('#table_capacityEdit').attr("placeholder",table_capacity);
						$('#chair_capacityEdit').attr("placeholder",chair_capacity);
						$('#nameEdit, #table_capacityEdit, #chair_capacityEdit').removeAttr("value");
						var modal ="#modal-edit";
						$(modal).modal('hide');
					}
				});
			})
	}); 

	$(function() {
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
				$('#add-room-button').click(function(event){
					event.preventDefault();
					$('#modal-add').modal('show');
				});

				$('.inputAdd').keypress(function (e) {
						var key = e.which;
						if(key == 13)  // the enter key code
						{
							$('#add-btn').click(); 
							return false;
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
						url: '/roomsDelete',
						type:"POST",
						data: 'ids='+join_selected_values,
						dataType:"json",
						success:function(data) {
							$("input[name=selectdata]:checked").each(function() { 
								var val=$(this).val();
								var tr="#tablerow"+val;
								// console.log(tr);
								$('#table-example').dataTable().fnDeleteRow($(tr)[0]);
							});					   						
							$("#delete-selected").attr('class','modal fade').modal('hide');
							}
						});
					});
				});
		});
</script>

<!-- Script form add -->
<script>
	$('#add-btn').click(function(){
		var name = $('input[name=name]').val();
		var table_capacity = $('input[name=table_capacity]').val();
		var chair_capacity = $('input[name=chair_capacity]').val();
		if(!name && !table_capacity && !chair_capacity)
		{
			var modal ="#modal-add"
			$(modal).modal('hide');
			// alert('input cannot be empty');	
			Swal({
				type: 'error',
				title: 'Error',
				text: 'Input cannot be empty!',
				showConfirmButton: false,
				timer: 1500
			});
			return false	;
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: '/roomAdd',
			type:"POST",
			data: {name:name, table_capacity:table_capacity, chair_capacity:chair_capacity},
			dataType:"json",
			success:function(data) {
				$("#modal-add").modal('hide');
				window.location.href="{{url('/manageRooms')}}"
			}
		});
	});
</script>
@endsection