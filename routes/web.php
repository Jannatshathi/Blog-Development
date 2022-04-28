<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//frontend
Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('website');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('website.about');
Route::get('/category/{slug}', [App\Http\Controllers\FrontendController::class, 'category'])->name('website.category');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('website.contact');
Route::get('/post/{slug}', [App\Http\Controllers\FrontendController::class, 'post'])->name('website.post');



//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
});
Route::resource('/category', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);
Route::resource('/user', UserController::class);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
Route::post('/profile', [App\Http\Controllers\UserController::class, 'profile_update'])->name('user.profile.update');

});

// Route::get('/test', function(){
//     $id = 60;
//     $posts = App\Models\Post::all();
//     foreach($posts as $post){
//         $post->image = "https://i.picsum.photos/id/".$id."/200/300.jpg";
//         $post->save();
//         $id++;
//     }
//     return $posts;
// });