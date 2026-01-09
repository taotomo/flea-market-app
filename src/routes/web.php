<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StripeController;

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

// 認証不要のルート
// ログイン画面を表示
Route::get('/login', [AuthController::class, 'Login'])->name('login');
// 会員登録画面を表示
Route::get('/register', [AuthController::class, 'Register'])->name('register');
// 商品一覧画面(トップページ) - 未認証ユーザーも閲覧可能
Route::get('/', [ItemController::class, 'index'])->name('items.index');
// 商品詳細画面を表示 - 未認証ユーザーも閲覧可能
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');

// 認証が必要なルート
Route::middleware(['auth', 'verified'])->group(function () {
    // いいね機能
    Route::post('/items/{id}/favorite', [ItemController::class, 'toggleFavorite'])->name('items.favorite');
    // コメント投稿
    Route::post('/items/{id}/comment', [ItemController::class, 'storeComment'])->name('items.comment');
    // 商品購入画面を表示
    Route::get('/items/{id}/purchase', [ItemController::class, 'purchase'])->name('items.purchase');
    // Stripe Checkout決済処理
    Route::post('/items/{id}/stripe-checkout', [StripeController::class, 'createCheckoutSession'])->name('stripe.checkout');
    // Stripe決済成功後
    Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
    // 商品購入処理（Stripeなし）
    Route::post('/items/{id}/purchase', [ItemController::class, 'storePurchase'])->name('items.purchase.store');
    // 住所変更画面を表示
    Route::get('/purchase/address/{id}', [ProfileController::class, 'editAddress'])->name('address.edit');
    // 住所更新処理
    Route::post('/purchase/address/{id}', [ProfileController::class, 'updateAddress'])->name('address.update');
    // 商品出品画面を表示
    Route::get('/sell', [ItemController::class, 'create'])->name('item.create');
    // 商品出品処理
    Route::post('/sell', [ItemController::class, 'store'])->name('items.store');
    // マイページ画面を表示
    Route::get('/mypage', [ProfileController::class, 'mypage'])->name('mypage');
    // プロフィール設定画面を表示
    Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // プロフィール更新処理
    Route::post('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// メール認証誘導画面を表示
Route::get('/email/verify', [AuthController::class, 'EmailVerification'])->name('verification.notice');
