@extends('layouts.NoScriptLayout')

@section('content')
    <h1>Create Post</h1>
    
    {!! Form::open(['action' => 'FormController@store1', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{-- this action is where our form is submitting to --}}

            {{-- <div class="form-group">
                {{Form::label('date', 'Tanggal Peminjaman: ',['class' => 'col-lg-2 control-label'])}}
                {{Form::date('date', '',['class' => 'form-control'])}}
                    
            </div> --}}

            <div class="form-group">
                {{Form::label('id_room', 'Ruangan: ',['class' => 'col-lg-2 control-label'])}}
                {{Form::select('id_room', ['502' => '502', '503' => '503', '504' => '504'])}}
                    
            </div>
            
            <div class="form-group">
                    {{Form::label('start_hour', 'Waktu Mulai Peminjaman: ',['class' => 'col-lg-2 control-label'])}}
                    {{Form::time('start_hour', '')}}
            </div>

            <div class="form-group">
                    {{Form::label('end_hour', 'Waktu Selesai Peminjaman: ',['class' => 'col-lg-2 control-label'])}}
                    {{Form::time('end_hour', '')}}
            </div>
            
            
            <div class="form-group">
                    {{Form::label('description', 'Deskripsi Singkat: ',['class' => 'col-lg-2 control-label'])}}
                    {{Form::text('description', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
            </div>
            
            <div class="form-group">
                    {{Form::label('note', 'Catatan : ',['class' => 'col-lg-2 control-label'])}}
                    {{Form::text('note', '',['class' => 'form-control', 'placeholder' => 'Diskripsi Singkat '])}}
            </div>

            <div class="form-group">
                        {{Form::label('file', 'Surat Peminjaman Ruangan : ',['class' => 'col-lg-2 control-label'])}}
                        {{Form::file('file_name')}}
            </div>
                

            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'float :right;'])}}
    {!! Form::close() !!}

@endsection    