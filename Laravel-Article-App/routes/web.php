<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::view("add-article", 'add-article');
Route::view("view-article", 'view-article');
Route::post('add-article', [AddController::class, 'addData']);
Route::get('view-article', [ViewController::class, 'show'])->name('view-article');
Route::get('edit-article/{id}', [ArticlesController::class, 'edit'])->name('edit-article');
Route::put('edit-article/{id}', [ArticlesController::class, 'update'])->name('update-article');
Route::delete('delete-article/{id}', [ArticlesController::class, 'destroy'])->name('delete-article');
Auth::routes();
