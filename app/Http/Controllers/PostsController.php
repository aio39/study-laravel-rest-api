<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index($post){
        
        return view('posts.index', compact('post'));
    }


    public function store(Request $request){

        $title = $request->title;
        $content = $request->content;

        dd($request);
    }
    public function update(){}
    public function destroy(){}
}
