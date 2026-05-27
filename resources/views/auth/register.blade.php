@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 min-h-[calc(100vh-160px)] flex items-center justify-center">
    <div class="w-full max-w-5xl bg-luxury-900 border border-luxury-800/80 rounded-2xl overflow-hidden shadow-2xl grid grid-cols-1 lg:grid-cols-12">
        
        <!-- Left Panel: Exquisite Brand Showcase (Visible on Large Screens) -->
        <div class="hidden lg:block lg:col-span-5 relative overflow-hidden">
            <img src="{{ asset('images/story_room_1.png') }}" alt="Larita Luxury Story" class="w-full h-full object-cover scale-105 filter brightness-75">
            <div class="absolute inset-0 bg-gradient-to-t from-luxury-950 via-luxury-950/60 to-transparent"></div>
            
            <div class="absolute bottom-12 left-8 right-8 space-y-4">
                <span class="text-xs uppercase tracking-widest text-primary-400 font-semibold">ESTABLISHED 2012</span>
                <h3 class="font-serif text-3xl font-bold text-white leading-tight">Embark on a refined luxury journey</h3>
                <p class="text-xs text-luxury-300 font-light leading-relaxed">
                    Join the exclusive Larita membership club today to unlock a personalized concierge dashboard and enjoy special member rates on all suites.
                </p>
                <div class="flex items-center space-x-1.5 pt-2">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-4 h-4 text-primary-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Right Panel: Registration Form -->
        <div class="lg:col-span-7 p-8 sm:p-12 md:p-16 flex flex-col justify-center space-y-8 bg-luxury-900/60 backdrop-blur-md">
            
            <div class="space-y-2">
                <span class="text-xs uppercase tracking-widest text-primary-400 font-semibold">Join Exclusive Privileges</span>
                <h2 class="font-serif text-3xl font-bold text-white">Register Account</h2>
                <p class="text-xs text-luxury-400 font-light">Become a premium member for immediate Direct Booking privileges.</p>
            </div>

            <!-- Credentials Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name Input -->
                <div class="space-y-1">
                    <label for="name" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Full Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-luxury-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                        <input id="name" name="name" type="text" required autocomplete="name" value="{{ old('name') }}" placeholder="e.g. Johnathan Doe" class="w-full bg-luxury-950 border border-luxury-800 focus:border-primary-500 focus:outline-none rounded-lg pl-11 pr-4 py-3 text-sm text-luxury-200 placeholder-luxury-600 transition duration-300">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-400 font-medium block pt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="space-y-1">
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
                <div class="space-y-1">
                    <label for="password" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-luxury-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </span>
                        <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="••••••••" class="w-full bg-luxury-950 border border-luxury-800 focus:border-primary-500 focus:outline-none rounded-lg pl-11 pr-4 py-3 text-sm text-luxury-200 placeholder-luxury-600 transition duration-300">
                    </div>
                    @error('password')
                        <span class="text-xs text-red-400 font-medium block pt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-xs uppercase tracking-widest text-gold-200 font-semibold">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-luxury-500">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="••••••••" class="w-full bg-luxury-950 border border-luxury-800 focus:border-primary-500 focus:outline-none rounded-lg pl-11 pr-4 py-3 text-sm text-luxury-200 placeholder-luxury-600 transition duration-300">
                    </div>
                </div>

                <!-- Terms and Condition Checkbox -->
                <div class="flex items-center pt-2">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 bg-luxury-950 border-luxury-800 text-primary-500 focus:ring-primary-500 rounded cursor-pointer">
                    <label for="terms" class="ml-2.5 block text-xs tracking-wide text-luxury-400 cursor-pointer">I agree to direct booking policies and rules.</label>
                </div>

                <!-- Action Button -->
                <button type="submit" class="w-full bg-gold-gradient hover:bg-gold-gradient-hover text-luxury-950 font-bold py-3.5 rounded-lg tracking-widest text-xs transition duration-300 shadow-lg shadow-primary-500/20">
                    CREATE ACCOUNT
                </button>
            </form>

            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-luxury-800/80"></div>
                <span class="flex-shrink mx-4 text-luxury-500 text-xs tracking-wider uppercase font-semibold">Or Registered?</span>
                <div class="flex-grow border-t border-luxury-800/80"></div>
            </div>

            <!-- Login redirection link -->
            <div class="text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-primary-400 hover:text-primary-300 transition duration-300">
                    <span>SIGN IN TO YOUR ACCOUNT</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
