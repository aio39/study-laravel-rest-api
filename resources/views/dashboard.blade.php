<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="flex flex-col justify-center align-middle px-40 ">
                    <h1 class="antialiased text-4xl font-semibold bg-white my-4 p-3 rounded-lg shadow-md ">나의 글</h1>
                    <ul>      
                    @foreach ($posts as $post)
                          <li class="flex flex-col w-full bg-white mb-4 p-2 rounded-md hover:border-green-600 border-2 "> 
                          <div class="flex  space-x-8 py-4 ">
                              <a href="{{route('posts.show',['id'=>$post->id])}}">
                                  <span class="inline-block font-semibold text-2xl"> Title: {{ $post->title}}</span>
                              </a>
                          <span class="inline-block font-normal text-lg"> 작성시간:{{ $post->created_at->diffForHumans()}}</span>
                          </div>
                          <div class="inline-block">{{$post->content}}</div>
                          </li>
                    @endforeach
                    </ul>
            </div>
        </div>
    </div>
</x-app-layout>
