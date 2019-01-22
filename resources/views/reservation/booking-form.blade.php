@extends('inc.navbar')

@section('title')
    Form Peminjaman Ruangan
@endsection

@section('somethingUneedInHead')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('customstyle')
<style type="text/css">
.input-group {
         width: 110px;
         margin-bottom: 10px;
 }
</style>    

{{-- Stylesheet for jquery date & timepicker --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquerytimepicker/jquery.timepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquerytimepicker/lib/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery-ui.css')}}" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

<style>
 /* The Modal (background) */
/* Modal Header */
.modal-header {
  padding: 2px 16px;
  background-color: black;
  color: white;
  text-align: center;
}

/* Modal Body */
.modal-body {padding: 2px 16px;}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: 15% auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  height: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  
}
</style>
@endsection

@section('content')                  
<div id="dom-target" style="display:none">
        @php
            echo htmlspecialchars($disabledRange);
        @endphp
</div>
<div id="disabledTime" ></div>

<!-- The Modal -->
<div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                        <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Modal Header</h2>
                        </div>
                        <div class="modal-body">
                        <p>Some text in the Modal Body</p>
                        <p>Some other text...</p>
                        </div>
                </div>
                </div>
<br><br>

    {!! Form::open(['action' => 'FormController@store1', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    
            <div class="form-group">
                    <div class='row'>
                        <div class="col">
                                {{Form::label('date', 'Tanggal Peminjaman ')}}
                                @php
                                        $newDate = date("d-F-Y", strtotime($date));
                                @endphp 
                                {{Form::text('date', $newDate,['id' => 'datepicker','class' => 'readonly form-control', 'style' => 'width:80%', 'disabled'])}}                                                     
                                
                        </div>
                        <div class='col'>
                                 {{Form::label('id_room', 'Ruangan ')}}
                                <div class="dropdown">
                                        {{Form::select('id_room', ['1' => '502 ', '2' => '503', '3' => '504'],'', ['class'=>"btn btn-secondary dropdown-toggle", 'type'=>"button" ,'id'=>"dropdownMenuButton" ,'data-toggle'=>"dropdown" ,'aria-haspopup'=>"true", 'aria-expanded'=>"true"])}}
                                        <button id="myBtn" type="button" class="btn btn-info" style="font-weight: bold">i</button>
                                       

                                </div>
                                
                        </div>
                </div>
            </div>
   
        <div id="timeOnlyExample" class="form-group">                    
                <div class="row">
                        <div class="col">
                                <div class="form-group">
                                        {{Form::label('start_hour', ' Mulai : ')}}
                                        {{Form::text('start_hour', '',['class' => 'time start  form-control'])}}        
                                </div>
                        </div>
                        <div class="col">
                                
                                <div class="form-group">
                                        {{Form::label('end_hour', ' Selesai : ')}}
                                        
                                        {{Form::text('end_hour', '',[ 'class' => 'time end form-control'] )}}                                
                                </div>
                        </div>
                </div>
        </div>
            
            <div class="form-group">
                    {{Form::label('description', 'Deskripsi Singkat Acara  ')}}
                    {{Form::text('description', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
            </div>
            
            <div class="form-group">
                    {{Form::label('note', 'Catatan  ')}}
                    {{Form::text('note', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
            </div>

            <div>
                    
                {{Form::label('file_name', 'Surat Peminjaman (PDF atau Gambar) ')}}
                {{Form::file('file_name', ['class' => 'form-control'])}}
            </div>

            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'margin: 10px'])}}
    {!! Form::close() !!}

@endsection    

@section('jquery-datepicker')

{{-- Jquery- Date & Time Picker (integrated) --}}
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/modal.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.datepair.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/lib/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.timepicker.js')}}"></script>
{{-- J --}}
<script>
        var div = document.getElementById("dom-target");
        var disabledRanges = div.textContent;
        var myRanges = JSON.parse(disabledRanges);
        
        $('#timeOnlyExample .time').timepicker({
        'showDuration': true,
        'disableTextInput' : true,
        'disableTouchKeyboard' : true,
        'show24' : true,
        'timeFormat' :'G:ia',
        'lang' : {am:"", pm:''},
        'minTime' : '7:00',
        'maxTime' : '17:00',
        'disableTimeRanges' : myRanges
});

        var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
        var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);  

 </script>


@endsection