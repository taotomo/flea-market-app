@extends('layouts.app-auth')

@section('title', '商品購入')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}?v={{ time() }}">
@endsection

@section('content')
    <div class="purchase-container">
        <div class="purchase-content">
            <!-- 左側:商品情報と支払い方法 -->
            <div class="purchase-left">
                <!-- 商品情報 -->
                <div class="product-info">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="product-image">
                    @else
                        <div class="product-image-placeholder">
                            <span>画像なし</span>
                        </div>
                    @endif
                    <div class="product-details">
                        <h2 class="product-name">{{ $item->name }}</h2>
                        <p class="product-price">¥{{ number_format($item->price) }}</p>
                    </div>
                </div>
                
                <!-- 支払い方法 -->
                <form action="{{ route('stripe.checkout', $item->id) }}" method="POST" id="purchase-form">
                    @csrf
                    <div class="payment-section">
                        <h3 class="section-title">支払い方法</h3>
                        <select name="payment_method" class="payment-select" id="payment-select" required>
                            <option value="">選択してください</option>
                            <option value="convenience_store">コンビニ払い</option>
                            <option value="card">カード支払い</option>
                        </select>
                        @error('payment_method')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- 配送先 -->
                    <div class="shipping-section">
                        <div class="section-header">
                            <h3 class="section-title">配送先</h3>
                            <a href="{{ route('address.edit', $item->id) }}" class="change-link">変更する</a>
                        </div>
                        <div class="shipping-address">
                            @if($address['postal_code'])
                                <p>〒{{ $address['postal_code'] }}</p>
                                <p>{{ $address['address'] }}</p>
                                @if($address['building'])
                                    <p>{{ $address['building'] }}</p>
                                @endif
                            @else
                                <p class="no-address">配送先住所が設定されていません</p>
                                <p class="no-address-note">プロフィールで住所を設定するか、変更ボタンから入力してください</p>
                            @endif
                        </div>
                        @error('postal_code')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                        @error('address')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            
            <!-- 右側:購入確認 -->
            <div class="purchase-right">
                <div class="summary-box">
                    <table class="summary-table">
                        <tr>
                            <th>商品代金</th>
                            <td>¥{{ number_format($item->price) }}</td>
                        </tr>
                        <tr>
                            <th>支払い方法</th>
                            <td id="payment-display">選択してください</td>
                        </tr>
                    </table>
                    
                    <button type="submit" form="purchase-form" class="purchase-button">購入する</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // 支払い方法選択時に右側に反映
        document.getElementById('payment-select').addEventListener('change', function() {
            const paymentDisplay = document.getElementById('payment-display');
            const selectedOption = this.options[this.selectedIndex];
            
            if (selectedOption.value === '') {
                paymentDisplay.textContent = '選択してください';
            } else {
                paymentDisplay.textContent = selectedOption.text;
            }
        });
    </script>
@endsection
