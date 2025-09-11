<x-layouts :title="$Pagetitle">
    <div class="container mx-auto px-4 py-12" dir="rtl">
        <div class="max-w-2xl mx-auto bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900/80 backdrop-blur-2xl rounded-3xl shadow-2xl ring-1 ring-indigo-700/20 p-8 sm:p-10 border border-indigo-900/30">
            <h1 class="text-3xl font-extrabold text-indigo-400 mb-3 text-center tracking-tight">تعديل منشور </h1>
            <p class="text-base text-gray-300 mb-8 text-center">يمكنك تعديل العنوان، المحتوى، المؤلف، وحالة النشر.</p>
            <form method="POST" action="/blog/{{$post->id}}" class="space-y-7">
                @csrf
                @method('PUT')
                {{-- العنوان: title --}}
                <div>
                    <label for="title" class="block text-sm font-semibold text-indigo-200 mb-2">عنوان المنشور</label>
                    <input id="title" name="title" type="text" value="{{ old('title', $post->title ?? '') }}" required
                        class="block w-full rounded-xl bg-gray-800/80 px-4 py-3 text-white placeholder:text-gray-400 border border-indigo-700/30 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30 transition"
                        placeholder="أدخل عنوان المنشور" />
                    @error('title')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- المحتوى: body --}}
                <div>
                    <label for="body" class="block text-sm font-semibold text-indigo-200 mb-2">محتوى المنشور</label>
                    <textarea id="body" name="body" rows="6" required
                        class="block w-full rounded-xl bg-gray-800/80 px-4 py-3 text-white placeholder:text-gray-400 border border-indigo-700/30 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30 transition"
                        placeholder="اكتب محتوى المنشور هنا">{{ old('body', $post->body ?? '') }}</textarea>
                    @error('body')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- المؤلف: author --}}
                <div>
                    <label for="author" class="block text-sm font-semibold text-indigo-200 mb-2">اسم المؤلف</label>
                    <input id="author" name="author" type="text" value="{{ old('author', $post->author ?? '') }}"
                        class="block w-full rounded-xl bg-gray-800/80 px-4 py-3 text-white placeholder:text-gray-400 border border-indigo-700/30 focus:border-indigo-500 focus:ring focus:ring-indigo-500/30 transition"
                        placeholder="اكتب اسم المؤلف" />
                    @error('author')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- حالة النشر: published (boolean) --}}
                <div class="flex items-center justify-between rounded-xl border border-indigo-700/30 bg-gray-800/60 px-4 py-4">
                    <div>
                        <label for="published" class="block text-sm font-semibold text-indigo-200">حالة النشر</label>
                        <p class="text-xs text-gray-400">فعّل الخيار لنشر المنشور مباشرة.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="hidden" name="published" value="0">
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input id="published" name="published" type="checkbox" value="{{$post->published}}"
                                {{ old('published', $post->published ?? false) ? 'checked' : '' }} class="peer sr-only">
                            <div class="h-7 w-14 rounded-full bg-gray-600 peer-checked:bg-indigo-600 transition-colors"></div>
                            <div class="pointer-events-none absolute right-1 h-5 w-5 translate-x-0 rounded-full bg-white shadow transition peer-checked:translate-x-7"></div>
                        </label>
                    </div>
                </div>
                @error('published')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror

                <div class="flex items-center gap-4 pt-6 border-t border-indigo-700/20">
                    <a href="{{ url()->previous() }}" class="px-5 py-2 text-sm font-medium text-indigo-300 hover:text-white transition">إلغاء</a>
                    <button type="submit"
                        class="px-8 py-2 rounded-lg bg-indigo-600 text-white text-sm font-bold shadow hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-gray-900 transition">
                        حفظ التعديلات
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts>
