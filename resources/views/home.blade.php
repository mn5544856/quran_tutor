@extends('layouts.app')

@section('title', 'Online Quran Learning with Personal Teacher | Ilm e Quran')

@section('content')
   
    <!-- HERO SECTION -->
    <section class="relative bg-linear-to-r from-green-900 to-green-700 text-white py-24 text-center overflow-hidden">

        <div class="absolute inset-0 opacity-20">
            <picture>
                <source media="(max-width: 768px)"
                    srcset="https://images.pexels.com/photos/14743719/pexels-photo-14743719.jpeg">
                <img src="https://images.pexels.com/photos/14743719/pexels-photo-14743719.jpeg"
                    class="w-full h-full object-cover"
                    loading="eager"
                    fetchpriority="high"
                    decoding="async"
                    alt="Quran learning background">
            </picture>
        </div>

        <div class="relative max-w-5xl mx-auto px-4 text-center">
            <span class="inline-block mb-6 px-4 py-1 bg-yellow-400 text-green-900 rounded-full text-sm font-semibold shadow">
                One-to-One Quran Learning
            </span>

            <h1 class="text-4xl md:text-6xl font-bold leading-tight text-white drop-shadow-md">
                Learn Ilm e Quran Online with a 
                <span class="text-yellow-300">Dedicated Teacher</span>
            </h1>

            <p class="mt-6 text-lg md:text-xl text-white/90 max-w-2xl mx-auto leading-relaxed">
                Personalized Quran lessons based on your level — from basic reading to fluent recitation, taught step by
                step with full attention.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('free-trial.index') }}"
                    class="bg-yellow-400 text-green-900 font-semibold px-8 py-3 rounded-full hover:bg-yellow-300 transition shadow-lg hover:scale-105">
                    Book Free Trial Class
                </a>
                <a href="{{ route('courses.index') }}"
                    class="border border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-green-900 transition">
                    View Courses
                </a>
            </div>
        </div>
    </section>

    <!-- FEATURES / WHY LEARN WITH US -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-800">
                Why Learn With Me
            </h2>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                Simple, personal and effective Quran learning experience designed for every student.
            </p>

            <div class="grid md:grid-cols-4 gap-6 mt-12">
                @php
                    $items = [
                        [
                            'title' => 'Expert Guidance',
                            'desc' => 'Learn directly from experienced Quran teacher',
                            'icon' => 'fas fa-user-graduate'
                        ],
                        [
                            'title' => 'Flexible Timing',
                            'desc' => 'Classes scheduled according to your availability',
                            'icon' => 'fas fa-clock'
                        ],
                        [
                            'title' => '1-on-1 Teaching',
                            'desc' => 'Full attention for better learning results',
                            'icon' => 'fas fa-chalkboard-teacher'
                        ],
                        [
                            'title' => 'Affordable Learning',
                            'desc' => 'Quality education at reasonable fee',
                            'icon' => 'fas fa-wallet'
                        ],
                    ];
                @endphp

                @foreach($items as $item)
                    <div class="bg-green-50 border border-green-100 rounded-2xl p-6 text-center hover:shadow-lg hover:-translate-y-1 transition group">
                        <div class="w-14 h-14 mx-auto flex items-center justify-center rounded-full bg-green-800 text-white text-xl group-hover:scale-110 transition">
                            <i class="{{ $item['icon'] }}"></i>
                        </div>
                        <h3 class="mt-4 font-bold text-green-900 text-lg">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-gray-600 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- POPULAR COURSES - DYNAMIC FROM DATABASE -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-800">
                Popular Courses
            </h2>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                Choose the right starting point for your Quran learning journey.
            </p>

            @if(isset($popularCourses) && $popularCourses->count() > 0)
                <div class="grid md:grid-cols-3 gap-8 mt-12">
                    @foreach($popularCourses as $course)
                        <a href="{{ route('courses.show', $course->slug) }}"
                           aria-label="View {{ $course->title }} course"
                           class="block bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl hover:-translate-y-1 transition duration-300 group cursor-pointer">

                            <div class="h-48 overflow-hidden relative">
                                <img src="{{ asset($course->image_url) }}"
                                    alt="{{ $course->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                    loading="lazy">
                                <div class="absolute top-3 right-3">
                                    <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full font-semibold">
                                        {{ ucfirst($course->level ?? 'Beginner') }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 text-left">
                                <h3 class="font-bold text-green-900 text-xl mb-2">{{ $course->title }}</h3>
                                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                                    {{ $course->short_description ?? $course->description }}
                                </p>

                                <div class="flex items-center gap-4 text-xs text-gray-500 mb-4">
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-clock"></i> 
                                        {{ $course->duration_weeks ? $course->duration_weeks . ' Weeks' : 'Flexible' }}
                                    </span>
                                    @if($course->category)
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-folder"></i> 
                                        {{ $course->category->name }}
                                    </span>
                                    @endif
                                </div>

                                <div class="mt-4 flex justify-between items-center">
                                    @if($course->price)
                                    <span class="text-green-700 font-bold text-lg">
                                        ${{ number_format($course->price, 2) }}/month
                                    </span>
                                    @endif
                                    <span class="text-green-600 font-semibold text-sm group-hover:underline flex items-center gap-1">
                                        Learn More <i class="fas fa-arrow-right text-xs"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl">
                    <i class="fas fa-book-open text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No courses available at the moment.</p>
                </div>
            @endif

            <div class="mt-12">
                <a href="{{ route('courses.index') }}"
                    class="bg-green-800 text-white px-8 py-3 rounded-full hover:bg-green-900 transition inline-block shadow-md hover:shadow-lg">
                    View All {{ $totalCourses ?? 0 }} Courses
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="py-20 bg-gradient-to-b from-white to-green-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-green-800">How It Works</h2>
            <p class="mt-3 text-gray-600 max-w-xl mx-auto">
                Simple 1-on-1 learning process with direct personal guidance.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mt-12">
                @php
                    $steps = [
                        [
                            'title' => 'Contact Me',
                            'desc' => 'Send a message or book a free trial class.',
                            'icon' => 'fas fa-comments'
                        ],
                        [
                            'title' => 'Free Trial Class',
                            'desc' => 'I assess your level and explain how I teach.',
                            'icon' => 'fas fa-video'
                        ],
                        [
                            'title' => 'Start Lessons',
                            'desc' => 'Begin regular 1-on-1 online Quran classes.',
                            'icon' => 'fas fa-book-open'
                        ],
                    ];
                @endphp

                @foreach($steps as $i => $step)
                    <div class="relative bg-white border rounded-2xl p-6 shadow-sm hover:shadow-lg transition">
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-green-800 text-white w-8 h-8 flex items-center justify-center rounded-full text-sm font-bold">
                            {{ $i + 1 }}
                        </div>
                        <div class="mt-6 text-green-700 text-3xl">
                            <i class="{{ $step['icon'] }}"></i>
                        </div>
                        <h3 class="mt-4 text-lg font-bold text-green-900">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-gray-600 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <p class="mt-10 text-sm text-gray-500">
                100% personal teaching — no institute, no middle system.
            </p>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-20 bg-gradient-to-br from-green-900 to-green-700">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 p-12 rounded-3xl shadow-xl">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                    Learn Quran Directly With Your Personal Teacher
                </h2>
                <p class="mt-4 text-white/80 text-lg max-w-2xl mx-auto">
                    I provide one-on-one Quran classes with full attention to each student. Whether you're a beginner or want to improve Tajweed, I will guide you step by step.
                </p>

                <div class="mt-6 flex flex-wrap justify-center gap-4 text-sm text-white/70">
                    <span>✔ One-on-One Personal Classes</span>
                    <span>✔ Flexible Timings</span>
                    <span>✔ For Kids & Adults</span>
                    <span>✔ Friendly & Patient Teaching</span>
                </div>

                <div class="mt-8 flex justify-center px-4">
                    <a href="{{ route('free-trial.index') }}"
                        class="inline-block w-full sm:w-auto text-center 
                               bg-yellow-400 text-green-900 
                               px-6 sm:px-8 py-3 sm:py-4 
                               rounded-full font-semibold 
                               text-base sm:text-lg 
                               hover:bg-yellow-300 transition shadow-md">
                        Book Your Free Trial Class
                    </a>
                </div>
                
                <p class="mt-6 text-sm text-white/60">
                    Start your journey today — learn at your own pace with direct guidance
                </p>
            </div>
        </div>
    </section>

@endsection