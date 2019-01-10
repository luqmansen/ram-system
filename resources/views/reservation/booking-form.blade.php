@extends('layouts.layouts')

@section('content')
    <h1>Create Post</h1>
    
    {!! Form::open(['action' => 'FormController@form', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
    {{-- this action is where our form is submitting to --}}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Title'])}}
                    {{--Bagian ini dikosongin karena ini bakal buat isi form Titlenya, jadi valuenya null--}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::text('body', '',['class' => 'form-control', 'placeholder' => 'Body Text'])}}
                    {{-- sama kosong juga --}}
            </div>
            <div class="form-group">
                   
                {{Form::file('cover_image')}}

            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary', 'style' => 'float :right;'])}}
    {!! Form::close() !!}

@endsection    