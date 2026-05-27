@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 min-h-[calc(100vh-160px)] flex items-center justify-center">
    <div class="w-full max-w-5xl bg-luxury-900 border border-luxury-800/80 rounded-2xl overflow-hidden shadow-2xl grid grid-cols-1 lg:grid-cols-12">
        
        <!-- Left Panel: Exquisite Brand Showcase (Visible on Large Screens) -->
        <div class="hidden lg:block lg:col-span-5 relative overflow-hidden">
            <img src="{{ asset('images/story_room_2.png') }}" alt="Larita Luxury Detail" class="w-full h-full object-cover scale-105 filter brightness-75">
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-950 via-luxury-950/60 to-transparent"></div>
            
            <div class="absolute bottom-12 left-8 right-8 space-y-4">
                <span class="text-xs uppercase tracking-widest text-primary-400 font-semibold">ESTABLISHED 2012</span>
                <h3 class="font-serif text-3xl font-bold text-white leading-tight">Every detail is masterfully curated</h3>
                <p class="text-xs text-luxury-300 font-light leading-relaxed">
                    Access your official Larita account to view reservations, customize concierge priorities, and enjoy direct booking privileges.
                </p>
                <div class="flex items-center space-x-1.5 pt-2">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-4 h-4 text-primary-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Right Panel: Login Credentials Form -->
        <div class="lg:col-span-7 p-8 sm:p-12 md:p-16 flex flex-col justify-center space-y-8 bg-luxury-900/60 backdrop-blur-md">
            
            <div class="space-y-2">
                <span class="text-xs uppercase tracking-widest text-primary-400 font-semibold">Welcome Back</span>
                <h2 class="font-serif text-3xl font-bold text-white">Login to Larita</h2>
                <p class="text-xs text-luxury-400 font-light">Enter your credentials below to access your sanctuary.</p>
            </div>

            <!-- Credentials Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Input -->
                <div class="space-y-2">
                    <label for="email" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-luxury-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                            </svg>
                        </span>
                        <input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}" placeholder="e.g. guest@laritaluxury.com" class="w-full bg-luxury-950 border border-luxury-800 focus:border-primary-500 focus:outline-none rounded-lg pl-11 pr-4 py-3 text-sm text-luxury-200 placeholder-luxury-600 transition duration-300">
                    </div>
                    @error('email')
                        <span class="text-xs text-red-400 font-medium block pt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="space-y-2" x-data="{ show: false }">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-xs uppercase tracking-widest text-gold-200 font-semibold">Password</label>
                        <a href="#" class="text-xs text-primary-400 hover:text-primary-300 transition duration-200">Forgot Password?</a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-luxury-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password" name="password" :type="show ? 'text' : 'password'" required autocomplete="current-password" placeholder="••••••••" class="w-full bg-luxury-950 border border-luxury-800 focus:border-primary-500 focus:outline-none rounded-lg pl-11 pr-11 py-3 text-sm text-luxury-200 placeholder-luxury-600 transition duration-300">
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-luxury-500 hover:text-luxury-300 focus:outline-none cursor-pointer">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" x-show="!show">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" x-show="show" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Toggle -->
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 bg-luxury-950 border-luxury-800 text-primary-500 focus:ring-primary-500 rounded cursor-pointer">
                    <label for="remember" class="ml-2.5 block text-xs tracking-wide text-luxury-400 cursor-pointer">Remember my device</label>
                </div>

                <!-- Action Button -->
                <button type="submit" class="w-full bg-gold-gradient hover:bg-gold-gradient-hover text-luxury-950 font-bold py-3.5 rounded-lg tracking-widest text-xs transition duration-300 shadow-lg shadow-primary-500/20">
                    SIGN IN
                </button>
            </form>

            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-luxury-800/80"></div>
                <span class="flex-shrink mx-4 text-luxury-500 text-xs tracking-wider uppercase font-semibold">Or New Guest?</span>
                <div class="flex-grow border-t border-luxury-800/80"></div>
            </div>

            <!-- Register redirection link -->
            <div class="text-center">
                <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-primary-400 hover:text-primary-300 transition duration-300">
                    <span>CREATE A NEW ACCOUNT</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
