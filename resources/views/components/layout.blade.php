<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <header>
        <a href="#" class="logo">Logo</a>
        <nav>
            <a href="{{ route('login') }}">login</a>
            <a href="{{ route('register') }}">Register</a>
        </nav>
    </header>
   {{ $slot }}
</body>
</html>