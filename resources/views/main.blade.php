<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('head')
    <title>@yield('title', 'Custom Auth Laravel')</title>
</head>

<body>

@include('header')

@yield('content')

@include('footer')

</body>
</html>
