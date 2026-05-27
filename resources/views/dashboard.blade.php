@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 min-h-[calc(100vh-160px)]">
    
    <!-- Top Greeting Banner -->
    <div class="glass-card rounded-2xl p-8 mb-10 border border-primary-500/20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary-500/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="space-y-2">
                <span class="text-xs uppercase tracking-widest text-primary-400 font-semibold">GUEST DASHBOARD</span>
                <h1 class="font-serif text-3xl sm:text-4xl font-bold text-white">Welcome back, {{ Auth::user()->name }}</h1>
                <p class="text-xs text-luxury-400 font-light">Manage your premium reservations, request in-room concierge priorities, and review direct booking benefits.</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="px-5 py-3.5 rounded bg-luxury-900 border border-luxury-800 text-center">
                    <span class="block text-xs text-luxury-500 uppercase tracking-widest font-semibold">Direct Bookings</span>
                    <span class="text-xl font-serif text-gold-200 font-bold mt-1">{{ count($reservations) }}</span>
                </div>
                <div class="px-5 py-3.5 rounded bg-luxury-900 border border-luxury-800 text-center">
                    <span class="block text-xs text-luxury-500 uppercase tracking-widest font-semibold">Member Tier</span>
                    <span class="text-xl font-serif text-gold-200 font-bold mt-1">Gold Premium</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Reservations Container -->
    <div class="space-y-6">
        <div class="flex justify-between items-center border-b border-luxury-900 pb-4">
            <h2 class="font-serif text-2xl font-semibold text-white">Active Room Reservations</h2>
            <a href="{{ route('home') }}#rooms" class="inline-flex items-center space-x-2 text-xs font-semibold text-primary-400 hover:text-primary-300 transition duration-300">
                <span>RESERVE ANOTHER ROOM</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>

        @if($reservations->isEmpty())
            <!-- Exquisite empty state -->
            <div class="glass-card rounded-xl p-12 text-center border border-luxury-900 space-y-6 max-w-2xl mx-auto mt-6">
                <div class="w-16 h-16 rounded-full bg-primary-500/10 flex items-center justify-center text-primary-400 mx-auto">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="space-y-2">
                    <h3 class="font-serif text-xl font-semibold text-white">No Active Reservations</h3>
                    <p class="text-xs text-luxury-400 font-light leading-relaxed max-w-sm mx-auto">
                        You have not scheduled any premium stays yet. Explore our custom 5-star rooms to schedule your next urban getaway.
                    </p>
                </div>
                <a href="{{ route('home') }}#rooms" class="inline-block bg-gold-gradient hover:bg-gold-gradient-hover text-luxury-950 font-bold py-3 px-8 rounded tracking-widest text-xs transition duration-300 shadow-lg">
                    BOOK A RETREAT NOW
                </a>
            </div>
        @else
            <!-- Exquisite responsive table/cards layout -->
            <div class="overflow-x-auto shadow-2xl rounded-xl border border-luxury-900 bg-luxury-900/40">
                <table class="min-w-full divide-y divide-luxury-900">
                    <thead class="bg-luxury-900/80 uppercase tracking-widest text-[10px] text-gold-200 font-semibold">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left">Room Selection</th>
                            <th scope="col" class="px-6 py-4 text-left">Stay Interval</th>
                            <th scope="col" class="px-6 py-4 text-left">Guests</th>
                            <th scope="col" class="px-6 py-4 text-left">Special requests</th>
                            <th scope="col" class="px-6 py-4 text-left">Status</th>
                            <th scope="col" class="px-6 py-4 class-left"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-luxury-900 text-xs text-luxury-300 font-light">
                        @foreach($reservations as $res)
                            <tr class="hover:bg-luxury-900/20 transition duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3.5">
                                        <div class="w-12 h-10 rounded overflow-hidden shrink-0 border border-luxury-800">
                                            @if($res->room_type == 'Standard Luxury Room')
                                                <img src="{{ asset('images/room_standard.png') }}" alt="Room standard" class="w-full h-full object-cover">
                                            @elseif($res->room_type == 'Deluxe Haven Suite')
                                                <img src="{{ asset('images/room_deluxe.png') }}" alt="Room deluxe" class="w-full h-full object-cover">
                                            @else
                                                <img src="{{ asset('images/hero_room.png') }}" alt="Room president" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div>
                                            <span class="block text-sm font-semibold text-white font-serif">{{ $res->room_type }}</span>
                                            <span class="text-[10px] uppercase text-primary-400 tracking-wider">★ Direct Booking</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-1">
                                        <div class="flex items-center space-x-1">
                                            <span class="text-luxury-500 font-semibold">IN:</span>
                                            <span class="text-luxury-200">{{ \Carbon\Carbon::parse($res->check_in)->format('M d, Y') }}</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <span class="text-luxury-500 font-semibold">OUT:</span>
                                            <span class="text-luxury-200">{{ \Carbon\Carbon::parse($res->check_out)->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 rounded bg-luxury-950 border border-luxury-850 font-semibold text-gold-200">
                                        {{ $res->guests }} {{ $res->guests > 1 ? 'Guests' : 'Guest' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs italic text-luxury-400">
                                        {{ $res->special_requests ?? 'No specific requests submitted' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        ● {{ $res->status ?? 'Confirmed' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <button class="text-luxury-550 hover:text-red-400 transition duration-300 font-semibold text-xs cursor-pointer">
                                        Cancel Stays
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
@endsection
