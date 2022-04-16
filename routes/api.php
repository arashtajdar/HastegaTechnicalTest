<?php

use App\Http\Controllers\AuthorController;
use App\Http\Resources\AuthorCollection;
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
Route::get('/authors',[AuthorController::class,'index']);
Route::get('/author/{id}',[AuthorController::class,'show']);
Route::post('/author',[AuthorController::class,'store']);
Route::put('/author/{id}',[AuthorController::class,'update']);
Route::delete('/author/{id}',[AuthorController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
