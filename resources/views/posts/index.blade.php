<x-app-layout>
    <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    @auth
    <div class="fixed  mx-auto bottom-5  right-0 left-0 w-max">
        <button class="py-2 px-4  bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75">
            <a href="{{route('posts.create')}}">
            게시글 작성
            </a>
        </button>
    </div>
    @endauth

    <div class="flex flex-col justify-center align-middle px-40 ">
      <h1 class="antialiased text-4xl font-semibold bg-white my-4 p-3 rounded-lg shadow-md ">Post index</h1>
      <ul>      
      @foreach ($posts as $post)
            <li class="flex flex-col w-full bg-white mb-4 p-2 rounded-md hover:border-green-600 border-2 "> 
            <div class="flex  space-x-8 py-4 ">
                <a href="{{route('posts.show',['id'=>$post->id,'page'=>$posts->currentPage()])}}">
                    <span class="inline-block font-semibold text-2xl"> Title: {{ $post->title}}</span>
                </a>
            <span class="inline-block font-normal text-lg"> 작성시간:{{ $post->created_at->diffForHumans()}}</span>
            </div>
            <div class="inline-block">{{$post->content}}</div>
            </li>
      @endforeach
      </ul>
      <div class=" inset-x-0 bottom-0" >
            {{ $posts->links() }}
      </div>
    </div>
</x-app-layout>