<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductTypeConroller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product-types', ProductTypeConroller::class);
Route::resource('product', ProductController::class);
Route::resourse('banner', BannerController::class);
Route::post('product-update/{id}' , [ProductController::class, 'update']);
Route::post('banner-update/{id}' , [BannerController::class, 'update']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
