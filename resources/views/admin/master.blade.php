<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head')
</head>
<body class="hold-transition sidebar-mini">
    @include('admin.partials.main-header')

    @include('admin.partials.sidebar')
@yield('content')
    @include('admin.partials.footer')
    @include('admin.partials.foot')
</body>
</html>
