<!DOCTYPE html>
<html>
<head>
    <link href={{URL::asset('fullcalendar/fullcalendar.css')}} rel='stylesheet' />
    <link href={{URL::asset('fullcalendar/fullcalendar.print.css')}} rel='stylesheet' media='print' />
    
	
<script src={{URL::asset('fullcalendar/jquery/jquery-1.10.2.js')}}></script>
<script src={{URL::asset('fullcalendar/jquery/jquery-ui.custom.min.js')}}></script>
<script src={{URL::asset('fullcalendar/fullcalendar.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script>

    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    function clearModal()
	{
		$('#myTable').empty();
    };
    
    function getDate(date) 
	{
		$.ajax({
			type: 'POST',
			url: "/",
			data:{date:date},
			cache:false,
			ifModified:true,
			success: function (data) {
				
				if(Array.isArray(data) && data.length){
					for (i = 0; i< data.length; ++i)
					{
						console.log(data[i].date);
						$('.kosong').attr('style', 'display:none');
						$('.ada').attr('style', 'display:show');
						$('#myTable').append($("<tr><td>"+ data[i].name + "</td>" +
												"<td>" + data[i].start_hour + "</td>" + 
												"<td>" + data[i].end_hour  + 
												"</td> </tr>"));	
					};
				} 
				else 
				{
					console.log('data not exist');
					$('.ada').attr('style', 'display:none');
					$('.kosong').attr('style', 'display:show');
				}
				$('#myButton').click();
			}
		});
    };
    
    // Pop over ruangan detail
	$("[data-toggle=popover]").each(function(i, obj) 
	{
		$(this).popover(
		{
			html: true,
			content: function() 
				{
				var id = $(this).attr('id')
				
				return $('#popover-content-' + id).html();
				}
		});
	});

    // close popover when click anywhere on page
	$('html').on('click', function(e) 
	{
		if (typeof $(e.target).data('original-title') == 'undefined') 
		{
    		$('[data-original-title]').popover('hide');
  		}
    });
    
    $(function() {
        $(".toggle-menu").remove();
    });  
	

	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
	
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: '',
				center: 'title',
				right: 'prev,next today'
			},
			editable: false,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: false,
			defaultView: 'month',
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
			allDaySlot: false,
            selectHelper: true,
            dayClick: function(date, jsEvent, view) 
            { 
                var hari = date.getDate();
                m = String(hari);
                //Fungsi agar hari formatnya jadi 2 digit
                if (m < 2)
                {
                    $day = '0'+ hari; 
                } else 
                {
                    $day = hari;
                };

                var bulan = date.getMonth() +1;
                n = String(bulan);
                if (n < 2)
                {
                    $month = '0'+ bulan; 
                } else 
                {
                    $month = bulan;
                };

                $year = date.getFullYear();
                $date =   $year + '-' + $month + '-' + $day;
                              
                clearModal();
                $(document).ready(function(){
                    getDate($date);
                    });
                $('#lanjutkan').on('click',function(){
                    $room = $("#idDropDown").val();
                    $url = "/reservation/customerform/"+$day+'/'+$month+'/'+$year+'/'+$room;
                    window.location.href=$url;
                });
            },  
			
			droppable: false, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
			
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}	
			},
			
						
		});
		
		
	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
		background-color: #DDDDDD;
		}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
		}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 900px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}

</style>
<link href={{URL::asset('css/modal.css')}} rel="stylesheet">
</head>
<body>
<div id='wrap'>

<div id='calendar'></div>
<!-- The Modal -->
    <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h1 class="modal-title">Detail Ruangan</h1>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                      <h2 class="card-title kosong" style='display:none'>Ruangan Belum Dipesan </h2>
                      <h3 class="card-text kosong" style='display:none;'>Segera reservasi sekarang.</h3>
                      <table class='ada' style='display:none'>
                              <thead>
                              <tr>
                                  <th>Ruangan</th>
                                  <th>Waktu Mulai</th>
                                  <th>Waktu Selesai</th>
                                  
                              </tr>
                              </thead>
                              <tbody id="myTable">
  
                          </tbody>
                      </table>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <div class="form-group">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm">
                                  <h5 style="margin 0 auto ;float:left">Reservasi Ruangan : </h5>
                                  {{-- {!! Form::Label('id_room', 'Ruangan :', ['style'=>'float:left;']) !!} --}}
                              </div>
                              <div class="col-sm">
                                  <select data-toggle="popover" class="btn btn-secondary dropdown-toggle"  data-container="body" data-html="true" style="float:center" name="id_room"  id="idDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded='true'>
                                      @foreach($room as $row)
                                      <option value="{{$row->id}}">{{$row->name}}</option>
                                      @endforeach
                                  </select>
                                  <div id="popover-content-idDropDown" class="hide">
                                          <div class="list-group" style="overflow-y:auto; margin:0; border:0">
                                              @foreach ($room as $row)
                                                  <a  class="list-group-item list-group-item-action flex-column align-items-start" style="margin: 0" >
                                                      <div class=" ">
                                                          <p class="">Ruang {{$row->name}}</p>
                                                      </div>
                                                      <small class="">Kapasitas Hanya Kursi {{$row->chair_capacity}}.</small> <br>
                                                      <small class="">Kapasitas Kursi + Meja {{$row->table_capacity}}.</small>
                                                  </a>
                                              @endforeach
                                          </div>
                                  </div>
                              </div>		  
                          </div>
                      </div>
                  </div>
                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                  <a id='lanjutkan'  role="button" class="btn btn-primary" style="color:white">Lanjutkan</a>
                </div>
              </div>
            </div>
          </div>

<div style='clear:both'></div>
            </div>
</body>
</html>
