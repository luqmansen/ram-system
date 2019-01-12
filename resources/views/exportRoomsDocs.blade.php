<html>
<head>
</head>
<body>
    <table>
        <thead>
                <tr>
                        <th  class="text-center">ID</th>
                        <th class="text-center">Room Name</th>
                        <th class="text-center">Capacity With Table</th>
                        <th class="text-center">Capacity Without Table</th>
                </tr>
        </thead>
        <tbody align="center">
                @foreach($rooms as $room)
                <tr id="tablerow{{$room->id}}">
                        <td>{{$room->id}}</td>
                        <td>{{$room->name}}</td>
                        <td>{{$room->table_capacity}}</td>
                        <td>{{$room->chair_capacity}}</td>
                </tr>	   
                @endforeach
        </tbody>
    </table>
    
</body>
<?php
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename='RoomsTable.pdf'");
readfile("original.pdf");
?>


</html>