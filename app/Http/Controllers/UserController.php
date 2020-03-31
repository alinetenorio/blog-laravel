<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash, App\Http\Controllers\Auth\RegisterController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id = $request->header()['authorization'][0];
        if( ValidationController::userExists($id) &&
            ValidationController::userIsAdmin($id) ){

                return $users = User::all();
        }else{
            return "Not authorized";
        }
        
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
        $id = $request->header()['authorization'][0];
        if( ValidationController::userExists($id) &&
            ValidationController::userIsAdmin($id) ){
                return User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'permission' => $request['permission'] 
                ]);
        }else{
            return "Not authorized";
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return $user;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $id = $request->header()['authorization'][0];

        //if user exists and is admin: he can edit everything
        if( ValidationController::userExists($id) &&
            ValidationController::userIsAdmin($id) ){
                $user['name'] = $request->name;
                $user['email'] = $request->email;
                $user['password'] = Hash::make($request->password);
                $user['permission'] =$request->permission;

        }else if(ValidationController::userExists($id) &&
            $id == $request->user->id){
            //if user is contributor: he can only edit his profile,
            //  except his permissions
                $user['name'] = $request->name;
                $user['email'] = $request->email;
                $user['password'] = Hash::make($request->password);
        }else{
            return 'Not authorized';
        }

        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ugit sser  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        //
        $id = $request->header()['authorization'][0];

        if( ValidationController::userExists($id) &&
            ValidationController::userIsAdmin($id) ){
                $user->delete();
        }else{
            return 'Not authorized';
        }
    }
}
