<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/app.css')  }}">
   
    <title>{{config('app.name')}}-@yield('title')</title>
</head>

<body>
@include('bar/navebar')
<div class="container">
@yield('content')
</div>
@include('script')

</body>
</html>