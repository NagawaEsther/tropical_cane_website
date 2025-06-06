<!-- resources/views/frontend/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tropical Cane Juice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Tropical Cane</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/juices') }}">Our Juices</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/tips') }}">Healthy Tips</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
    @yield('content')
</div>

<footer class="bg-light text-center py-3 mt-4">
  <div class="container">
    <p>&copy; {{ date('Y') }} Tropical Cane Juice. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
