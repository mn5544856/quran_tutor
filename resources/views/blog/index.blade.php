@extends('layouts.app')

@section('title', isset($search) ? "Search Results: {$search}" : 'Islamic Blog | Learn Quran & Islamic Education')
@section('meta_description', isset($search) 
    ? "Search results for '{$search}' - Find Islamic articles and Quran learning resources" 
    : 'Explore our collection of Islamic articles, Quran learning guides, and educational resources for students of all ages.')

@section('content')

<!-- Simple Header instead of Hero -->
<section class="bg-gray-50 border-b border-gray-200 py-8">
    <div class="max-w-7xl mx-auto px-4">
        @if(isset($search))
            <div class="flex items-center gap-3 text-sm text-gray-500 mb-2">
                <a href="{{ route('blog.index') }}" class="hover:text-emerald-600">Blog</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span>Search Results</span>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                Search: "{{ $search }}"
            </h1>
            <p class="text-gray-600 mt-2">
                Found <span class="font-semibold text-emerald-600">{{ $posts->total() }}</span> article(s)
            </p>
        @else
            <div class="flex items-center gap-3 text-sm text-gray-500 mb-2">
                <a href="{{ route('home') }}" class="hover:text-emerald-600">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span>Blog</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                Our Blog
            </h1>
            <p class="text-gray-600 mt-2 max-w-2xl">
                Discover authentic Islamic knowledge, Quranic insights, and practical guidance for your spiritual journey
            </p>
        @endif
    </div>
</section>

