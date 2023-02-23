<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="irfanshamid">
  <title>Irfan & Nabila</title>

  @include('_partials.styles')
</head>

<body>
  <main>
    <div id="load"></div>
    <div id="contentBody">
      @yield('content')
    </div>
  </main>

  @include('_partials.scripts')
  @yield('script')

</body>

</html>