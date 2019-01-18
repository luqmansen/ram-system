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
{{-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/github.min.css"> --}}

{{-- Stylesheet for jquery date & timepicker --}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquerytimepicker/jquery.timepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('jquerytimepicker/lib/bootstrap-datepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery-ui.css')}}" />

@endsection

@section('content')                  

<div id="dom-target" style="display: none">
        <?php
                $forbidden_date = json_encode($rest);
                echo htmlspecialchars($forbidden_date);
        ?>
</div>
<div id="disabledTime" >
        {{-- @php
            echo htmlspecialchars($);
        @endphp --}}
</div>

    {!! Form::open(['action' => 'FormController@store1', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{-- this action is where our form is submitting to --}}
    
            <div class="form-group">
                    <div class='row'>
                        <div class="col">
                                {{Form::label('date', 'Tanggal Peminjaman ')}}
                                {{Form::text('date', '',['id' => 'datepicker','class' => 'form-control', 'style' => 'width:80%'])}}                                                     
                        </div>
                        <div class='col'>
                                 {{Form::label('id_room', 'Ruangan ')}}
                                <div class="dropdown">
                                        @php
                                            $room = []
                                        @endphp
                                        {{Form::select('id_room', ['1' => '502', '2' => '503', '3' => '504'],'', ['class'=>"btn btn-secondary dropdown-toggle", 'type'=>"button" ,'id'=>"dropdownMenuButton" ,'data-toggle'=>"dropdown" ,'aria-haspopup'=>"true", 'aria-expanded'=>"true"])}}
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
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.datepair.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/lib/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('jquerytimepicker/jquery.timepicker.js')}}"></script>
{{-- J --}}
<script>
        $('#timeOnlyExample .time').timepicker({
        'showDuration': true,
        'disableTextInput' : true,
        'disableTouchKeyboard' : true,
        'show24' : true,
        'timeFormat' :'G:ia',
        'lang' : {am:"", pm:''},
        'minTime' : '7:00',
        'maxTime' : '17:00',
        // 'disableTimeRanges' : [['12:00 am', '7:00am'], ['5:30pm', '11:30pm']]
        });

        var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
        var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);

        //for disable datepicker textinput
        $('.readonlyjm').on('focus',function(){
        $(this).trigger('blur');
        });
            
</script>

<script type="text/javascript" src="{{URL::asset('https://code.jquery.com/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('https://code.jquery.com/ui/1.11.2/jquery-ui.js')}}"></script>
<script>
        var div = document.getElementById("dom-target");
        var forbidden_date = div.textContent;
        // console.log(forbidden_date);
        
        $(function() 
        {
                $("#datepicker" ).datepicker(
                        {
                                dateFormat: 'dd MM yy',
                                onSelect: function(){
                                        getDate()
                                },
                                // beforeShowDay: function(date)
                                // {
                                //         var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                //         return [ forbidden_date.indexOf(string) == -1 ]
                                // }
                        });
                        
                });                
        
                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        
        // fungsi untuk buat ajax request ketika user pilih tanggal tertentu
        function getDate() 
        {
                $value=$('#datepicker').val();
                $.ajax({
                type : 'get',
                url : '/reservation/bookingform',
                data:{'date':$value},
                success:function(data){
                $('#disabledTime').html(data);
                }
            });
         }
</script>


@endsection