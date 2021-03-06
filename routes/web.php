<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imageController;

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

// Route::get('/', function () {
//     return view('post/index');
// });

Route::get('/', [imageController::class, 'index'])->name('home');
Route::get('/post/create', [imageController::class, 'create'])->name('post.create');
Route::post('/post/create', [imageController::class, 'store'])->name('post.store');
Route::delete('/post/{image}/delete', [imagecontroller::class, 'destroy'])->name('post.destroy');
Route::get('/post/{image}/edit', [imagecontroller::class, 'edit'])->name('post.edit');
Route::patch('/post/{image}/edit', [imagecontroller::class, 'update'])->name('post.update');