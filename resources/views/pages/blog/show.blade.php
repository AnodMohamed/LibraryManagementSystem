<x-base-layout>
    {{-- Meta Description --}}
    @section('meta_description', $post->metaDescription())

    {{-- Facebook Meta  --}}
    @section('og:title', $post->title)
    @section('og:image', 'storage/images/' .$post->cover_imaage)

    {{-- Title --}}
    @section('title', $post->title)

    <main class="min-h-screen">
        <section class="container pt-24 mx-auto space-y-4 ">
            <article class="p-4 bg-white">
                {{-- Header --}}
                <header class="w-full p-4 bg-red-400">
                    <h2 class="text-white text-2xl font-bold">{{ $post->title }}</h2>
                </header>

                {{-- Livewire ShowPost --}}
                <div> {{ $post->body }} </div>

                {{-- target="_blank" is to allow the system open the the link in new page --}}
                <button class="p-2  test-xs text-white " style="background: blue; margin-top:16px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
                        share on facebook
                    </a>
                </button>
            </article>
        </section>
    </main>
</x-base-layout>
