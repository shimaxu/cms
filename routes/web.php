<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/create', [ArticleController::class, 'create'])->name('create');
Route::post('/store', [ArticleController::class, 'store'])->name('store');
Route::get('/{slug}', [ArticleController::class, 'view'])->name('view');
Route::get('/{slug}/edit', [ArticleController::class, 'edit'])->name('edit');
Route::post('/{slug}', [ArticleController::class, 'update'])->name('update');
Route::delete('/{slug}', [ArticleController::class, 'delete'])->name('delete');
