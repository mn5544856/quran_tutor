@if($courses->count())
    @foreach($courses as $course)
    <article class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition overflow-hidden border">
        <div class="relative h-56 overflow-hidden">
            <img loading="lazy" 
                 src="{{ $course->image_url ?? 'https://images.pexels.com/photos/8489082/pexels-photo-8489082.jpeg' }}" 
                 alt="{{ $course->title }}" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            @if($course->is_featured)
            <div class="absolute top-4 right-4">
                <span class="bg-yellow-400 text-green-900 text-xs px-3 py-1 rounded-full">⭐ Featured</span>
            </div>
            @endif
        </div>
        <div class="p-6">
            <h3 class="text-xl font-bold text-green-900 mb-3 line-clamp-2">{{ $course->title }}</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                {{ Illuminate\Support\Str::limit($course->short_description ?? 'Learn Quran online with expert teachers', 100) }}
            </p>
            <div class="flex items-center justify-between text-sm text-gray-500 mt-5">
                <span>⏱ {{ $course->duration ?? 'Flexible' }}</span>
                @if($course->category)
                <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">
                    {{ $course->category->name }}
                </span>
                @endif
            </div>
            <a href="{{ route('courses.show', $course->slug) }}" 
               class="mt-6 inline-flex items-center justify-center w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-xl font-semibold transition">
                View Course
            </a>
        </div>
    </article>
    @endforeach
    
    <!-- Pagination for AJAX -->
    <div class="col-span-full mt-8">
        {{ $courses->withQueryString()->links() }}
    </div>
@else
    <div class="col-span-full text-center py-16">
        <p class="text-gray-500">No courses found.</p>
    </div>
@endif