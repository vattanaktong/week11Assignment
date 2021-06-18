<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'post', 'middleware' => 'auth:api'], function()
{
    Route::put('/{post_id}', [PostController::class, 'edit'])->middleware('roles:admin|Author');
    Route::get('/', [PostController::class, 'index'])->middleware();  
    Route::post('/', [PostController::class, 'store'])->middleware(); 
    Route::delete('/{post_id}', [PostController::class, 'destroy'])->middleware('roles:admin|Author');
});


Route::group(['prefix' => 'category', 'middleware' => 'auth:api'], function()
{
    Route::put('/{category_id}', [CategoryController::class, 'edit'])->middleware('roles:admin');
    Route::get('/', [CategoryController::class, 'index'])->middleware('roles:admin|Editor');  
    Route::post('/', [CategoryController::class, 'store'])->middleware('roles:admin'); 
    Route::delete('/{category_id}', [CategoryController::class, 'destroy'])->middleware('roles:admin');
});
