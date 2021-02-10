<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index()
    {
        $cate = Category::all();
        $posts = Post::paginate(5);
        return view('blog_theme.pages.home', compact('posts', 'cate'));
    }

    public function byCategory(Post $post, $category)
    {
        $posts = Post::paginate(5);

        return view('blog_theme.pages.byCategory', compact('posts', 'category'));
    }


    public function categories()
    {
        return view('blog_theme.pages.categories');
    }
    public function addCat(){

        Category::create([
            'catName' => request('catName')
        ]);

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
        ]);

        Post::create([
            'title' => request('title'),
            'category' => request('category'),
            'body' => request('body')
        ]);

        return redirect('/');
    }

    public function showFull(Post $post){

        return view('blog_theme.pages.post', compact('post'));
    }
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }

    public function edit(Post $post){

        return view('blog_theme.pages.edit', compact('post'));
    }
    public function  storeUpdate(Request $request, Post $post)
    {
        Post::where('id', $post->id)->update($request->only(['title','category', 'body']));

        return redirect('/');
    }

}
