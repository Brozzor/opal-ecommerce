<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminArticlesController;
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

Route::get('/admin/articles', [AdminArticlesController::class, 'index'])->middleware('admin')->name('articles.index');
Route::get('/admin/article/{id}/edit', [AdminArticlesController::class, 'edit'])->name('articles.edit');
Route::delete('articles', [AdminArticlesController::class, 'destroy'])->name('articles.destroy');
Route::put('/admin/article/{id}/update', [AdminArticlesController::class, 'update'])->name('articles.update');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
