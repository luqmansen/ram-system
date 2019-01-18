@extends('inc.navbar')


<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>Sistem Reservasi UCCP </title>
@section('title')
<h2 style="text-align:center">Detail Ruangan Tanggal {{$day}} - {{$month}} - {{$year}}  </h2>
    
@endsection
@section('content')

<br><br>
@if (count($reservations)> 0)
    <table>
        <thead>
        <tr>
            <th>Ruangan</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Deskripsi</th>
        </tr>
        </thead>
        <tbody id="myTable">
        @foreach ($reservations as $reserv)
        <tr>
            <td> {{$reserv->id_room}} </td>
            <td> {{$reserv->start_hour}} </td>
            <td> {{$reserv->end_hour}} </td>
            <td> {{$reserv->description}} </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary" style="float:right;  margin-bottom:10%; margin-top:10px" href="/reservation/customerform" role="button">Reservasi Tempat</a>
    
@else
<div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Ruangan Belum Dipesan </h5>
          <p class="card-text">Segera reservasi sekarang.</p>
          <a  href="/reservation/customerform" role="button" class="btn btn-primary">Reservasi Tempat</a>
        </div>
      </div>
@endif


@endsection
