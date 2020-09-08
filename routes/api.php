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

Route::middleware('auth:sanctum')->get('/details','UserController@details');
//  function () {
//     return response()->json([
//         'profile'=>"$user",
//     ]);
// });
// Route::middleware('auth:sanctum')::get('details', 'UserController@details');
Route::POST('/login','UserController@index');
// Route::middleware(['auth:sanctum'])->group(function () {  
// 	Route::get('/users', 'UserController@details');
// });
