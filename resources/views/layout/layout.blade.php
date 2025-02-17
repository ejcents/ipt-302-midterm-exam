<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My SuperApp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
</head>
<body>
    
<header class="bg-green-600 p-3 text-slate-100">
    <nav class="flex justify-between items-center">
        <div class="logo">
            <a href="{{url('/')}}" class="text-xl fonst-semibold"><b>My<span class="text-green-300">Super App</span></b></a>
        </div>

        <div class="flex items-center space-x-10">
            <ul class="flex space-x-10" id="link-container">
                <li><a href="{{url('/home')}}" id="link">Home</a></li>
                @can('manage-products')
                <li><a href="{{url('/products')}}" id="link">Products</a></li>
                @endcan
                {{-- It will shown if it has an permission to manage trasaction --}}
                @can('manage-transactions')
                    <li><a href="{{url('/transactions')}}" id="link">Transaction</a></li>                    
                @endcan
                <li><a href="{{url('#')}}" id="link">About Us</a></li>
            </ul>

            @auth
            <div class="flex space-x-2 items-center">
                <span><i class="bi bi-person font-semibold text-xl"></i></span>
                <span>{{ auth()->user()->name }}</s[an]>
            </div>
                <form action="{{url('logout')}}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth

            @if (auth()->guest())
                <a href="{{url('login')}}">Login</a>
            @endif
        </div>

    
    </nav>
</header>
<main class="container mx-auto ">
    @yield('content')
</main>




</body>
</html>