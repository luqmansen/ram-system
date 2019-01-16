<html>
<head>
</head>
<body>
    <table>
        <thead>
                <tr>
                        <th  class="text-center">ID</th>
                        <th class="text-center">Customer Name</th>
                        <th class="text-center">Telephone</th>
                        <th class="text-center">Email</th>
                </tr>
        </thead>
        <tbody align="center">
                @foreach($customers as $row)
                <tr id="tablerow{{$row->id}}">
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->telephone}}</td>
                        <td>{{$row->email}}</td>
                </tr>	   
                @endforeach
        </tbody>
    </table>
    
</body>

<?php
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=CustomersTable.xls');
  ?>

</html>