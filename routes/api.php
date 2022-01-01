<?php

use App\Http\Controllers\Api\FileController;
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
Route::post('uploadFile',[FileController::class,'store']);
Route::get('retrieveFile/{file:name}',[FileController::class,'show']);
Route::delete('deleteFile/{file:name}',[FileController::class,'destroy']);
