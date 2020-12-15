<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminArticlesController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\ArticleController;
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

 
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/magasin', [MagasinController::class, 'index'])->name('magasin');
Route::get('/article/{id}', [ArticleController::class, 'index'])->name('article.index');

Route::get('/admin/articles', [AdminArticlesController::class, 'index'])->middleware('admin')->name('articles.index');
Route::get('/admin/article/{id}/edit', [AdminArticlesController::class, 'edit'])->middleware('admin')->name('articles.edit');
Route::get('/admin/article/add', [AdminArticlesController::class, 'add'])->middleware('admin')->name('articles.add');

Route::delete('articles', [AdminArticlesController::class, 'destroy'])->name('articles.destroy');
Route::put('/admin/article/{id}/update', [AdminArticlesController::class, 'update'])->name('articles.update');
Route::post('articles', [AdminArticlesController::class, 'store'])->name('articles.store');

Route::resource('panier', 'CartController')->only(['index', 'store', 'update', 'destroy']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

