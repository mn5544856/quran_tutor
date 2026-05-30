@extends('layouts.app')

@section('title', isset($categoryTitle) ? $categoryTitle . ' Online Quran Courses | Ilm-e-Quran' : 'Online Quran Courses | Ilm-e-Quran')

@section('meta_description', isset($categoryTitle) ? $categoryTitle . ' Quran courses at Ilm-e-Quran. Learn Quran online with expert teachers.' : 'Online Quran courses at Ilm-e-Quran. Learn Quran online with expert teachers.')

@section('meta_keywords', isset($categoryTitle) ? $categoryTitle . ', online Quran courses, Ilm-e-Quran, Tajweed, Hifz, Noorani Qaida' : 'online Quran courses, Ilm-e-Quran, Tajweed, Hifz, Noorani Qaida')

@section('content')

<!-- HERO SECTION - Original Green Gradient Background -->
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-12 md:py-16 lg:py-20 text-center">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Title with responsive text sizes -->
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight">
            {{ isset($categoryTitle) ? $categoryTitle . ' Online Quran Courses' : 'Online Quran Courses' }}
        </h1>

        <p class="mt-3 sm:mt-4 text-white/80 text-base sm:text-lg md:text-xl max-w-2xl mx-auto">
            Learn Quran step by step with expert teachers at Ilm-e-Quran
        </p>

        <!-- CATEGORY LINKS - Improved touch targets for mobile -->
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mt-6 sm:mt-8">
            <a href="{{ route('courses.category', 'basic') }}"
               class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm sm:text-base hover:scale-105 transform">
                Basic
            </a>

            <a href="{{ route('courses.category', 'advanced') }}"
               class="px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg border border-white/30 bg-white/10 hover:bg-white/20 transition-all duration-300 text-sm sm:text-base hover:scale-105 transform">
                Advanced
            </a>
        </div>
    </div>
</section>

<!-- COURSES SECTION -->
<section class="py-12 md:py-16 lg:py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Error handling for courses collection -->
        @if(isset($courses) && ($courses instanceof \Illuminate\Pagination\LengthAwarePaginator || $courses instanceof \Illuminate\Database\Eloquent\Collection))
            
            @if($courses->count() > 0)

                <!-- Responsive Grid: 1 column on mobile, 2 on tablet, 3 on desktop -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    
                    @foreach($courses as $course)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1 transition-transform duration-300">
                        
                        <!-- Course Image with fallback -->
                        <div class="relative overflow-hidden h-48 sm:h-52 md:h-56">
                            <img src="{{ $course->image_url ?? asset('images/default-course.jpg') }}"
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-500"
                                 alt="{{ $course->title ?? 'Quran Course' }} - Ilm-e-Quran"
                                 onerror="this.src='{{ asset('images/placeholder-course.jpg') }}'">
                        </div>

                        <div class="p-4 sm:p-5 md:p-6">
                            
                            <!-- Course Level Badge - Original Green Color -->
                            <span class="text-xs px-3 py-1 bg-green-100 text-green-800 rounded-full inline-block">
                                {{ isset($course->level) ? ucfirst($course->level) : 'General' }}
                            </span>

                            <!-- Course Title - Original Green Color -->
                            <h3 class="text-lg sm:text-xl font-bold text-green-900 mt-3 line-clamp-2">
                                {{ $course->title ?? 'Course Title' }}
                            </h3>

                            <!-- Short Description -->
                            <p class="text-gray-600 text-sm sm:text-base mt-2 line-clamp-3">
                                {{ $course->short_description ?? 'Learn Quran with expert teachers at Ilm-e-Quran in this comprehensive online course.' }}
                            </p>

                            <!-- View Course Button - Original Green Color -->
                            <a href="{{ route('courses.show', $course->slug ?? '#') }}"
                               class="mt-5 inline-block w-full text-center bg-green-800 text-white py-2.5 rounded-lg hover:bg-green-700 transition-colors duration-300 font-medium">
                                View Course
                            </a>

                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Pagination Links (if using pagination) -->
                @if(method_exists($courses, 'links'))
                    <div class="mt-10 md:mt-12">
                        {{ $courses->links() }}
                    </div>
                @endif

            @else
                <!-- Empty State - No Courses Found -->
                <div class="text-center py-16 md:py-20 lg:py-24">
                    <div class="mb-6">
                        <svg class="w-20 h-20 md:w-24 md:h-24 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-700 mb-2">No Courses Found</h3>
                    <p class="text-gray-500 mt-2">No courses available in this category at Ilm-e-Quran at the moment.</p>
                    <a href="{{ route('courses.index') }}" class="mt-6 inline-block bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                        Browse All Courses
                    </a>
                </div>
            @endif

        @else
            <!-- Error State - Courses variable not properly set -->
            <div class="text-center py-16 md:py-20 lg:py-24">
                <div class="mb-6">
                    <svg class="w-20 h-20 md:w-24 md:h-24 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl md:text-2xl font-bold text-gray-700 mb-2">Unable to Load Courses</h3>
                <p class="text-gray-500 mt-2">We're having trouble loading the courses. Please try again later.</p>
                <a href="{{ url()->previous() }}" class="mt-6 inline-block bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                    Go Back
                </a>
            </div>
        @endif

    </div>
</section>

@endsection

<!-- Custom Styles for additional responsiveness -->
@push('styles')
<style>
    /* Additional responsive utilities */
    @media (max-width: 640px) {
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
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Touch-friendly tap highlights for mobile */
    a, button {
        -webkit-tap-highlight-color: rgba(0,0,0,0.1);
    }
</style>
@endpush