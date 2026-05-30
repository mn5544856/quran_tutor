<!-- resources/views/components/header.blade.php -->

<header class="sticky top-0 z-50 bg-gradient-to-r from-[#0a5c36] to-[#0a7c46] shadow-lg" role="banner">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- TOP BAR -->
        <div class="flex items-center justify-between h-16 md:h-20">

            <!-- LOGO (SEO: HOME LINK + BRAND SIGNAL) -->
            <!-- LOGO -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-white hover:opacity-90 transition"
                aria-label="Go to Ilm e Quran Home">

<img 
    src="{{ asset('images/logo.svg') }}" 
    alt="Ilm e Quran Logo"
    class="h-8 sm:h-10 md:h-12 lg:h-14 w-auto object-contain"
/>

                <span class="text-xl md:text-2xl font-bold text-yellow-300">
                    Ilm e Quran
                </span>
            </a>

            <!-- DESKTOP NAVIGATION (SEO: internal linking structure) -->
            <nav class="hidden md:flex items-center gap-6 lg:gap-8" aria-label="Main Navigation">

                <a href="{{ route('home') }}" class="text-white font-medium hover:text-gold transition">
                    Home
                </a>

                <a href="{{ route('courses.index') }}" class="text-white font-medium hover:text-gold transition">
                    Online Ilm e Quran
                </a>

                <a href="{{ route('how-it-works.index') }}" class="text-white font-medium hover:text-gold transition">
                    How It Works
                </a>
                <a href="{{ route('blog.index') }}" class="text-white font-medium hover:text-gold transition">
                    Blog
                </a>

                <a href="{{ route('contact.index') }}" class="text-white font-medium hover:text-gold transition">
                    Contact
                </a>
                <a href="{{ route('library.index') }}" class="text-white font-medium hover:text-gold transition">
                    Library
                </a>

                <a href="{{ route('free-trial.index') }}"
                    class="bg-yellow-400 text-green-900 font-semibold px-8 py-3 rounded-full hover:bg-yellow-300 transition shadow-lg hover:scale-105">
                    Free Trial
                </a>

            </nav>

            <!-- MOBILE BUTTON -->
            <button id="mobileMenuBtn" class="md:hidden text-white text-2xl focus:outline-none" aria-label="Open menu"
                aria-expanded="false">

                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>

        </div>

        <!-- MOBILE NAVIGATION -->
        <div id="mobileMenu" class="hidden md:hidden pb-5 text-center" aria-label="Mobile Navigation">

            <div class="flex flex-col gap-3 pt-4 border-t border-white/20">

                <a href="{{ route('home') }}" class="text-white font-medium hover:text-gold py-2">
                    Home
                </a>

                <a href="{{ route('courses.index') }}" class="text-white font-medium hover:text-gold py-2">
                    Online Ilm e Quran
                </a>

                <a href="{{ route('how-it-works.index') }}" class="text-white font-medium hover:text-gold py-2">
                    How It Works
                </a>
                <a href="{{ route('blog.index') }}" class="text-white font-medium hover:text-gold py-2">
                    Blog
                </a>

                <a href="{{ route('contact.index') }}" class="text-white font-medium hover:text-gold py-2">
                    Contact
                </a>
                <a href="{{ route('library.index') }}" class="text-white font-medium hover:text-gold py-2">
                    Library
                </a>

                <a href="{{ route('free-trial.index') }}"
                    class="bg-yellow-400 text-green-900 font-semibold px-8 py-3 rounded-full hover:bg-yellow-300 transition shadow-lg hover:scale-105">
                    Free Trial Class
                </a>

            </div>
        </div>

    </div>
</header>

<!-- SCRIPT (improved accessibility) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');

        btn.addEventListener('click', function (e) {

            e.stopPropagation();

            menu.classList.toggle('hidden');

            const icon = btn.querySelector('i');

            const isOpen = !menu.classList.contains('hidden');

            btn.setAttribute('aria-expanded', isOpen);

            icon.classList.toggle('fa-bars', !isOpen);
            icon.classList.toggle('fa-xmark', isOpen);
        });

        document.addEventListener('click', function () {
            menu.classList.add('hidden');
            btn.setAttribute('aria-expanded', false);

            const icon = btn.querySelector('i');
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        });

    });
</script>

<!-- 

🔥 IMPORTANT SEO IMPROVEMENTS (SHORT LIST)
✅ 1. Internal Linking SEO strong kiya
"Courses" → Online Ilm e Quran keyword optimized
✅ 2. Accessibility improved
aria-label
aria-expanded
role="banner"
✅ 3. Semantic SEO structure
<nav aria-label="Main Navigation">
✅ 4. Branding SEO signal
Logo link = homepage authority boost
✅ 5. Mobile UX SEO fix
Proper menu state tracking -->