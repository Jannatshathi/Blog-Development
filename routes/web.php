<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;


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
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::resource('/category', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);
Route::resource('/user', UserController::class);
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
Route::post('/profile', [App\Http\Controllers\UserController::class, 'profile_update'])->name('user.profile.update');

// setting
Route::get('setting', [App\Http\Controllers\SettingController::class, 'edit'])->name('setting.index');
Route::post('setting', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');  

// Contact message
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/show/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::delete('/contact/delete/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');
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