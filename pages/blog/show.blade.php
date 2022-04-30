
@push('styles')
    <style>
        body {
                background-color: #eee
            }

            .bdge {
                height: 21px;
                background-color: orange;
                color: #fff;
                font-size: 11px;
                padding: 8px;
                border-radius: 4px;
                line-height: 3px
            }

            .comments {
                text-decoration: underline;
                text-underline-position: under;
                cursor: pointer
            }

            .dot {
                height: 7px;
                width: 7px;
                margin-top: 3px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block
            }

            .hit-voting:hover {
                color: blue
            }

            .hit-voting {
                cursor: pointer
            }

    </style>
@endpush
<x-base-layout>
    {{-- Meta Description --}}


    {{-- Title --}}
    @section('title', $post->title)

    <main class="min-h-screen">
        <section class="container pt-24 mx-auto space-y-4 ">
            <article class="p-4 bg-white">

                {{-- Header --}}
                <header class="w-full p-4 bg-red-400">
                    <h2 class="text-white text-2xl font-bold">{{ $post->title }}</h2>
                </header>

                  
                {{-- image --}}
                <img src="{{ asset('post') }}/{{$post->cover_image}}" alt="" class="h-600 w-600 object-cover">


                {{-- Livewire ShowPost --}}
                <div> {!! $post->body !!} </div>

                {{-- Livewire like --}}
                @php
                    $counter = DB::table('likes')->where('post_id',$post->id )->get();
                @endphp

                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->utype == 'STD')
                            @php
                                $checklike = DB::table('likes')->where('post_id',$post->id )->where('user_id',Auth::user()->id)->get();
                            @endphp
                    
                    
                            
                            @if (  $checklike->isEmpty())
                                <livewire:buttons.like-post  :post="$post" :key="$post->post"/>
                        
                            @endif
                        @endif
                    @endauth
                @endif

                <span class="font-medium text-gray-900"> {{ count($counter) }} </span>
                <span class="">likes</span>



                {{-- target="_blank" is to allow the system open the the link in new page --}}
                <button class="p-2  test-xs text-white " style="background: blue; margin-top:16px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank">
                        share on facebook
                    </a>
                </button>


                 {{---comment form-----}}
                 @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->utype == 'STD')
                        
                    
                            
                            <form method="post" action=" {{ route('post.comment', $post) }}" class="w-full p-4">
                                @csrf
                              <div class="mb-2">
                                <label for="comment" class="text-lg text-gray-600">Add a comment</label>
                                <textarea class="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
                                  name="comment" placeholder=""></textarea>
                              </div>
                              <button class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded">Comment</button>
                            </form>
                        
                        @endif
                    @endauth
                @endif


                {{---comments-----}}
                @php
                    $comments = DB::table('comments')->where('post_id',$post->id )->get();
                @endphp      

                <div class="container mt-5 mb-5">
                    <div class="d-flex justify-content-center row">
                    
                        <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="mr-2 comments"> {{ count($comments) }}comments&nbsp;</span></div>

                        @foreach (  $comments as  $comment )
                            <div class="d-flex flex-column col-md-8">
                                <div class="coment-bottom bg-white p-2 px-4">
                                    <div class="commented-section mt-2">
                                        @php
                                            $user = DB::table('users')->where('id',$comment->user_id )->first();
                                        @endphp      
                                        <div class="d-flex flex-row align-items-center commented-user">
                                            <h5 class="mr-2"> {{ $user->name }}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">{{ $comment->created_at }}</span>
                                        </div>
                                        <div class="comment-text-sm"><span>{{ $comment->comment }}</span></div>
                                        
                                    </div>
                                
                                </div>
                            </div>
                        @endforeach
                      
                    </div>
                </div>
                    
            </article>
        </section>
    </main>
</x-base-layout>

@push('scripts')
    
@endpush
