<x-app-layout>
    <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="w-full left-0 light-0 m-auto max-w-screen-lg flex flex-col px-4 py-8 my-4 bg-white rounded-2xl shadow-lg">
    <div class="">
      <h1 class="font-semibold text-5xl mb-5">{{$posts->title}}</h1>
    <div>
          {{-- <h3>{{$posts->user_id}}</h3> --}}
     <h3 class="font-medium text-3xl mb-4 inline-block mr-3">{{$userName}}</h3>
      <h3 class="font-medium text-3xl mb-4 inline-block">{{$posts->created_at}}</h3>
    </div>
    <div class="mb-10">
      <img class="mb-4" src="{{$posts->imagePath()}}" alt="이미지">
      <p class="font-normal">{{$posts->content}}</p>
    </div>
    <div class="w-full flex justify-center">
    <div class="w-full max-w-screen-md flex justify-between">
      <button class="btn hover:bg-yellow-500  " 
      onClick="location.href='{{route('posts.edit',['id'=>$posts->id])}}'"
      >
      수정
      </button >
      
            <form action="{{route('posts.destroy' ,['id'=>$posts->id ,'page'=>$page])}}" method="post">
              @csrf
              @method("delete")
              <button class="btn hover:bg-red-500"  type="submit">
              삭제
            </button>
            </form>

      <button class="btn focus:hover:bg-green-500"  
            onClick="location.href='{{route('posts.index',['page'=>$page])}}'"> 
            목록보기</button>
    </div>
  </div>
      </div>
    </div>
</x-app-layout>