<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head><body>
  <div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                <table class="table table-bordered">
                        <thead>
                                <tr>
                                        <th scope="col" class="text-center">Reservation ID</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Telephone</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Room</th>
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="text-center">Start Hour</th>
                                        <th scope="col" class="text-center">End Hour</th>
                                        <th scope="col" class="text-center">Description</th>
                                        <th scope="col" class="text-center">Note</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Created at</th>
                                        <th scope="col" class="text-center">Updated at</th>
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
                </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body></html>