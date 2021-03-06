
<!DOCTYPE html>
<html lang="en">

  <head>
    @yield('somethingUneedInHead')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <title style="margin: 0 auto; text-align:center">@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    @yield('customstyle')
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand " style="text-align: center; font-weight:bold; size:30px"  href="
        #">
            UCCP | Sistem Peminjaman Ruangan ICT
        </a>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container" >
      <div class="row">
        <div class="col-lg-12">
          <h1 class="mt-5" style="margin: 0 auto; text-align :center">
              <div class="card">
                  <div class="card-header" style="font-size:70%">
                      @yield('title')
                  </div> 
                </div>              
            </h1>
            <br><br>
            @yield('content')
          </ul>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @yield('jquery-datepicker')
  </body>

</html>
