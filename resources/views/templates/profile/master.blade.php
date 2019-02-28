<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   @section('css')
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  @show
</head>

<body>
@include('components.menu')
<div class="container">
	@include('components.dash')

  <div class="row">
      <div class="col-md-4">
        @yield("sidebar")
      </div>

      <div class="col-md-8">
          @yield("content")
      </div>
  </div>


</div>
@section('footer')
  <!-- permette di dire a blade di avere questo elemento di default se non si specifica altro !-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
@show
</body>

</html>
