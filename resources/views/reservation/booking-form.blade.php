@extends('inc.navbar')
@include('inc.messages')
@section('title')
    Form Peminjaman Ruangan
@endsection

@section('somethingUneedInHead')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@php
    
@endphp
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
<link rel="stylesheet" type="text/css" href="{{URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css')}}" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

@endsection

@section('content')                  
<div id="dom-target" style="display:none">
        @php
            echo htmlspecialchars($disabledRange);
        @endphp
</div>
<div id="disabledTime" ></div>

<br><br>

    {!! Form::open(['action' => 'FormController@store1', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    
            <div class="form-group">
                    <div class='row'>
                        <div class="col">
                                {{Form::label('date', 'Tanggal Peminjaman ')}}
                                @php
                                        $newDate = date("d-F-Y", strtotime($date));
                                        $inputDate = date("Y-m-d", strtotime($date));
                                        
                                @endphp 
                                {{Form::text('someDate', $newDate,['id' => 'datepicker','class' => 'readonly form-control', 'style' => 'width:100%', 'disabled'])}}                                                     
                                {{Form::hidden('date', $inputDate)}}   
                                
                        </div>
                        <div class='col'>
                                 {{Form::label('id_room', 'Ruangan ')}}
                                <div class="dropdown">
                                        {{Form::text('something', $roomName->name,['class' => 'readonly form-control', 'style' => 'text-align:center ;width:50%', 'disabled'])}}                                                     
                                        {{Form::hidden('id_room', $room)}}   
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
                    
                {{Form::label('file_name', 'Surat Peminjaman (PDF atau Gambar *maksimum 2MB) ')}}
                {{Form::file('file_name', ['class' => 'form-control'])}}
            </div>

            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'margin: 10px'])}}
    {!! Form::close() !!}

@endsection    

@section('jquery-datepicker')

{{-- Jquery- Time Picker --}}
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script> --}}
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.datepair.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/lib/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.timepicker.js')}}"></script>
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


        // prevent user to close the tab, if it does, then make ajax request to delete last record in customer table

        $(window).on('beforeunload', function() {
                console.log('something here');
                
        });
 </script>


@endsection