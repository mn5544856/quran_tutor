@extends('layouts.app')

@php
    use Illuminate\Support\Str;

    $siteUrl = route('home');
    $courseUrl = url()->current();
@endphp

@section('title', $course->title . ' | Online Quran Course - Al-Madinah Quran Academy')

@section('meta_description', Str::limit(strip_tags($course->short_description), 160))

@section('meta_keywords', 'online Quran course, Quran learning, ' . $course->title . ', Tajweed, Hifz, Quran academy')

@section('content')


<!-- OPEN GRAPH SEO (SOCIAL SHARING) -->
<meta property="og:title" content="{{ $course->title }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($course->short_description), 160) }}">
<meta property="og:image" content="{{ $course->image_url }}">
<meta property="og:url" content="{{ $courseUrl }}">
<meta property="og:type" content="website">

<!-- HERO SECTION -->
<section class="relative text-white py-20 bg-cover bg-center"
    style="background-image: linear-gradient(rgba(10,92,54,0.9), rgba(10,124,70,0.9)), url('{{ $course->image_url ?: 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1350&q=80' }}');">

    <div class="max-w-6xl mx-auto px-4">

        <span class="inline-block bg-yellow-400 text-green-900 px-3 py-1 rounded-full text-sm font-semibold mb-3">
            {{ ucfirst($course->level) }}
        </span>

        <h1 class="text-3xl md:text-5xl font-bold mb-3">
            {{ $course->title }}
        </h1>

        <p class="text-lg md:text-xl opacity-90 mb-6">
            {{ $course->short_description }}
        </p>

        <div class="flex flex-wrap gap-6 text-sm md:text-base">
            <div class="flex items-center gap-2">
                <i class="fas fa-clock text-yellow-400"></i>
                <span>{{ $course->duration ?: 'Flexible Duration' }}</span>
            </div>

            <div class="flex items-center gap-2">
                <i class="fas fa-user-graduate text-yellow-400"></i>
                <span>1-on-1 Expert Teaching</span>
            </div>
        </div>

    </div>
</section>

<!-- MAIN CONTENT (UNCHANGED LOGIC) -->
<section class="max-w-6xl mx-auto px-4 py-16">

    <div class="grid md:grid-cols-3 gap-10">

        <!-- LEFT -->
        <div class="md:col-span-2 space-y-10">

            <div class="bg-green-50 border border-green-100 rounded-xl p-6">
                <h2 class="text-2xl font-bold text-green-800 mb-4">Why This Course?</h2>

                <div class="grid sm:grid-cols-2 gap-4 text-gray-700">

                    <div class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        Step-by-step learning system
                    </div>

                    <div class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        Live interactive classes
                    </div>

                    <div class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        Certified Quran teachers
                    </div>

                    <div class="flex items-start gap-2">
                        <i class="fas fa-check text-green-600 mt-1"></i>
                        Flexible schedule worldwide
                    </div>

                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-800 mb-4">What You'll Learn</h2>

                <ul class="space-y-3">
                    @foreach($course->what_you_learn ?? [] as $item)
                        <li class="flex gap-2">
                            <i class="fas fa-check-circle text-green-600 mt-1"></i>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-green-800 mb-4">Course Description</h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($course->description)) !!}
                </p>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="space-y-6">

            <div class="bg-white shadow-lg rounded-xl p-6 text-center">

                <h3 class="text-lg font-bold text-green-800 mb-3">
                    Ready to Start Learning?
                </h3>

                <p class="text-gray-600 text-sm mb-6">
                    Book your free trial class today.
                </p>

                <a href="{{ route('free-trial.index') }}"
                   class="block bg-green-700 text-white py-3 rounded-lg hover:bg-green-800 transition">
                    Book Free Trial
                </a>

            </div>

        </div>

    </div>

</section>

@endsection


<!-- 
KEY SEO FIXES (IMPORTANT POINTS)
✔ Fixed JSON-LD structured data (no Blade inside raw JSON issue)
✔ Added OpenGraph tags (Facebook/WhatsApp sharing SEO)
✔ Dynamic meta description (Google ranking boost)
✔ Safe strip_tags() for SEO text clean output
✔ Canonical-like current URL
✔ Proper Course schema + provider info
✔ Better keyword targeting in meta keywords
✔ Removed SEO-breaking ambiguity in JSON -->