<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title>My Blog App</title>    
        {{-- Tailwind --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-3">
            <ul class="flex items-center">
                <li>
                    <a href={{route("home")}} class="p-3">Home</a>
                </li>
                <li>
                    <a href={{route('blogs')}} class="p-3">Blogs</a>
                </li>
            </ul>
            <ul class='flex items-center'>
            @auth
                <li>
                    {{auth()->user()->username}}
                </li>
                <form action={{route('logout')}} method="POST" class="px-3">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth    
                <li>
                    <a href={{route('login')}} class="p-3">Login</a>
                </li>
            </ul>
        </nav>
        {{-- Todo: Show error here --}}
        @yield('content')
    </body>
</html>
