<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
    <title>@yield('title', 'Custom Auth Laravel')</title>
</head>

<body>

@include('admin.header')

@yield('content')

@include('footer')

</body>
</html>
