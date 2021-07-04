<x-app-layout>
    <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @auth
        <button class="fixed bottom-5 mx-0 py-2 px-4 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">
            <a href="{{route('posts.create')}}">
            게시글 작성
            </a>
        </button>
    @endauth

    <div class="flex flex-col justify-center align-middle px-40 ">
      <h1 class="antialiased text-3xl bg-gray-300 mb-4 p-">Post index</h1>
      <ul>      
      @foreach ($posts as $post)
            <li class="flex flex-col w-full"> 
            <div class="flex content-center flex-">
                <a href="{{route('posts.show',['id'=>$post->id,'page'=>$posts->currentPage()])}}">
                    <span class="inline-block"> Title: {{ $post->title}}</span>
                </a>
            <span class="inline-block"> 작성시간:{{ $post->created_at->diffForHumans()}}</span>
            </div>
            <div class="inline-block">{{$post->content}}</div>
            </li>
      @endforeach
      </ul>
      <div class="fixed inset-x-0 bottom-0" >
            {{ $posts->links() }}
      </div>
    </div>
</x-app-layout>