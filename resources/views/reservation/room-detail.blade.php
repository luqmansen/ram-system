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
@section('content')
<h1 style="text-align:center">Detail Ruangan Tanggal {{$day}} - {{$month}} - {{$year}}  </h1>

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
    
@else
    <h2 style="text-align:center">Ruangan Belum Dipesan</h2>
@endif

<a class="btn btn-primary" style="float:right;  margin-bottom:10%; margin-top:10px" href="/reservation/customerform" role="button">Reservasi Tempat</a>
@endsection
