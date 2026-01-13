@extends('layouts.app-auth')

@section('title', '商品の出品')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}?v={{ time() }}">
@endsection

@section('content')
    <div class="sell-container">
        <h1 class="page-title">商品の出品</h1>
        
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <!-- 商品画像 -->
            <div class="form-section">
                <label class="section-label">商品画像</label>
                <div class="image-upload-area" id="imageUploadArea">
                    <img id="imagePreview" src="" alt="プレビュー" style="display: none;">
                    <label for="image" class="upload-label">
                        画像を選択する
                    </label>
                    <input type="file" id="image" name="image" accept="image/*" style="display: none;">
                </div>
                @error('image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- 商品の詳細 -->
            <div class="form-section">
                <h2 class="section-title">商品の詳細</h2>
                <div class="form-group">
                    <label>カテゴリー</label>
                    <div class="category-tags">
                        @foreach($categories as $category)
                            <label class="category-tag">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="category-checkbox">
                                <span>{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('categories')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="condition">商品の状態</label>
                    <select id="condition" name="condition" class="form-select">
                        <option value="">選択してください</option>
                        @foreach($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                        @endforeach
                    </select>
                    @error('condition')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- 商品名と説明 -->
            <div class="form-section">
                <h2 class="section-title">商品名と説明</h2>
                
                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}">
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="brand">ブランド名</label>
                    <input type="text" id="brand" name="brand" class="form-input" value="{{ old('brand') }}">
                    @error('brand')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="description">商品の説明</label>
                    <textarea id="description" name="description" class="form-textarea">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="price">販売価格</label>
                    <input type="number" id="price" name="price" class="form-input" placeholder="¥" value="{{ old('price') }}">
                    @error('price')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <button type="submit" class="submit-button">出品する</button>
        </form>
    </div>

    <script>
        // 画像プレビュー機能
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
