<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function check()
    {

        return response()->json([
            'Message' => 'Success',
        ]);
    }
    ////////////////////
    public function login(Request $req)
    {

        return response()->json([
            "Message" => "Done Login"
        ]);
    }
    ///////////////////////

    public function delete_product($id, Request $req)
    {
        $file=file_get_contents('E:\laravel_course\product_owners.json');
        $js=json_decode($file,true);

        if($id<0 || $id > count($js)){
            return response()->json([
                'Message'=>'Invalid ID: '.$id,
            ],400);
        }

        unset($js[$id-1]);
        file_put_contents('E:\laravel_course\product_owners.json',json_encode(array_values($js)));

        return response()->json([
            "Message"=>"Product with id ".$id." has been deleted",
        ]);
    }

    public function list_product(){

        $file=file_get_contents('E:\laravel_course\product_owners.json');
        $js=json_decode($file,true);

        return response()->json([
            'Message'=> 'All Products:',
            'data'=>$js
        ]);

    }



    ////////////////////////////////////////////////////
    public function login2(Request $request){
        $pass=$request->input('password');
        $email=$request->input('email');

        if(!isset($email)){
            return response()->json([
                'message'=>'Plz enter email parameter',
            ]);
        }
        if(!isset($pass)){
            return response()->json([
                'message'=>'Plz enter password parameter',
            ]);
        }

        $f=file_get_contents('E:\laravel_course\users.json');
        $json=json_decode($f,true);

        $jsstr=base64_encode($email);

        foreach($json as $arr){
            if($email== $arr['email'] && $pass == $arr['password']){
                return response()->json([
                    "Message"=>"Hi ".$email.' your informations: ',
                    "Token is: "=>$jsstr
                ]);
            }
        }

        return response()->json([
            'Message'=> "Sorry your info incorrect!!"
        ]);

    }
}
