<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SaiGonBooking</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('clients/images/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="{{asset('clients/css/bootstrap.min.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('clients/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('clients/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('clients/css/pagination.css') }}"> --}}

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('6989405daeba7df8b208', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
      });
    </script>

</head>
