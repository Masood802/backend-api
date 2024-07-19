<?php

use App\Http\Controllers\RecipiesController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('/logout', [AuthController::class,'logout']);
});
Route::post('/signup',[AuthController::class,'store']);
Route::post('/signin',[AuthController::class,'signin']);

Route::get('/recipies',[RecipiesController::class,'index']);
Route::get('/recipies/{id}',[RecipiesController::class,'show']);

Route::post('/add-recipie',[RecipiesController::class,'store']);
Route::get('/categories',function(){
    $categories=Category::all();
    return response()->json([
        'categories'=> $categories,
    ]);
});