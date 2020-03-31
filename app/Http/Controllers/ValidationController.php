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




}