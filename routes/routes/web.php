<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\SecondController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//  Route::post('user',function(){
//      //return "user"; 
//      return view('user'); 
//  };

// Route::get('/user',function(){
//     return view ('user');
// });


// Route:: get('/code',function(){
    
//     return view('code');
// }

// );
// Route::get('/nav',function(){
//     return view('layout.nav');
// });


// Route::controller(PostController::class)->group(function(){
//     Route::get('/user','userpage');
//     Route::get('/code','codepage');
//     Route::get('welcome','homepage');
//     Route::get('code/{id}','codepage1');

// });

// Route::get('/user',[PostController::class,'userpage']);
// Route::get('/code',[PostController::class,'codepage']);
// Route::get('/welcome',[PostController::class,'homepage']);
// Route::get('/code/{id}',[PostController::class,'codepage1']);


// Route::resource('user', UserController::class);

// Route::get('userpro',UserProfileController::class);















//Route::get("check_user",[FirstController::class,'checkUser']);

// Route::controller(FirstController::class)->group(function(){
    
//     // To take request  (name) and search if this name is exist or not in file "list_names" 
//     Route::get('list-of-user','user_info');

//     // To print all name in file "list_names"
    
//     Route::get('get_names','get_user_list');
    
//     Route::get('check_user','checkUser');

    
// });

Route::controller(SecondController::class)->group(function(){
    
    Route::get('check','check');
    
});