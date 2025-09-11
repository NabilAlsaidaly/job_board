<x-layouts :title="$Pagetitle">
    <div class="container mx-auto px-4 py-10" dir="rtl">
        <div
            class="max-w-2xl mx-auto bg-gray-900/60 backdrop-blur rounded-2xl shadow-lg ring-1 ring-white/10 p-6 sm:p-8">
            <h1 class="text-2xl font-bold text-white mb-2">إنشاء/تعديل منشور</h1>
            <p class="text-sm text-gray-400 mb-6">الحقول المتاحة: العنوان، المحتوى، المؤلف، حالة النشر.</p>
            <form method="POST" action="/blog" class="space-y-6">
        @csrf
            {{-- العنوان: title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-white mb-2">عنوان المنشور</label>
                <input id="title" name="title" type="text" value="{{ old('title', $post->title ?? '') }}" required
                    class="block w-full rounded-lg bg-white/5 px-4 py-2.5 text-white placeholder:text-gray-500 border border-white/10 focus:border-indigo-500 focus:ring focus:ring-indigo-500/20"
                    placeholder="أدخل عنوان المنشور" />
                @error('title')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- المحتوى: body --}}
            <div>
                <label for="body" class="block text-sm font-medium text-white mb-2">محتوى المنشور</label>
                <textarea id="body" name="body" rows="6" required
                    class="block w-full rounded-lg bg-white/5 px-4 py-2.5 text-white placeholder:text-gray-500 border border-white/10 focus:border-indigo-500 focus:ring focus:ring-indigo-500/20"
                    placeholder="اكتب محتوى المنشور هنا">{{ old('body', $post->body ?? '') }}</textarea>
                @error('body')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- المؤلف: author --}}
            <div>
                <label for="author" class="block text-sm font-medium text-white mb-2">اسم المؤلف</label>
                <input id="author" name="author" type="text" value="{{ old('author', $post->author ?? '') }}"
                    class="block w-full rounded-lg bg-white/5 px-4 py-2.5 text-white placeholder:text-gray-500 border border-white/10 focus:border-indigo-500 focus:ring focus:ring-indigo-500/20"
                    placeholder="اكتب اسم المؤلف" />
                @error('author')
                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- حالة النشر: published (boolean) --}}
            <div class="flex items-center justify-between rounded-xl border border-white/10 bg-white/5 px-4 py-3">
                <div>
                    <label for="published" class="block text-sm font-medium text-white">حالة النشر</label>
                    <p class="text-xs text-gray-400">فعّل الخيار لنشر المنشور مباشرة.</p>
                </div>
                <div class="flex items-center gap-3">
                    {{-- لضمان إرسال قيمة عند إلغاء التحديد --}}
                    <input type="hidden" name="published" value="0">
                    <label class="relative inline-flex cursor-pointer items-center">
                        <input id="published" name="published" type="checkbox" value="1"
                            {{ old('published', $post->published ?? false) ? 'checked' : '' }} class="peer sr-only">
                        <div class="h-6 w-11 rounded-full bg-gray-600 peer-checked:bg-indigo-600 transition-colors">
                        </div>
                        <div
                            class="pointer-events-none absolute right-1 h-4 w-4 translate-x-0 rounded-full bg-white shadow transition peer-checked:translate-x-5">
                        </div>
                    </label>
                </div>
            </div>
            @error('published')
                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
            @enderror

            <div class="flex items-center gap-3 pt-4 border-t border-white/10">
                <a href="{{ url()->previous() }}" class="px-4 py-2 text-sm text-white/80 hover:text-white">إلغاء</a>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                    حفظ
                </button>
            </div>
            </form>
        </div>
    </div>
</x-layouts>
