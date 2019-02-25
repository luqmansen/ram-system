@extends('layouts.userMainLayout')
@section('title')
        <title>Borang Peminjaman Ruangan | Room Reservation & Monitoring System</title>
@endsection
@section('customStyle')
<style type="text/css">
.input-group {
         width: 110px;
         margin-bottom: 10px;
 }
 .form-title{
    font-family: 'Staatliches', cursive;
    color: black;
}
.form-description{
    color:#7a7a7a
}
.hidden{
	display: none;
}
</style>    

{{-- Stylesheet for jquery date & timepicker --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquerytimepicker/jquery.timepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquerytimepicker/lib/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery-ui.css')}}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css')}}" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

@endsection

@section('contentBody')    
<body style="background-color:#f1f2f6;">
<div class="main-content hidden">
        <nav class="navbar navbar-expand-lg transparent" id="home-navbar"> 
                <a class="navbar-brand" href="/">
                <img src="{{asset('assets/img/logo_.png')}}" height="38" alt="Logo UCCP">
                </a>
                <i class="far fa-question-circle ml-auto" style="color:#005b9f;padding-right:10px;cursor:pointer;" data-toggle="tooltip" title="Klik untuk memunculkan bantuan"></i>
        </nav>
        <div class="container">
                <div class="row py-2 pb-3">
                        <div class="col-12">
                                <h1 class="form-title">Borang Peminjaman Ruangan</h1>
                                <small class="form-description">Silahkan isi informasi terkait peminjaman berikut</small>
                        </div>
                </div>
                {{-- row --}}
                <div class="row">
                        <div class="col-12">
                                        <div id="dom-target" style="display:none">
                                                        @php
                                                            echo htmlspecialchars($disabledRange);
                                                        @endphp
                                                </div>
                                                <div id="disabledTime" ></div>
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
                                                                                        {{Form::text('something', $roomName->room_name,['class' => 'readonly form-control', 'style' => 'text-align:center ;width:50%', 'disabled'])}}                                                     
                                                                                        {{Form::hidden('id_room', $room)}}   
                                                                                </div>
                                                                                
                                                                        </div>
                                                                </div>
                                                            </div>
                                                   
                                                        <div id="timeOnlyExample" class="form-group">                    
                                                                <div class="row">
                                                                        <div class="col">
                                                                                <div class="form-group">
                                                                                        {{Form::label('start_hour', ' Jam mulai * ')}}
                                                                                        {{Form::text('start_hour', '',['class' => 'time start  form-control'])}}        
                                                                                </div>
                                                                        </div>
                                                                        <div class="col">
                                                                                
                                                                                <div class="form-group">
                                                                                        {{Form::label('end_hour', ' Jam Selesai * ')}}
                                                                                        
                                                                                        {{Form::text('end_hour', '',[ 'class' => 'time end form-control'] )}}                                
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                            
                                                            <div class="form-group">
                                                                    {{Form::label('description', 'Deskripsi Singkat Kegiatan *')}}
                                                                    {{Form::text('description', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                    {{Form::label('note', 'Catatan  ')}}
                                                                    {{Form::text('note', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
                                                            </div>
                                                
                                                            <div>
                                                                    
                                                                {{Form::label('file_name', 'Surat Peminjaman *')}}
                                                                <small>(Dapat berupa file dokumen .pdf atau file gambar dengan format .jpg, .jpeg atau .png *maksimum 2MB)</small>
                                                                {{Form::file('file_name', ['class' => 'form-control'])}}
                                                            </div>
                                                            <br>
                                                            <small>bagian bertanda bintang (*) dibutuhkan</small>
                                                            <br>
                                                            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'margin: 10px'])}}
                                                            
                                                    {!! Form::close() !!}
                                                

                        </div>
                </div>
                {{-- row --}}
        </div>
        {{-- container --}}
</div>              
{{-- main-content --}}
<img id="loading" src="{{asset('assets/img/gear.gif')}}" alt="page loading" style="height:30px;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);">

@endsection    

@section('customScript')

{{-- Jquery- Time Picker --}}
{{-- <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script> --}}
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.datepair.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/lib/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.timepicker.js')}}"></script>
<script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
        $( document ).ready(function(){
                $('.main-content').removeClass('hidden');
                $('#loading').addClass('hidden');
                // Cookies.remove('welcome-banner');
        });
</script>
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
        'step' : '60',
        'disableTimeRanges' : myRanges
        });

        var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
        var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);  


        // prevent user to close the tab, if it does, then make ajax request to delete last record in customer table

        $(window).on('beforeunload', function() {
                console.log('something here');
                
        });
 </script>
 <script>
         $('input#start_hour').on('click', function(){
                $('ul.ui-timepicker-list:first  li:last').css('display','none');
         });
 </script>
@if ($errors->any())
<script>
Swal({
     type: 'error',
     title: 'Terjadi kesalahan',
     text: 'Harap isi form dengan benar!',
     showConfirmButton: false,
     timer: 1500
 });
</script>
@endif

@endsection