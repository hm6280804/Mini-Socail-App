<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     {{-- <header class="bg-light py-3 fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="#" class="logo text-decoration-none text-primary fs-4">Logo</a>

            <nav>
                <a href="{{ route('login') }}" class="text-decoration-none me-3 text-dark">Login</a>
                <a href="{{ route('register') }}" class="text-decoration-none text-dark">Register</a>
            </nav>
            
            <div>
                <a href="#" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </header>  --}}
    <header class="bg-light py-3 fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="logo text-decoration-none text-primary fs-4">Logo</a>
            @guest
            <nav>
                <a href="{{ route('login') }}" class="text-decoration-none me-3 text-dark">Login</a>
                <a href="{{ route('register') }}" class="text-decoration-none text-dark">Register</a>
            </nav>
            @else      
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @endguest
        </div>
    </header>

    @yield('contents')


 <!-- Bootstrap JS (optional) -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>