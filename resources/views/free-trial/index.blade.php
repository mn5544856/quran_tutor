@extends('layouts.app')

@section('title', 'Free Quran Trial Class Online | Ilm e Quran Academy')

@section('meta_description', 'Book a free online Quran trial class with expert teachers at Ilm e Quran Quran Academy. Learn Tajweed, Hifz, and Quran reading with personalized one-on-one sessions worldwide.')

@section('meta_keywords', 'ilm e quran, ilm ul quran, free Quran trial class, online Quran trial, Quran academy, Quran teacher online, Tajweed trial class, Hifz trial class, Quran learning free class')

@section('content')



    <!-- HERO SECTION -->
    <section class="bg-linear-to-r from-green-900 to-green-700 text-white py-20 text-center">
        <div class="max-w-5xl mx-auto px-4">

            <h1 class="text-3xl md:text-5xl font-bold leading-tight">
                Start Your Quran Journey with a
                <span class="text-yellow-400">Free Trial Class</span>
            </h1>

            <p class="mt-4 text-lg md:text-xl text-white/90">
                Experience our teaching methodology firsthand - No credit card required
            </p>

            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white/10 border border-white/20 rounded-xl p-4">
                    <i class="fas fa-clock text-yellow-400"></i>
                    <p class="mt-2">30 Minutes Free</p>
                </div>

                <div class="bg-white/10 border border-white/20 rounded-xl p-4">
                    <i class="fas fa-user-check text-yellow-400"></i>
                    <p class="mt-2">Meet Teacher</p>
                </div>

                <div class="bg-white/10 border border-white/20 rounded-xl p-4">
                    <i class="fas fa-chart-line text-yellow-400"></i>
                    <p class="mt-2">Level Assessment</p>
                </div>

                <div class="bg-white/10 border border-white/20 rounded-xl p-4">
                    <i class="fas fa-award text-yellow-400"></i>
                    <p class="mt-2">Personal Plan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- QUICK BOOKING -->
    <section class="bg-yellow-400 py-6">
        <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">

            <div>
                <h3 class="font-bold text-green-900 flex items-center gap-2">
                    <i class="fas fa-bolt"></i> Quick Booking Available
                </h3>
                <p class="text-sm text-gray-800">Limited spots available this week</p>
            </div>

            <a href="{{ route('free-trial.index') }}"
                class="bg-green-800 text-white px-5 py-3 rounded-full font-semibold hover:bg-green-900">
                Book Free Trial
            </a>

        </div>
    </section>

    <!-- PROCESS -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">

            <h2 class="text-3xl font-bold text-green-900">
                How Your Free Trial Works
            </h2>

            <p class="text-gray-600 mt-2">Simple 4-step process</p>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                @foreach($features as $index => $feature)
                    <div class="bg-white shadow-lg rounded-xl p-6 hover:-translate-y-2 transition">

                        <div class="text-green-800 text-2xl font-bold mb-2">
                            {{ $index + 1 }}
                        </div>

                        <i class="{{ $feature['icon'] }} text-green-700 text-3xl"></i>

                        <h4 class="mt-3 font-semibold text-green-900">
                            {{ $feature['title'] }}
                        </h4>

                        <p class="text-gray-600 text-sm mt-2">
                            {{ $feature['description'] }}
                        </p>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section id="booking-form" class="py-16 bg-gray-100">
        <div class="max-w-5xl mx-auto px-4 bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-green-800 text-white text-center p-8">
                <h2 class="text-3xl font-bold">Book Your Free Trial Class</h2>
                <p class="mt-2 text-white/90">Choose how you want to send your booking</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded m-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('free-trial.book') }}" method="POST" class="p-8 space-y-10" id="bookingForm">
                @csrf

                <input type="hidden" name="delivery_method" id="deliveryMethod" value="whatsapp">

                <!-- PERSONAL INFORMATION -->
                <div>
                    <h3 class="text-green-800 font-bold text-lg mb-4">Personal Information</h3>

                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- Name -->
                        <div>
                            <input type="text" name="name"
                                class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror"
                                placeholder="Full Name" value="{{ old('name') }}">

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <input type="email" name="email"
                                class="w-full border p-3 rounded-lg @error('email') border-red-500 @enderror"
                                placeholder="Email" value="{{ old('email') }}">

                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
