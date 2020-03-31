<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Http\Controllers\ValidationController;

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
        $posts = Post::all();
        //$comments = 

        return $posts;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $post = new Post();

            $post['title'] = $request->title;
            $post['content'] = $request->content;
            
           
            $post['author_id'] = $request->header()['authorization'][0];
    
            $category = Category::find($request->category);
            $category->posts()->save($post);
    
            //TAG
            $tag = Tag::find($request->tag1);
            $post->tags()->attach($tag);
        
            $post->save();
        }else{
                return "Not authorized";
        }

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
       if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $post['title'] = $request->title;
            $post['content'] = $request->content;

            $post['author_id'] = $request->header()['authorization'][0];

            $category = Category::find($request->category);
            $post->category()->associate($category);

            $post->tags()->detach();
            $tag = Tag::find($request->tag1);
            $post->tags()->attach($tag);

            $post->save();
       }else{
            return "Not authorized";
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $post->user()->dissociate();
            $post->category()->dissociate();
            $post->tags()->detach();
            $post->comments()->delete();
            $post->delete();
        }else{
            return "Not authorized";
        }
    }


}
