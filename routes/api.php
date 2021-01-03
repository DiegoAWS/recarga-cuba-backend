<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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


Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::post('/loginAPI', [AuthenticatedSessionController::class, 'loginAPI'])
                ->middleware('guest');   

Route::middleware('auth:sanctum')->post('/logout',function(Request $request){
return $request->user()->currentAccessToken()->delete();
});                

Route::middleware('auth:sanctum')->post('/logoutALL',function(Request $request){
    return $request->user()->tokens()->delete();
    });                
    

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});                
Route::get('/test', function (Request $request) {
    return 'TEST SUCCESS!!!';
});  