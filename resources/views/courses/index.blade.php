@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Online Ilm e Quran | Tajweed, Hifz & Noorani Qaida - Ilm e Quran Quran Academy')
@section('meta_description', 'Join Ilm e Quran Quran Academy for Online Ilm e Quran including Tajweed, Hifz, Noorani Qaida, and Islamic Studies. One-on-one live classes for kids and adults worldwide.')
@section('meta_keywords', 'online Quran classes, Tajweed course, Hifz classes, Noorani Qaida, Quran teacher online')

@section('content')

<!-- HERO SECTION -->
<section class="relative overflow-hidden text-white py-16 md:py-24 bg-cover bg-center"
    style="background-image: linear-gradient(rgba(5,46,22,0.88), rgba(21,128,61,0.88)), url('https://images.pexels.com/photos/14743719/pexels-photo-14743719.jpeg');">
    <div class="relative max-w-7xl mx-auto px-4 text-center z-10">
        <span class="inline-block bg-yellow-400 text-green-900 text-sm font-semibold px-4 py-2 rounded-full mb-6 shadow">Trusted By Students Worldwide</span>
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">Learn Quran Online With <br><span class="text-yellow-300">Expert Quran Teachers</span></h1>
        <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto leading-relaxed">Explore our Online Ilm e Quran including Tajweed, Hifz, Noorani Qaida, and Islamic Studies for kids and adults.</p>
        
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('free-trial.index') }}" class="bg-yellow-400 text-green-900 px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 transition">Start Free Trial</a>
            <a href="{{ route('contact.index') }}" class="border border-white/30 px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition">Contact Us</a>
        </div>
        
        <div class="flex flex-wrap justify-center gap-3 mt-12">
            <a href="{{ route('courses.show', 'quran-reading-course') }}" class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">Quran Basics</a>
            <a href="{{ route('courses.show', 'tajweed-recitation') }}" class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">Tajweed</a>
            <a href="{{ route('courses.show', 'quran-memorization-hifz') }}" class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">Hifz Program</a>
            <a href="{{ route('courses.show', 'noorani-qaida-course-basic') }}" class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">Noorani Qaida</a>
        </div>
    </div>
</section>

