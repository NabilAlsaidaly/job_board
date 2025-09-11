<x-layouts :title="$Pagetitle">
    @if (session('success'))
        <div class="bg-green-50 px-3 py-2 mb-4 rounded border border-green-200 text-green-800 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-800">{{ $Pagetitle }}</h2>
            <a href="{{ url('/blog/create') }}"
                class="inline-flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors font-semibold text-base">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                إضافة منشور
            </a>
        </div>

        @if ($posts->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <div
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 border border-gray-100">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-gray-500 flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.824.607 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $post->author }}
                                </span>
                                <span
                                    class="px-3 py-1 text-xs rounded-full font-semibold {{ $post->published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $post->published ? 'منشور' : 'مسودة' }}
                                </span>
                            </div>

                            <h3
                                class="text-xl font-bold text-gray-800 mb-4 line-clamp-2 hover:text-blue-600 transition">
                                <a href="{{ url('/blog/' . $post->id) }}">{{ $post->title }}</a>
                            </h3>

                            <div class="flex gap-3 mb-5">
                                <a href="{{ url('/blog/' . $post->id . '/edit') }}"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200 transition text-sm font-medium shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536M9 13l6-6M3 21h18" />
                                    </svg>
                                    تعديل
                                </a>
                                <form action="{{ url('/blog/' . $post->id) }}" method="POST"
                                    onsubmit="return confirm('هل أنت متأكد من حذف المنشور؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-100 text-red-700 rounded hover:bg-red-200 transition text-sm font-medium shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        حذف
                                    </button>
                                </form>
                            </div>

                            <div class="flex items-center justify-between text-sm text-gray-400">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post->created_at->format('Y-m-d') }}
                                </span>
                                <span class="flex items-center gap-1 text-blue-600 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8h2a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10a2 2 0 012-2h2m2-4h4a2 2 0 012 2v4H7V6a2 2 0 012-2z" />
                                    </svg>
                                    التعليقات
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="text-gray-400 text-7xl mb-4">📝</div>
                <h3 class="text-2xl font-semibold text-gray-600 mb-2">لا توجد منشورات بعد</h3>
                <p class="text-gray-500 mb-4">ابدأ بإنشاء منشورات جديدة!</p>
                <a href="/create-posts"
                    class="inline-block mt-2 px-8 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors font-semibold">
                    إنشاء منشورات تجريبية
                </a>
            </div>
        @endif
    </div>
</x-layouts>
