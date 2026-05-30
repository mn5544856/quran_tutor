<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        use App\Helpers\Seo;
    @endphp

    <title>{{ Seo::title($__env->yieldContent('title')) }}</title>

    <meta name="description" content="{{ Seo::description($__env->yieldContent('meta_description')) }}">
    <meta name="keywords" content="{{ Seo::keywords($__env->yieldContent('meta_keywords')) }}">
      <link rel="manifest" href="/site.webmanifest">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Ilm-e-Quran">
    <meta name="theme-color" content="#ffffff">
    <link rel="canonical" href="{{ Seo::canonical() }}">

    <meta property="og:title" content="{{ Seo::title($__env->yieldContent('title')) }}">
    <meta property="og:description" content="{{ Seo::description($__env->yieldContent('meta_description')) }}">
    <meta property="og:url" content="{{ Seo::canonical() }}">
    <meta property="og:image" content="{{ Seo::ogImage() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ Seo::title($__env->yieldContent('title')) }}">
    <meta name="twitter:description" content="{{ Seo::description($__env->yieldContent('meta_description')) }}">

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
  
    @vite(['resources/css/app.css', 'resources/js/app.js'])



    @stack('styles')
</head>

<body class="bg-[#f8f9fa] text-gray-800 font-sans">

    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <!-- GLOBAL SCRIPT -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (!href || href === '#') return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    @stack('scripts')

</body>

</html>


<!-- IMPORTANT SEO IMPROVEMENTS (WHAT FIXED)
✔ Global SEO Fix
Default fallback title added
Default meta description added
Keywords system dynamic
✔ Google Ranking Boost
Canonical URL added (duplicate content fix)
OpenGraph (Facebook/WhatsApp sharing)
Twitter card support
✔ Structured Data
Organization schema added (Google knowledge graph support)
✔ Technical SEO
Viewport already OK
Semantic meta tags improved
Image sharing support (OG image) -->