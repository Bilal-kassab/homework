<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{


    public function checkUser(){
        
        $name=request()->query('name');

        if(!isset($name)){
            return response()->json([
                'message'=>'Plz enter name parameter',
            ]);
        }

        $fill=file_get_contents('C:\xampp\htdocs\list_name.json');
        $json=json_decode($fill);

        if(!in_array($name,$json)){
            return response()->json([
                'Message'=> 'invaild name: '.$name.' !!',
            ]);
        }

        return response()->json([
            'Message'=> 'Welcome '.$name.' !!',
        ]);
    }
//////////////////////////////////////////////////////
    public function get_user_list(){
        $fill=file_get_contents('http://localhost:8012/list_name.json');
        $json=json_decode($fill,true);
        foreach($json as $j){
            echo  strtoupper($j);
            echo"<br>"; 
        }
    }
    //////////////////////////////////////////////////////
    public function user_info(){
        $name=request()->query('name');
        $phone=request()->query('phone');
        $email=request()->query('email');

        if(!isset($name)){
            return response()->json([
                'message'=>'Plz enter user_name parameter',
            ]);
        }
        if(!isset($phone)){
            return response()->json([
                'message'=>'Plz enter user_phone parameter',
            ]);
        }
        if(!isset($email)){
            return response()->json([
                'message'=>'Plz enter user_email parameter',
            ]);
        }

        $f=file_get_contents('http://localhost:8012/json_file.json');
        $json=json_decode($f,true);

        foreach($json as $arr){
            if($name== $arr['name'] && $email == $arr['email'] && $phone == $arr['phone']){
                return response()->json([
                    "Message"=>"Hi ".$name.' your informations: ',
                    'Email: '=>$email,
                    'Phone Number: '=>$phone
                    
                ]);
            }
        }

        return response()->json([
            'Message'=> "Sorry your info incorrect!!"
        ]);

    }




    // public function index(){
    //     return view('choose');
    // }
}
