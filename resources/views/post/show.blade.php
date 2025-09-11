<x-layouts :title="$Pagetitle">
    <div class="container mx-auto max-w-2xl py-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
            <div class="text-gray-700 leading-relaxed">
                {!! nl2br(e($post->body)) !!}
            </div>
        </div>
    </div>
</x-layouts>
