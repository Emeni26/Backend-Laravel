<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PostController extends Controller
{
    //permet de récupérer les posts d'un utilisateur
    public function index(){

        //récupérer l'utilisateur courant authentifié après on récupère les posts
        $posts = Auth::user()->posts()->get();
       
       
       return response()->json(['data' => $posts],200,[],JSON_NUMERIC_CHECK);

       // dd($posts);
    }
}