<div class="flex gap-2">

    <!-- Country Code -->
    <div class="w-1/3">
        <input type="text" name="country_code"
            class="w-full border p-3 rounded-lg @error('country_code') border-red-500 @enderror"
            placeholder="+966"
            value="{{ old('country_code') }}">

        @error('country_code')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Phone Number -->
    <div class="w-2/3">
        <input type="text" name="phone"
            class="w-full border p-3 rounded-lg @error('phone') border-red-500 @enderror"
            placeholder="Phone Number"
            value="{{ old('phone') }}">

        @error('phone')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

</div>

                        <!-- Country -->
                        <div>
                            <input type="text" name="country"
                                class="w-full border p-3 rounded-lg @error('country') border-red-500 @enderror"
                                placeholder="Country" value="{{ old('country') }}">

                            @error('country')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- LEVEL -->
                <div>
                    <h3 class="text-green-800 font-bold text-lg mb-4">Student Level</h3>

                    <select name="current_level"
                        class="w-full border p-3 rounded-lg @error('current_level') border-red-500 @enderror">

                        <option value="">Select Level</option>
                        <option value="beginner" {{ old('current_level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="intermediate" {{ old('current_level') == 'intermediate' ? 'selected' : '' }}>
                            Intermediate</option>
                        <option value="advanced" {{ old('current_level') == 'advanced' ? 'selected' : '' }}>Advanced</option>

                    </select>

                    @error('current_level')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- COURSE -->
                <div>
                    <h3 class="text-green-800 font-bold text-lg mb-4">Course Selection</h3>

                    <select name="course" class="w-full border p-3 rounded-lg @error('course') border-red-500 @enderror">

                        <option value="">Select Course</option>
                        <option value="hifz" {{ old('course') == 'hifz' ? 'selected' : '' }}>Hifz</option>
                        <option value="tajweed" {{ old('course') == 'tajweed' ? 'selected' : '' }}>Tajweed</option>
                        <option value="noorani_qaida" {{ old('course') == 'noorani_qaida' ? 'selected' : '' }}>Noorani Qaida
                        </option>
                        <option value="basic_quran" {{ old('course') == 'basic_quran' ? 'selected' : '' }}>Basic Quran
                        </option>

                    </select>

                    @error('course')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTONS -->
                <div class="flex flex-col md:flex-row gap-4 justify-center">

                    <!-- WhatsApp -->
                    <button type="button" onclick="setMethodAndSubmit('whatsapp')"
                        class="flex items-center justify-center gap-2 bg-green-800 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-900 transition duration-200 shadow-md hover:shadow-lg w-full md:w-auto">

                        <x-bi-whatsapp class="w-5 h-5" />
                        <span>Send via WhatsApp</span>

                    </button>

                    <!-- Email -->
                    <button type="button" onclick="setMethodAndSubmit('email')"
                        class="flex items-center justify-center gap-2 bg-green-800 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-900 transition duration-200 shadow-md hover:shadow-lg w-full md:w-auto">

                        <x-heroicon-o-envelope class="w-5 h-5" />
                        <span>Send via Email</span>

                    </button>

                </div>
            </form>

            <!-- SCRIPT -->
            <script>
                function setMethodAndSubmit(method) {
                    document.getElementById('deliveryMethod').value = method;
                    document.getElementById('bookingForm').submit();
                }
            </script>
            <script>
                function setMethodAndSubmit(method) {
                    document.getElementById('deliveryMethod').value = method;
                    document.getElementById('bookingForm').submit();
                }
            </script>
        </div>
    </section>

    <script>
        function setMethodAndSubmit(method) {
            document.getElementById('deliveryMethod').value = method;
            document.getElementById('bookingForm').submit();
        }
    </script>

    {{-- No extra JavaScript needed --}}
@endsection