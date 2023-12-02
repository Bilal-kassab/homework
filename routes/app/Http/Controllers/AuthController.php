<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $req){
        
        $user=User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>$req->password
        ]);

        return response()->json([
            'data'=>$user
        ]);
    }

    public function index(){
        return response()->json([
            "lkv;lsd"=>"llks;jk"
        ]);
    }
}
