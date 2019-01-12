<h1>room detail</h1>
<h2>fetch data dari database</h2>

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


@php
    
    $reservations = DB::select('SELECT * FROM reservations');  
    // dd($reservations);
@endphp

<h2>Filterable Table</h2>
<p>Type something in the input field to search the table for first names, last names or emails:</p>  
<input id="myInput" type="text" placeholder="Search..">
<br><br>

<table>
  <thead>
    <tr>
      <th>Ruangan</th>
      <th>Waktu Mulai</th>
      <th>Waktu Selesai</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach ($reservations as $reserv)
    <tr>
        <td> {{$reserv->id_room}} </td>
        <td> {{$reserv->start_hour}} </td>
        <td> {{$reserv->end_hour}} </td>
    </tr>
    
    @endforeach
    
</tbody>
</table>


<p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
<a class="btn btn-primary" href="/reservation/customerform" role="button">Reservasi Tempat</a>