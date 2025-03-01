<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstRoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\MypageController;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
});
Route::get('/first', [FirstRoginController::class, 'first'])->name('first');
Route::post('/sell', [SellController::class, 'store'])->name('store');
Route::post('/mypage', [MypageController::class, 'mypage'])->name('mypage');
Route::get('/products/{id}', [ProductsController::class, 'item'])->name('products.item');
Route::post('/purchase/{id}', [ProductsController::class, 'purchase'])->name('products.purchase');
Route::get('/change_address', [ProductsController::class, 'changeAddress'])->name('change_address');
Route::post('/update_address', [ProductsController::class, 'updateAddress'])->name('update_address');
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('/favorites/{product}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
Route::post('/products/{product}/purchase', [ProductsController::class, 'purchase'])->name('products.purchase');

// お気に入り機能
Route::post('/products/{product}/favorite', [FavoriteController::class, 'favorite'])->name('products.favorite')
    ->middleware('auth'); // ログイン必須

// コメント投稿機能（Ajax対応）
Route::post('/products/{product}/comment', [ProductsController::class, 'comment'])->name('products.comment')
    ->middleware('auth'); // ログイン必須


