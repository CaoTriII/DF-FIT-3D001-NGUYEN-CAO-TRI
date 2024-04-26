<!DOCTYPE html>
<html lang="en">

<head>
@include('client.partials.head')
</head>
  <body>




@include('client.partials.header')


@yield('content')

@include('client.partials.info')

@include('client.partials.footer')



@include('client.partials.foot')
  </body>

</html>
