<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Styde.net</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/js/gijgo.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="">
</head>

<body>
<!-- Part 1: Wrap all page content here -->
<div id="wrap">
    <!-- Header Main menu -->
    <div class="container">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel de Control</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-secondary">Inicio</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profesiones') }}">Profesiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/habilidades') }}">Habilidades</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <br>


    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="row mt-3">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </main>

    <div id="footer">
        <div class="container">
            <p class="muted credit">Example courtesy <a href="https://martinbean.co.uk/">Martin Bean</a> and <a href="https://ryanfait.com/">Ryan Fait</a>.</p>
        </div>
    </div>
</div>



<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js"></script>
<script>
    $('#date_start').datepicker({
        uiLibrary: 'bootstrap5'
    });
    $('#date_end').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>
</body>
</html>
