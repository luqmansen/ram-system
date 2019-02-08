<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>
<body>
    <form action="">
    <div class="form-group">
        <label for="">Name :</label>
        <input type="text" name="name" class="form-control">
    </div>
    

    <div class="form-group">

        <button class="btn btn-success btn-submit">Submit</button>

    </div>
</form>

<script type="text/javascript">

 $.ajaxSetup({
     headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('.btn-submit').click(function(e){
     e.preventDefault();

    var name = $("input[name=name]").val();


    $.ajax({
        type: 'POST',
        url: 'ajaxRequest',
        data:{name:name},
        success: function (data) {
            console.log(data);
            alert(data.success);
        }
    });
 });

</script>
</body>
</html>