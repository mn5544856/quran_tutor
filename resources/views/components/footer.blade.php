<!-- resources/views/components/footer.blade.php -->

<footer class="bg-[#083822] text-gray-300 pt-12 pb-6" role="contentinfo">

    <div class="container mx-auto px-4 max-w-7xl">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">

           <!-- ABOUT (SEO: Brand + Entity Signal) -->
<div>

    <!-- LOGO -->
<div class="flex items-center gap-3 mb-4">
    
    <img 
    src="https://ilmequran.com/images/logo.svg"
    alt="Ilm E Quran Logo"
    width="120"
    height="48"
    class="h-8 sm:h-10 md:h-12 lg:h-14 w-auto object-contain"
>

    <h3 class="text-white text-lg sm:text-xl font-bold border-l-4 border-gold pl-3 leading-tight">
        Ilm E Quran Online Quran Academy
    </h3>

</div>

    <!-- DESCRIPTION -->
    <p class="text-sm text-gray-400 mb-5 leading-relaxed">
        Learn Quran online with a dedicated personal teacher. I offer one-on-one classes in Tajweed, Hifz, and Quran reading, tailored to each student's level.
    </p>

    <!-- SOCIAL LINKS -->
    <div class="flex gap-3">

        <a href="#" aria-label="Facebook"
           class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
            <i class="fab fa-facebook-f" aria-hidden="true"></i>
        </a>

        <a href="#" aria-label="Twitter"
           class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
            <i class="fab fa-twitter" aria-hidden="true"></i>
        </a>

        <a href="#" aria-label="Instagram"
           class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
            <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>

        <a href="#" aria-label="YouTube"
           class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
            <i class="fab fa-youtube" aria-hidden="true"></i>
        </a>

    </div>

</div>

            <!-- QUICK LINKS (SEO: internal linking boost) -->
            <div>

                <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-gold pl-3">
                    Quick Links
                </h3>

                <ul class="space-y-2">

                    <li><a href="{{ route('home') }}" class="hover:text-gold transition">Home</a></li>

                    <li><a href="{{ route('courses.index') }}" class="hover:text-gold transition">
                        Online Quran Courses
                    </a></li>

                    <li><a href="{{ route('how-it-works.index') }}" class="hover:text-gold transition">
                        How It Works
                    </a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-gold transition">
                        Blog
                    </a></li>

                    <li><a href="{{ route('contact.index') }}" class="hover:text-gold transition">
                        Contact
                    </a></li>
                    <li>
                        <a href="{{ route('library.index') }}" class="hover:text-gold transition">Library</a>
                    </li>

                </ul>
            </div>

            <!-- COURSES (SEO: keyword pages linking) -->
            <div>

                <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-gold pl-3">
                    Quran Courses
                </h3>

                <ul class="space-y-2">

                    <li>
                        <a href="{{ route('courses.category', 'quran-basics') }}" class="hover:text-gold transition">
                            Quran Reading Basics
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('courses.category', 'tajweed') }}" class="hover:text-gold transition">
                            Tajweed & Recitation
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('courses.category', 'hifz') }}" class="hover:text-gold transition">
                            Quran Memorization (Hifz)
                        </a>
                    </li>
                        <li>
                        <a href="{{ route('courses.category', 'noorani-qaida') }}" class="hover:text-gold transition">
                            Noorani Qaida
                        </a>
                    </li>

                </ul>
            </div>

            <!-- CONTACT (Local SEO + trust signals) -->
            <div>

                <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-gold pl-3">
                    Contact Us
                </h3>

              <ul class="space-y-3 text-sm">

    <li class="flex items-center gap-3">
        <i class="fas fa-envelope text-gold" aria-hidden="true"></i>
        <a href="mailto:abdulwaheed3334@gmail.com" class="hover:underline">
            abdulwaheed3334@gmail.com
        </a>
    </li>

    <li class="flex items-center gap-3">
        <i class="fas fa-phone text-gold" aria-hidden="true"></i>
        
        <a href="tel:+923365385030" class="hover:underline">
            +92 336 5385030
        </a>

        <a href="tel:+923476901034" class="hover:underline">
            +92 347 6901034
        </a>
    </li>

    <li class="flex items-center gap-3">
        <i class="fas fa-clock text-gold" aria-hidden="true"></i>
        <span>24/7 Online Support</span>
    </li>

</ul>

            </div>

        </div>

        <!-- COPYRIGHT (SEO trust + freshness signal) -->
        <div class="border-t border-white/10 pt-6 text-center text-sm text-gray-400">

            <p>
                © {{ date('Y') }} Ilm E Quran Online Quran Academy. All Rights Reserved.
            </p>

        </div>

    </div>
</footer>

<!-- 
🔥 SEO IMPROVEMENTS DONE (IMPORTANT)
✅ 1. Brand authority improved
“Ilm E Quran Online Quran Academy” → stronger entity signal
✅ 2. Internal linking SEO boost
Courses, categories, and pages properly linked
✅ 3. Keyword anchors optimized
“Online Quran Courses” instead of generic “Courses”
✅ 4. Local trust signals
Email + phone + 24/7 support = E-E-A-T boost
✅ 5. Accessibility SEO
aria-label added for social icons
role="contentinfo" -->