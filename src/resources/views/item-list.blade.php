@extends('layouts.app-auth')

@section('title', '商品一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/item-list.css') }}">
@endsection

@section('content')
    <div class="item-list-container">
        <!-- タブ切り替え -->
        <div class="tabs">
            <a href="#" class="tab active">おすすめ</a>
            <a href="#" class="tab">マイリスト</a>
        </div>
        
        <!-- 商品一覧グリッド -->
        <div class="items-grid">
            <!-- 商品カード（サンプル×9個） -->
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
            
            <div class="item-card">
                <div class="item-image">
                    <span>商品画像</span>
                </div>
                <p class="item-name">商品名</p>
            </div>
        </div>
    </div>
@endsection
