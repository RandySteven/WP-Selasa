<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get = menampilkan data dari database atau logic
//Route::view = menampilkan tampilan aja tanpa adanya database
Route::get('/welcome', function () {
    return view('welcome');
});
//tipe route tidak boleh sama
//name routing tidak boleh sama

//Routing
//name = penamaan routing
//parameter pertama url
//return view
// Route::view
Route::view('/about', 'about')->name('about');
// Route::get('/about', function(){
//     return view('about');
// });
Route::view('/contact', 'contact');

Route::get('', [PostController::class, 'index'])->name('welcome');
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::prefix('post')->group(function(){
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('create', [PostController::class, 'store'])->name('post.store');
        Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post.show')->withoutMiddleware('auth');
        Route::get('post-edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
        Route::patch('post-update/{post:slug}', [PostController::class, 'update'])->name('post.update');
        // //Route dengan method DELETE dengan url post-delete/{post:slug}, dengan function delete pada class PostController berikan nama post.delete
        Route::delete('post-delete/{post:slug}', [PostController::class, 'delete'])->name('post.delete');
    });
});
Route::get('search-post', [SearchController::class, 'show'])->name('search');
Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category');
Route::get('tag/{tag:slug}', [TagController::class, 'show'])->name('tag');

// Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
