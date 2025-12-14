<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Home')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="font-sans antialiased bg-[#1A1A1A]">
    <!-- Navbar -->
    <nav class="bg-[#1A1A1A] border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo Area -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('assets/img/logo-splash-removebg-preview.png') }}" alt="DLUX Logo" class="h-16 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="flex space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Home
                    </a>
                    <a href="{{ route('services') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Services
                    </a>
                    <a href="{{ route('pricelist') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Pricelist
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#161615] border-t border-[#2a2a2a]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About Column -->
                <div>
                    <h3 class="text-lg font-semibold text-[#ffd700] mb-4">About</h3>
                    <p class="text-[#a1a1a1]">
                        Kami adalah penyedia layanan profesional skining dan infusion untuk mobil dan motor. Dengan pengalaman bertahun-tahun, kami berkomitmen memberikan hasil terbaik untuk transformasi kendaraan Anda.
                    </p>
                </div>

                <!-- Links Column -->
                <div>
                    <h3 class="text-lg font-semibold text-[#ffd700] mb-4">Links</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('home') }}" class="text-[#a1a1a1] hover:text-[#ffd700] transition-colors">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" class="text-[#a1a1a1] hover:text-[#ffd700] transition-colors">Services</a>
                        </li>
                        <li>
                            <a href="{{ route('pricelist') }}" class="text-[#a1a1a1] hover:text-[#ffd700] transition-colors">Pricelist</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="text-[#a1a1a1] hover:text-[#ffd700] transition-colors">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Address Column -->
                <div>
                    <h3 class="text-lg font-semibold text-[#ffd700] mb-4">Address</h3>
                    <p class="text-[#a1a1a1]">
                        Jl. Raya Contoh No. 123<br>
                        Kelurahan Contoh<br>
                        Kecamatan Contoh<br>
                        Jakarta, Indonesia 12345<br>
                        Phone: +62 812 3456 7890
                    </p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 pt-8 border-t border-[#2a2a2a] text-center text-[#a1a1a1]">
                <p>&copy; {{ date('Y') }} DLUX. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>

