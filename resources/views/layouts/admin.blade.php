<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Laravel') }} - @yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#1A1A1A] text-[#e5e5e5]">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#161615] border-r border-[#2a2a2a] flex flex-col">
            <div class="p-4 border-b border-[#2a2a2a]">
                <h1 class="text-xl font-bold text-[#ffd700]">Admin Panel</h1>
            </div>
            <nav class="mt-8 flex-1">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-[#2a2a2a] text-[#e5e5e5] {{ request()->routeIs('admin.dashboard') ? 'bg-[#2a2a2a] text-[#ffd700]' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="block px-4 py-2 hover:bg-[#2a2a2a] text-[#e5e5e5] {{ request()->routeIs('admin.services.*') ? 'bg-[#2a2a2a] text-[#ffd700]' : '' }}">
                    Manage Services
                </a>
                <a href="{{ route('admin.pricelist.index') }}" class="block px-4 py-2 hover:bg-[#2a2a2a] text-[#e5e5e5] {{ request()->routeIs('admin.pricelist.*') ? 'bg-[#2a2a2a] text-[#ffd700]' : '' }}">
                    Manage Pricelist
                </a>
            </nav>
            <div class="p-4 border-t border-[#2a2a2a]">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-[#2a2a2a] rounded text-[#e5e5e5]">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-[#1A1A1A]">
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

