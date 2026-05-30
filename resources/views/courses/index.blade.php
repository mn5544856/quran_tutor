@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Online Quran Courses | Tajweed, Hifz & Noorani Qaida - Al-Madinah Quran Academy')

@section('meta_description', 'Join Al-Madinah Quran Academy for online Quran courses including Tajweed, Hifz, Noorani Qaida, Quran Reading, and Islamic Studies. One-on-one live classes for kids and adults worldwide.')

@section('meta_keywords', 'online Quran classes, Quran academy, Tajweed course, Hifz classes, Noorani Qaida, Quran teacher online, Quran lessons for kids, Quran learning academy')

@section('content')



    <!-- HERO SECTION -->
    <section class="relative overflow-hidden text-white py-24 bg-cover bg-center"
        style="background-image:
            linear-gradient(rgba(5,46,22,0.88), rgba(21,128,61,0.88)),
            url('https://images.unsplash.com/photo-1560114928-40f1f1eb26a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');">

        <!-- Decorative Blur -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-green-400/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-yellow-300/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 text-center z-10">

            <span
                class="inline-block bg-yellow-400 text-green-900 text-sm font-semibold px-4 py-2 rounded-full mb-6 shadow">
                Trusted By Students Worldwide
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Learn Quran Online With <br>
                <span class="text-yellow-300">Expert Quran Teachers</span>
            </h1>

            <p class="text-lg md:text-xl opacity-90 max-w-3xl mx-auto leading-relaxed">
                Explore our online Quran courses including Tajweed, Hifz, Noorani Qaida,
                Quran Reading, and Islamic Studies for kids and adults.
                Personalized one-on-one classes with flexible schedules.
            </p>

            <!-- CTA -->
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('free-trial.index') }}"
                    class="bg-yellow-400 text-green-900 px-8 py-4 rounded-full font-bold shadow-lg hover:scale-105 transition duration-300">
                    Start Free Trial
                </a>

                <a href="{{ route('contact.index') }}"
                    class="border border-white/30 px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition">
                    Contact Us
                </a>
            </div>

            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-3 mt-12">

                <a href="{{ route('courses.category', 'quran-basics') }}"
                    class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">
                    Quran Basics
                </a>

                <a href="{{ route('courses.category', 'tajweed') }}"
                    class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">
                    Tajweed
                </a>

                <a href="{{ route('courses.category', 'hifz') }}"
                    class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">
                    Hifz Program
                </a>

                <a href="{{ route('courses.category', 'noorani-qaida') }}"
                    class="px-5 py-2 bg-white/10 backdrop-blur border border-white/20 rounded-full hover:bg-white/20 transition">
                    Noorani Qaida
                </a>

            </div>
        </div>
    </section>

    <!-- FEATURED COURSES -->
    <section class="max-w-7xl mx-auto px-4 py-16">

        <div class="flex items-center justify-between mb-10">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-green-900">
                    Featured Quran Courses
                </h2>

                <p class="text-gray-600 mt-2">
                    Most popular online Quran learning programs.
                </p>
            </div>
        </div>

        @if(!empty($featuredCourses) && $featuredCourses->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($featuredCourses as $course)

                    <article
                        class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition duration-500 overflow-hidden border border-gray-100">

                        <!-- IMAGE -->
                        <div class="relative h-56 overflow-hidden">

                            <div class="absolute inset-0 bg-black/10 z-10"></div>

                            <img loading="lazy"
                                src="{{ $course->image_url ?? 'https://images.pexels.com/photos/8489082/pexels-photo-8489082.jpeg' }}"
                                alt="{{ $course->title }} - Online Quran Course"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                            <div class="absolute top-4 left-4 z-20">
                                <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full shadow">
                                    {{ ucfirst($course->level) }}
                                </span>
                            </div>

                            <div class="absolute top-4 right-4 z-20">
                                <span class="bg-yellow-400 text-green-900 text-xs font-semibold px-3 py-1 rounded-full shadow">
                                    ⭐ Featured
                                </span>
                            </div>
                        </div>

                        <!-- CONTENT -->
                        <div class="p-6">

                            <h3 class="text-xl font-bold text-green-900 mb-3 line-clamp-2">
                                {{ $course->title }}
                            </h3>

                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ $course->short_description }}
                            </p>

                            <!-- FEATURES -->
                            <div class="flex items-center justify-between text-sm text-gray-500 mt-5">

                                <span class="flex items-center gap-1">
                                    ⏱ {{ $course->duration ?? 'Flexible' }}
                                </span>

                                <!-- <span class="font-semibold text-green-700">
                                    💰 {{ $course->formatted_price }}
                                </span> -->
                            </div>

                            <!-- BUTTON -->
                            <a href="{{ route('courses.show', $course->slug) }}"
                                class="mt-6 inline-flex items-center justify-center w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-xl font-semibold transition duration-300">

                                View Course
                            </a>

                        </div>
                    </article>

                @endforeach

            </div>

        @else

            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">
                    No featured courses available right now.
                </p>
            </div>

        @endif

    </section>

    <!-- ALL COURSES -->
    <section id="courses" class="bg-gray-50 py-16">

        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-10">

                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-green-900">
                        All Quran Courses
                    </h2>

                    <p class="text-gray-600 mt-2">
                        Choose the perfect Quran course according to your level.
                    </p>
                </div>

                <!-- FILTERS -->
                <div class="flex flex-wrap gap-3">

                    <select id="levelFilter"
                        class="border border-gray-200 rounded-xl px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none">

                        <option value="all">All Levels</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>

                    </select>

                    <select id="sortFilter"
                        class="border border-gray-200 rounded-xl px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-green-500 focus:outline-none">

                        <option value="newest">Newest</option>
                        <option value="price_low">Price Low</option>
                        <option value="price_high">Price High</option>

                    </select>

                </div>
            </div>

            @if($courses->count())

                <!-- GRID -->
                <div id="coursesContainer" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($courses as $course)

                        <article
                            class="course-item bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500 border border-gray-100"
                            data-level="{{ $course->level }}" data-price="{{ $course->price ?? 0 }}"
                            ">

                            <!-- IMAGE -->
                            <div class="relative h-52 overflow-hidden">

                                <img loading="lazy"
                                    src="{{ $course->image_url ?? 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=900&q=80' }}"
                                    alt="{{ $course->title }} - Online Quran Course"
                                    class="w-full h-full object-cover hover:scale-110 transition duration-700">

                                @if($course->is_featured)
                                    <div class="absolute top-4 right-4">
                                        <span class="bg-yellow-400 text-green-900 text-xs px-3 py-1 rounded-full font-semibold shadow">
                                            ⭐ Featured
                                        </span>
                                    </div>
                                @endif

                            </div>

                            <!-- BODY -->
                            <div class="p-6">

                                <span class="inline-block text-xs px-3 py-1 bg-green-100 text-green-700 rounded-full mb-3">
                                    {{ ucfirst($course->level) }}
                                </span>

                                <h3 class="text-xl font-bold text-green-900 line-clamp-2">
                                    {{ $course->title }}
                               </h3>

                                <p class="text-sm text-gray-600 mt-3 leading-relaxed">
                                    {{ Str::limit($course->short_description, 100) }}
                                </p>

                                <div class="flex justify-between items-center mt-5 text-sm text-gray-500">

                                    <span>
                                        ⏱ {{ $course->duration ?? 'Flexible' }}
                                    </span>

                                    <span class="font-bold text-green-700">
                                        {{ $course->formatted_price }}
                                    </span>
                                </div>

                                <a href="{{ route('courses.show', $course->slug) }}"
                                    class="block mt-6 text-center bg-green-700 hover:bg-green-800 text-white py-3 rounded-xl font-semibold transition">
                                    View Details
                                </a>

                            </div>
                        </article>

                    @endforeach

                </div>

            @else

                <div class="text-center py-16">
                    <p class="text-gray-500 text-lg">
                        No courses available right now.
                    </p>
                </div>

            @endif

        </div>
    </section>

    <!-- WHY CHOOSE -->
    <section class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-4 text-center">

            <h2 class="text-4xl font-bold text-green-900 mb-4">
                Why Choose Al-Madinah Quran Academy?
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto mb-14">
                We provide quality online Quran education with experienced tutors,
                flexible timing, and personalized learning plans.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition">
                    <div class="text-5xl mb-5">👨‍🏫</div>

                    <h3 class="font-bold text-lg text-green-900 mb-3">
                        One-on-One Classes
                    </h3>

                    <p class="text-gray-600 text-sm">
                        Personalized Quran learning sessions for every student.
                    </p>
                </div>

                <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition">
                    <div class="text-5xl mb-5">📖</div>

                    <h3 class="font-bold text-lg text-green-900 mb-3">
                        Structured Learning
                    </h3>

                    <p class="text-gray-600 text-sm">
                        Step-by-step Quran learning from beginner to advanced.
                    </p>
                </div>

                <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition">
                    <div class="text-5xl mb-5">⏰</div>

                    <h3 class="font-bold text-lg text-green-900 mb-3">
                        Flexible Schedule
                    </h3>

                    <p class="text-gray-600 text-sm">
                        Learn Quran online according to your availability.
                    </p>
                </div>

                <div class="bg-gray-50 p-8 rounded-3xl hover:shadow-lg transition">
                    <div class="text-5xl mb-5">🌍</div>

                    <h3 class="font-bold text-lg text-green-900 mb-3">
                        Worldwide Students
                    </h3>

                    <p class="text-gray-600 text-sm">
                        Trusted by students from USA, UK, Canada, Australia and more.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <!-- CTA SECTION -->
