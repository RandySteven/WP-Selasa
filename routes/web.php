<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
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
    return 1+1;
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
Route::prefix('post')->group(function(){

    Route::get('create', [PostController::class, 'create'])->name('post.create');
    Route::post('create', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::get('post-edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('post-update/{post:slug}', [PostController::class, 'update'])->name('post.update');
    // //Route dengan method DELETE dengan url post-delete/{post:slug}, dengan function delete pada class PostController berikan nama post.delete
    Route::delete('post-delete/{post:slug}', [PostController::class, 'delete'])->name('post.delete');
});
Route::get('search-post', [SearchController::class, 'show'])->name('search');
