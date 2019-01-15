@extends('inc.navbar')

@section('content')
    <h1>Data Peminjam</h1>
    
    {!! Form::open(['action' => 'FormController@store', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{-- this action is where our form is submitting to --}}
            <div class="form-group">
                {{Form::label('name', 'Nama ')}}
                {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Masukan Nama Anda'])}}
                    {{-- Bagian string  dikosongin untuk isi namanya, jadi valuenya null --}}
                </div>
            
            <div class="form-group">
                    {{Form::label('telephone', 'Telepon ')}}
                    {{Form::number('telephone', '',['class' => 'form-control', 'placeholder' => 'Masukan Nomor Telepon'])}}
                        
            </div>
            
            <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'contoh@contoh.com'])}}
                        
            </div>
            
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!} 

@endsection    