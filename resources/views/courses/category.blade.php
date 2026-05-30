@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', $categoryTitle . ' Online Quran Courses | Learn Quran with Expert Teachers - Ilm-e-Quran')

@section('meta_description', $categoryTitle . ' Quran courses at Ilm-e-Quran. Learn Quran online with expert teachers in Tajweed, Hifz, Noorani Qaida and Quran reading. Flexible schedules for kids and adults worldwide.')

@section('meta_keywords', $categoryTitle . ', online Quran courses, Noorani Qaida, Tajweed, Hifz, Quran learning, Ilm-e-Quran')

@section('content')

<!-- HERO SECTION -->
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16 md:py-20 text-center">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">

        <h1 class="text-3xl md:text-5xl font-bold leading-tight">
            {{ $categoryTitle }} Online Quran Courses
        </h1>

        <p class="mt-4 text-white/80 text-base md:text-lg max-w-2xl mx-auto">
            Learn Quran step by step with expert teachers in {{ $categoryTitle }} category
        </p>

        <!-- Category Navigation -->
        <div class="flex flex-wrap justify-center gap-3 mt-8">
            <a href="{{ route('courses.category', 'quran-basics') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm md:text-base {{ $categoryTitle == 'Quran Basics' ? 'bg-white/30' : '' }}">
                Quran Basics
            </a>

            <a href="{{ route('courses.category', 'noorani-qaida') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm md:text-base {{ $categoryTitle == 'Noorani Qaida' ? 'bg-white/30' : '' }}">
                Noorani Qaida
            </a>

            <a href="{{ route('courses.category', 'tajweed') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm md:text-base {{ $categoryTitle == 'Tajweed' ? 'bg-white/30' : '' }}">
                Tajweed
            </a>

            <a href="{{ route('courses.category', 'hifz') }}"
               class="px-4 py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm md:text-base {{ $categoryTitle == 'Hifz' ? 'bg-white/30' : '' }}">
                Hifz Program
            </a>
        </div>
    </div>
</section>

<!-- COURSES GRID SECTION -->
<section class="py-16 md:py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <!-- Section Header with Course Count -->
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-semibold text-green-800">
                {{ $categoryTitle }} Courses
            </h2>
            <p class="text-gray-500 mt-2">
                Total {{ $courses->total() }} courses available
            </p>
        </div>

        @if(isset($courses) && $courses->count() > 0)

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

            @foreach($courses as $course)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">

                <!-- Course Image with overlay -->
                <div class="relative overflow-hidden h-48 md:h-56">
                    <img src="{{ $course->image_url ?? asset('images/default-course.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                         alt="{{ $course->title }} - {{ $categoryTitle }} Quran Course"
                         onerror="this.src='{{ asset('images/placeholder.jpg') }}'">

                    <!-- Level Badge on Image -->
                    <div class="absolute top-3 left-3">
                        <span class="text-xs px-3 py-1 bg-green-600 text-white rounded-full shadow">
                            {{ ucfirst($course->level ?? $categoryTitle) }}
                        </span>
                    </div>

                    <!-- Featured Badge -->
                    @if(isset($course->is_featured) && $course->is_featured)
                    <div class="absolute top-3 right-3">
                        <span class="text-xs px-3 py-1 bg-yellow-400 text-green-900 rounded-full font-semibold shadow">
                            ⭐ Featured
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Course Content -->
                <div class="p-5 md:p-6">

                    <h3 class="text-lg md:text-xl font-bold text-green-900 line-clamp-2 mb-2">
                        {{ $course->title }}
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                        {{ Str::limit($course->short_description ?? 'Learn Quran with expert teachers at Ilm-e-Quran. Comprehensive online Quran course for all levels.', 120) }}
                    </p>

                    <!-- Course Meta Info -->
                    <div class="flex justify-between items-center mt-4 pt-3 border-t border-gray-100">
                        <div class="flex items-center gap-1 text-gray-500 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ $course->duration ?? 'Flexible' }}</span>
                        </div>

                        @if(isset($course->price) && $course->price)
                        <div class="text-green-700 font-bold">
                            ${{ number_format($course->price, 2) }}
                        </div>
                        @else
                        <div class="text-green-700 font-semibold text-sm">
                            Contact Us
                        </div>
                        @endif
                    </div>

                    <!-- View Details Button -->
                    <a href="{{ route('courses.show', $course->slug) }}"
                       class="mt-5 inline-flex items-center justify-center w-full bg-green-800 hover:bg-green-700 text-white py-2.5 rounded-lg font-semibold transition-colors duration-300 gap-2">
                        View Course Details
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                </div>
            </div>
            @endforeach

        </div>

        <!-- Pagination -->
        @if(method_exists($courses, 'links'))
        <div class="mt-12">
            {{ $courses->links() }}
        </div>
        @endif

        @else

        <!-- Empty State -->
        <div class="text-center py-16 md:py-20 bg-white rounded-xl shadow-sm">
            <div class="text-6xl mb-4">📚</div>
            <h3 class="text-xl md:text-2xl font-bold text-gray-700 mb-2">
                No Courses Found
            </h3>
            <p class="text-gray-500 max-w-md mx-auto">
                No courses available in {{ $categoryTitle }} category at the moment. 
                Please check back later or browse other categories.
            </p>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <a href="{{ route('courses.index') }}" 
                   class="inline-block bg-green-700 text-white px-6 py-2 rounded-lg hover:bg-green-800 transition">
                    Browse All Courses
                </a>
                <a href="{{ route('free-trial.index') }}" 
                   class="inline-block border border-green-700 text-green-700 px-6 py-2 rounded-lg hover:bg-green-50 transition">
                    Start Free Trial
                </a>
            </div>
        </div>

        @endif

    </div>
</section>



@endsection

<!-- Custom Styles for better mobile experience -->
@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    @media (max-width: 640px) {
        .line-clamp-2 {
            -webkit-line-clamp: 1;
        }
        .line-clamp-3 {
            -webkit-line-clamp: 2;
        }
    }
</style>
@endpush