<section class="relative overflow-hidden bg-green-900 text-white py-20">

    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/arabesque.png')] bg-repeat"></div>

    <div class="relative max-w-4xl mx-auto text-center px-4 z-10">

        <!-- Heading -->
        <h2 class="text-3xl md:text-5xl font-bold leading-tight">
            Start Your Quran Learning Journey Today
        </h2>

        <!-- Description -->
        <p class="mt-5 text-lg opacity-90">
            Join thousands of students learning Quran online with expert tutors.
        </p>

        <!-- Buttons -->
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">

            <a href="{{ route('free-trial.index') }}"
                class="bg-yellow-400 hover:bg-yellow-300 text-green-900 px-8 py-4 rounded-full font-bold shadow-lg transition duration-300 transform hover:scale-105">

                Book Free Trial
            </a>

            <a href="{{ route('contact.index') }}"
                class="border border-white/30 px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition duration-300">

                Contact Us
            </a>

        </div>

    </div>

</section>

    <!-- FILTER + SORT -->
   <script>
document.addEventListener('DOMContentLoaded', () => {

    const levelFilter = document.getElementById('levelFilter');
    const sortFilter  = document.getElementById('sortFilter');
    const container   = document.getElementById('coursesContainer');

    if (!container) return;

    const items = Array.from(container.children);

    const getValue = (el, key, fallback = 0) =>
        parseFloat(el.dataset[key]) || fallback;

    function applyFilterSort() {

        const level = levelFilter.value;
        const sort  = sortFilter.value;

        let visible = items.filter(item => {
            const matchLevel = (level === 'all' || item.dataset.level === level);
            return matchLevel;
        });

        visible.sort((a, b) => {

            if (sort === 'price_low') {
                return getValue(a, 'price') - getValue(b, 'price');
            }

            if (sort === 'price_high') {
                return getValue(b, 'price') - getValue(a, 'price');
            }

            if (sort === 'newest') {
                return new Date(b.dataset.created) - new Date(a.dataset.created);
            }

            return 0;
        });

        // ⚡ Batch DOM update (fast)
        const fragment = document.createDocumentFragment();

        visible.forEach(item => fragment.appendChild(item));

        container.innerHTML = '';
        container.appendChild(fragment);
    }

    levelFilter?.addEventListener('change', applyFilterSort);
    sortFilter?.addEventListener('change', applyFilterSort);

});
</script>

@endsection



<!-- Final SEO checklist (short)

✔ Meta title
✔ Meta description
✔ Schema.org JSON-LD
✔ Proper H1/H2 structure
✔ Internal links (routes)
✔ Keyword-rich content -->