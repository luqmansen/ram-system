@extends('layouts.userMainLayout')

@php
    // dd($room);
@endphp
@section('title')
    <title>Borang Data Peminjam | Room Reservation & Monitoring System</title>
@endsection
@section('customStyle')
<style>
.form-title{
    font-family: 'Staatliches', cursive;
}
.form-description{
    color:#7a7a7a
}
.hidden{
	display: none;
}
</style>

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
            <div class="row py-3 mt-3">
                <div class="col-12">
                        <h1 class="form-title">Borang Data Peminjam</h1>
                        <small class="form-description">Silahkan isi data diri anda untuk meneruskan peminjaman</small>
                </div>
            </div>
            {{-- row --}}
            <div class="row pt-4">
                <div class="col-12">
                        {!! Form::open(['action' => 'FormController@store', 'method' => 'POST', "class" => 'form', 'enctype' => 'multipart/form-data']) !!}
                        {{-- this action is where our form is submitting to --}}
                                <div class="form-group">
                                    {{Form::label('name', 'Nama *')}}
                                    {{Form::text('name', '',['class' => 'form-control', 'placeholder' => 'Masukan Nama Anda'])}}
                                        {{-- Bagian string  dikosongin untuk isi namanya, jadi valuenya null --}}
                                    </div>
                                
                                <div class="form-group">
                                        {{Form::label('telephone', 'Telepon *')}}
                                        {{Form::number('telephone', '',['class' => 'form-control', 'placeholder' => 'Masukan Nomor Telepon'])}}
                                            
                                </div>
                                
                                <div class="form-group">
                                        {{Form::label('email', 'Email *')}}
                                        {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'contoh@contoh.com'])}}
                                        {{Form::hidden('day', $day)}}
                                        {{Form::hidden('month', $month)}}
                                        {{Form::hidden('year', $year)}}
                                        {{Form::hidden('room', $room)}}
                                </div>
                                <small>bagian bertanda bintang (*) dibutuhkan</small>
                                <br>
                                {{Form::submit('Lanjut', ['class' => 'btn btn-primary pull-right'])}}
                        {!! Form::close() !!} 
                </div>
            </div>
        </div>
       </div>
    
    <img id="loading" src="{{asset('assets/img/gear.gif')}}" alt="page loading" style="height:30px;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);">
@endsection    
@section('customScript')
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