<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ShowSingleController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\FeedBackController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [WelcomeController::class, 'Index'])->name('welcome.index');
Route::get('/categories', [CategoryController::class, 'listCategories'])->name('category.listCategories');
Route::get('/show_category/{category}', [CategoryController::class, 'index'])->name('category.show');
Route::get('/show_single/{id}', [ShowSingleController::class, 'index'])->name('newsItem.show');
Route::get('/show_all', [NewsController::class, 'index'])->name('newsItem.showAll');
//Route::resource('/feed_back', FeedBackController::class)->name('index','feedBack.index');
//Route::resource('/feed_back', FeedBackController::class)->name('create','feedBack.create');

Route::resource('/feed_back', FeedBackController::class)->only(['index', 'store']);
Route::resource('/feed_back', FeedBackController::class)->name('store', 'feedBack.store');
