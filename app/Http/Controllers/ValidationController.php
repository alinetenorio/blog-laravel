<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class ValidationController extends Controller
{


    public static function userExists($id){
        return User::where('id', $id)->exists();
    }

    public static function userIsAdmin($id){
        $user = User::where('id', $id)->get()[0];
        if($user->permission == 1){
            return true;
        }else{
            return false;
        }
    }


}