@extends('layouts.app-auth')

@section('title', '商品一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/item-list.css') }}?v={{ time() }}">
@endsection

@section('content')
    <div class="item-list-container">
        <!-- タブ切り替え -->
        <div class="tabs">
            <a href="{{ route('items.index', ['tab' => 'all', 'search' => request('search')]) }}" class="tab {{ $tab === 'all' ? 'active' : '' }}">おすすめ</a>
            <a href="{{ route('items.index', ['tab' => 'mylist', 'search' => request('search')]) }}" class="tab {{ $tab === 'mylist' ? 'active' : '' }}">マイリスト</a>
        </div>
        
        <!-- 商品一覧グリッド -->
        <div class="items-grid">
            @forelse($items as $item)
                <div class="item-card">
                    <a href="{{ route('items.show', $item->id) }}">
                        <div class="item-image">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
                            @else
                                <span>画像なし</span>
                            @endif
                            @if($item->purchase)
                                <span class="sold-label">Sold</span>
                            @endif
                        </div>
                        <p class="item-name">{{ $item->name }}</p>
                    </a>
                </div>
            @empty
                <p class="no-items">商品がありません</p>
            @endforelse
        </div>
    </div>
@endsection
