<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidationController;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $categories = Category::all();

        //return view('listCategories', ['categories'=>$categories]);
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
            $category = new Category();

            $category['title'] = $request->title;

            $category->save();
        }else{
            return "Not authorized";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return $category;
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $category['title'] = $request->title;

             $category->save();
        }else{
            return "Not authorized";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        //
        if( ValidationController::userExists($request->header()['authorization'][0]) ){
            $category->delete();
        }else{
            return "Not authorized";
        }
       
    }
}
