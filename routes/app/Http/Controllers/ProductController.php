<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function createProduct(Request $request){
    //     $name=$request->input('name');
    //     $description=$request->input('description');
    //     $price=$request->input('price');
    //     $brand=$request->input('brand');
    //     if(!$name || !$description || !$price || !$brand){
    //         return response()->json([
    //             'Message'=> 'All fields are required!! ',
    //             'data'=>null,
    //         ],400);
    //     }
    //     $file=file_get_contents('E:\laravel_course\product_list.json');
    //     $js=json_decode($file,true);
    //     $payload=[
    //         'name'=>$name,
    //         'description'=>$description,
    //         'price'=>$price,
    //         'brand'=>$brand
    //     ];

    //     if(!$js || !is_array($js)){
    //         $content=[
    //             $payload
    //         ];
    //         file_put_contents('E:\laravel_course\product_list.json',json_encode($content));
    //     }else{
    //         $js[]=$payload;
    //         file_put_contents('E:\laravel_course\product_list.json',json_encode($js));
    //     }
    //     return response()->json([
    //         'Message'=>'Product has been added Successfully!! ',
    //         'data'=>$payload,
    //     ]);
    // }

/////////////////////////////////////////////////////////////////////////////////////











    public function get_product($productid)
    {
        
        $file=file_get_contents('E:\laravel_course\product_list.json');
        $js=json_decode($file,true);

       
        if(!is_array($js)){
            return response()->json([
                'Message'=>'The file is Empty',
            ],400); 
        }

        if($productid<0 || $productid > count($js)){
            return response()->json([
                'Message'=>'Invalid ID: '.$productid,
            ],400);
        }
        
        return response()->json([
           'data'=>$js[$productid],
        ],200);

    }


///////////////////////////////////////////////////////////////////

    public function list_product(){
        $file=file_get_contents('E:\laravel_course\product_list.json');
        $js=json_decode($file,true);
        return response()->json([
            'Message'=> 'All Products:',
            'data'=>$js
        ],200);

    }


























//////////////////////////////////////////////////////////////////////

    public function update_product(Request $request,$productid){
        $new_name=$request->input('new_name');

        $file=file_get_contents('E:\laravel_course\product_list.json');
        $js=json_decode($file,true);

        if($productid<0 || $productid > count($js)){
            return response()->json([
                'Message'=>'Invalid ID: '.$productid,
            ],400);
        }

        if(!$new_name){
            return response()->json([
                'Message'=>'Enter the new name',
            ]);
        }

        $p= $js[$productid-1];
        
        $newfile=[
            'name'=>$new_name,
            'description'=>$p['description'],
            'price'=>$p['price'],
            'brand'=>$p['brand']
        ];

        $js[$productid-1]=$newfile;

        file_put_contents('E:\laravel_course\product_list.json',json_encode($js));

                        
        return response()->json([
            'Message'=>'The product name with id '.$productid." and with old name ".$p['name']." has been updated to ".$new_name,
            'data'=>$js,
        ]);


    }
}
