<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginToken
{
    
    public function handle(Request $request, Closure $next): Response
    {
        $error=false;
        
        if(!$request->hasHeader('token')){
            $error=true;
        }
       $token=$request->header('token');

       $file=file_get_contents('E:\laravel_course\users.json');
       $js=json_decode($file,true);

       try{

        $jsstr=base64_decode($token);
        $jsonpayload=json_decode($jsstr,true);

        if(!$jsonpayload){
            $error=true;
        }

        if(!isset($jsonpayload['email'])){
            $error=true;
        }

        if(!isset($jsonpayload['password'])){
            $error=true;
        }

        if(!in_array($jsonpayload,$js)){
            $error=true;
        }

       }catch(Exception $e){
            $error=true;
       }

       if($error){
        return response()->json([
            'Message'=>'plz check from password or email'
        ]);
        
       }
        return $next($request);

    }
    
}
