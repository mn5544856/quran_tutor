@extends('layouts.app')

@section('title', $post->seo_title ?? $post->title)
@section('meta_description', $post->seo_description ?? Str::limit(strip_tags($post->content), 160))
@section('meta_keywords', $post->category->name ?? 'Islamic Education, Quran Learning')

@section('content')

<!-- HERO HEADER - Enhanced -->
<section class="relative bg-gradient-to-r from-green-900 to-emerald-900 text-white py-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <!-- Category Badge -->
        @if($post->category)
        <a href="{{ route('blog.categories', $post->category->slug) }}" 
           class="inline-block bg-emerald-500/20 backdrop-blur-sm text-emerald-200 px-4 py-2 rounded-full text-sm font-semibold mb-6 hover:bg-emerald-500/30 transition">
            {{ $post->category->name }}
        </a>
        @endif
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6 max-w-5xl mx-auto">
            {{ $post->title }}
        </h1>
        
        @if($post->excerpt)
        <p class="text-xl text-green-100 max-w-3xl mx-auto leading-relaxed">
            {{ $post->excerpt }}
        </p>
        @endif
        
        <!-- Meta Info Cards -->
        <div class="flex flex-wrap items-center justify-center gap-6 mt-8">
            <!-- Date Card -->
            <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-5 py-2">
                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-sm">{{ optional($post->published_at)->format('F d, Y') }}</span>
            </div>
            
            <!-- Views Card -->
            <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-5 py-2">
                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span class="text-sm">{{ number_format($post->views ?? 0) }} views</span>
            </div>
            
            <!-- Reading Time Card -->
            <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-5 py-2">
                <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-sm">{{ $post->reading_time ?? '5' }} min read</span>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT WITH SIDEBAR -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
            <a href="{{ route('blog.index') }}" class="hover:text-emerald-600">Home</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @if($post->category)
            <a href="{{ route('blog.categories', $post->category->slug) }}" class="hover:text-emerald-600">
                {{ $post->category->name }}
            </a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            @endif
            <span class="text-gray-700">{{ Str::limit($post->title, 50) }}</span>
        </nav>
        
        <!-- Two Column Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- LEFT COLUMN: MAIN CONTENT (8 columns) -->
            <div class="lg:col-span-8">
                
                <!-- Featured Image -->
                @if($post->featured_image)
                <div class="mb-8 overflow-hidden rounded-2xl shadow-lg">
                    <img src="{{ asset($post->featured_image) }}" 
                         alt="{{ $post->title }}"
                         class="w-full object-cover transform hover:scale-105 transition-transform duration-500">
                </div>
                @endif
                
                <!-- Blog Content Card -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-6 md:p-8">
                        
                        <!-- Content with Typography -->
                        <div class="prose prose-lg max-w-none 
                                    prose-headings:font-bold 
                                    prose-headings:text-gray-900 
                                    prose-h1:text-3xl 
                                    prose-h2:text-2xl 
                                    prose-h3:text-xl
                                    prose-p:text-gray-700 
                                    prose-p:leading-relaxed
                                    prose-p:mb-4
                                    prose-a:text-emerald-700 
                                    prose-a:no-underline 
                                    hover:prose-a:text-emerald-900 
                                    hover:prose-a:underline
                                    prose-img:rounded-lg 
                                    prose-img:shadow-md
                                    prose-img:my-6
                                    prose-blockquote:border-l-emerald-700 
                                    prose-blockquote:bg-emerald-50 
                                    prose-blockquote:p-4 
                                    prose-blockquote:rounded-lg
                                    prose-blockquote:italic
                                    prose-code:bg-gray-100 
                                    prose-code:px-1.5 
                                    prose-code:py-0.5 
                                    prose-code:rounded 
                                    prose-code:text-emerald-800
                                    prose-code:font-mono
                                    prose-pre:bg-gray-900 
                                    prose-pre:text-gray-100
                                    prose-pre:rounded-lg
                                    prose-pre:p-4
                                    prose-ul:list-disc
                                    prose-ol:list-decimal
                                    prose-li:my-2">
                            
                            {!! $post->content_html ?? $post->content !!}
                            
                        </div>
                        
                        <!-- Post Footer with Tags -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            
                            <!-- Categories & Tags -->
                            <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                                <div class="flex items-center gap-3">
                                    <span class="font-medium text-gray-700">Category:</span>
                                    @if($post->category)
                                    <a href="{{ route('blog.categories', $post->category->slug) }}" 
                                       class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-sm hover:bg-emerald-200 transition">
                                        {{ $post->category->name }}
                                    </a>
                                    @endif
                                </div>
                                
                                <!-- Share Buttons -->
                                <div class="flex items-center gap-3">
                                    <span class="font-medium text-gray-700">Share:</span>
                                    
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                       target="_blank"
                                       class="text-gray-500 hover:text-blue-600 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2.5V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.5V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12"/>
                                        </svg>
                                    </a>
                                    
                                    <!-- Twitter -->
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ $post->title }}" 
                                       target="_blank"
                                       class="text-gray-500 hover:text-black transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M18.9 2H22l-6.8 7.8L23 22h-6.8l-5.3-6.6L5 22H2l7.3-8.4L1 2h6.9l4.8 6L18.9 2z"/>
                                        </svg>
                                    </a>
                                    
                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}" 
                                       target="_blank"
                                       class="text-gray-500 hover:text-green-600 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.5 3.5A11.8 11.8 0 0 0 2.1 18.2L1 23l4.9-1.3A11.8 11.8 0 0 0 20.5 3.5zM12 20a8 8 0 0 1-4.1-1.1l-.3-.2-2.9.8.8-2.8-.2-.3A8 8 0 1 1 12 20z"/>
                                        </svg>
                                    </a>
                                    
                                    <!-- LinkedIn -->
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}" 
                                       target="_blank"
                                       class="text-gray-500 hover:text-blue-700 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 3a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 5H2v14h4V8H4zm7 0H7v14h4v-7c0-2 3-2.2 3 0v7h4v-8c0-5-6-5-7-2V8z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Navigation (Previous/Next) -->
                            @if(isset($previousPost) || isset($nextPost))
                            <div class="flex flex-wrap justify-between gap-4 pt-6 border-t border-gray-200">
                                @if(isset($previousPost) && $previousPost)
                                <a href="{{ route('blog.show', $previousPost->slug) }}" 
                                   class="flex items-center gap-2 text-emerald-600 hover:text-emerald-700 group">
                                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    <span class="text-sm">Previous: {{ Str::limit($previousPost->title, 40) }}</span>
                                </a>
                                @endif
                                
                                @if(isset($nextPost) && $nextPost)
                                <a href="{{ route('blog.show', $nextPost->slug) }}" 
                                   class="flex items-center gap-2 text-emerald-600 hover:text-emerald-700 group">
                                    <span class="text-sm">Next: {{ Str::limit($nextPost->title, 40) }}</span>
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                @endif
                            </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
                
                <!-- Related Posts Section -->
                @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <span>📚</span> You May Also Like
                    </h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($relatedPosts as $related)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
                            @if($related->featured_image)
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset($related->featured_image) }}" 
                                     alt="{{ $related->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            @endif
                            <div class="p-4">
                                <h4 class="font-bold mb-2 line-clamp-2">
                                    <a href="{{ route('blog.show', $related->slug) }}" class="hover:text-emerald-600">
                                        {{ $related->title }}
                                    </a>
                                </h4>
                                <div class="text-sm text-gray-500">
                                    {{ optional($related->published_at)->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
            </div>
            
            <!-- RIGHT COLUMN: SIDEBAR (4 columns) -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Search Widget -->
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-emerald-600 inline-block">
                        Search
                    </h3>
                    
                    <form action="{{ route('blog.index') }}" method="GET" class="mt-4">
                        <div class="relative">
                            <input type="text" 
                                   name="search"
                                   placeholder="Search articles..." 
                                   value="{{ request('search') }}"
                                   class="w-full border border-gray-300 rounded-lg pl-4 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400 hover:text-emerald-700 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Categories Widget -->
<div class="bg-white rounded-xl shadow-md p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-emerald-600 inline-block">
        Categories
    </h3>
    
    <div class="space-y-2 mt-4">
        @forelse($categories as $cat)
        <a href="{{ route('blog.categories', $cat->slug) }}" 
           class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-50 transition group">
            <span class="text-gray-700 group-hover:text-emerald-600">{{ $cat->name }}</span>
            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $cat->posts_count }}</span>
        </a>
        @empty
        <p class="text-gray-500 text-center py-4">No categories found</p>
        @endforelse
    </div>
