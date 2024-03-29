<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//frontend
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('book/searchcategory', 'App\Http\Controllers\CartController@searchcategory')->name('searchcategory');
Route::get('book/searchtag', 'App\Http\Controllers\CartController@searchtag')->name('searchtag');
Route::get('/lists/{list}', 'App\Http\Controllers\CartController@list')->name('list');
Route::resource('users', 'UserController', ['except' => ['show']]);

Route::get('/', [BookController::class, 'bookList'])->name('books.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//backend
//books
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::get('books/', [BookController::class, 'index'])->name('books.index');
Route::get('books/create', [BookController::class, 'create'])->name('books.create');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

//categories
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('categories/', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

//tags
Route::delete('tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
Route::get('tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
Route::get('tags/', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/create', [TagController::class, 'create'])->name('tags.create');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');

//orders
Route::get('orders/', [OrderController::class, 'index'])->name('orders.index');