<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Larita Luxury Hotel & Spa | Official Site</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Welcome to Larita Luxury Hotel, an exquisite boutique retreat offering five-star elegance, luxurious rooms, dynamic wellness spa, and fine dining. Book directly for the best rates guaranteed.">
    <meta name="keywords" content="luxury hotel, boutique retreat, 5-star hotel, Larita, hotel booking, wellness spa, fine dining">
    <meta name="author" content="Larita Hotels Group">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-luxury-950 text-luxury-100 font-sans antialiased selection:bg-primary-400 selection:text-luxury-950 min-h-screen flex flex-col justify-between overflow-x-hidden">

    <!-- Premium Navigation Bar -->
    <header class="fixed top-0 left-0 right-0 z-50 glass-nav animate-fade-in" x-data="{ mobileMenuOpen: false, scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                        <span class="font-serif text-2xl font-bold tracking-widest text-gold-200 group-hover:text-primary-300 transition duration-300">LARITA</span>
                        <div class="w-1.5 h-1.5 rounded-full bg-primary-500 self-end mb-1.5 group-hover:bg-primary-300 transition duration-300"></div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8 items-center text-sm font-medium tracking-widest uppercase">
                    <a href="{{ route('home') }}#rooms" class="text-luxury-200 hover:text-primary-300 transition duration-300">Rooms & Suites</a>
                    <a href="{{ route('home') }}#facilities" class="text-luxury-200 hover:text-primary-300 transition duration-300">Facilities</a>
                    <a href="{{ route('home') }}#tour" class="text-luxury-200 hover:text-primary-300 transition duration-300">Virtual Tour</a>
                    
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-primary-400 hover:text-primary-300 transition duration-300">My Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-luxury-200 hover:text-red-400 transition duration-300 uppercase tracking-widest text-sm focus:outline-none cursor-pointer">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-luxury-200 hover:text-primary-300 transition duration-300">Login</a>
                        <a href="{{ route('register') }}" class="relative group px-5 py-2.5 rounded border border-primary-500/50 overflow-hidden transition-all duration-300 hover:border-primary-400">
                            <span class="absolute inset-0 bg-gold-gradient opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative text-luxury-100 group-hover:text-luxury-950 font-semibold transition-colors duration-300">BOOK NOW</span>
                        </a>
                    @endauth
                </nav>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-luxury-300 hover:text-primary-300 focus:outline-none transition duration-300" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="h-6 w-6" x-show="mobileMenuOpen" x-cloak fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden glass-nav border-t border-luxury-800/80" id="mobile-menu" x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2">
            <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3 text-center uppercase tracking-widest text-sm">
                <a href="{{ route('home') }}#rooms" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-luxury-200 hover:bg-luxury-900 hover:text-primary-300 transition duration-300">Rooms & Suites</a>
                <a href="{{ route('home') }}#facilities" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-luxury-200 hover:bg-luxury-900 hover:text-primary-300 transition duration-300">Facilities</a>
                <a href="{{ route('home') }}#tour" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-luxury-200 hover:bg-luxury-900 hover:text-primary-300 transition duration-300">Virtual Tour</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-primary-400 hover:bg-luxury-900 transition duration-300">My Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="block w-full">
                        @csrf
                        <button type="submit" class="w-full text-center px-3 py-3 rounded-md text-luxury-200 hover:bg-luxury-900 hover:text-red-400 transition duration-300 uppercase tracking-widest text-sm cursor-pointer">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-md text-luxury-200 hover:bg-luxury-900 hover:text-primary-300 transition duration-300">Login</a>
                    <a href="{{ route('register') }}" @click="mobileMenuOpen = false" class="block mx-4 my-2 py-3 rounded bg-gold-gradient text-luxury-950 font-bold hover:bg-gold-gradient-hover text-center transition duration-300">BOOK NOW</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content Grid -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Exquisite Footer -->
    <footer class="bg-luxury-950 border-t border-luxury-900/60 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Column 1: Brand Info -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <span class="font-serif text-2xl font-bold tracking-widest text-gold-200">LARITA</span>
                        <div class="w-1.5 h-1.5 rounded-full bg-primary-500 self-end mb-1.5"></div>
                    </a>
                    <p class="text-luxury-400 text-sm leading-relaxed">
                        Exquisite luxury crafted to perfection. A haven of tranquility combining classic elegance with sophisticated modern amenities.
                    </p>
                    <div class="flex space-x-4 pt-2">
                        <!-- Custom designed social icons for maximum premium aesthetic -->
                        <a href="#" class="w-8 h-8 rounded-full border border-luxury-800 flex items-center justify-center text-luxury-400 hover:text-primary-300 hover:border-primary-400 transition duration-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full border border-luxury-800 flex items-center justify-center text-luxury-400 hover:text-primary-300 hover:border-primary-400 transition duration-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full border border-luxury-800 flex items-center justify-center text-luxury-400 hover:text-primary-300 hover:border-primary-400 transition duration-300">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.518 3.545 12 3.545 12 3.545s-7.518 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.87.508 9.388.508 9.388.508s7.518 0 9.388-.508a3.003 3.003 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="text-gold-200 font-serif text-sm font-semibold tracking-wider uppercase mb-6">Explore</h3>
                    <ul class="space-y-3 text-sm text-luxury-400">
                        <li><a href="{{ route('home') }}#rooms" class="hover:text-primary-300 transition duration-200">Rooms & Suites</a></li>
                        <li><a href="{{ route('home') }}#facilities" class="hover:text-primary-300 transition duration-200">Wellness & Spa</a></li>
                        <li><a href="{{ route('home') }}#facilities" class="hover:text-primary-300 transition duration-200">Dining & Lounges</a></li>
                        <li><a href="{{ route('home') }}#tour" class="hover:text-primary-300 transition duration-200">Virtual Tour</a></li>
                    </ul>
                </div>

                <!-- Column 3: Contact & Info -->
                <div>
                    <h3 class="text-gold-200 font-serif text-sm font-semibold tracking-wider uppercase mb-6">Contact Us</h3>
                    <ul class="space-y-3 text-sm text-luxury-400">
                        <li class="flex items-start space-x-2">
                            <svg class="h-5 w-5 text-primary-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            <span>JL. Luxury Oasis No. 5, Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="h-5 w-5 text-primary-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.387a20.373 20.373 0 0 1-7.147-7.147c-.155-.441.011-.928.387-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <span>+62 (21) 8888-9999</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="h-5 w-5 text-primary-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span>reservations@laritaluxury.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Column 4: Newsletter -->
                <div>
                    <h3 class="text-gold-200 font-serif text-sm font-semibold tracking-wider uppercase mb-6">Newsletter</h3>
                    <p class="text-luxury-400 text-sm mb-4 leading-relaxed">Subscribe to receive exclusive offers, events, and seasonal privileges.</p>
                    <form class="space-y-2">
                        <div class="relative">
                            <input type="email" placeholder="Your Email Address" class="w-full bg-luxury-900 border border-luxury-800 rounded px-4 py-2.5 text-sm text-luxury-100 placeholder-luxury-500 focus:outline-none focus:border-primary-500 transition duration-300">
                            <button type="button" class="absolute right-2 top-2 text-primary-400 hover:text-primary-300 transition duration-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Bottom Line -->
            <div class="border-t border-luxury-900/60 pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-luxury-500">
                <p>&copy; {{ date('Y') }} Larita Luxury Hotel & Spa. All Rights Reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-luxury-300 transition duration-200">Privacy Policy</a>
                    <a href="#" class="hover:text-luxury-300 transition duration-200">Terms of Service</a>
                    <a href="#" class="hover:text-luxury-300 transition duration-200">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
