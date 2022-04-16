<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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
// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//
Route::get('/authors',[AuthorController::class,'index']);
Route::get('/author/{id}',[AuthorController::class,'show']);
Route::post('/author',[AuthorController::class,'store']);
Route::put('/author/{id}',[AuthorController::class,'update']);
Route::delete('/author/{id}',[AuthorController::class,'destroy']);
//
Route::get('/books',[BookController::class,'index']);
Route::get('/book/{id}',[BookController::class,'show']);
Route::post('/book',[BookController::class,'store']);
Route::put('/book/{id}',[BookController::class,'update']);
Route::delete('/book/{id}',[BookController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
