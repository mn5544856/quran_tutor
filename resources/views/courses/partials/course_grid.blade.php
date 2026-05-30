@if($courses->count())
    @foreach($courses as $course)
        <article class="course-item bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500 border border-gray-100">
            <div class="relative h-52 overflow-hidden">
                <img loading="lazy"
                    src="{{ $course->image_url ?? 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=900&q=80' }}"
                    alt="{{ $course->title }}"
                    class="w-full h-full object-cover hover:scale-110 transition duration-700">
                
                @if($course->is_featured ?? false)
                    <div class="absolute top-4 right-4">
                        <span class="bg-yellow-400 text-green-900 text-xs px-3 py-1 rounded-full font-semibold shadow">
                            ⭐ Featured
                        </span>
                    </div>
                @endif
            </div>
            
            <div class="p-6">
                <span class="inline-block text-xs px-3 py-1 bg-green-100 text-green-700 rounded-full mb-3">
                    {{ ucfirst($course->level ?? 'N/A') }}
                </span>
                
                <h3 class="text-xl font-bold text-green-900 line-clamp-2">
                    {{ $course->title }}
                </h3>
                
                <div class="flex justify-between items-center mt-5 text-sm text-gray-500">
                    <span>📚 {{ $course->category ?? 'General' }}</span>
                </div>
                
                <a href="{{ route('courses.show', $course->slug) }}"
                    class="block mt-6 text-center bg-green-700 hover:bg-green-800 text-white py-3 rounded-xl font-semibold transition">
                    View Details
                </a>
            </div>
        </article>
    @endforeach
    
    <!-- Pagination -->
    <div class="col-span-full mt-8">
        {{ $courses->appends(request()->query())->links() }}
    </div>
@else
    <div class="col-span-full text-center py-16">
        <p class="text-gray-500 text-lg">No courses found matching your criteria.</p>
    </div>
@endif