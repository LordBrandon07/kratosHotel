<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @extends ('layouts.app')
    @section('content')
    @viteReactRefresh
    @vite('resources/js/app.js')
</head>
<body>
    @section('title')
    Inicio Sesión
    @endsection


    <div id="root"></div>
</body>
</html>