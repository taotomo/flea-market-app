@extends('layouts.app-auth')

@section('title', '商品購入')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
    <div class="purchase-container">
        <div class="purchase-content">
            <!-- 左側：商品情報と支払い方法 -->
            <div class="purchase-left">
                <!-- 商品情報 -->
                <div class="product-info">
                    <div class="product-image">
                        <span>商品画像</span>
                    </div>
                    <div class="product-details">
                        <h2 class="product-name">商品名</h2>
                        <p class="product-price">¥47,000</p>
                    </div>
                </div>
                
                <!-- 支払い方法 -->
                <div class="payment-section">
                    <h3 class="section-title">支払い方法</h3>
                    <select class="payment-select">
                        <option>選択してください</option>
                        <option>コンビニ払い</option>
                        <option>クレジットカード</option>
                    </select>
                </div>
                
                <!-- 配送先 -->
                <div class="shipping-section">
                    <div class="section-header">
                        <h3 class="section-title">配送先</h3>
                        <a href="#" class="change-link">変更する</a>
                    </div>
                    <div class="shipping-address">
                        <p>〒XXX-YYYY</p>
                        <p>ここには住所と建物名が入ります</p>
                    </div>
                </div>
            </div>
            
            <!-- 右側：購入確認 -->
            <div class="purchase-right">
                <div class="summary-box">
                    <table class="summary-table">
                        <tr>
                            <th>商品代金</th>
                            <td>¥47,000</td>
                        </tr>
                        <tr>
                            <th>支払い方法</th>
                            <td>コンビニ払い</td>
                        </tr>
                    </table>
                    
                    <button class="purchase-button">購入する</button>
                </div>
            </div>
        </div>
    </div>
@endsection
