{{-- resources/views/errors/404.blade.php --}}

@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')

<section class="relative min-h-screen bg-gradient-to-br from-green-900 to-green-700 overflow-hidden flex items-center">

    <!-- Background image -->
    <div class="absolute inset-0 opacity-10">
        <img src="https://images.unsplash.com/photo-1519817650390-64a93db511aa?auto=format&fit=crop&w=1400&q=80"
             alt="Quran Background"
             class="w-full h-full object-cover"
             loading="lazy"
             decoding="async">
    </div>

    <div class="relative max-w-4xl mx-auto px-4 text-center text-white">

        <!-- 404 -->
        <h1 class="text-7xl md:text-9xl font-extrabold text-yellow-300 drop-shadow-lg">
            404
        </h1>

        <!-- Heading -->
        <h2 class="mt-6 text-3xl md:text-5xl font-bold leading-tight">
            Page Not Found
        </h2>

        <!-- Description -->
        <p class="mt-6 text-lg md:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed">
            The page you are looking for does not exist or may have been moved.
            Continue your Quran learning journey from the homepage.
        </p>

        <!-- CTA buttons -->
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">

            <a href="{{ route('home') }}"
               class="bg-yellow-400 text-green-900 font-semibold px-8 py-3 rounded-full hover:bg-yellow-300 transition shadow-lg hover:scale-105">
                Back to Home
            </a>

            <a href="{{ route('courses.index') }}"
               class="border border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-green-900 transition">
                View Courses
            </a>

        </div>

        <!-- Extra trust line -->
        <div class="mt-12 flex flex-wrap justify-center gap-4 text-sm text-white/70">

            <span>✔ One-on-One Quran Classes</span>
            <span>✔ Flexible Timings</span>
            <span>✔ Tajweed Learning</span>
            <span>✔ Kids & Adults</span>

        </div>

    </div>

</section>

@endsection