<?php

use App\Http\Controllers\ProductTypeConroller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product-types', ProductTypeConroller::class);
Route::resource('product', ProductController::class);
Route::post('product-update/{id}' , [ProductController::class, 'update']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