<!-- FEATURED COURSES -->
<section class="max-w-7xl mx-auto px-4 py-12 md:py-16">
    <div class="mb-10">
        <h2 class="text-3xl md:text-4xl font-bold text-green-900">Featured Quran Courses</h2>
        <p class="text-gray-600 mt-2">Most popular online Quran learning programs.</p>
    </div>

    @if(!empty($featuredCourses) && $featuredCourses->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        @foreach($featuredCourses as $course)
        <article class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition overflow-hidden border">
            <div class="relative h-56 overflow-hidden">
                <img loading="lazy" src="{{ $course->image_url ?? 'https://images.pexels.com/photos/8489082/pexels-photo-8489082.jpeg' }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute top-4 left-4"><span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full">{{ ucfirst($course->level) }}</span></div>
                <div class="absolute top-4 right-4"><span class="bg-yellow-400 text-green-900 text-xs px-3 py-1 rounded-full">⭐ Featured</span></div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-green-900 mb-3 line-clamp-2">{{ $course->title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $course->short_description }}</p>
                <div class="flex items-center justify-between text-sm text-gray-500 mt-5">
                    <span>⏱ {{ $course->duration ?? 'Flexible' }}</span>
                </div>
                <a href="{{ route('courses.show', $course->slug) }}" class="mt-6 inline-flex items-center justify-center w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-xl font-semibold transition">View Course</a>
            </div>
        </article>
        @endforeach
    </div>
    @else
    <div class="text-center py-16"><p class="text-gray-500">No featured courses available.</p></div>
    @endif
</section>

<!-- ALL COURSES with FILTERS -->
<section id="courses" class="bg-gray-50 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Header & Filters -->
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-green-900">All Quran Courses</h2>
                <p class="text-gray-600 mt-2">Choose the perfect course according to your level.</p>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <select id="levelFilter" class="border rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-green-500">
                    <option value="all" {{ request('level') == 'all' ? 'selected' : '' }}>All Levels</option>
                    <option value="beginner" {{ request('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
                
                <select id="sortFilter" class="border rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-green-500">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    <option value="level_asc" {{ request('sort') == 'level_asc' ? 'selected' : '' }}>Level (Beginner → Advanced)</option>
                    <option value="level_desc" {{ request('sort') == 'level_desc' ? 'selected' : '' }}>Level (Advanced → Beginner)</option>
                </select>
                
                <button id="resetFilters" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-xl text-sm transition">Reset</button>
            </div>
        </div>
        
        <!-- Results Count -->
        <div class="text-right text-sm text-gray-600 mb-4">Showing <span id="coursesCount">{{ $courses->total() }}</span> courses</div>
        
        <!-- Courses Grid -->
        <div id="coursesContainer" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @include('courses.partials.course_grid', ['courses' => $courses])
        </div>
        
    </div>
</section>

<!-- WHY CHOOSE -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-green-900 mb-4">Why Choose Ilm e Quran Quran Academy?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-12">Quality online Quran education with experienced tutors, flexible timing, and personalized learning plans.</p>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition"><div class="text-5xl mb-5">👨‍🏫</div><h3 class="font-bold text-lg text-green-900 mb-3">One-on-One Classes</h3><p class="text-gray-600 text-sm">Personalized Quran learning sessions.</p></div>
            <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition"><div class="text-5xl mb-5">📖</div><h3 class="font-bold text-lg text-green-900 mb-3">Structured Learning</h3><p class="text-gray-600 text-sm">Step-by-step from beginner to advanced.</p></div>
            <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition"><div class="text-5xl mb-5">⏰</div><h3 class="font-bold text-lg text-green-900 mb-3">Flexible Schedule</h3><p class="text-gray-600 text-sm">Learn according to your availability.</p></div>
            <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition"><div class="text-5xl mb-5">🌍</div><h3 class="font-bold text-lg text-green-900 mb-3">Worldwide Students</h3><p class="text-gray-600 text-sm">Trusted globally including USA, UK, Canada.</p></div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="relative overflow-hidden bg-green-900 text-white py-16 md:py-20">
    <div class="relative max-w-4xl mx-auto text-center px-4">
        <h2 class="text-3xl md:text-5xl font-bold">Start Your Quran Learning Journey Today</h2>
        <p class="mt-5 text-lg opacity-90">Join thousands of students learning Quran online with expert tutors.</p>
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('free-trial.index') }}" class="bg-yellow-400 hover:bg-yellow-300 text-green-900 px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 transition">Book Free Trial</a>
            <a href="{{ route('contact.index') }}" class="border border-white/30 px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition">Contact Us</a>
        </div>
    </div>
</section>

<!-- AJAX FILTER SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const levelFilter = document.getElementById('levelFilter');
    const sortFilter = document.getElementById('sortFilter');
    const resetBtn = document.getElementById('resetFilters');
    const container = document.getElementById('coursesContainer');
    const countSpan = document.getElementById('coursesCount');
    
    let timer;
    const indexUrl = '{{ route("courses.index") }}';
    
    function updateCourses() {
        const level = levelFilter?.value || 'all';
        const sort = sortFilter?.value || 'newest';
        
        let params = [];
        if (level !== 'all') params.push(`level=${encodeURIComponent(level)}`);
        if (sort !== 'newest') params.push(`sort=${encodeURIComponent(sort)}`);
        
        let url = indexUrl + (params.length ? '?' + params.join('&') : '');
        window.history.pushState({}, '', url);
        
        container.style.opacity = '0.5';
        clearTimeout(timer);
        
        timer = setTimeout(() => {
            fetch(url + (params.length ? '&' : '?') + 'ajax=true', {
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.html) {
                    container.innerHTML = data.html;
                    if (countSpan) countSpan.textContent = data.total || document.querySelectorAll('.course-item').length;
                }
            })
            .catch(() => location.reload())
            .finally(() => container.style.opacity = '1');
        }, 300);
    }
    
    levelFilter?.addEventListener('change', updateCourses);
    sortFilter?.addEventListener('change', updateCourses);
    resetBtn?.addEventListener('click', () => {
        if (levelFilter) levelFilter.value = 'all';
        if (sortFilter) sortFilter.value = 'newest';
        updateCourses();
    });
    
    // Set filters from URL
    const urlParams = new URLSearchParams(window.location.search);
    if (levelFilter && urlParams.get('level')) levelFilter.value = urlParams.get('level');
    if (sortFilter && urlParams.get('sort')) sortFilter.value = urlParams.get('sort');
});
</script>

@endsection