@extends('layouts.app')

@section('title', $post->seo_title ?? $post->title)

@section('meta_description', $post->seo_description)

@section('content')

<!-- HERO HEADER -->
<section class="bg-green-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
            {{ $post->title }}
        </h1>
        
        @if($post->excerpt)
            <p class="text-xl text-green-100 max-w-3xl mx-auto">
                {{ $post->excerpt }}
            </p>
        @endif
        
        <div class="flex items-center justify-center gap-4 text-sm text-green-200 mt-6">
            <span>{{ optional($post->published_at)->format('F d, Y') }}</span>
            <span>•</span>
            <span>{{ $post->views ?? 0 }} views</span>
            <span>•</span>
            <span>{{ $post->reading_time ?? '5' }} min read</span>
        </div>
    </div>
</section>

<!-- MAIN CONTENT WITH SIDEBAR - GRID LAYOUT -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Two Column Grid: Content (70%) + Sidebar (30%) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- LEFT COLUMN: MAIN CONTENT (8 columns out of 12 = 66%) -->
            <div class="lg:col-span-8">
                
                @if($post->featured_image)
                    <div class="mb-8">
                        <img src="{{ $post->featured_image }}" 
                             alt="{{ $post->title }}"
                             class="w-full rounded-xl shadow-md">
                    </div>
                @endif
                
                <!-- Blog Content with Typography -->
                <div class="prose prose-lg max-w-none 
                            prose-headings:font-bold 
                            prose-headings:text-gray-900 
                            prose-p:text-gray-700 
                            prose-p:leading-relaxed
                            prose-a:text-green-700 
                            prose-a:no-underline 
                            hover:prose-a:text-green-900 
                            hover:prose-a:underline
                            prose-img:rounded-lg 
                            prose-img:shadow-md
                            prose-blockquote:border-l-green-700 
                            prose-blockquote:bg-green-50 
                            prose-blockquote:p-4 
                            prose-blockquote:rounded-lg
                            prose-code:bg-gray-100 
                            prose-code:px-1 
                            prose-code:py-0.5 
                            prose-code:rounded 
                            prose-code:text-green-800
                            prose-pre:bg-gray-900 
                            prose-pre:text-gray-100">
                    
                    {!! $post->content_html !!}
                    
                </div>
                
                <!-- Post Footer -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap justify-between items-center gap-4">
                        <div class="text-sm text-gray-500">
                            <span class="font-medium">Category:</span> 
                            <span class="text-green-700">{{ $post->category ?? 'Islamic Education' }}</span>
                        </div>
                        
                        <div class="flex items-center gap-4">
    <span class="font-medium text-gray-700">Share:</span>

    <!-- Facebook -->
    <a href="#" class="text-gray-500 hover:text-blue-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2.5V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.5V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12"/>
        </svg>
    </a>

    <!-- Twitter / X -->
    <a href="#" class="text-gray-500 hover:text-black transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M18.9 2H22l-6.8 7.8L23 22h-6.8l-5.3-6.6L5 22H2l7.3-8.4L1 2h6.9l4.8 6L18.9 2z"/>
        </svg>
    </a>

    <!-- WhatsApp -->
    <a href="#" class="text-gray-500 hover:text-green-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.5 3.5A11.8 11.8 0 0 0 2.1 18.2L1 23l4.9-1.3A11.8 11.8 0 0 0 20.5 3.5zM12 20a8 8 0 0 1-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1 1 12 20z"/>
        </svg>
    </a>

    <!-- LinkedIn -->
    <a href="#" class="text-gray-500 hover:text-blue-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4 3a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 5H2v14h4V8H4zm7 0H7v14h4v-7c0-2 3-2.2 3 0v7h4v-8c0-5-6-5-7-2V8z"/>
        </svg>
    </a>

