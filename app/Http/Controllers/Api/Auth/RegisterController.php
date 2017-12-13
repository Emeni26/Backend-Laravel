<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;
use App\User;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client ;

    //Retourner le client 1  :pour dire l'id du client de la table client dans la base de donné généré avec la commande passport : php artisan passport:client --password


    public function __construct(){
        $this->client = Client::find(1);
    }

    public function register(Request $request)
    {
      
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);
       
       

       $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password')) // instead of bcrypt('password')
    ]);

    return $this->issueToken($request, 'password');
    }
}
