<?php

use App\Http\Controllers\Api\ArtikelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-product', [ArtikelController::class, 'GetProduct']);
Route::post('/create-product', [ArtikelController::class, 'CreateProduct']);
Route::put('/update-product/{id}', [ArtikelController::class, 'UpdateProduct']);
Route::delete('/delete-product/{id}', [ArtikelController::class, 'DeleteProduct']);