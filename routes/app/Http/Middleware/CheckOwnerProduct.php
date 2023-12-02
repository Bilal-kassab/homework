<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwnerProduct
{
    
    public function handle(Request $request, Closure $next): Response
    {
        $error=false;

        $productid=$request->route('id');

        if(!$request->hasHeader('token')){
            $error=true;
        }

       $token=$request->header('token');

       $file=file_get_contents('E:\laravel_course\product_owners.json');
       $js=json_decode($file,true);

       try{

        $jsstr=base64_decode($token);
     
        $product_de=$js[$productid-1];
        
        if($product_de['onwer_email'] != $jsstr){
            $error=true;
        }

       }catch(Exception $e){
            $error=true;
       }

       if($error){

        return response()->json([
            'Message'=>'You are not the owner of this product... this belongs to: '.$product_de['onwer_email']
        ]);
        
       }
        return $next($request);

    }
    
}
