<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        
        //belongsto appartient à un utilisateur

        return $this->belongsTo(User::Class);
    }
}
