<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My TODO App</title>

    @include('libraries.style')
</head>
<body>
    @include('components.nav')

    @yield('contant')

    
    @include('components.footer')

    @include('libraries.script')
</body>
</html>