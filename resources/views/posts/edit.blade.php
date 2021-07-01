<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                display: flex;
                justify-content:center;
                align-items: center;
                width: 80%;
            }
            .title{
                width:100%;
            }
            .content{
                width:100%;
                height: 20rem;
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
      <div>
      <h1>Post edit</h1>
      <form method="POST" action="/post" >
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
            <div class="text-red-600">{{$message}}</div>
            @enderror
        <button type="submit">제출!</button>
      </form>
      </div>
    </body>
</html>
