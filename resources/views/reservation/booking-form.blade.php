@extends('inc.navbar')

@section('title')
    Form Peminjaman Ruangan
@endsection

@section('customstyle')
<style type="text/css">
.input-group {
         width: 110px;
         margin-bottom: 10px;
 }
</style>    
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">

@endsection

@section('content')


<div id="dom-target" style="display: none">
        <?php
                $forbidden_date = json_encode($rest);
                echo htmlspecialchars($forbidden_date);
        ?>
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
                                        {{Form::select('id_room', ['502' => '502', '503' => '503', '504' => '504'],'', ['class'=>"btn btn-secondary dropdown-toggle", 'type'=>"button" ,'id'=>"dropdownMenuButton" ,'data-toggle'=>"dropdown" ,'aria-haspopup'=>"true", 'aria-expanded'=>"true"])}}
                                </div>
                        </div>
                </div>
            </div>

            <div class="form-group">
                
                    
            </div>
            <div class="row">
                <div class="col">
                        <div class="form-group">
                                {{Form::label('start_hour', ' Mulai : ')}}
                                {{Form::text('start_hour', '',['class' => 'clockpicker  form-control'])}}                            
                        </div>
                </div>
                <div class="col">
                        <div class="form-group">
                                {{Form::label('end_hour', ' Selesai : ')}}
                                {{Form::time('end_hour', '',['class' => 'clockpicker form-control'] )}}
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

{{-- Jquery- Clock Picker  --}}
{{-- <script type="text/javascript" href="assets/js/jquery.min.js"></script>
<script type="text/javascript" href="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.js"></script>
<link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css"> 


<script type="text/javascript">
        $('.clockpicker').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: 'true'
        });
        </script>

{{-- Jquery for DATEPICKER --}}
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>
        var div = document.getElementById("dom-target");
        var forbidden_date = div.textContent;
        // console.log(forbidden_date);
        $(function() 
        {
                $("#datepicker" ).datepicker(
                        {
                                dateFormat: 'dd MM yy',
                                beforeShowDay: function(date)
                                {
                                        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                        return [ forbidden_date.indexOf(string) == -1 ]
                                }
                        });
                        
                });
                
                
</script>

@endsection