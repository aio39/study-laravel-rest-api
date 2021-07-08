<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Post Create') }}
           </h2>
       </x-slot>
      <div class="flex flex-col  mx-8">
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

      <form method="POST" action="/post"  enctype="multipart/form-data" class="flex flex-col" >
            @csrf
            <label for="title">제목</label>
            @error('title')
            <div>{{$message}}</div>
            @enderror
            <input class="title" type="text" name="title" id="title" value="{{old('title')}}">
            <label for="content">내용</label>
            <textarea  class="content" name="content" id="content" cols="30" rows="10">
                {{old('content')}}
            </textarea>
            @error('content')
            <div class="text-red-600 justify-center align-middle">{{$message}}</div>
            @enderror
            <label for="imageFile"> 파일 </label>
            <input type="file" name="imageFile" id="imageFile">
            @error('imageFile')
            <div class="text-red-600 justify-center align-middle">{{$message}}</div>
            @enderror


            <h1>Classic editor</h1>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        <button type="submit" class="bg-red-500 ">제출!</button>
      </form>
      </div>
    </body>
    
</html>
</x-app-layout>