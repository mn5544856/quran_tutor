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
        <article class="bg-white rounded-lg shadow-sm overflow-hidden mb-5 hover:shadow-md transition-all duration-300">
            <div class="md:flex">
                @if($post->image_url)
                <div class="md:w-1/3">
                    <img src="{{ asset($post->image_url) }}" 
                         alt="{{ $post->title }}" 
                         class="w-full h-32 md:h-full object-cover">
                </div>
                @endif
                
                <div class="p-4 {{ $post->image_url ? 'md:w-2/3' : 'w-full' }} group">
                    
                    <!-- Category Badge - Compact -->
                    <div class="flex items-center gap-2 mb-2">
                        <span class="inline-flex items-center gap-1 bg-emerald-100 text-emerald-700 text-xs font-medium px-2 py-0.5 rounded-full">
                            <span class="w-1 h-1 bg-emerald-500 rounded-full"></span>
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
                    
                    <!-- Title - Smaller Size -->
                    <h2 class="text-lg md:text-xl font-bold mb-2 leading-snug">
                        <a href="{{ route('blog.show', $post->slug) }}" 
                           class="hover:text-emerald-600 transition-colors duration-200 line-clamp-2">
                            {{ $post->title }}
                        </a>
                    </h2>
                    
                    <!-- Excerpt - Compact -->
                    <p class="text-gray-500 text-sm leading-relaxed mb-3 line-clamp-2">
                        {{ $post->excerpt ?? Str::limit(strip_tags($post->description), 100) }}
                    </p>
                    
                    <!-- Stats & CTA - Compact -->
                    <div class="flex flex-wrap items-center justify-between gap-2 pt-2">
                        
                        <!-- Stats -->
                        <div class="flex items-center gap-3 text-xs">
                            <div class="flex items-center gap-1 text-gray-500">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span>{{ number_format($post->views ?? 0) }}</span>
                            </div>
                            <div class="flex items-center gap-1 text-gray-500">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <span>{{ $post->reading_time ?? '3 min' }}</span>
                            </div>
                        </div>
                        
                        <!-- Read More - Compact -->
                        <a href="{{ route('blog.show', $post->slug) }}" 
                           class="inline-flex items-center gap-1 text-emerald-600 font-medium text-xs hover:text-emerald-700 transition-colors">
                            <span>Read</span>
                            <svg class="w-3 h-3 transform group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
        
        <!-- Pagination - Compact -->
        <div class="mt-6">
            {{ $posts->withQueryString()->links() }}
        </div>
        
    @else
        <!-- No Posts Found - Compact -->
        <div class="bg-white rounded-lg shadow-sm p-8 text-center">
            <div class="text-4xl mb-3">📭</div>
            <h3 class="text-xl font-bold text-gray-700 mb-1">No Posts Found</h3>
            <p class="text-gray-500 text-sm mb-4">No posts available in "{{ $category->name }}" category yet.</p>
            <a href="{{ route('blog.index') }}" 
               class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
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
                                @if($popular->image_url)
                                <img src="{{ asset($popular->image_url) }}" 
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
                
            </div>
        </div>
        
    </div>
</div>
@endsection