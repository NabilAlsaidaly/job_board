<x-layouts :title="$Pagetitle">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ $Pagetitle }}</h2>

        @if($posts->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-sm text-gray-500">{{ $post->author }}</span>
                                <span class="px-2 py-1 text-xs rounded-full {{ $post->published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $post->published ? 'منشور' : 'مسودة' }}
                                </span>
                            </div>

                            <h3 class="text-xl font-semibold text-gray-800 mb-3 line-clamp-2">
                                {{ $post->title }}
                            </h3>

                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ Str::limit($post->body, 150) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-400">
                                    {{ $post->created_at->format('Y-m-d') }}
                                </span>

                                <span class="text-sm text-blue-600">
                                    التعليقات
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">📝</div>
                <h3 class="text-xl font-medium text-gray-600 mb-2">لا توجد منشورات بعد</h3>
                <p class="text-gray-500">ابدأ بإنشاء منشورات جديدة!</p>
                <a href="/create-posts" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    إنشاء منشورات تجريبية
                </a>
            </div>
        @endif
    </div>
</x-layouts>