</div>
                
                <!-- Popular Posts Widget -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-emerald-600 inline-block">
                        🔥 Popular Posts
                    </h3>
                    
                    <div class="space-y-4 mt-4">
                        @php
                            $popularPosts = \App\Models\Post::published()
                                ->orderBy('views', 'desc')
                                ->limit(5)
                                ->get();
                        @endphp
                        
                        @forelse($popularPosts as $popular)
                        <a href="{{ route('blog.show', $popular->slug) }}" 
                           class="block group hover:bg-gray-50 p-2 rounded-lg transition">
                            <div class="flex gap-3">
                                @if($popular->featured_image)
                                <img src="{{ asset($popular->featured_image) }}" 
                                     alt="{{ $popular->title }}"
                                     class="w-16 h-16 object-cover rounded-lg">
                                @else
                                <div class="w-16 h-16 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-8 h-8 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                @endif
                                
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 group-hover:text-emerald-600 line-clamp-2 text-sm">
                                        {{ $popular->title }}
                                    </h4>
                                    <div class="flex items-center gap-2 mt-1">
                                        <p class="text-xs text-gray-500">
                                            {{ optional($popular->published_at)->format('M d, Y') }}
                                        </p>
                                        <span class="text-xs text-emerald-600">• {{ number_format($popular->views) }} views</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        <p class="text-gray-500 text-center py-4">No popular posts</p>
                        @endforelse
                    </div>
                </div>
                
                <!-- Latest Posts Widget -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-emerald-600 inline-block">
                        🆕 Latest Posts
                    </h3>
                    
                    <div class="space-y-3 mt-4">
                        @forelse($latestPosts ?? [] as $latest)
                        <a href="{{ route('blog.show', $latest->slug) }}" 
                           class="block hover:bg-gray-50 p-2 rounded-lg transition">
                            <div class="font-medium text-gray-800 hover:text-emerald-600 line-clamp-2 text-sm">
                                {{ $latest->title }}
                            </div>
                            <div class="text-xs text-gray-400 mt-1">
                                {{ optional($latest->published_at)->diffForHumans() }}
                            </div>
                        </a>
                        @empty
                        <p class="text-gray-500 text-center py-4">No latest posts</p>
                        @endforelse
                    </div>
                    
                    <div class="mt-4 pt-3 border-t border-gray-200">
                        <a href="{{ route('blog.index') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium inline-flex items-center gap-1">
                            View All Articles
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                {{-- <!-- Newsletter Widget -->
                <div class="bg-gradient-to-r from-emerald-600 to-green-700 rounded-xl shadow-md p-6 text-white">
                    <h3 class="text-xl font-bold mb-3">📧 Subscribe</h3>
                    <p class="text-sm text-emerald-100 mb-4">Get latest posts delivered to your inbox</p>
                    <form action="{{ route('newsletter.subscribe') ?? '#' }}" method="POST">
                        @csrf
                        <input type="email" 
                               name="email" 
                               placeholder="Your email address" 
                               class="w-full px-4 py-2 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-yellow-400 mb-3"
                               required>
                        <button type="submit" 
                                class="w-full bg-yellow-400 hover:bg-yellow-500 text-green-900 font-semibold py-2 rounded-lg transition">
                            Subscribe
                        </button>
                    </form>
                </div> --}}
                
            </div>
        </div>
        
    </div>
</section>

<!-- CTA SECTION -->
<section class="relative bg-gradient-to-r from-green-900 to-emerald-900 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    </div>
    
    <div class="relative max-w-6xl mx-auto text-center px-4">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Start Your Quran Learning Journey Today
        </h2>
        <p class="text-emerald-100 mb-8 text-lg max-w-2xl mx-auto">
            Join thousands of students learning Quran online with expert tutors. One-on-one live classes for kids and adults.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('free-trial.index') }}"
               class="inline-block bg-yellow-400 hover:bg-yellow-300 text-green-900 px-8 py-3 rounded-full font-semibold transition shadow-lg hover:shadow-xl text-lg">
                Start Free Trial →
            </a>
            <a href="{{ route('contact.index') }}"
               class="inline-block border border-white/30 hover:bg-white/10 text-white px-8 py-3 rounded-full font-semibold transition">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection