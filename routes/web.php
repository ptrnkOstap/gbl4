<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\ShowSingleController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\FeedBackController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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

//Route::get('/default_welcome', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>'CheckIfAdmin'], function () {
    Route::view('/', 'admin.news.index')->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/', [WelcomeController::class, 'Index'])->name('index');
Route::get('/categories', [CategoryController::class, 'listCategories'])->name('category.listCategories');
Route::get('/show_category/{category}', [CategoryController::class, 'index'])->name('category.show');
Route::get('/show_single/{news}', [ShowSingleController::class, 'index'])->name('newsItem.show');
//Route::get('/show_single/{news}', [NewsController::class, 'showSingle'])->name('newsItem.show');
Route::get('/show_all', [NewsController::class, 'index'])->name('newsItem.showAll');

//Route::resource('admin', AdminNewsController::class);


Route::resource('/feed_back', FeedBackController::class)->only(['index', 'store']);
Route::resource('/feed_back', FeedBackController::class)->name('store', 'feedBack.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
