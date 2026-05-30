@extends('layouts.app')

@section('title', isset($search) ? "Search: {$search}" : 'Blog')

@section('content')

    <section class="bg-green-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">
                @if(isset($search))
                    Search Results: "{{ $search }}"
                @else
                    Our Blog
                @endif
            </h1>
            <p class="text-xl text-green-100 mt-4">
                @if(isset($search))
                    {{ $posts->total() }} articles found
                @else
                    Islamic articles, Ilm e Quran lessons, and more
                @endif
            </p>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-8">
                    @forelse($posts as $post)
                        <article class="mb-8 pb-8 border-b border-gray-200">
                            @if($post->featured_image)
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}"
                                        class="w-full h-64 object-cover rounded-xl mb-4">
                                </a>
                            @endif

                            <h2 class="text-2xl font-bold mb-2">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-gray-800 hover:text-green-700">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <div class="text-sm text-gray-500 mb-3">
                                {{ optional($post->published_at)->format('F d, Y') }}
                            </div>

                            <p class="text-gray-600 mb-4">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                            </p>

                            <a href="{{ route('blog.show', $post->slug) }}"
                                class="text-green-700 hover:text-green-800 font-medium">
                                Read More →
                            </a>
                        </article>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500">No articles found.</p>
                            <a href="{{ route('blog.index') }}" class="text-green-700 mt-4 inline-block">
                                ← Back to Blog
                            </a>
                        </div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                </div>


                <!-- Sidebar (Same as show page) -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Search -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Search</h3>
                        <form action="{{ route('blog.search') }}" method="GET" id="searchForm">
                            <div class="relative">
                                <input type="text" name="search" id="searchInput" autocomplete="off"
                                    value="{{ $search ?? '' }}" placeholder="Search articles..."
                                    class="w-full border border-gray-300 rounded-lg pl-4 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Latest Posts -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Latest Articles</h3>
                        @php
                            $latestList = App\Models\Post::published()->latest('published_at')->limit(5)->get();
                        @endphp
                        @foreach($latestList as $latest)
                            <a href="{{ route('blog.show', $latest->slug) }}" class="block py-2 hover:text-green-700">
                                {{ $latest->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
    @push('scripts')
        <script>
            function clearSearchInput() {
                const searchInput = document.getElementById('searchInput');
                if (searchInput) {
                    searchInput.value = '';
                }
            }

            // Normal page load ke liye
            document.addEventListener('DOMContentLoaded', function () {
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('search')) {
                    clearSearchInput();
                }
            });

            // Back/forward button (bfcache) ke liye
            window.addEventListener('pageshow', function (event) {
                // Agar page bfcache se restore hua hai (persisted === true)
                // Ya hamesha check karte hain agar URL mein search ho to clear karo
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('search')) {
                    clearSearchInput();
                }
            });
        </script>
    @endpush
@endpush