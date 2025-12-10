@extends('layouts.app-auth')

@section('title', '商品の出品')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
    <div class="sell-container">
        <h1 class="page-title">商品の出品</h1>
        
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- 商品画像 -->
            <div class="form-section">
                <label class="section-label">商品画像</label>
                <div class="image-upload-area">
                    <label for="image" class="upload-label">
                        画像を選択する
                    </label>
                    <input type="file" id="image" name="image" accept="image/*" style="display: none;">
                </div>
            </div>
            
            <!-- 商品の詳細 -->
            <div class="form-section">
                <h2 class="section-title">商品の詳細</h2>
                <div class="form-group">
                    <label>カテゴリー</label>
                    <div class="category-tags">
                        <span class="category-tag">ファッション</span>
                        <span class="category-tag">家電</span>
                        <span class="category-tag">インテリア</span>
                        <span class="category-tag">レディース</span>
                        <span class="category-tag">メンズ</span>
                        <span class="category-tag">コスメ</span>
                        <span class="category-tag">本</span>
                        <span class="category-tag">ゲーム</span>
                        <span class="category-tag">スポーツ</span>
                        <span class="category-tag">キッチン</span>
                        <span class="category-tag">ハンドメイド</span>
                        <span class="category-tag">アクセサリー</span>
                        <span class="category-tag">おもちゃ</span>
                        <span class="category-tag">ベビー・キッズ</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="condition">商品の状態</label>
                    <select id="condition" name="condition" class="form-select">
                        <option value="">選択してください</option>
                        <option value="new">新品、未使用</option>
                        <option value="like_new">未使用に近い</option>
                        <option value="good">目立った傷や汚れなし</option>
                        <option value="fair">やや傷や汚れあり</option>
                        <option value="poor">傷や汚れあり</option>
                    </select>
                </div>
            </div>
            
            <!-- 商品名と説明 -->
            <div class="form-section">
                <h2 class="section-title">商品名と説明</h2>
                
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" id="name" name="name" class="form-input">
                </div>
                
                <div class="form-group">
                    <label for="brand">ブランド名</label>
                    <input type="text" id="brand" name="brand" class="form-input">
                </div>
                
                <div class="form-group">
                    <label for="description">商品の説明</label>
                    <textarea id="description" name="description" class="form-textarea"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="price">販売価格</label>
                    <input type="number" id="price" name="price" class="form-input" placeholder="¥">
                </div>
            </div>
            
            <button type="submit" class="submit-button">出品する</button>
        </form>
    </div>
@endsection
