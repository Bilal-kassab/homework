<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenMiddleware
{
   private $allowedEmail=[
    'bilal@gmail.com',
   ];
    public function handle(Request $request, Closure $next): Response
    {
        $error=false;
        
        if(!$request->hasHeader('token')){
            $error=true;
        }
       $token=$request->header('token');

       try{

        $jsstr=base64_decode($token);
        $jsonpayload=json_decode($jsstr,true);

        if(!$jsonpayload){
            $error=true;
        }
        if(!isset($jsonpayload['email'])){
            $error=true;
        }
        if(!in_array($jsonpayload['email'],$this->allowedEmail)){
            $error=true;
        }

       }catch(Exception $e){
            $error=true;
       }

       if($error){
        return response()->json([
            'Message'=>'Invaild token'
        ]);
        
       }
        return $next($request);

    }

}
