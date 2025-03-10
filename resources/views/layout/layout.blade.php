<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's E-Legal App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
</head>
<body>
    
<header class="bg-green-600 p-3 text-slate-100">
    <nav class="flex justify-between items-center">
        <div class="logo">
            <a href="{{ url('/') }}" class="text-xl font-semibold">
                <b>E-<span class="text-green-800">Legal App</span></b>
            </a>
        </div>

        <div class="flex items-center space-x-10">
            <ul class="flex space-x-10" id="link-container">
                <li><a href="{{ url('/home') }}" id="link">Home</a></li>

                @can('view-records')
                    <li><a href="{{ url('/records') }}" id="link">Records</a></li>
                @endcan
            </ul>

            @auth
            <div class="flex space-x-2 items-center">
                <span><i class="bi bi-person font-semibold text-xl"></i></span>
                <span>{{ auth()->user()->name }}</span>
            </div>

                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-green-800 duration-100">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ url('login') }}">Login</a>
            @endguest
        </div>
    </nav>
</header>

<main class="container mx-auto">
    @yield('content')
</main>

</body>
</html>
