@extends('layouts.app')

@section('title', 'Islamic Book Library - Free PDF Downloads')
@section('meta_description', 'Download free Islamic books in PDF format. Collection of Tafsir, Hadith, Seerah, Fiqh books and more.')
@section('meta_keywords', 'ilm e quran, ilm ul quran, Islamic books, PDF library, Tafsir, Hadith, Seerah, Fiqh, free downloads')

@section('content')

    {{-- Hero Section --}}
    <section class="bg-green-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">
                Islamic Library
            </h1>
            <p class="text-xl text-green-100 mt-4">
                Free download of authentic Islamic books in PDF format
            </p>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- MAIN CONTENT: Books Grid --}}
                <div class="lg:col-span-12">

                    {{-- Featured Books (if any) --}}
                    @if(isset($featuredBooks) && $featuredBooks->count())
                        <div class="mb-12">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-2xl font-bold text-green-900 flex items-center gap-2">
                                    <span>⭐</span> Featured Books
                                </h2>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">Editor's Pick</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                @foreach($featuredBooks as $book)
                                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden border border-gray-100 group">
                                        <a href="{{ route('library.show', $book) }}" class="block overflow-hidden bg-gray-100">
                                            <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/300x200?text=No+Cover' }}"
                                                 loading="lazy"
                                                 class="h-48 w-full object-cover group-hover:scale-105 transition duration-500"
                                                 alt="{{ $book->title }}">
                                        </a>
                                        <div class="p-4">
                                            <div class="flex justify-between items-start">
                                                <h3 class="font-bold text-green-800 text-lg leading-tight line-clamp-2">
                                                    {{ $book->title }}
                                                </h3>
                                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded-full">Featured</span>
                                            </div>
                                            <p class="text-sm text-gray-500 mt-1">By {{ $book->author ?? 'Unknown' }}</p>
                                            <div class="mt-3 flex gap-2">
                                                <a href="{{ route('library.show', $book) }}"
                                                   class="flex-1 text-center bg-green-700 text-white py-2 rounded-lg text-sm font-semibold hover:bg-green-800 transition">
                                                    View Details
                                                </a>
                                                <a href="{{ route('library.download', $book) }}"
                                                   class="inline-flex items-center justify-center gap-1 border border-green-700 text-green-700 px-3 py-2 rounded-lg text-sm font-semibold hover:bg-green-50 transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                    </svg>
                                                    PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- All Books --}}
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">All Books</h2>

                    @if($books->count())
                        <div class="space-y-6">
                            @foreach($books as $book)
                                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition border border-gray-100 overflow-hidden">
                                    <div class="flex flex-col sm:flex-row">
                                        @if($book->cover_url)
                                            <a href="{{ route('library.show', $book) }}" class="sm:w-40 h-40 bg-gray-100">
                                                <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                            </a>
                                        @endif
                                        <div class="flex-1 p-5">
                                            <div class="flex flex-wrap justify-between items-start gap-2">
                                                <h3 class="text-xl font-bold text-gray-800">
                                                    <a href="{{ route('library.show', $book) }}" class="hover:text-green-700">{{ $book->title }}</a>
                                                </h3>
                                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $book->category ?? 'General' }}</span>
                                            </div>
                                            <p class="text-sm text-gray-500 mb-2">By {{ $book->author ?? 'Unknown' }}</p>
                                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                                {{ $book->description ?? Str::limit(strip_tags($book->content ?? ''), 100) }}
                                            </p>
                                            <div class="flex flex-wrap gap-3 items-center">
                                                <a href="{{ route('library.show', $book) }}" class="text-green-700 hover:text-green-800 font-medium text-sm">Read Book →</a>
                                                <a href="{{ route('library.download', $book) }}" class="text-gray-600 hover:text-green-700 text-sm flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                    </svg>
                                                    Download PDF
                                                </a>
                                                <span class="text-xs text-gray-400">{{ number_format($book->downloads ?? 0) }} downloads</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-10">
                            {{ $books->links() }}
                        </div>
                    @else
                        <div class="text-center py-12 bg-gray-50 rounded-xl">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <p class="text-gray-500">No books available at the moment.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

@endsection