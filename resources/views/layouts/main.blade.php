<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UisYouWereHere</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/my.js') }}"></script>
    <link rel="stylesheet" href={!! asset('/css/style.css') !!}>
    <link rel="stylesheet" href={!! asset('/css/lightbox.css') !!}>
    <link rel="stylesheet" type="text/css" href="{!! asset('/css/magnifier.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="{!! asset('/js/Magnifier.js') !!}"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('/css/app.css') !!}">
    <script type="text/javascript" src="{!! asset('/js/lightbox-plus-jquery.js') !!}"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{!! asset('/css/slick-theme.css') !!}">
    <script type="text/javascript" src="{!! asset('/js/slick.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/js/jquery.elevateZoom-3.0.8.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/js/jquery.elevatezoom.js') !!}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


  </head>
      @include('navs.nav')
  <body>
    <div class="">
      @yield('content')
    </div>

    <div class="">
      @yield('subcontent')
    </div>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
  </body>
</html>
