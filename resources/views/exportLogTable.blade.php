<html>
<head>
</head>
<body>
    <table>
        <thead>
                <tr>
                        <th  class="text-center">Reservation ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Telephone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Room</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Start Hour</th>
                        <th class="text-center">End Hour</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Created at</th>
                        <th class="text-center">Updated at</th>
                </tr>
        </thead>
        <tbody align="center">
                @foreach($history as $row)
                <tr id="tablerow{{$row->id}}">
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->telephone}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->room_name}}</td>
                        <td>{{$row->date}}</td>
                        <td>{{$row->start_hour}}</td>
                        <td>{{$row->end_hour}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->note}}</td>
                        <td>{{$row->status}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->updated_at}}</td>
                </tr>	   
                @endforeach
        </tbody>
    </table>
    
</body>

<?php
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=ReservationsLogTable.xls');
  ?>

</html>