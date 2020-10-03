<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/manage/post', [PostController::class, 'manage_posts'])->name('manage.post');
Route::post('/add/post', [PostController::class, 'store'])->name('add.post');
Route::post('/delete/post/{post}', [PostController::class, 'destroy'])->name('delete.post');
Route::put('/update/post/{post}', [PostController::class, 'update'])->name('update.post');
Route::get('/view/post/{id}', [PostController::class, 'single_post'])->name('view.post');
