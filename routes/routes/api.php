<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SecondController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/














Route::controller(ProductController::class)->group(function(){

    //Route::post('create','createProduct');
    Route::get('show','list_product');
    Route::get('getproduct/{productid}','get_product');
   // Route::get('deletepro/{productid}','delete_product');
   // Route::post('update/{productid}','update_product');


});














// Route::controller(SecondController::class)->group(function(){
    
//     Route::get('check','check')->middleware('check_token');

//     Route::get('login','login')->middleware('login_token');

//     Route::delete('delete/{id}','delete_product')->middleware('check_owner');

//     Route::get('products','list_product');

//     Route::post('login2','login2');
    
// });




//Route::post('login',[AuthController::class,'index'])->name('login');


//  Route::group(["middleware"=>["auth:sanctum"]],function(){
//     Route::post('register',[AuthController::class,'register']);

//  });

