<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PhotographerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//photos routes
Route::get('all_photos',[PhotoController::class,'index'])->name("all_photos");
Route::post('store_photo',[PhotoController::class,'store'])->name('store_photo');
Route::get('show_photo/{id}',[PhotoController::class,'show'])->name('show_photo');
Route::put('update_photo/{id}',[PhotoController::class,'update'])->name('update_photo');
Route::delete('delete_photo/{id}',[PhotoController::class,'destroy'])->name('delete_photo');


//category routes
Route::get('all_categories',[CategoryController::class,'index'])->name("all_categories");
Route::post("store_category",[CategoryController::class,"store"])->name("store_category");
Route::get("show_category/{id}",[CategoryController::class,"show"])->name("show_category");
Route::put("update_category/{id}",[CategoryController::class,"update"])->name("update_category");
Route::delete("delete_category/{id}",[CategoryController::class,"destroy"])->name("delete_category");


//photographer routes
Route::get("all_photographers",[PhotographerController::class,"index"])->name("all_photographers");
Route::post("store_photographer",[PhotographerController::class,"store"])->name('store_photographer');
Route::get('show_photographer/{id}',[PhotographerController::class,"show"])->name("show_photographer");
Route::put('update_photographer/{id}',[PhotographerController::class,'update'])->name('update_photographer');
Route::delete('delete_photographer/{id}',[PhotographerController::class,"destroy"])->name('delete_photographer');
