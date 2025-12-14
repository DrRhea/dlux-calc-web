<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#1A1A1A] text-[#e5e5e5]">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-[#e5e5e5]">
                    Admin Login
                </h2>
                <p class="mt-2 text-center text-sm text-[#a1a1a1]">
                    Masuk ke dashboard admin
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="username" class="sr-only">Username</label>
                        <input id="username" name="username" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-[#2a2a2a] bg-[#161615] placeholder-[#a1a1a1] text-[#e5e5e5] rounded-t-md focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700] focus:z-10 sm:text-sm" placeholder="Username">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-[#2a2a2a] bg-[#161615] placeholder-[#a1a1a1] text-[#e5e5e5] rounded-b-md focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700] focus:z-10 sm:text-sm" placeholder="Password">
                    </div>
                </div>

                @if(session('error'))
                    <div class="bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-[#1A1A1A] bg-[#ffd700] hover:bg-[#ffed4e] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ffd700]">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

