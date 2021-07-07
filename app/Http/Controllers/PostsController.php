<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware((['auth']))->except(['index','show']);
        // 이 컨트롤러를 통하는 모든 경로에 미들웨어 적용
    }
    
    protected function uploadPostImage($request){
        $name = $request->file('imageFile')->getClientOriginalName();
        // $name = 'imageFile.jpg';

        $extension = $request->file('imageFile')->extension();
        // $extension = 'jpg';

        $nameWithoutExtension = Str::of($name)->basename('.'.$extension);
        // $nameWithoutExtension = 'imageFile';

        // dd($nameWithoutExtension);
        // dd($name.'extension:'. $extension);
        $fileName = $nameWithoutExtension . '_' . time() . '.' . $extension;
        // $fileName = 'imageFile'.'_'.'1234567890'.'jpg';

        $request->file('imageFile')->storeAs('public/images', $fileName);
        // dd($fileName);
        // $request->imageFile
        // 그 파일 이름을
        return $fileName;
    }

    public function create(){
        return view('posts.create');
    }
    public function edit(Request $request,$id){
        $post = Post::find($id);
        
        return view('posts.edit' ,['post' => $post , 'page'=>$request->page]);
    }
    public function show(Request $request, $id){ //injection이 앞에와야함.
        $posts = Post::find($id);
        // $posts = Post::find($id)->join('users','posts.user_id','=','users.id');
        $page = $request->query('page');
        $userName = User::find($posts->user_id)->name;
        return view('posts.show',compact('posts','page','userName'));
    }
    public function index(){
        // $posts = Post::orderBy('created_at','desc')->get();
        $posts = Post::latest()->paginate(5);
        // $posts = Post::latest()->get();tj
        // return $posts;


        return view('posts.index', compact('posts'));
    }


    public function store(Request $request){
        $title = $request->title;
        $content = $request->content;

        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:10',
            'imageFile'=>'image|max:2000'
        ]);

        // dd($request);
        $post = new Post();
        $post->title = $title;
        $post->content = $content;
        $post->user_id = Auth::user()->id;


        // File 처리
        // 내가 원하는 파일시스템 상의 위치에 원하는 이름으로
        // 파일을 저장하고
        if($request->file('imageFile')) {
            $post->image = $this->uploadPostImage($request);
        }
        

        $post->save();

        return redirect(
                $to = '/post/index',
            );
        // $posts = Post::latest()->paginate(5);
        // return view('posts.index',['posts' => $posts]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:10',
            'imageFile'=>'image|max:2000'
    ]);

        $title = $request->title;
        $content = $request->content;
        
        $post = Post::find($id);

        if($request->user()->cannot('update',$post)){
            abort(403);
        }


        if($request->file('imageFile')){
            $imagePath = 'public/images/'.$post->image;
            Storage::delete($imagePath);
            $post->image = $this->uploadPostImage($request);

        }

        $post->title = $title;
        $post->content = $content;
        $post->save();

        return redirect()->route('posts.show',['id' => $id]);
    }
    public function destroy(Request $request, $id){
        $post = Post::findOrFail($id);
        // if(auth()->user()->id != $post->user_id){
        //     abort(403);            
        // }
            if($request->user()->cannot('delete',$post)){
                abort(403);
            }


        if($post->image){
            $imagePath = 'public/images/'.$post->image;
            Storage::delete($imagePath);
        }
        $post->delete();

        $page = $request->query('page');

        return redirect()->route('posts.index',['page' =>$page]);

    }
}
