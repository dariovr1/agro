<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title","agroambiente")</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    @include("components.css")
  </head>
  <body>

    <div class="container">
     @yield("content")
    </div>

    @section('js')
     <script src="/vendor/jquery/jquery.min.js"></script>
    @show
   
</body>
</html>