<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function userpage(){
        return view('user');
    }
    public function codepage(){
        return view('code');
    }
    public function homepage(){
        return view('welcome');
    }
    public function codepage1($id){
        if($id==1) return "1";
        else return "0";
    }
}
