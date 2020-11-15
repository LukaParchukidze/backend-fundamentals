<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/register', [LoginController::class, 'postRegister'])->name('post_register');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'postLogin'])->name('post_login');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts');

    Route::get('/my_posts', [PostController::class, 'postsByUser'])->name('my_posts');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::post('/posts/save', [PostController::class, 'save'])->name('posts.save');

    Route::get('/posts/{post}/read', [PostController::class, 'read'])->name('posts.read');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{post}/delete', [PostController::class, 'delete'])->name('posts.delete');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

