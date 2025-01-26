<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div class="conteiner">
    <div class="row">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
        </li><li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('about.index') }}">about</a>
        </li><li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">main</a>
        </li><li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('contact.index') }}">contact</a>
      </ul>
    </div>
  </div>
</nav>
</div>
    @yield('content')
</body>
</html>