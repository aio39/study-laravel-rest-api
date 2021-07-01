<!DOCTYPE html>
<html>
    <head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased h-100 w-100">
      <h1 class="font-thin bg-red-500">Post index</h1>
      <!-- {{ $posts }} -->
      
      <ul>      
      @foreach ($posts as $post)
            <li class="flex flex-col "> 
            <div class="flex content-around">
            <span class="inline-block"> Title: {{ $post->title}}</span>
            <span class="inline-block"> Time: {{ $post->created_at}}</span>
            </div>
            <div class="inline-block">{{$post->content}}</div>
            </li>
      @endforeach
      </ul>
      <div class="fixed inset-x-0 bottom-0" >
            {{ $posts->links() }}
      </div>
    </body>
</html>
