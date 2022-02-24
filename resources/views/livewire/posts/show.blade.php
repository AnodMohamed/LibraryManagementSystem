



<div class="p-4 bg-white rounded shadow">
    <a href="{{ route('blog.show', $post) }}" class="space-y-4">
        <h2 class="text-xl font-bold">{{ $post->title }}</h2>
        {{-- to display onlly 200 litters fomr post content --}}
        <p>{!! $post->body !!}</p>


    </a>
</div>
