<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $tags = Tag::all();

        //return view('listTags', ['tags'=>$tags]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $tag = new Tag();

            $tag['title'] = $request->title;

            $tag->save();
        }else{
            return "Not authorized";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return $tag;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $tag['title'] = $request->title;

            $tag->save();
        }else{
            return "Not authorized";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        //
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $tag->posts()->detach();
            $tag->delete();
        }else{
            return "Not authorized";
        }
        
    }
}
