<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">My Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('account') }}" onclick="history.pushState(null, null, '{{ route('account') }}');">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('services') }}" onclick="history.pushState(null, null, '{{ route('services') }}');">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('blog') }}" onclick="history.pushState(null, null, '{{ route('blog') }}');">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('destinations') }}" onclick="history.pushState(null, null, '{{ route('destinations') }}');">Destinations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('about') }}" onclick="history.pushState(null, null, '{{ route('about') }}');">About</a>
      </li>
    </ul>
  </div>
</nav>
</body>
</html>