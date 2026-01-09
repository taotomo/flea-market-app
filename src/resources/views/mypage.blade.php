@extends('layouts.app-auth')

@section('title', 'マイページ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}?v={{ time() }}">
@endsection

@section('content')
    <div class="mypage-container">
        <!-- プロフィール情報 -->
        <div class="profile-section">
            <div class="profile-image">
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}">
                @else
                    <div class="profile-placeholder">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <h2 class="username">{{ $user->name }}</h2>
            <a href="{{ route('profile.edit') }}" class="profile-edit-button">プロフィールを編集</a>
        </div>

        <!-- タブ切り替え -->
        <div class="tabs">
            <button class="tab-button active" data-tab="sell">出品した商品</button>
            <button class="tab-button" data-tab="purchase">購入した商品</button>
        </div>

        <!-- 出品した商品一覧 -->
        <div class="tab-content active" id="sell-tab">
            @if($listedItems->count() > 0)
                <div class="items-grid">
                    @foreach($listedItems as $item)
                    <a href="{{ route('items.show', $item->id) }}" class="item-card">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="item-image">
                        @else
                            <div class="item-image-placeholder">
                                <span>画像なし</span>
                            </div>
                        @endif
                        @if($item->purchase)
                            <div class="sold-label">Sold</div>
                        @endif
                        <p class="item-name">{{ $item->name }}</p>
                    </a>
                    @endforeach
                </div>
            @else
                <div class="no-items">
                    <p>出品した商品はありません</p>
                </div>
            @endif
        </div>

        <!-- 購入した商品一覧 -->
        <div class="tab-content" id="purchase-tab">
            @if($purchasedItems->count() > 0)
                <div class="items-grid">
                    @foreach($purchasedItems as $item)
                    <a href="{{ route('items.show', $item->id) }}" class="item-card">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="item-image">
                        @else
                            <div class="item-image-placeholder">
                                <span>画像なし</span>
                            </div>
                        @endif
                        <div class="sold-label">Sold</div>
                        <p class="item-name">{{ $item->name }}</p>
                    </a>
                    @endforeach
                </div>
            @else
                <div class="no-items">
                    <p>購入した商品はありません</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        // タブ切り替え機能
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // すべてのタブとコンテンツから active を削除
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // クリックされたタブとコンテンツに active を追加
                button.classList.add('active');
                const tabId = button.getAttribute('data-tab') + '-tab';
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>
@endsection
