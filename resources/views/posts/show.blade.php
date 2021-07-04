<x-app-layout>
    <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

      <div>
      <h1 class="font-semibold text-5xl">{{$posts->title}}</h1>
      {{$posts}}
      <div>
          <h3>{{$posts->user_id}}</h3>
          <h3>{{$posts->created_at}}</h3>

      </div>

      <img src="{{$posts->imagePath()}}" alt="이미지">

      <p>{{$posts->content}}</p>

      {{$userName}}
      <div>
        <a href="{{route('posts.index',['page'=>$page])}}">이전 페이지로</a>
    </div>

      </div>

</x-app-layout>