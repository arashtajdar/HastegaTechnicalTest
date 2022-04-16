<?php

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
Route::get('/Authors',[AuthorCollection::class,'index']);
Route::get('/Author/{id}',[AuthorCollection::class,'show']);
Route::post('/Author',[AuthorCollection::class,'store']);
Route::put('/Author/{id}',[AuthorCollection::class,'update']);
Route::delete('/Author/{id}',[AuthorCollection::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
