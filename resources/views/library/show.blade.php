@extends('layouts.app')

@section('title', $book->title . ' - Free Islamic PDF Download')
@section('meta_description', Str::limit(strip_tags($book->description ?? ''), 160))
@section('meta_keywords', implode(',', array_merge([$book->title, $book->author ?? ''], explode(' ', $book->category ?? 'Islamic Book'))))

@section('content')

    {{-- Breadcrumbs --}}
    <nav class="bg-gray-50 border-b border-gray-200" aria-label="Breadcrumb">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <ol class="flex flex-wrap items-center text-sm text-gray-600 gap-1">
                <li><a href="{{ route('home') }}" class="hover:text-green-700">Home</a></li>
                <li><span class="mx-1">/</span></li>
                <li><span class="mx-1">/</span></li>
                <li class="text-gray-900 font-medium truncate">{{ $book->title }}</li>
            </ol>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Book Cover & Info Sidebar --}}
            <div class="lg:col-span-1 space-y-6">
                {{-- Cover Image --}}
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/400x500?text=No+Cover' }}"
                         alt="{{ $book->title }}"
                         class="w-full object-cover">
                </div>

                {{-- Download & Read Online Card --}}
                <div class="bg-gradient-to-br from-green-50 to-white rounded-2xl shadow-lg p-6 border border-green-100">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-green-800 mb-1">
                            {{ number_format($book->downloads ?? 0) }}
                        </div>
                        <p class="text-gray-500 text-sm">Total Downloads</p>
                    </div>
                    <div class="mt-4 space-y-3">
                        {{-- Read Online Button --}}
                        @if($book->pdf_file)
                            <a href="{{ route('library.read', $book) }}" target="_blank"
                               class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Read Online
                            </a>
                        @else
                            <div class="text-center text-gray-400 text-sm">No PDF available to read</div>
                        @endif

                        {{-- Download Button --}}
                        <a href="{{ route('library.download', $book) }}"
                           class="w-full flex items-center justify-center gap-2 bg-green-700 hover:bg-green-800 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download PDF ({{ $book->pdf_size ?? '—' }})
                        </a>
                    </div>
                </div>

                {{-- Book Metadata Card --}}
                <div class="bg-gray-50 rounded-2xl p-6 space-y-3">
                    <h3 class="font-bold text-gray-800 text-lg border-b border-gray-200 pb-2">Book Details</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <span class="text-gray-500">Author:</span>
                        <span class="font-medium text-gray-800">{{ $book->author ?? 'Unknown' }}</span>

                        <span class="text-gray-500">Category:</span>
                        <span class="font-medium text-gray-800">{{ $book->category ?? 'General' }}</span>

                        <span class="text-gray-500">Language:</span>
                        <span class="font-medium text-gray-800">{{ $book->language ?? 'English' }}</span>

                        <span class="text-gray-500">Pages:</span>
                        <span class="font-medium text-gray-800">{{ $book->pages ?? 'N/A' }}</span>

                        <span class="text-gray-500">Format:</span>
                        <span class="font-medium text-gray-800">PDF</span>

                        @if($book->published_at)
                            <span class="text-gray-500">Published:</span>
                            <span class="font-medium text-gray-800">{{ $book->published_at->format('M d, Y') }}</span>
                        @endif
                    </div>
                </div>

                {{-- Share Buttons --}}
                <div class="bg-white rounded-2xl p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-800 text-lg mb-3">Share this Book</h3>
                    <div class="flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex-1 bg-[#1877f2] text-white rounded-lg py-2 text-center text-sm hover:opacity-90 transition">
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($book->title) }}&url={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex-1 bg-[#1da1f2] text-white rounded-lg py-2 text-center text-sm hover:opacity-90 transition">
                            Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($book->title . ' - ' . request()->url()) }}"
                           target="_blank" rel="noopener noreferrer"
                           class="flex-1 bg-[#25d366] text-white rounded-lg py-2 text-center text-sm hover:opacity-90 transition">
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            {{-- Main Content: Book Description & Details --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl shadow-md p-8 border border-gray-100">
                    <h1 class="text-3xl md:text-4xl font-bold text-green-900 mb-2">{{ $book->title }}</h1>
                    <p class="text-gray-500 mb-6">By <span class="font-semibold text-gray-700">{{ $book->author ?? 'Unknown Author' }}</span></p>

                    {{-- Description / Content --}}
                    <div class="prose prose-green max-w-none text-gray-700 leading-relaxed">
                        @if($book->description)
                            {!! nl2br(e($book->description)) !!}
                        @elseif($book->content)
                            {!! nl2br(e(Str::limit(strip_tags($book->content), 1000))) !!}
                        @else
                            <p class="text-gray-400">No description available for this book.</p>
                        @endif
                    </div>

                    {{-- Additional Info if available --}}
                    @if($book->isbn || $book->publisher)
                        <div class="mt-8 pt-6 border-t border-gray-200 text-sm text-gray-500">
                            @if($book->isbn)<span class="mr-4">ISBN: {{ $book->isbn }}</span>@endif
                            @if($book->publisher)<span>Publisher: {{ $book->publisher }}</span>@endif
                        </div>
                    @endif
                </div>

                {{-- Related Books Section --}}
                @if(isset($relatedBooks) && $relatedBooks->count())
                    <div class="bg-gray-50 rounded-2xl p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-5 flex items-center gap-2">
                            <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            You May Also Like
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                            @foreach($relatedBooks as $related)
                                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition overflow-hidden group">
                                    <a href="{{ route('library.show', $related) }}">
                                        <img src="{{ $related->cover_url ?? 'https://via.placeholder.com/150x200?text=No+Cover' }}"
                                             class="h-40 w-full object-cover group-hover:scale-105 transition duration-300"
                                             alt="{{ $related->title }}">
                                    </a>
                                    <div class="p-3">
                                        <h3 class="font-bold text-gray-800 text-sm line-clamp-2">
                                            <a href="{{ route('library.show', $related) }}" class="hover:text-green-700">
                                                {{ $related->title }}
                                            </a>
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">{{ $related->author ?? 'Unknown' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection