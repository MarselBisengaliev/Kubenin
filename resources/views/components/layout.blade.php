<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <style>
      .card img {
        object-fit: cover;
        object-position: center ;
        width: 100%;
        height: 175px;
      }
    </style>
</head>

<body>
    @include('components.header')
    @include('components.alert')
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
</body>

</html>
