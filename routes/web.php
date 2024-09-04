<?php

use App\Http\Controllers\Post\PostController;
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

Route::controller(PostController::class)
    ->prefix('/posts')
    ->as('posts.')
    ->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('create','create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}','show')->name('edit');
    Route::post('update','update')->name('update');
    Route::delete('{id}','destroy')->name('destroy');
});