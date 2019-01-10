@extends('layouts.NoScriptLayout')

@section('content')
    <h1>Data Peminjam</h1>
    
    {!! Form::open(['action' => 'FormController@store', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{-- this action is where our form is submitting to --}}
            <div class="form-group">
                {{Form::label('name', 'Nama: ',['class' => 'col-lg-2 control-label'])}}
                {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Masukan Nama Anda'])}}
                    {{--Bagian string  dikosongin untuk isi namanya, jadi valuenya null--}}
            </div>
            
            <div class="form-group">
                    {{Form::label('telephone', 'Telepon: ',['class' => 'col-lg-2 control-label'])}}
                    {{Form::number('telephone', '',['class' => 'form-control', 'placeholder' => '08XX - XXXX - XXX'])}}
                        
            </div>
            
            <div class="form-group">
                    {{Form::label('email', 'Email: ',['class' => 'col-lg-2 control-label'])}}
                    {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'contoh@gmail.com'])}}
                        
            </div>
            
            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'float :right;'])}}
    {!! Form::close() !!}

@endsection    