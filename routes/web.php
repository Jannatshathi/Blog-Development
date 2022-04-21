<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return view('website.home');
})->name('website');
Route::get('/category', function(){
    return view('website.category');
});
Route::get('/post', function(){
    return view('website.post');
});


//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
});
Route::resource('/category', CategoryController::class);

Route::resource('/tag', TagController::class);

Route::resource('/post', PostController::class);

});