<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductController::class)->middleware('auth');
// コメント一覧を表示
Route::get('/comments/{product}', [CommentController::class, 'show'])->name('comments.show');
// コメントをする
Route::post('/comments/{product}', [CommentController::class, 'store'])->name('comments.store');

// いいねする
Route::post('/products/{product}/favorites', [FavoriteController::class, 'store'])->name('favorites');
// いいね解除
Route::post('/products/{product}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
// いいね一覧表示
Route::get('/products/favorites/list', [FavoriteController::class, 'index'])->name('favorites.index');

require __DIR__.'/auth.php';
