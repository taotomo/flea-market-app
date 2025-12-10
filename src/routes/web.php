<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;

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

// 商品一覧画面（トップページ）
Route::get('/', [ItemController::class, 'index'])->name('items.index');
// 商品詳細画面を表示
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');
// 商品購入画面を表示
Route::get('/purchase/{id}', [ItemController::class, 'purchase'])->name('purchase.show');
// 商品出品画面を表示
Route::get('/sell', [ItemController::class, 'create'])->name('item.create');
// ログイン画面を表示
Route::get('/login', [AuthController::class, 'Login'])->name('login');
// 会員登録画面を表示
Route::get('/register', [AuthController::class, 'Register'])->name('register');
// メール認証誘導画面を表示
Route::get('/email/verify', [AuthController::class, 'EmailVerification'])->name('verification.notice');
// プロフィール設定画面を表示
Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
// 住所変更画面を表示
Route::get('/purchase/address/{id}', [ProfileController::class, 'editAddress'])->name('address.edit');