<!-- Main Content Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Main Content Area -->
            <div class="lg:col-span-8">
                @if($posts->isNotEmpty())
                    <div class="space-y-6">
                        @foreach($posts as $post)
                            <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 group">
                                <div class="md:flex">
                                    <!-- Featured Image -->
                                    @if($post->featured_image)
                                        <div class="md:w-1/3 overflow-hidden">
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                <img src="{{ asset($post->featured_image) }}" 
                                                     alt="{{ $post->title }}"
                                                     class="w-full h-32 md:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            </a>
                                        </div>
                                        <div class="md:w-2/3 p-4">
                                    @else
                                        <div class="p-4">
                                    @endif
                                        
                                        <!-- Category Badge -->
                                        @if($post->category)
                                            <a href="{{ route('blog.categories', $post->category->slug) }}" 
                                               class="inline-block bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full text-xs font-semibold mb-2 hover:bg-emerald-200 transition">
                                                {{ $post->category->name }}
                                            </a>
                                        @endif
                                        
                                        <!-- Title -->
                                        <h2 class="text-xl font-bold mb-1 line-clamp-2">
                                            <a href="{{ route('blog.show', $post->slug) }}" 
                                               class="text-gray-800 hover:text-emerald-700 transition">
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                        
                                        <!-- Meta Info -->
                                        <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500 mb-2">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                <span>{{ number_format($post->views ?? 0) }} views</span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                </svg>
                                                <span>{{ $post->reading_time ?? ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                                            </div>
                                        </div>
                                        
                                        <!-- Excerpt -->
                                        <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                                        </p>
                                        
                                        <!-- Read More Link -->
                                        <a href="{{ route('blog.show', $post->slug) }}"
                                           class="inline-flex items-center gap-1 text-emerald-700 font-semibold text-sm hover:text-emerald-800 transition group">
                                            Read More
                                            <svg class="w-3 h-3 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="bg-white rounded-xl shadow-md p-8 text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">No articles found</h3>
                        <p class="text-gray-500 text-sm mb-4">
                            @if(isset($search))
                                We couldn't find any articles matching "{{ $search }}"
                            @else
                                No blog posts available at the moment
                            @endif
                        </p>
                        <a href="{{ route('blog.index') }}" 
                           class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Blog
                        </a>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Search Widget -->
                <div class="bg-white rounded-xl shadow-md p-5 sticky top-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 pb-2 border-b-2 border-emerald-600 inline-block">
                        Search Articles
                    </h3>
                    
                    <form action="{{ route('blog.index') }}" method="GET" class="mt-3">
                        <div class="relative">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search by title or content..."
                                   class="w-full border border-gray-300 rounded-lg pl-4 pr-12 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm">
                            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-4 h-4 text-gray-400 hover:text-emerald-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                        
                        @if(request('search'))
                            <div class="mt-2">
                                <a href="{{ route('blog.index') }}" class="text-xs text-emerald-600 hover:text-emerald-700">
                                    Clear search →
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
                
                <!-- Categories Widget -->
                @php
                    $sidebarCategories = App\Models\PostCategory::where('is_active', true)
                        ->withCount(['posts' => function($query) {
                            $query->published();
                        }])
                        ->having('posts_count', '>', 0)
                        ->orderBy('posts_count', 'desc')
                        ->limit(10)
                        ->get();
                @endphp
                
                @if($sidebarCategories->isNotEmpty())
                <div class="bg-white rounded-xl shadow-md p-5">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 pb-2 border-b-2 border-emerald-600 inline-block">
                        Categories
                    </h3>
                    
                    <div class="space-y-2 mt-3">
                        @foreach($sidebarCategories as $category)
                        <a href="{{ route('blog.categories', $category->slug) }}" 
                           class="flex justify-between items-center p-2 rounded-lg hover:bg-gray-50 transition group">
                            <span class="text-gray-700 text-sm group-hover:text-emerald-600">{{ $category->name }}</span>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">{{ $category->posts_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Popular Posts Widget -->
                @php
                    $popularPosts = App\Models\Post::published()
                        ->orderBy('views', 'desc')
                        ->limit(5)
                        ->get();
                @endphp
                
                @if($popularPosts->isNotEmpty())
                <div class="bg-white rounded-xl shadow-md p-5">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 pb-2 border-b-2 border-emerald-600 inline-block">
                        🔥 Most Popular
                    </h3>
                    
                    <div class="space-y-3 mt-3">
                        @foreach($popularPosts as $popular)
                        <a href="{{ route('blog.show', $popular->slug) }}" 
                           class="block group hover:bg-gray-50 p-2 rounded-lg transition">
                            <div class="flex gap-3">
                                @if($popular->featured_image)
                                <img src="{{ asset($popular->featured_image) }}" 
                                     alt="{{ $popular->title }}"
                                     class="w-12 h-12 object-cover rounded-lg">
                                @else
                                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                @endif
                                
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-semibold text-gray-800 group-hover:text-emerald-600 line-clamp-2 text-sm">
                                        {{ $popular->title }}
                                    </h4>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-xs text-emerald-600">{{ number_format($popular->views) }} views</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Latest Posts Widget -->
                @php
                    $latestPostsList = App\Models\Post::published()
                        ->latest('published_at')
                        ->limit(5)
                        ->get();
                @endphp
                
                @if($latestPostsList->isNotEmpty())
                <div class="bg-white rounded-xl shadow-md p-5">
                    <h3 class="text-lg font-bold text-gray-800 mb-3 pb-2 border-b-2 border-emerald-600 inline-block">
                        🆕 Latest Updates
                    </h3>
                    
                    <div class="space-y-2 mt-3">
                        @foreach($latestPostsList as $latest)
                        <a href="{{ route('blog.show', $latest->slug) }}" class="block hover:bg-gray-50 p-2 rounded-lg transition">
                            <div class="font-medium text-gray-800 hover:text-emerald-600 line-clamp-2 text-sm">
                                {{ $latest->title }}
                            </div>
                            <div class="text-xs text-gray-400 mt-0.5">
                                {{ optional($latest->published_at)->diffForHumans() }}
                            </div>
                        </a>
                        @endforeach
                    </div>
                    
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <a href="{{ route('blog.index') }}" class="text-emerald-600 hover:text-emerald-700 text-xs font-medium inline-flex items-center gap-1">
                            View All Articles
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-to-r from-green-900 to-emerald-900 text-white py-12">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-3">Want to Learn Quran Online?</h2>
        <p class="text-emerald-100 mb-6 text-base">
            Join our one-on-one live classes with expert tutors. Start your Quran learning journey today!
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-3">
            <a href="{{ route('free-trial.index') }}"
               class="inline-block bg-yellow-400 hover:bg-yellow-300 text-green-900 px-6 py-2.5 rounded-full font-semibold transition shadow-lg text-sm">
                Start Free Trial
            </a>
            <a href="{{ route('courses.index') }}"
               class="inline-block border border-white/30 hover:bg-white/10 text-white px-6 py-2.5 rounded-full font-semibold transition text-sm">
                Browse Courses
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush