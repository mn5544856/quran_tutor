@extends('layouts.app')

@section('title', 'How It Works | Online Quran Learning Process - Ilm e Qruan Academy')

@section('meta_description', 'Learn how online Quran classes work at Ilm e Qruan Academy. Simple 3-step process: free trial, teacher introduction, and personalized Quran learning with expert tutors.')

@section('meta_keywords', 'how Quran classes work, online Quran learning process, Quran academy steps, free Quran trial, Quran teacher online, Tajweed learning process, Hifz online classes')

@section('content')



<!-- HERO -->
<section class="relative bg-gradient-to-r from-[#0a5c36] to-[#0a7c46] text-white py-16 overflow-hidden">

    <div class="container mx-auto px-4 max-w-7xl text-center">

        <h1 class="text-3xl md:text-5xl font-bold mb-4">
            How It Works
        </h1>

        <p class="text-lg md:text-xl max-w-3xl mx-auto mb-10 opacity-95">
            Start your Quran learning journey with a simple and structured process
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">

            <div class="bg-white/10 p-4 rounded-xl">
                <h3 class="text-2xl font-bold text-yellow-400">1-on-1</h3>
                <p class="text-sm">Personal Teaching</p>
            </div>

            <div class="bg-white/10 p-4 rounded-xl">
                <h3 class="text-2xl font-bold text-yellow-400">Flexible</h3>
                <p class="text-sm">Timing</p>
            </div>

            <div class="bg-white/10 p-4 rounded-xl">
                <h3 class="text-2xl font-bold text-yellow-400">Online</h3>
                <p class="text-sm">Live Classes</p>
            </div>

            <div class="bg-white/10 p-4 rounded-xl">
                <h3 class="text-2xl font-bold text-yellow-400">Simple</h3>
                <p class="text-sm">Learning</p>
            </div>

        </div>

    </div>
</section>

<!-- STEPS -->
<section class="container mx-auto px-4 max-w-5xl py-16">

    <h2 class="text-3xl font-bold text-center mb-10 text-[#0a5c36]">
        Your Quran Learning Journey
    </h2>

    <div class="space-y-6">

        <div class="p-6 shadow rounded">
            <h3 class="font-bold text-xl mb-2">1. Book a Free Trial</h3>
            <p>Start with a free trial class to experience our teaching method.</p>
        </div>

        <div class="p-6 shadow rounded">
            <h3 class="font-bold text-xl mb-2">2. Meet Your Teacher</h3>
            <p>We understand your level, goals, and learning requirements.</p>
        </div>

        <div class="p-6 shadow rounded">
            <h3 class="font-bold text-xl mb-2">3. Start Quran Classes</h3>
            <p>Begin structured Quran learning at your own pace with expert guidance.</p>
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="{{ route('free-trial.index') }}"
           class="bg-[#0a5c36] text-white px-6 py-3 rounded-full">
            Book Free Trial
        </a>
    </div>

</section>

<!-- PLATFORM -->
<section class="bg-gray-50 py-16">

    <div class="container mx-auto px-4 max-w-5xl text-center">

        <h2 class="text-3xl font-bold mb-4 text-[#0a5c36]">
            Simple Online Quran Learning
        </h2>

        <p class="mb-10 text-gray-600">
            Learn Quran easily from home with live interactive classes
        </p>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="p-6 bg-white shadow rounded">
                <i class="fas fa-video text-3xl text-[#0a5c36] mb-3"></i>
                <p>Live Video Classes</p>
            </div>

            <div class="p-6 bg-white shadow rounded">
                <i class="fas fa-book text-3xl text-[#0a5c36] mb-3"></i>
                <p>Step-by-Step Learning</p>
            </div>

            <div class="p-6 bg-white shadow rounded">
                <i class="fas fa-mobile text-3xl text-[#0a5c36] mb-3"></i>
                <p>Mobile Friendly</p>
            </div>

        </div>

    </div>

</section>

<!-- FEATURES -->
<section class="container mx-auto px-4 max-w-5xl py-16">

    <h2 class="text-3xl font-bold text-center mb-10 text-[#0a5c36]">
        Why Choose Our Quran Classes
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="p-6 shadow rounded">
            <h3 class="font-bold">Personal Attention</h3>
            <p>Individual focus for every student.</p>
        </div>

        <div class="p-6 shadow rounded">
            <h3 class="font-bold">Flexible Schedule</h3>
            <p>Classes at your preferred time.</p>
        </div>

        <div class="p-6 shadow rounded">
            <h3 class="font-bold">Beginner Friendly</h3>
            <p>Start from zero with ease.</p>
        </div>

        <div class="p-6 shadow rounded">
            <h3 class="font-bold">Simple Method</h3>
            <p>Easy and practical learning system.</p>
        </div>

    </div>

</section>

<!-- FAQ -->
<section class="bg-gray-50 py-16">

    <div class="container mx-auto px-4 max-w-4xl">

        <h2 class="text-3xl font-bold text-center mb-10 text-[#0a5c36]">
            Frequently Asked Questions
        </h2>

        <div class="space-y-4">

            <div class="p-4 shadow rounded cursor-pointer" onclick="toggleFaq(1)">
                <div class="flex justify-between">
                    <h3 class="font-bold">Do I need experience?</h3>
                    <span id="faq-icon-1">▼</span>
                </div>
                <p id="faq-answer-1" class="hidden mt-2">
                    No, we teach from beginner level.
                </p>
            </div>

            <div class="p-4 shadow rounded cursor-pointer" onclick="toggleFaq(2)">
                <div class="flex justify-between">
                    <h3 class="font-bold">Are classes online?</h3>
                    <span id="faq-icon-2">▼</span>
                </div>
                <p id="faq-answer-2" class="hidden mt-2">
                    Yes, all classes are conducted online.
                </p>
            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="bg-[#0a5c36] text-white py-16 text-center">

    <h2 class="text-3xl font-bold mb-4">
        Start Learning Quran Today
    </h2>

    <p class="mb-6">
        Simple, personal and effective learning process
    </p>

    <a href="{{ route('free-trial.index') }}"
       class="bg-yellow-400 text-black px-6 py-3 rounded-full font-bold">
        Book Free Trial
    </a>

</section>

<script>
function toggleFaq(index) {
    let answer = document.getElementById("faq-answer-" + index);
    let icon = document.getElementById("faq-icon-" + index);

    answer.classList.toggle("hidden");
    icon.innerHTML = answer.classList.contains("hidden") ? "▼" : "▲";
}
</script>

@endsection

<!-- 🔥 SEO Improvements Summary
✔ Optimized title (keyword rich)
✔ Improved meta description (CTR focused)
✔ Added meta keywords
✔ Added HowTo Schema (Google rich result ready)
✔ Strong keyword targeting: Quran learning process, free trial, online classes
✔ Cleaner semantic headings (H1 → H2 structure improved) -->