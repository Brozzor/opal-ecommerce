<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminArticlesController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/magasin', [MagasinController::class, 'index'])->name('magasin');
Route::get('/article/{id}', [ArticleController::class, 'index'])->name('article.index');

Route::get('/admin/articles', [AdminArticlesController::class, 'index'])->middleware('admin')->name('articles.index');
Route::get('/admin/article/{id}/edit', [AdminArticlesController::class, 'edit'])->middleware('admin')->name('articles.edit');
Route::get('/admin/article/add', [AdminArticlesController::class, 'add'])->middleware('admin')->name('articles.add');
Route::delete('articles', [AdminArticlesController::class, 'destroy'])->middleware('admin')->name('articles.destroy');
Route::put('/admin/article/{id}/update', [AdminArticlesController::class, 'update'])->middleware('admin')->name('articles.update');
Route::post('articles', [AdminArticlesController::class, 'store'])->middleware('admin')->name('articles.store');

Route::get('/admin/users', [AdminUsersController::class, 'index'])->middleware('admin')->name('users.index');
Route::get('/admin/user/{id}/edit', [AdminUsersController::class, 'edit'])->middleware('admin')->name('users.edit');
Route::get('/admin/user/add', [AdminUsersController::class, 'add'])->middleware('admin')->name('users.add');
Route::delete('users', [AdminUsersController::class, 'destroy'])->middleware('admin')->name('users.destroy');
Route::put('/admin/user/{id}/update', [AdminUsersController::class, 'update'])->middleware('admin')->name('users.update');
Route::post('users', [AdminUsersController::class, 'store'])->middleware('admin')->name('users.store');

Route::post('cart', [CartController::class, 'store'])->name('panier.store');
Route::delete('cart', [CartController::class, 'destroy'])->name('panier.destroy');
Route::get('panier', [CartController::class, 'index'])->name('panier.index');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


//Route::resource('panier', 'CartController')->only(['index', 'store', 'update', 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

