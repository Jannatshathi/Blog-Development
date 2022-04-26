<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('website');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('website');
Route::get('/category', [App\Http\Controllers\FrontendController::class, 'category'])->name('website');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('website');
Route::get('/post', [App\Http\Controllers\FrontendController::class, 'post'])->name('website');



//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
});
Route::resource('/category', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);

});