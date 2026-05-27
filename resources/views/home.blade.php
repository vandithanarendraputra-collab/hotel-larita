@extends('layouts.app')

@section('content')
<div x-data="{ bookingModalOpen: false, activeRoomType: 'Deluxe Haven Suite' }">
    
    <!-- Premium Alert Messages -->
    @if(session('success'))
        <div class="fixed bottom-5 right-5 z-50 animate-slide-up max-w-md bg-luxury-900 border border-primary-500/30 rounded-lg p-4 shadow-2xl flex items-start space-x-3" x-data="{ show: true }" x-show="show" x-transition>
            <div class="p-1 rounded-full bg-primary-500/20 text-primary-400">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="flex-grow">
                <h4 class="font-serif text-sm font-semibold text-gold-200">Success</h4>
                <p class="text-xs text-luxury-300 mt-1">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="text-luxury-500 hover:text-luxury-300">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if(session('info'))
        <div class="fixed bottom-5 right-5 z-50 animate-slide-up max-w-md bg-luxury-900 border border-primary-500/30 rounded-lg p-4 shadow-2xl flex items-start space-x-3" x-data="{ show: true }" x-show="show" x-transition>
            <div class="p-1 rounded-full bg-primary-500/20 text-primary-400">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-grow">
                <h4 class="font-serif text-sm font-semibold text-gold-200">Notification</h4>
                <p class="text-xs text-luxury-300 mt-1">{{ session('info') }}</p>
            </div>
            <button @click="show = false" class="text-luxury-500 hover:text-luxury-300">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <!-- HERO BANNER SECTION (Full Width with Premium Blur Effects) -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image overlay -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero_room.png') }}" alt="Larita Hero Banner" class="w-full h-full object-cover object-center scale-105 animate-blur-in duration-1000">
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-950 via-luxury-950/70 to-luxury-950/40"></div>
        </div>

        <!-- Floating Particles/Ambient Light -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-500/10 rounded-full blur-[120px] mix-blend-screen pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-gold-400/5 rounded-full blur-[120px] mix-blend-screen pointer-events-none"></div>

        <!-- Text Content -->
        <div class="relative max-w-5xl mx-auto px-4 text-center mt-20 z-10 space-y-6">
            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-luxury-900/60 border border-primary-500/30 backdrop-blur-md animate-fade-in">
                <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">★ 5-STAR LUXURY BOUTIQUE HOTEL ★</span>
            </div>
            
            <h1 class="font-serif text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight animate-slide-up">
                Escape to <br><span class="text-gold-gradient italic">Sensory Perfection</span>
            </h1>
            
            <p class="max-w-2xl mx-auto text-base sm:text-lg text-luxury-300 font-light leading-relaxed animate-slide-up duration-500">
                Designed for connoisseurs of elegant living. Immerse yourself in an urban sanctuary of timeless design, flawless personalized hospitality, and rich details.
            </p>

            <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4 animate-slide-up duration-700">
                <a href="#rooms" class="w-full sm:w-auto px-8 py-4 rounded bg-gold-gradient text-luxury-950 font-bold tracking-wider hover:scale-[1.02] transition duration-300 text-center shadow-lg shadow-primary-500/20">
                    EXPLORE ROOMS
                </a>
                <a href="#tour" class="w-full sm:w-auto px-8 py-4 rounded border border-luxury-500 text-white font-bold tracking-wider hover:bg-luxury-900/40 transition duration-300 text-center">
                    VIRTUAL TOUR
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-2 text-luxury-400 animate-bounce">
            <span class="text-xs uppercase tracking-widest">Scroll to Explore</span>
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
    </section>

    <!-- LIVE RESERVATION BAR (Smooth Floating layout) -->
    <section class="relative z-20 -mt-16 max-w-6xl mx-auto px-4">
        <div class="glass-card rounded-xl p-6 sm:p-8 shadow-2xl border border-primary-500/20">
            <form method="POST" action="{{ route('reservations.store') }}" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                @csrf
                <!-- Room Selection -->
                <div class="space-y-2">
                    <label for="room_type" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Select Suite</label>
                    <select id="room_type" name="room_type" class="w-full bg-luxury-900 border border-luxury-800 rounded px-3 py-3 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                        <option value="Standard Luxury Room">Standard Luxury Room</option>
                        <option value="Deluxe Haven Suite" selected>Deluxe Haven Suite</option>
                        <option value="Larita President Villa">Larita President Villa</option>
                    </select>
                </div>

                <!-- Check In Date -->
                <div class="space-y-2">
                    <label for="check_in" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Check-In</label>
                    <input type="date" id="check_in" name="check_in" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" class="w-full bg-luxury-900 border border-luxury-800 rounded px-3 py-2.5 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                </div>

                <!-- Check Out Date -->
                <div class="space-y-2">
                    <label for="check_out" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Check-Out</label>
                    <input type="date" id="check_out" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full bg-luxury-900 border border-luxury-800 rounded px-3 py-2.5 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                </div>

                <!-- Guests & Action -->
                <div class="grid grid-cols-3 gap-3 items-end">
                    <div class="col-span-1 space-y-2">
                        <label for="guests" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Guests</label>
                        <select id="guests" name="guests" class="w-full bg-luxury-900 border border-luxury-800 rounded px-2 py-3 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    
                    <div class="col-span-2">
                        @auth
                            <button type="submit" class="w-full bg-gold-gradient hover:bg-gold-gradient-hover text-luxury-950 font-bold py-3.5 px-4 rounded text-center tracking-wider text-xs transition duration-300 shadow-md">
                                BOOK NOW
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="block w-full bg-gold-gradient hover:bg-gold-gradient-hover text-luxury-950 font-bold py-3.5 px-4 rounded text-center tracking-wider text-xs transition duration-300 shadow-md">
                                BOOK NOW
                            </a>
                        @endauth
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- CORE FEATURES / VALUE PROP -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">Signature Values</span>
            <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white">Redefining boutique hospitality</h2>
            <div class="w-20 h-0.5 bg-primary-500 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="glass-card rounded-lg p-8 hover:translate-y-[-8px] transition-all duration-300 border border-luxury-900 group">
                <div class="w-12 h-12 rounded bg-primary-500/10 flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-luxury-950 transition duration-300 mb-6">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-serif text-gold-200 font-semibold mb-3">Heart of the City</h3>
                <p class="text-sm text-luxury-400 leading-relaxed">Perfect luxury oasis situated just minutes from Jakarta's high-end dining, arts, and shopping avenues.</p>
            </div>

            <!-- Feature 2 -->
            <div class="glass-card rounded-lg p-8 hover:translate-y-[-8px] transition-all duration-300 border border-luxury-900 group">
                <div class="w-12 h-12 rounded bg-primary-500/10 flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-luxury-950 transition duration-300 mb-6">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12h19.5m-19.5 0c0-2.485 2.015-4.5 4.5-4.5h10.5c2.485 0 4.5 2.015 4.5 4.5m-19.5 0c0 2.485 2.015 4.5 4.5 4.5h10.5c2.485 0 4.5-2.015 4.5-4.5" />
                    </svg>
                </div>
                <h3 class="text-lg font-serif text-gold-200 font-semibold mb-3">Luxurious Spaces</h3>
                <p class="text-sm text-luxury-400 leading-relaxed">Grand suites decorated with gold fixtures, velvet accents, and premium Egyptian linens for ultimate comfort.</p>
            </div>

            <!-- Feature 3 -->
            <div class="glass-card rounded-lg p-8 hover:translate-y-[-8px] transition-all duration-300 border border-luxury-900 group">
                <div class="w-12 h-12 rounded bg-primary-500/10 flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-luxury-950 transition duration-300 mb-6">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-serif text-gold-200 font-semibold mb-3">Welcoming Staff</h3>
                <p class="text-sm text-luxury-400 leading-relaxed">24/7 dedicated butler service designed to address every need, request, and detail with flawless care.</p>
            </div>

            <!-- Feature 4 -->
            <div class="glass-card rounded-lg p-8 hover:translate-y-[-8px] transition-all duration-300 border border-luxury-900 group">
                <div class="w-12 h-12 rounded bg-primary-500/10 flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-luxury-950 transition duration-300 mb-6">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <h3 class="text-lg font-serif text-gold-200 font-semibold mb-3">Best Price Match</h3>
                <p class="text-sm text-luxury-400 leading-relaxed">Book directly through our official channels to access exclusive resort privileges and best price match.</p>
            </div>
        </div>
    </section>

    <!-- WELCOME / STORY SECTION -->
    <section class="bg-luxury-900/40 py-24 border-y border-luxury-900/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                <!-- Left: Side-by-side Overlapping Images -->
                <div class="lg:col-span-6 grid grid-cols-2 gap-4 relative">
                    <div class="space-y-4">
                        <img src="{{ asset('images/story_room_1.png') }}" alt="Larita Welcoming Space" class="rounded-lg shadow-2xl hover:scale-[1.03] transition duration-500">
                        <div class="glass-card p-6 rounded-lg text-center border border-primary-500/20">
                            <span class="block text-3xl font-serif text-gold-200 font-bold">12+</span>
                            <span class="text-xs uppercase text-luxury-400 tracking-wider">Luxury Awards Won</span>
                        </div>
                    </div>
                    <div class="space-y-4 pt-12">
                        <div class="glass-card p-6 rounded-lg text-center border border-primary-500/20">
                            <span class="block text-3xl font-serif text-gold-200 font-bold">100%</span>
                            <span class="text-xs uppercase text-luxury-400 tracking-wider">Guest Privacy</span>
                        </div>
                        <img src="{{ asset('images/story_room_2.png') }}" alt="Larita Premium Details" class="rounded-lg shadow-2xl hover:scale-[1.03] transition duration-500">
                    </div>
                </div>

                <!-- Right: Typography Details -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">SINCE 2012</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white leading-tight">Welcome to an era of refined magnificence</h2>
                    <p class="text-luxury-300 text-base font-light leading-relaxed">
                        Nestled within Jakarta's most affluent center, Larita Luxury Hotel & Spa is the absolute height of premium boutique hospitality. Designed to celebrate outstanding luxury and delicate architectural forms, our suites evoke a profound emotional connection with the beauty of living.
                    </p>
                    <p class="text-luxury-400 text-sm leading-relaxed">
                        Every luxury room is custom tailored with warm lighting, golden details, pristine marbles, and custom modern audio systems. From the relaxing sounds of our deep indoor pools to the culinary masterpieces prepared by Michelin-starred culinary teams, Larita is a journey of wellness, luxury, and premium privacy.
                    </p>
                    
                    <div class="pt-4 flex items-center space-x-6">
                        <div>
                            <span class="font-serif text-lg font-bold text-gold-200 italic">Larita Grandeur</span>
                            <span class="block text-xs text-luxury-500 uppercase tracking-widest mt-1">Founder & Executive Director</span>
                        </div>
                        <div class="h-10 w-[1px] bg-luxury-800"></div>
                        <div class="flex items-center space-x-1">
                            @for($i=0; $i<5; $i++)
                                <svg class="w-5 h-5 text-primary-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ROOMS & SUITES COLLECTION -->
    <section id="rooms" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">EXCLUSIVE RETREATS</span>
            <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white">Our Rooms & Suites</h2>
            <div class="w-20 h-0.5 bg-primary-500 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Room 1: Standard Room -->
            <div class="glass-card rounded-xl overflow-hidden border border-luxury-900 flex flex-col justify-between group">
                <div class="relative overflow-hidden h-72">
                    <img src="{{ asset('images/room_standard.png') }}" alt="Standard Luxury Room" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-luxury-950 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-primary-500 text-luxury-950 text-xs font-extrabold uppercase px-2.5 py-1 rounded">BEST SELLER</span>
                    </div>
                </div>
                
                <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-serif font-bold text-white">Standard Luxury Room</h3>
                            <span class="text-primary-400 font-semibold font-serif">IDR 1,500K <span class="text-xs text-luxury-400 font-sans">/ night</span></span>
                        </div>
                        <p class="text-sm text-luxury-400 font-light leading-relaxed">
                            Sophisticated city retreat combining modern sleek interiors with grand window skylights.
                        </p>
                    </div>

                    <!-- Room Specs -->
                    <div class="flex items-center justify-between text-xs text-luxury-400 py-3 border-y border-luxury-900/60 my-2">
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>36 m²</span>
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>King Bed</span>
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>City View</span>
                    </div>

                    <div class="pt-2">
                        @auth
                            <button @click="activeRoomType = 'Standard Luxury Room'; bookingModalOpen = true" class="w-full text-center py-3 bg-luxury-900 border border-primary-500/30 text-gold-200 font-semibold rounded hover:bg-gold-gradient hover:text-luxury-950 transition duration-300 tracking-wider text-xs">
                                RESERVE NOW
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center py-3 bg-luxury-900 border border-primary-500/30 text-gold-200 font-semibold rounded hover:bg-gold-gradient hover:text-luxury-950 transition duration-300 tracking-wider text-xs">
                                RESERVE NOW
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Room 2: Deluxe Haven Suite -->
            <div class="glass-card rounded-xl overflow-hidden border border-primary-500/30 flex flex-col justify-between group shadow-2xl relative">
                <div class="absolute top-4 right-4 z-10">
                    <span class="bg-gold-gradient text-luxury-950 text-[10px] font-extrabold uppercase px-3 py-1 rounded shadow-md tracking-wider">MOST RECOMMENDED</span>
                </div>
                <div class="relative overflow-hidden h-72">
                    <img src="{{ asset('images/room_deluxe.png') }}" alt="Deluxe Haven Suite" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-luxury-950 via-transparent to-transparent"></div>
                </div>
                
                <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-serif font-bold text-white">Deluxe Haven Suite</h3>
                            <span class="text-primary-400 font-semibold font-serif">IDR 2,800K <span class="text-xs text-luxury-400 font-sans">/ night</span></span>
                        </div>
                        <p class="text-sm text-luxury-400 font-light leading-relaxed">
                            A majestic masterpiece equipped with standard private bar and gorgeous high-backed velvet chairs.
                        </p>
                    </div>

                    <!-- Room Specs -->
                    <div class="flex items-center justify-between text-xs text-luxury-400 py-3 border-y border-luxury-900/60 my-2">
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>55 m²</span>
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Super King Bed</span>
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>Horizon View</span>
                    </div>

                    <div class="pt-2">
                        @auth
                            <button @click="activeRoomType = 'Deluxe Haven Suite'; bookingModalOpen = true" class="w-full text-center py-3 bg-gold-gradient text-luxury-950 font-bold rounded hover:bg-gold-gradient-hover transition duration-300 tracking-wider text-xs">
                                RESERVE NOW
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center py-3 bg-gold-gradient text-luxury-950 font-bold rounded hover:bg-gold-gradient-hover transition duration-300 tracking-wider text-xs">
                                RESERVE NOW
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Room 3: Larita President Villa -->
            <div class="glass-card rounded-xl overflow-hidden border border-luxury-900 flex flex-col justify-between group">
                <div class="relative overflow-hidden h-72">
                    <img src="{{ asset('images/hero_room.png') }}" alt="Larita President Villa" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-luxury-950 via-transparent to-transparent"></div>
                </div>
                
                <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-serif font-bold text-white">Larita President Villa</h3>
                            <span class="text-primary-400 font-semibold font-serif">IDR 5,500K <span class="text-xs text-luxury-400 font-sans">/ night</span></span>
                        </div>
                        <p class="text-sm text-luxury-400 font-light leading-relaxed">
                            Ultra-spacious oasis containing premium marble bath, 24/7 dedicated butler service, and infinity pool access.
                        </p>
                    </div>

                    <!-- Room Specs -->
                    <div class="flex items-center justify-between text-xs text-luxury-400 py-3 border-y border-luxury-900/60 my-2">
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>110 m²</span>
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>Imperial Bed</span>
                        <span class="flex items-center"><svg class="h-4 w-4 mr-1 text-primary-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>Panoramic Pool</span>
                    </div>

                    <div class="pt-2">
                        @auth
                            <button @click="activeRoomType = 'Larita President Villa'; bookingModalOpen = true" class="w-full text-center py-3 bg-luxury-900 border border-primary-500/30 text-gold-200 font-semibold rounded hover:bg-gold-gradient hover:text-luxury-950 transition duration-300 tracking-wider text-xs">
                                RESERVE NOW
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center py-3 bg-luxury-900 border border-primary-500/30 text-gold-200 font-semibold rounded hover:bg-gold-gradient hover:text-luxury-950 transition duration-300 tracking-wider text-xs">
                                RESERVE NOW
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PREMIUM FACILITIES LIST -->
    <section id="facilities" class="bg-luxury-950 border-t border-luxury-900/60 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                <!-- Left Details -->
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">ELEVATED WELLNESS</span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white leading-tight">Masterfully curated world-class facilities</h2>
                    <div class="w-16 h-0.5 bg-primary-500 mt-4"></div>
                    <p class="text-luxury-400 text-sm leading-relaxed">
                        Treat yourself to absolute sensory alignment. Our premium resort incorporates highly customizable relaxation centers designed to feed the soul.
                    </p>
                    <div class="grid grid-cols-2 gap-6 pt-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2.5 h-2.5 rounded-full bg-primary-500"></div>
                            <span class="text-sm text-luxury-200">24/7 Room Concierge</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2.5 h-2.5 rounded-full bg-primary-500"></div>
                            <span class="text-sm text-luxury-200">Valet Valorous Parking</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2.5 h-2.5 rounded-full bg-primary-500"></div>
                            <span class="text-sm text-luxury-200">Michelin Dining Teams</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2.5 h-2.5 rounded-full bg-primary-500"></div>
                            <span class="text-sm text-luxury-200">High-Speed Fiber Wifi</span>
                        </div>
                    </div>
                </div>

                <!-- Right Facilities Grid -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Facility 1 -->
                    <div class="glass-card p-6 rounded-lg border border-luxury-900 flex space-x-4 items-start hover:border-primary-500/20 transition duration-300">
                        <div class="w-10 h-10 rounded-full bg-primary-500/10 flex items-center justify-center text-primary-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v18m9-9H3" /></svg>
                        </div>
                        <div>
                            <h4 class="font-serif font-semibold text-gold-200">Aura Spa & Wellness</h4>
                            <p class="text-xs text-luxury-400 mt-1 leading-relaxed">Relaxing facial cleanses, gold leaf massage tables, and custom essential floral oils.</p>
                        </div>
                    </div>

                    <!-- Facility 2 -->
                    <div class="glass-card p-6 rounded-lg border border-luxury-900 flex space-x-4 items-start hover:border-primary-500/20 transition duration-300">
                        <div class="w-10 h-10 rounded-full bg-primary-500/10 flex items-center justify-center text-primary-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.364l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-serif font-semibold text-gold-200">Grand Fine Dining</h4>
                            <p class="text-xs text-luxury-400 mt-1 leading-relaxed">Artfully plated gourmet plates, vintage champagne collection, and customized butler assistance.</p>
                        </div>
                    </div>

                    <!-- Facility 3 -->
                    <div class="glass-card p-6 rounded-lg border border-luxury-900 flex space-x-4 items-start hover:border-primary-500/20 transition duration-300">
                        <div class="w-10 h-10 rounded-full bg-primary-500/10 flex items-center justify-center text-primary-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-serif font-semibold text-gold-200">Larita Rooftop Lounge</h4>
                            <p class="text-xs text-luxury-400 mt-1 leading-relaxed">Stunning city skyline view, hand-crafted cocktails, and ambient live saxophone melodies.</p>
                        </div>
                    </div>

                    <!-- Facility 4 -->
                    <div class="glass-card p-6 rounded-lg border border-luxury-900 flex space-x-4 items-start hover:border-primary-500/20 transition duration-300">
                        <div class="w-10 h-10 rounded-full bg-primary-500/10 flex items-center justify-center text-primary-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12.006 15.668v.008M12 12a3 3 0 110-6 3 3 0 010 6z" /></svg>
                        </div>
                        <div>
                            <h4 class="font-serif font-semibold text-gold-200">Thermal Infinity Pool</h4>
                            <p class="text-xs text-luxury-400 mt-1 leading-relaxed">Relaxing warm heated pool with modern glass walling and premium outdoor daybed suites.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VIDEO TOUR SECTION -->
    <section id="tour" class="relative py-32 overflow-hidden flex items-center justify-center" x-data="{ playModalOpen: false }">
        <div class="absolute inset-0">
            <img src="{{ asset('images/video_pool.png') }}" alt="Larita Luxury Pool Teaser" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-luxury-950/80 backdrop-blur-[2px]"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 text-center z-10 space-y-6">
            <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">THE VIRTUAL EXPERIENCES</span>
            <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white">Experience Larita before your arrival</h2>
            <p class="max-w-xl mx-auto text-sm text-luxury-300 font-light leading-relaxed">
                Take a breathtaking virtual look inside our deluxe rooms, private bars, heated thermal pool center, and magnificent lobby rooms.
            </p>

            <div class="pt-4">
                <!-- Play Button with Ripple Effect -->
                <button @click="playModalOpen = true" class="relative group inline-flex items-center justify-center w-24 h-24 rounded-full bg-gold-gradient text-luxury-950 hover:scale-110 transition duration-300 focus:outline-none shadow-2xl">
                    <span class="absolute inset-0 rounded-full bg-primary-500/30 animate-ping group-hover:animate-none"></span>
                    <svg class="w-8 h-8 fill-current translate-x-1" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- YOUTUBE VIDEO PLAY MODAL -->
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-luxury-950/95 backdrop-blur-md" x-show="playModalOpen" x-transition x-cloak>
            <div class="relative w-full max-w-5xl aspect-video rounded-lg overflow-hidden border border-primary-500/30 shadow-2xl" @click.outside="playModalOpen = false">
                <!-- Close Button -->
                <button @click="playModalOpen = false" class="absolute top-4 right-4 z-50 p-2.5 rounded-full bg-luxury-950/80 border border-luxury-800 text-luxury-300 hover:text-white transition duration-300 cursor-pointer">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                
                <!-- Video Iframe -->
                <template x-if="playModalOpen">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/t3R7p_9g2L0?autoplay=1&rel=0" title="Larita Luxury Hotel & Spa Tour" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </template>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS / GUEST REVIEWS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24" x-data="{ activeSlide: 0 }">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-primary-400 text-xs font-semibold tracking-widest uppercase">GUEST STATEMENTS</span>
            <h2 class="font-serif text-3xl sm:text-5xl font-bold text-white">Loved by modern world travelers</h2>
            <div class="w-20 h-0.5 bg-primary-500 mx-auto mt-4"></div>
        </div>

        <!-- Slider quotes -->
        <div class="relative max-w-3xl mx-auto text-center px-4">
            <!-- Quote 1 -->
            <div x-show="activeSlide === 0" x-transition:enter="transition ease-out duration-300" class="space-y-6">
                <span class="text-6xl font-serif text-primary-500/20 block h-6 leading-none">“</span>
                <p class="text-lg sm:text-xl text-luxury-200 font-light leading-relaxed italic">
                    An absolutely spectacular boutique getaway! The gold accents, deep marble finishing in the Deluxe Haven Suite, and custom concierge services were masterfully curated. The staff felt more like trusted friends than hotel employees. I will return!
                </p>
                <div>
                    <h4 class="font-serif font-bold text-gold-200 text-base">Seraphina Sterling</h4>
                    <span class="text-xs uppercase text-luxury-500 tracking-wider">Luxury Lifestyle Critic</span>
                </div>
            </div>

            <!-- Quote 2 -->
            <div x-show="activeSlide === 1" x-transition:enter="transition ease-out duration-300" x-cloak class="space-y-6">
                <span class="text-6xl font-serif text-primary-500/20 block h-6 leading-none">“</span>
                <p class="text-lg sm:text-xl text-luxury-200 font-light leading-relaxed italic">
                    Larita is the definitive sanctuary in Jakarta. Finding premium luxury spaces with complete silence and privacy is extremely rare, but they accomplished it flawlessly. The thermal infinity pool is absolutely out of this world!
                </p>
                <div>
                    <h4 class="font-serif font-bold text-gold-200 text-base">Maximilian Vane</h4>
                    <span class="text-xs uppercase text-luxury-500 tracking-wider">Global Travel Photographer</span>
                </div>
            </div>

            <!-- Dots -->
            <div class="flex justify-center space-x-3 mt-10">
                <button @click="activeSlide = 0" :class="activeSlide === 0 ? 'bg-primary-500 w-8' : 'bg-luxury-800 w-2'" class="h-2 rounded-full transition-all duration-300 cursor-pointer"></button>
                <button @click="activeSlide = 1" :class="activeSlide === 1 ? 'bg-primary-500 w-8' : 'bg-luxury-800 w-2'" class="h-2 rounded-full transition-all duration-300 cursor-pointer"></button>
            </div>
        </div>
    </section>

    <!-- FLOATING BOOKING MODAL (Alpine.js integrated for quick reservation) -->
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-luxury-950/80 backdrop-blur-sm" x-show="bookingModalOpen" x-transition x-cloak>
        <div class="relative w-full max-w-lg bg-luxury-900 border border-primary-500/30 rounded-xl p-8 shadow-2xl" @click.outside="bookingModalOpen = false">
            <button @click="bookingModalOpen = false" class="absolute top-4 right-4 text-luxury-500 hover:text-luxury-300 cursor-pointer">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="font-serif text-2xl font-bold text-white mb-2">Book Your Retreat</h3>
            <p class="text-xs text-luxury-400 mb-6">Confirm your premium reservation for: <span class="text-gold-200 font-semibold" x-text="activeRoomType"></span></p>

            <form method="POST" action="{{ route('reservations.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="room_type" :value="activeRoomType">
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label for="modal_check_in" class="text-xs uppercase text-gold-200 font-semibold">Check-In</label>
                        <input type="date" id="modal_check_in" name="check_in" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" class="w-full bg-luxury-950 border border-luxury-800 rounded px-3 py-2.5 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                    </div>
                    
                    <div class="space-y-1">
                        <label for="modal_check_out" class="text-xs uppercase text-gold-200 font-semibold">Check-Out</label>
                        <input type="date" id="modal_check_out" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full bg-luxury-950 border border-luxury-800 rounded px-3 py-2.5 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label for="modal_guests" class="text-xs uppercase text-gold-200 font-semibold">Guests</label>
                        <select id="modal_guests" name="guests" class="w-full bg-luxury-950 border border-luxury-800 rounded px-3 py-2.5 text-sm text-luxury-200 focus:outline-none focus:border-primary-500">
                            <option value="1">1 Guest</option>
                            <option value="2" selected>2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4 Guests</option>
                        </select>
                    </div>
                    
                    <div class="space-y-1">
                        <label for="modal_special" class="text-xs uppercase text-gold-200 font-semibold">Special Requests</label>
                        <input type="text" id="modal_special" name="special_requests" placeholder="e.g. champagne, flowers" class="w-full bg-luxury-950 border border-luxury-800 rounded px-3 py-2.5 text-sm text-luxury-200 placeholder-luxury-600 focus:outline-none focus:border-primary-500">
                    </div>
                </div>

                <div class="pt-4 border-t border-luxury-800/60 flex items-center justify-between text-sm text-luxury-400">
                    <span>Direct Booking privileges active</span>
                    <button type="submit" class="bg-gold-gradient hover:bg-gold-gradient-hover text-luxury-950 font-bold py-3 px-6 rounded tracking-widest text-xs transition duration-300 shadow-lg">
                        CONFIRM BOOKING
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
