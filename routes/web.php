<?php

use App\Http\Controllers\HomeControlller;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeControlller::class, 'index'])->name('index');
Route::get('/articles/{id}', [HomeControlller::class, 'GetArticle'])->name('articles');
Route::post('/article/Comment', [HomeControlller::class, 'SaveComment'])->name('comments');
Route::get('/categories/{id}', [HomeControlller::class, 'category'])->name('category');
Route::get('/login', function () {
    return view('login');
})->name('loginPage');
Route::post('/login', [HomeControlller::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register');
})->name('registerPage');
Route::post('/register', [HomeControlller::class, 'register'])->name('register');

Route::get('/logout', [HomeControlller::class, 'logout'])->name('logout');


Route::get('/adminPanel/checkComments', [AdminController::class, 'changeCommentState'])->name('checkComments');
Route::get('/adminPanel/checkCommentState', [AdminController::class, 'SetNewStateForComment'])->name('SetNewStateForComments');



Route::get('/adminPanel/CreatePost', [AdminController::class, 'CreateNewArticle'])->name('CreateNewArticle');
Route::post('/adminPanel/CreatePost/inv', [AdminController::class, 'CreateNewArticlePost'])->name('CreateNewArticlePost');

Route::get('/adminPanel/Articles', [AdminController::class, 'articleList'])
->name('ArticlesList');

Route::get('/adminPanel/RemoveArticle/{id}', [AdminController::class, 'removeArticle'])
->name('removeArticle');

Route::get('/adminPanel/CreateCategory', [AdminController::class, 'CreateCategory'])
->name('CreateCategory');

Route::post('/adminPanel/CreateCategoryPost', [AdminController::class, 'CreateCategoryPost'])
->name('CreateCategoryPost');

