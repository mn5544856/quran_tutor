@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Online Quran Courses: Tajweed, Hifz & Noorani Qaida')
@section('meta_description', 'Join Ilm e Quran Academy for online Quran learning including Tajweed, Hifz, Noorani Qaida,
    and Islamic Studies. One-on-one live classes for kids and adults worldwide.')
@section('meta_keywords', 'online Quran classes, ilm e quran, ilm ul quran, Tajweed course, Hifz classes, Noorani Qaida,
    Quran teacher online')
    <x-json-ld :data="\App\Services\SeoSchemaService::courses($courses)" />

@section('content')

    <!-- HERO SECTION -->
    <section class="relative overflow-hidden text-white py-16 md:py-24 bg-cover bg-center"
        style="background-image: linear-gradient(rgba(5,46,22,0.88), rgba(21,128,61,0.88)), url('https://images.pexels.com/photos/14743719/pexels-photo-14743719.jpeg');">
        <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
            <span
                class="inline-block bg-yellow-400 text-green-900 text-sm font-semibold px-4 py-2 rounded-full mb-6 shadow animate-bounce">🌟
                Trusted By 10,000+ Students Worldwide</span>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">Learn Quran Online With <br><span
                    class="text-yellow-300">Expert Quran Teachers</span></h1>
            <p class="text-lg md:text-xl opacity-95 max-w-3xl mx-auto leading-relaxed">Explore our comprehensive online Quran
                courses including Tajweed, Hifz, Noorani Qaida, and Islamic Studies for kids and adults.</p>

            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('free-trial.index') }}"
                    class="bg-yellow-400 hover:bg-yellow-300 text-green-900 px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 transition duration-300">Start Free Trial</a>
                <a href="{{ route('contact.index') }}"
                    class="border border-white/30 hover:bg-white/10 px-8 py-4 rounded-full font-semibold transition duration-300">Contact Us</a>
            </div>

         
        </div>
    </section>

    <!-- FEATURED COURSES -->
    @if (!empty($featuredCourses) && $featuredCourses->count())
        <section class="max-w-7xl mx-auto px-4 py-12 md:py-16">
            <div class="text-center mb-10">
                <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wide">Popular Programs</span>
                <h2 class="text-3xl md:text-4xl font-bold text-green-900 mt-2 mb-3">Featured Quran Courses</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Most popular online Quran learning programs loved by our students
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach ($featuredCourses as $course)
                    <article
                        class="course-card group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100">
                        <div class="relative h-56 overflow-hidden">
                            <img loading="lazy" src="{{ $course->image_url ?? asset('images/course-placeholder.jpg') }}"
                                alt="{{ $course->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4 flex gap-2">
                                <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full shadow-lg">⭐
                                    Popular</span>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-yellow-400 text-green-900 text-xs px-3 py-1 rounded-full shadow-lg font-semibold">🔥
                                    Featured</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3
                                class="text-xl font-bold text-green-900 mb-3 line-clamp-2 hover:text-emerald-600 transition">
                                <a href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-2">
                                {{ Str::limit($course->short_description ?? 'Learn Quran online with expert teachers. One-on-one live classes tailored to your learning pace.', 100) }}
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500 mt-5 pt-3 border-t">
                                <span class="flex items-center gap-1">⏱️
                                    {{ $course->duration ?? 'Flexible Duration' }}</span>
                                @if ($course->category)
                                    <span
                                        class="bg-green-50 text-green-700 px-2 py-1 rounded-lg text-xs font-medium">{{ $course->category->name }}</span>
                                @endif
                            </div>
                            <a href="{{ route('courses.show', $course->slug) }}"
                                class="mt-6 inline-flex items-center justify-center w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-xl font-semibold transition group-hover:shadow-md">
                                View Course
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    <!-- ALL COURSES with FILTERS - AJAX Enabled -->
    <section id="courses" class="bg-gray-50 py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Header & Filters -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-green-900">All Quran Courses</h2>
                    <p class="text-gray-600 mt-2">Choose the perfect course according to your level and goals</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <select id="categoryFilter"
                        class="filter-select border border-gray-300 rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent bg-white cursor-pointer">
                        <option value="all">📚 All Categories</option>
                        @foreach ($categories ?? [] as $category)
                            <option value="{{ $category->slug }}"
                                {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <select id="sortFilter"
                        class="filter-select border border-gray-300 rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent bg-white cursor-pointer">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>🆕 Newest First</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>📅 Oldest First</option>
                    </select>

                    <button id="resetFilters"
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-xl text-sm transition duration-200 font-medium">
                        Reset Filters
                    </button>
                </div>
            </div>

            <!-- Results Count & Loading Indicator -->
            <div class="flex justify-between items-center mb-4">
                <div class="text-sm text-gray-600">
                    Showing <span id="coursesCount" class="font-semibold text-green-700">{{ $courses->total() }}</span>
                    courses
                </div>
                <div id="loadingIndicator" class="hidden text-sm text-emerald-600">
                    <div class="loading-spinner mr-2"></div>
                    Loading...
                </div>
            </div>

            <!-- Error Alert Container -->
            <div id="errorAlert"
                class="hidden bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-4 error-alert"
                role="alert">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">⚠️ Error loading courses. Please try again.</p>
                    </div>
                    <button id="closeError" class="ml-auto">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Courses Grid -->
            <div id="coursesContainer" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @include('courses.partials.course_grid', ['courses' => $courses])
            </div>


        </div>
    </section>

    <!-- WHY CHOOSE US SECTION -->
    <section class="py-16 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-emerald-600 font-semibold text-sm uppercase tracking-wide">Why Choose Us</span>
                <h2 class="text-3xl md:text-4xl font-bold text-green-900 mt-2 mb-4">Why Choose Ilm e Quran Academy?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Quality online Quran education with experienced tutors, flexible
                    timing, and personalized learning plans.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 text-center hover:-translate-y-1">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">👨‍🏫</div>
                    <h3 class="font-bold text-lg text-green-900 mb-2">One-on-One Classes</h3>
                    <p class="text-gray-600 text-sm">Personalized attention with dedicated Quran teachers</p>
                </div>

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 text-center hover:-translate-y-1">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">📖</div>
                    <h3 class="font-bold text-lg text-green-900 mb-2">Structured Learning</h3>
                    <p class="text-gray-600 text-sm">Step-by-step curriculum from beginner to advanced</p>
                </div>

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 text-center hover:-translate-y-1">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">⏰</div>
                    <h3 class="font-bold text-lg text-green-900 mb-2">Flexible Schedule</h3>
                    <p class="text-gray-600 text-sm">Learn anytime according to your availability</p>
                </div>

                <div
                    class="group bg-gray-50 p-8 rounded-2xl hover:shadow-xl transition-all duration-300 text-center hover:-translate-y-1">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition">🌍</div>
                    <h3 class="font-bold text-lg text-green-900 mb-2">Worldwide Students</h3>
                    <p class="text-gray-600 text-sm">Trusted globally including USA, UK, Canada, Australia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="relative overflow-hidden bg-linear-to-r from-green-900 to-emerald-900 text-white py-16 md:py-20">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60"
                height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none"
                fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath
                d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"
                /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
        </div>

        <div class="relative max-w-4xl mx-auto text-center px-4">
            <h2 class="text-3xl md:text-5xl font-bold">Ready to Start Your Quran Journey?</h2>
            <p class="mt-5 text-lg opacity-95 max-w-2xl mx-auto">
                Join thousands of students learning Quran online with expert tutors.
                Book your free trial class today!
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('free-trial.index') }}"
                    class="bg-yellow-400 hover:bg-yellow-300 text-green-900 px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 transition duration-300 inline-flex items-center justify-center gap-2">
                    Book Free Trial
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
                <a href="{{ route('contact.index') }}"
                    class="border-2 border-white/30 hover:bg-white/10 px-8 py-4 rounded-full font-semibold transition duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const categoryFilter = document.getElementById('categoryFilter');
            const sortFilter = document.getElementById('sortFilter');
            const resetBtn = document.getElementById('resetFilters');
            const container = document.getElementById('coursesContainer');
            const countSpan = document.getElementById('coursesCount');
            const paginationContainer = document.getElementById('paginationContainer');
            const loadingIndicator = document.getElementById('loadingIndicator');
            const errorAlert = document.getElementById('errorAlert');
            const closeErrorBtn = document.getElementById('closeError');

            // Index URL
            const indexUrl = '{{ route('courses.index') }}';

            // Debounce timer
            let debounceTimer;

            // Debounce function to prevent too many requests
            function debounce(func, delay = 300) {
                return function(...args) {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => func.apply(this, args), delay);
                };
            }

            // Hide error alert
            if (closeErrorBtn) {
                closeErrorBtn.addEventListener('click', () => {
                    if (errorAlert) errorAlert.classList.add('hidden');
                });
            }

            // Show error message
            function showError() {
                if (errorAlert) errorAlert.classList.remove('hidden');
                setTimeout(() => {
                    if (errorAlert) errorAlert.classList.add('hidden');
                }, 5000);
            }

            // Hide error message
            function hideError() {
                if (errorAlert) errorAlert.classList.add('hidden');
            }

            // Show loading state
            function showLoading() {
                if (loadingIndicator) loadingIndicator.classList.remove('hidden');
                if (container) {
                    container.style.opacity = '0.5';
                    container.style.transition = 'opacity 0.2s ease';
                }
            }

            // Hide loading state
            function hideLoading() {
                if (loadingIndicator) loadingIndicator.classList.add('hidden');
                if (container) container.style.opacity = '1';
            }

            // Update courses function
            async function updateCourses() {
                if (!container) return;

                const category = categoryFilter?.value || 'all';
                const sort = sortFilter?.value || 'latest';

                let params = new URLSearchParams();
                if (category !== 'all') params.append('category', category);
                if (sort !== 'latest') params.append('sort', sort);
                params.append('ajax', 'true');

                let url = indexUrl + (params.toString() ? '?' + params.toString() : '');

                // Update browser history
                window.history.pushState({
                    category,
                    sort
                }, '', url);

                // Show loading
                showLoading();
                hideError();

                try {
                    const response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                    }

                    const data = await response.json();

                    if (container && data.html) {
                        container.innerHTML = data.html;
                    } else {
                        throw new Error('Invalid response format');
                    }

                    if (countSpan && typeof data.total !== 'undefined') {
                        countSpan.textContent = data.total;
                    }

                    if (paginationContainer && data.pagination) {
                        paginationContainer.innerHTML = data.pagination;
                    }

                } catch (error) {
                    console.error('Error loading courses:', error);
                    showError();

                    // Show fallback message in container
                    if (container) {
                        container.innerHTML = `
                    <div class="col-span-3 text-center py-12">
                        <div class="text-6xl mb-4">⚠️</div>
                        <p class="text-gray-600">Unable to load courses. Please try again.</p>
                        <button onclick="location.reload()" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Refresh Page
                        </button>
                    </div>
                `;
                    }
                } finally {
                    hideLoading();
                }
            }

            // Debounced version of updateCourses
            const debouncedUpdate = debounce(updateCourses, 300);

            // Event Listeners with debouncing
            if (categoryFilter) {
                categoryFilter.addEventListener('change', debouncedUpdate);
            }

            if (sortFilter) {
                sortFilter.addEventListener('change', debouncedUpdate);
            }

            if (resetBtn) {
                resetBtn.addEventListener('click', () => {
                    if (categoryFilter) categoryFilter.value = 'all';
                    if (sortFilter) sortFilter.value = 'latest';
                    updateCourses(); // No debounce on reset
                });
            }

            // Handle browser back/forward buttons
            window.addEventListener('popstate', function(event) {
                const params = new URLSearchParams(window.location.search);
                const category = params.get('category') || 'all';
                const sort = params.get('sort') || 'latest';

                if (categoryFilter) categoryFilter.value = category;
                if (sortFilter) sortFilter.value = sort;

                updateCourses();
            });

            // Retry logic for failed loads (optional)
            let retryCount = 0;
            const maxRetries = 3;

            async function updateCoursesWithRetry() {
                try {
                    await updateCourses();
                    retryCount = 0; // Reset retry count on success
                } catch (error) {
                    if (retryCount < maxRetries) {
                        retryCount++;
                        console.log(`Retrying... (${retryCount}/${maxRetries})`);
                        setTimeout(updateCoursesWithRetry, 1000 * retryCount);
                    }
                }
            }
        });
    </script>
@endpush
