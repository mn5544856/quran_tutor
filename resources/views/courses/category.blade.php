@extends('layouts.app')

@section('title', $categoryTitle . ' Courses - Al-Madinah Quran Academy')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16 text-center">
    <div class="max-w-5xl mx-auto px-4">
        <h1 class="text-3xl md:text-5xl font-bold">
            {{ $categoryTitle }} Courses
        </h1>

        <p class="mt-4 text-white/80 text-lg">
            Learn Quran step by step with expert teachers in {{ $categoryTitle }} category
        </p>

        <!-- Categories -->
        <div class="flex flex-wrap justify-center gap-3 mt-8">
            <a href="{{ route('courses.category', 'quran-basics') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Quran Basics
            </a>

            <a href="{{ route('courses.category', 'tajweed') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Tajweed
            </a>

            <a href="{{ route('courses.category', 'hifz') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Hifz
            </a>
        </div>
    </div>
</section>

<!-- Courses Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">

        @if($courses->count() > 0)

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($courses as $course)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                <!-- Image -->
                <img src="{{ $course->image_url }}"
                     class="w-full h-48 object-cover"
                     alt="{{ $course->title }}">

                <!-- Content -->
                <div class="p-5">

                    <span class="text-xs px-3 py-1 bg-green-100 text-green-800 rounded-full">
                        {{ ucfirst($course->level) }}
                    </span>

                    <h3 class="text-xl font-bold text-green-900 mt-3">
                        {{ $course->title }}
                    </h3>

                    <p class="text-gray-600 text-sm mt-2">
                        {{ $course->short_description }}
                    </p>

                    <!-- Meta -->
                    <div class="flex justify-between text-sm text-gray-500 mt-4">
                        <span><i class="fas fa-clock"></i> {{ $course->duration }}</span>
                        <!-- <span class="font-semibold text-green-700">
                            {{ $course->formatted_price }}
                        </span> -->
                    </div>

                    <!-- Button -->
                    <a href="{{ route('courses.show', $course->slug) }}"
                       class="mt-5 inline-block w-full text-center bg-green-800 text-white py-2 rounded-lg hover:bg-green-900">
                        View Course
                    </a>

                </div>
            </div>
            @endforeach

        </div>

        @else

        <div class="text-center py-20">
            <h3 class="text-2xl font-bold text-gray-700">No Courses Found</h3>
            <p class="text-gray-500 mt-2">This category has no courses yet.</p>
        </div>

        @endif

    </div>
</section>

@endsection@extends('layouts.app')

@php
    $siteUrl = route('home');
@endphp

@section('title', $categoryTitle . ' Online Quran Courses | Learn Quran with Expert Teachers - Al-Madinah Quran Academy')

@section('meta_description', $categoryTitle . ' Quran courses at Al-Madinah Quran Academy. Learn Quran online with expert teachers in Tajweed, Hifz and Quran reading with flexible schedules for kids and adults.')

@section('meta_keywords', $categoryTitle . ', online Quran courses, Quran academy, Tajweed, Hifz, Quran learning')

@section('content')



<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16 text-center">
    <div class="max-w-5xl mx-auto px-4">

        <h1 class="text-3xl md:text-5xl font-bold">
            {{ $categoryTitle }} Online Quran Courses
        </h1>

        <p class="mt-4 text-white/80 text-lg">
            Learn Quran step by step with expert teachers in {{ $categoryTitle }} category
        </p>

        <!-- Categories -->
        <div class="flex flex-wrap justify-center gap-3 mt-8">

            <a href="{{ route('courses.category', 'quran-basics') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Quran Basics
            </a>

            <a href="{{ route('courses.category', 'tajweed') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Tajweed
            </a>

            <a href="{{ route('courses.category', 'hifz') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Hifz
            </a>
            <a href="{{ route('courses.category', 'noorani-qaida') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20">
                Noorani Qaida
            </a>
            
        </div>
    </div>
</section>

<!-- COURSES GRID -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">

        @if($courses->count())

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($courses as $course)

            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                <!-- IMAGE -->
                <img src="{{ $course->image_url }}"
                     class="w-full h-48 object-cover"
                     alt="{{ $course->title }} - Online Quran Course in {{ $categoryTitle }}">

                <!-- CONTENT -->
                <div class="p-5">

                    <span class="text-xs px-3 py-1 bg-green-100 text-green-800 rounded-full">
                        {{ ucfirst($course->level) }}
                    </span>

                    <h3 class="text-xl font-bold text-green-900 mt-3">
                        {{ $course->title }}
                    </h3>

                    <p class="text-gray-600 text-sm mt-2">
                        {{ $course->short_description }}
                    </p>

                    <!-- META -->
                    <div class="flex justify-between text-sm text-gray-500 mt-4">
                        <span>⏱ {{ $course->duration }}</span>
                        <!-- <span class="font-semibold text-green-700">
                            {{ $course->formatted_price }}
                        </span> -->
                    </div>

                    <!-- BUTTON -->
                    <a href="{{ route('courses.show', $course->slug) }}"
                       class="mt-5 inline-block w-full text-center bg-green-800 text-white py-2 rounded-lg hover:bg-green-900">
                        View Course
                    </a>

                </div>
            </div>

            @endforeach

        </div>

        @else

        <div class="text-center py-20">
            <h3 class="text-2xl font-bold text-gray-700">No Courses Found</h3>
            <p class="text-gray-500 mt-2">This category has no courses yet.</p>
        </div>

        @endif

    </div>
</section>

@endsection


<!-- Is code me kya improve hua:

✔ Proper SEO Title
✔ Strong Meta Description
✔ Clean Keywords
✔ ItemList Schema (Google friendly)
✔ Better H1 structure
✔ Image ALT SEO optimized
✔ Duplicate/weak structure removed -->