<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Post Edit') }}
           </h2>
       </x-slot>
      <div class="w-full flex flex-col px-48 justify-center align-middle">
      <form method="post" action="{{route('posts.update',['id'=>$post->id])}}"  enctype="multipart/form-data" class="flex flex-col justify-center" >
            @csrf
            {{-- method spoofing --}}
            @method("PUT")
            <label for="title">제목</label>
            @error('title')
            <div>{{$message}}</div>
            @enderror
            <input class="title" type="text" name="title" id="title" value="{{old('title') ? old('title') : $post->title}}">
            <label for="content">내용</label>
            <textarea  class="content" name="content" id="content" cols="30" rows="10">
                {{old('content') ?old('content') : $post->content}}

            </textarea>
            @error('content')
            <div class="text-red-600 justify-center align-middle">{{$message}}</div>
            @enderror
            <label for="imageFile"> 파일 </label>
            <div >
                <img src="{{$post->imagePath()}}" alt="">
                <input type="file" name="imageFile" id="imageFile">
            </div>
            @error('imageFile')
            <div class="text-red-600 justify-center align-middle">{{$message}}</div>
            @enderror
        <button type="submit" class="bg-red-500 w-32 ">제출!</button>
      </form>
      </div>
    </body>

</html>
</x-app-layout>