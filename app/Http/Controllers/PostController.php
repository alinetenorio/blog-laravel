<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $posts = Post::all();

      //  return view('listPosts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd(Auth::id());
        $post = new Post();

        $post['title'] = $request->title;
        $post['content'] = $request->content;
        
        //*Commented to test api
        //$post['author_id'] = Auth::id();

        $category = Category::find($request->category);
        $category->posts()->save($post);

        //TAG
        $tag = Tag::find($request->tag1);
        $post->tags()->attach($tag);
    
        $post->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return $post;
        /*return view('showPost', [
            'post'=>$post,
            ]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        //$tags = $post->tags;
        //dd($tags);
       
        return view('editPost', [
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
       // dd($post);
        $post['title'] = $request->title;
        $post['content'] = $request->content;

        //*Commented to test api
        //$post['author_id'] = Auth::id();

        $category = Category::find($request->category);
        $post->category()->associate($category);

        $post->tags()->detach();
        $tag = Tag::find($request->tag1);
        $post->tags()->attach($tag);

        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->user()->dissociate();
        $post->category()->dissociate();
        $post->tags()->detach();
        $post->comments()->delete();
        $post->delete();
    }
}
