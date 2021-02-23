<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' =>'index', 'showFull']);
    }

    public function index()
    {
        $test = DB::table('users')
            ->select('id', 'name');

        $user = User::all();
        $cate = Category::all();
        $posts = Post::paginate(5);
        return view('blog_theme.pages.home', compact('posts', 'cate', 'user', 'test'));
    }

    public function byCategory(Post $post, $category)
    {
        $posts = Post::all();

        return view('blog_theme.pages.byCategory', compact('posts', 'category'));
    }


    public function categories()
    {
        return view('blog_theme.pages.categories');
    }
    public function addCat(){

        Category::create([
            'catName' => request('catName') ]);

        return redirect('/');

    }

    public function addPost(){
        $cate = Category::all();
        return view('blog_theme.pages.add-post',compact('cate'));
    }

    public function store(Request  $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'category' => 'required'
//            'img' => 'mimes:jpeg, jpg, png, gif|required|max:10000'
        ]);

        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/', '', $path);

        Post::create([
            'title' => request('title'),
            'category' => request('category'),
            'body' => request('body'),
            "img"=> $filename,
            'user_id' => Auth::id()
        ]);

        return redirect('/' );
    }

    public function showFull(Post $post){

        return view('blog_theme.pages.post', compact('post'));
    }
    public function delete(Post $post){
        if (Gate::allows('update', $post)){
        $post->delete();
        return redirect('/');
        }
        dd('klaida');
        return redirect('/');
    }

    public function edit(Post $post){
        $cate = Category::all();
        if (Gate::allows('delete', $post)){
            return view('blog_theme.pages.edit', compact('post', 'cate'));
        }
        dd('klaida');

        return view('blog_theme.pages.edit', compact('post', 'cate'));
    }
    public function  storeUpdate(Request $request, Post $post)
    {
        Post::where('id', $post->id)->update($request->only(['title','category', 'body']));

        return redirect('/');
    }

}
