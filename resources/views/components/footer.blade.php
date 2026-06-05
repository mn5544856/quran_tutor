<!-- resources/views/components/footer.blade.php -->

<footer class="bg-[#083822] text-gray-300 pt-12 pb-6" role="contentinfo">

    <div class="container mx-auto px-4 max-w-7xl">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">

            <!-- ABOUT -->
            <div>

                <div class="flex items-center gap-3 mb-4">

                    <img src="https://ilmequran.com/images/logo.svg"
                         alt="Ilm e Quran Logo"
                         width="120"
                         height="48"
                         class="h-10 w-auto object-contain">

                    <h3 class="text-white text-lg font-bold border-l-4 border-gold pl-3">
                        Ilm e Quran Online Quran Academy
                    </h3>

                </div>

                <p class="text-sm text-gray-400 mb-5 leading-relaxed">
                    Learn Quran online with a dedicated personal teacher. One-on-one classes in Tajweed, Hifz, and Quran reading.
                </p>

                {{-- <!-- SOCIAL LINKS -->
                <div class="flex gap-3">

                    <a href="https://facebook.com/yourpage"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Facebook"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
                        f
                    </a>

                    <a href="https://twitter.com/yourpage"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Twitter"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
                        t
                    </a>

                    <a href="https://instagram.com/yourpage"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Instagram"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
                        i
                    </a>

                    <a href="https://youtube.com/@yourchannel"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="YouTube"
                       class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-yellow-300 hover:text-[#083822] transition">
                        y
                    </a>

                </div> --}}

            </div>

            <!-- QUICK LINKS -->
            <div>

                <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-gold pl-3">
                    Quick Links
                </h3>

                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-gold transition">Home</a></li>
                    <li><a href="{{ route('courses.index') }}" class="hover:text-gold transition">Courses</a></li>
                    <li><a href="{{ route('how-it-works.index') }}" class="hover:text-gold transition">How It Works</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-gold transition">Blog</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-gold transition">Contact</a></li>
                </ul>

            </div>

            <!-- COURSES -->
            <div>

                <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-gold pl-3">
                    Quran Courses
                </h3>

                <ul class="space-y-2">
                    <li><a href="{{ route('courses.show', 'quran-reading-course') }}" class="hover:text-gold transition">Quran Reading Basics</a></li>
                    <li><a href="{{ route('courses.show', 'tajweed-recitation') }}" class="hover:text-gold transition">Tajweed & Recitation</a></li>
                    <li><a href="{{ route('courses.show', 'quran-memorization-hifz') }}" class="hover:text-gold transition">Quran Memorization (Hifz)</a></li>
                    <li><a href="{{ route('courses.show', 'noorani-qaida-course-basic') }}" class="hover:text-gold transition">Noorani Qaida</a></li>
                </ul>

            </div>

            <!-- CONTACT -->
            <div>

                <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-gold pl-3">
                    Contact Us
                </h3>

                <ul class="space-y-3 text-sm">

                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-gold"></i>
                        <a href="mailto:abdulwaheed3334@gmail.com" class="hover:underline">
                            abdulwaheed3334@gmail.com
                        </a>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-gold"></i>
                        <div class="flex flex-col">
                            <a href="tel:+923365385030" class="hover:underline">+92 336 5385030</a>
                            <a href="tel:+923476901034" class="hover:underline">+92 347 6901034</a>
                        </div>
                    </li>

                    <li class="flex items-center gap-3">
                        <i class="fas fa-clock text-gold"></i>
                        <span>24/7 Online Support</span>
                    </li>

                </ul>

            </div>

        </div>

        <!-- COPYRIGHT -->
        <div class="border-t border-white/10 pt-6 text-center text-sm text-gray-400">
            © {{ date('Y') }} Ilm e Quran Online Quran Academy. All Rights Reserved.
        </div>

    </div>

</footer>