</div>
                    </div>
                </div>
                
                
            </div>
            
            <!-- RIGHT COLUMN: SIDEBAR (4 columns out of 12 = 33%) -->
            <div class="lg:col-span-4 space-y-8">
                
                {{--
<!-- SEARCH BAR -->
<div class="bg-gray-50 rounded-xl p-6 sticky top-6">
    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-green-700 inline-block">
        Search
    </h3>
    
    <form action="{{ route('blog.search') }}" method="GET" class="mt-4">
        <div class="relative">
            <input type="text" 
                   name="search"
                   placeholder="Search articles..." 
                   class="w-full border border-gray-300 rounded-lg pl-4 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                <svg class="w-5 h-5 text-gray-400 hover:text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </form>
</div>
--}}
                
                <!-- LATEST ARTICLES -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-green-700 inline-block">
                        Latest Articles
                    </h3>
                    
                    <div class="space-y-4 mt-4">
                        @php
                            $latestPosts = \App\Models\Post::where('published_at', '<=', now())
                                ->orderBy('published_at', 'desc')
                                ->limit(5)
                                ->get();
                        @endphp
                        
                        @forelse($latestPosts as $latest)
                            <a href="{{ route('blog.show', $latest->slug) }}" 
                               class="block group hover:bg-white p-3 rounded-lg transition duration-200">
                                <div class="flex gap-3">
                                    @if($latest->featured_image)
                                        <img src="{{ $latest->featured_image }}" 
                                             alt="{{ $latest->title }}"
                                             class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800 group-hover:text-green-700 line-clamp-2">
                                            {{ $latest->title }}
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ optional($latest->published_at)->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 text-center py-4">No articles found</p>
                        @endforelse
                    </div>
                    
                    <!-- View All Link -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <a href="{{ route('blog.index') }}" 
                           class="text-green-700 hover:text-green-800 font-medium text-sm inline-flex items-center gap-1">
                            View All Articles
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- CATEGORIES (Optional Bonus) -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-green-700 inline-block">
                        Categories
                    </h3>
                    
                    <div class="flex flex-wrap gap-2 mt-4">
                        @php
                            $categories = ['Tajweed', 'Hifz', 'Noorani Qaida', 'Islamic Studies', 'Dua', 'Salah'];
                        @endphp
                        
                        @foreach($categories as $cat)
                            <a href="#" class="bg-white hover:bg-green-700 text-gray-700 hover:text-white px-3 py-1 rounded-full text-sm transition border border-gray-200">
                                {{ $cat }}
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- NEWSLETTER SIGNUP (Optional Bonus) -->
                <!-- <div class="bg-gradient-to-r from-green-700 to-green-800 rounded-xl p-6 text-white">
                    <h3 class="text-xl font-bold mb-3">Newsletter</h3>
                    <p class="text-sm text-green-100 mb-4">
                        Subscribe to get latest articles in your inbox.
                    </p>
                    <form action="#" method="POST" class="space-y-3">
                        <input type="email" 
                               placeholder="Your email address" 
                               class="w-full rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-white">
                        <button type="submit" 
                                class="w-full bg-white text-green-700 hover:bg-gray-100 font-semibold py-2 rounded-lg transition">
                            Subscribe
                        </button>
                    </form>
                </div> -->
                
            </div>
        </div>
        
    </div>
</section>

<!-- CTA SECTION -->
<section class="bg-green-50 py-16 mt-8">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-green-900 mb-4">
            Learn Quran Online With Expert Teachers
        </h2>
        <p class="text-gray-600 mb-8 text-lg max-w-2xl mx-auto">
            Join our structured Quran courses including Tajweed, Hifz and Noorani Qaida.
        </p>
        <a href="{{ route('free-trial.index') }}"
           class="inline-block bg-green-700 hover:bg-green-800 text-white px-10 py-4 rounded-full font-semibold transition shadow-lg hover:shadow-xl text-lg">
            Start Free Trial →
        </a>
    </div>
</section>

@endsection