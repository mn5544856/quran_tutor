{{-- resources/views/blog/category.blade.php --}}
@extends('layouts.app')

@section('title', $category->name . ' - Blog Category')
@section('meta_description', $category->description ?? 'Browse all posts in ' . $category->name . ' category')

@section('content')
<div class="container mx-auto px-4 py-8">
    
   <!-- Category Header with CSS Resize -->
<div class="bg-linear-to-r from-green-50 to-emerald-50 rounded-2xl p-8 mb-10 shadow-sm">
    <div class="flex items-center justify-between flex-wrap gap-6">
        <div class="flex-1">
            <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-3">{{ $category->name }}</h1>
            @if($category->description)
                <p class="text-gray-600 text-lg">{{ $category->description }}</p>
            @endif
            <div class="flex items-center gap-4 mt-4">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                    📄 Total {{ $posts->total() }} Posts
                </span>
                <a href="{{ route('blog.index') }}" class="text-green-600 hover:text-green-700 text-sm">
                    ← View All Categories
                </a>
            </div>
        </div>
        
        @if($category->image)
        <div class="shrink-0">
            <img src="{{ asset($category->image) }}" 
                 alt="{{ $category->name }}"
                 class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 object-cover rounded-full shadow-lg border-4 border-white">
        </div>
        @endif
    </div>
</div>
    
    <div class="grid lg:grid-cols-3 gap-8">
        
        <!-- Main Content - Posts List -->
        <div class="lg:col-span-2">
            
            @if($posts->count() > 0)
                @foreach($posts as $post)
                <article class="bg-white rounded-xl shadow-md overflow-hidden mb-6 hover:shadow-xl transition-all duration-300">
                    <div class="md:flex">
                        @if($post->featured_image)
                        <div class="md:w-2/5">
                            <img src="{{ asset($post->featured_image) }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-48 md:h-full object-cover">
                        </div>
                        @endif
                        
                        <div class="p-6 {{ $post->featured_image ? 'md:w-3/5' : 'w-full' }} group">
    
    <!-- Category Badge - Glass Morphism -->
    <div class="flex items-center gap-2 mb-4">
        <span class="inline-flex items-center gap-1.5 bg-emerald-500/10 backdrop-blur-sm text-emerald-700 text-xs font-semibold px-3 py-1.5 rounded-full border border-emerald-200/50">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
            {{ $category->name }}
        </span>
        <span class="text-gray-300 text-xs">•</span>
        <span class="text-gray-400 text-xs flex items-center gap-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            {{ $post->published_at->format('M d, Y') }}
        </span>
    </div>
    
    <!-- Title with Gradient on Hover -->
    <h2 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3">
        <a href="{{ route('blog.show', $post->slug) }}" 
           class="bg-linear-to-r from-gray-800 to-gray-800 bg-[length:0px_2px] bg-left-bottom bg-no-repeat transition-all duration-300 hover:bg-[length:100%_2px] hover:from-emerald-600 hover:to-emerald-600 pb-1">
            {{ $post->title }}
        </a>
    </h2>
    
    <!-- Excerpt -->
    <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-5 line-clamp-2">
        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
    </p>
    
    <!-- Stats & CTA -->
    <div class="flex flex-wrap items-center justify-between gap-3 pt-3">
        
        <!-- Stats with Icons -->
        <div class="flex flex-wrap items-center gap-4 text-xs">
            <div class="flex items-center gap-1.5 text-gray-500">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span>{{ number_format($post->views) }}</span>
            </div>
            <div class="flex items-center gap-1.5 text-gray-500">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span>{{ $post->reading_time ?? '3 min read' }}</span>
            </div>
        </div>
        
        <!-- Read More with Icon Animation -->
        <a href="{{ route('blog.show', $post->slug) }}" 
           class="inline-flex items-center gap-2 text-emerald-600 font-semibold text-sm group/btn">
            <span class="border-b border-emerald-600/0 group-hover/btn:border-emerald-600 transition-all duration-200">
                Read Article
            </span>
            <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
    
</div>
                    </div>
                </article>
                @endforeach
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $posts->withQueryString()->links() }}
                </div>
                
            @else
                <!-- No Posts Found -->
                <div class="bg-white rounded-xl shadow-md p-12 text-center">
                    <div class="text-6xl mb-4">📭</div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Posts Found</h3>
                    <p class="text-gray-500 mb-6">No posts available in "{{ $category->name }}" category yet.</p>
                    <a href="{{ route('blog.index') }}" 
                       class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        Browse All Posts
                    </a>
                </div>
            @endif
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            
            <!-- Categories Widget -->
            <div class="bg-white rounded-xl shadow-md p-5 mb-6">
                <h3 class="font-bold text-xl text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                    <span>📂</span> All Categories
                </h3>
                <div class="space-y-2">
                    @foreach($categories as $cat)
                    <a href="{{ route('blog.category', $cat->slug) }}" 
                       class="flex justify-between items-center py-2 px-3 rounded-lg transition-all
                              {{ $category->id == $cat->id ? 'bg-green-50 text-green-700 font-semibold' : 'hover:bg-gray-50' }}">
                        <span>{{ $cat->name }}</span>
                        <span class="text-sm text-gray-500">({{ $cat->posts_count }})</span>
                    </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Popular Posts Widget -->
            <div class="bg-white rounded-xl shadow-md p-5 mb-6">
                <h3 class="font-bold text-xl text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                    <span>🔥</span> Popular Posts
                </h3>
                <div class="space-y-3">
                    @forelse($popularPosts as $popular)
                    <a href="{{ route('blog.show', $popular->slug) }}" 
                       class="block hover:bg-gray-50 p-2 rounded-lg transition">
                        <div class="font-medium text-gray-800 hover:text-green-600 line-clamp-2">
                            {{ $popular->title }}
                        </div>
                        <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                            <span>👁️ {{ number_format($popular->views) }} views</span>
                            <span>📅 {{ $popular->published_at->format('M d, Y') }}</span>
                        </div>
                    </a>
                    @empty
                    <p class="text-gray-500 text-sm">No popular posts yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection