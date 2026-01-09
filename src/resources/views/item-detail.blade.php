@extends('layouts.app-auth')

@section('title', $item->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/item-detail.css') }}?v={{ time() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="item-detail-container">
        <div class="item-content">
            <!-- 商品画像 -->
            <div class="item-image-section">
                <div class="item-main-image">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                        <span>画像なし</span>
                    @endif
                </div>
            </div>
            
            <!-- 商品情報 -->
            <div class="item-info-section">
                <h1 class="item-title">{{ $item->name }}</h1>
                <p class="item-brand">{{ $item->user->name ?? 'ブランド名' }}</p>
                <p class="item-price">¥{{ number_format($item->price) }} <span class="tax">(税込)</span></p>
                
                <!-- いいね・コメントアイコン -->
                <div class="item-actions">
                    @auth
                        <button class="action-button favorite" onclick="toggleFavorite({{ $item->id }}, this)" data-favorited="{{ $isFavorited ? 'true' : 'false' }}">
                            <img src="{{ $isFavorited ? asset('img/heart-pink.png') : asset('img/heart-default.png') }}" alt="いいね" class="icon-img heart-icon">
                            <span class="count" id="favorite-count">{{ $favoriteCount }}</span>
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="action-button favorite">
                            <img src="{{ asset('img/heart-default.png') }}" alt="いいね" class="icon-img">
                            <span class="count">{{ $favoriteCount }}</span>
                        </a>
                    @endauth
                    <button class="action-button comment">
                        <img src="{{ asset('img/comment-icon.png') }}" alt="コメント" class="icon-img">
                        <span class="count">{{ $commentCount }}</span>
                    </button>
                </div>
                
                <script>
                function toggleFavorite(itemId, button) {
                    const img = button.querySelector('.icon-img');
                    const countElement = document.getElementById('favorite-count');
                    const isFavorited = button.getAttribute('data-favorited') === 'true';
                    
                    fetch(`/items/${itemId}/favorite`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        countElement.textContent = data.favoriteCount;
                        if (data.isFavorited) {
                            img.src = "{{ asset('img/heart-pink.png') }}";
                            button.setAttribute('data-favorited', 'true');
                        } else {
                            img.src = "{{ asset('img/heart-default.png') }}";
                            button.setAttribute('data-favorited', 'false');
                        }
                    });
                }
                </script>
                
                <!-- 購入ボタン -->
                @if($item->purchase)
                    <button class="purchase-button sold" disabled>売り切れ</button>
                @else
                    @auth
                        <a href="{{ route('items.purchase', $item->id) }}" class="purchase-button">購入手続きへ</a>
                    @else
                        <a href="{{ route('login') }}" class="purchase-button">購入手続きへ</a>
                    @endauth
                @endif
                
                <!-- 商品説明 -->
                <div class="item-description">
                    <h2>商品説明</h2>
                    <p>{{ $item->description }}</p>
                </div>
                
                <!-- 商品情報 -->
                <div class="item-information">
                    <h2>商品の情報</h2>
                    <div class="info-row">
                        <span class="info-label">カテゴリー</span>
                        <div class="info-tags">
                            @foreach($item->categories as $category)
                                <span class="info-tag">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="info-row">
                        <span class="info-label">商品の状態</span>
                        <span class="info-value">{{ $item->condition->name ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- コメント欄 -->
        <div class="comment-section">
            <h2>コメント ({{ $commentCount }})</h2>
            
            @if(session('success'))
                <div class="success-message">{{ session('success') }}</div>
            @endif
            
            <!-- コメント一覧 -->
            <div class="comments-list">
                @forelse($item->comments as $comment)
                    <div class="comment-item">
                        <div class="comment-user">
                            @if($comment->user->profile_image)
                                <img src="{{ asset('storage/' . $comment->user->profile_image) }}" alt="{{ $comment->user->name }}" class="user-avatar">
                            @else
                                <div class="user-avatar-placeholder">{{ substr($comment->user->name, 0, 1) }}</div>
                            @endif
                            <span class="user-name">{{ $comment->user->name }}</span>
                        </div>
                        <p class="comment-content">{{ $comment->content }}</p>
                    </div>
                @empty
                    <p class="no-comments">まだコメントはありません</p>
                @endforelse
            </div>
            
            <!-- コメント投稿フォーム -->
            @auth
                <form action="{{ route('items.comment', $item->id) }}" method="POST" class="comment-form">
                    @csrf
                    <label for="content">商品へのコメント</label>
                    <textarea name="content" id="content" rows="4" placeholder="コメントを入力してください" class="comment-input">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="comment-submit">コメントを送信する</button>
                </form>
            @else
                <p class="login-required">コメントを投稿するには<a href="{{ route('login') }}">ログイン</a>してください。</p>
            @endauth
        </div>
    </div>
@endsection
