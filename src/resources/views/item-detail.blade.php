@extends('layouts.app-auth')

@section('title', '商品詳細')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/item-detail.css') }}">
@endsection

@section('content')
    <div class="item-detail-container">
        <div class="item-content">
            <!-- 商品画像 -->
            <div class="item-image-section">
                <div class="item-main-image">
                    <span>商品画像</span>
                </div>
            </div>
            
            <!-- 商品情報 -->
            <div class="item-info-section">
                <h1 class="item-title">商品名がここに入る</h1>
                <p class="item-brand">ブランド名</p>
                <p class="item-price">¥47,000 <span class="tax">(税込)</span></p>
                
                <!-- いいね・コメントアイコン -->
                <div class="item-actions">
                    <button class="action-button favorite">
                        <span class="icon">♡</span>
                    </button>
                    <button class="action-button comment">
                        <span class="icon">💬</span>
                    </button>
                </div>
                
                <!-- 購入ボタン -->
                <a href="#" class="purchase-button">購入手続きへ</a>
                
                <!-- 商品説明 -->
                <div class="item-description">
                    <h2 class="section-title">商品説明</h2>
                    <p class="description-text">
                        カラー：グレー<br>
                        <br>
                        新品<br>
                        商品の状態は良好です。傷や汚れはありません。<br>
                        <br>
                        購入後、即発送いたします。
                    </p>
                </div>
                
                <!-- 商品の情報 -->
                <div class="item-details">
                    <h2 class="section-title">商品の情報</h2>
                    <table class="details-table">
                        <tr>
                            <th>カテゴリー</th>
                            <td>
                                <span class="category-tag">洋服</span>
                                <span class="category-tag">メンズ</span>
                            </td>
                        </tr>
                        <tr>
                            <th>商品の状態</th>
                            <td>良好</td>
                        </tr>
                    </table>
                </div>
                
                <!-- コメント一覧 -->
                <div class="comments-section">
                    <h2 class="section-title">コメント(1)</h2>
                    
                    <div class="comment-item">
                        <p class="comment-user">admin</p>
                        <p class="comment-text">こんにちは！購入したいです。</p>
                    </div>
                    
                    <!-- コメント入力フォーム -->
                    <div class="comment-form">
                        <p class="form-title">商品へのコメント</p>
                        <textarea class="comment-input" placeholder="コメントを入力"></textarea>
                        <button class="comment-submit">コメントを送信する</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
