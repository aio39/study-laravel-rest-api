<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function create(){
        return view('posts.create');
    }
    public function edit(){
        return view('posts.edit');
    }
    public function show(){
        return view('posts.show');
    }
    public function index(){
        // $posts = Post::orderBy('created_at','desc')->get();
        $posts = Post::latest()->paginate(2);
        // $posts = Post::latest()->get();
        // return $posts;
        return view('posts.index', compact('posts'));
    }


    public function store(Request $request){
        $title = $request->title;
        $content = $request->content;

        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:10'
        ]);

        // dd($request);
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect(
            $to = '/post/index',
        );
    }
    public function update(){}
    public function destroy(){}
}
