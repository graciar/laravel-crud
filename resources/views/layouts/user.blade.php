<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <nav class="nav justify-content-center py-3 bg-light shadow-sm">
       <a href="/home" class="nav-link">Home</a>
       <a href="/events" class="nav-link">Events</a>
       <a href="/mytickets" class="nav-link">My Tickets</a>
   </nav>
   <div class="container">
       @yield('content')
</body>
</html>