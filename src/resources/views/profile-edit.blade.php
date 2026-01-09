@extends('layouts.app-auth')

@section('title', 'プロフィール設定')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}?v={{ time() }}">
@endsection

@section('content')
    <div class="profile-edit-container">
        <h1 class="profile-title">プロフィール設定</h1>
        
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            
            <div class="profile-image-section">
                <div class="profile-image-preview">
                    @if($user->profile_image)
                        <img id="imagePreview" src="{{ asset('storage/' . $user->profile_image) }}" alt="プロフィール画像">
                    @else
                        <div id="imagePlaceholder" class="image-placeholder">
                            <span>{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <img id="imagePreview" src="" alt="プロフィール画像" style="display: none;">
                    @endif
                </div>
                <label for="profile_image" class="image-upload-button">画像を選択する</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" style="display: none;">
                @error('profile_image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="postal_code">郵便番号</label>
                <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" placeholder="000-0000">
                @error('postal_code')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="address">住所</label>
                <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
                @error('address')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building" value="{{ old('building', $user->building) }}">
                @error('building')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="update-button">更新する</button>
        </form>
    </div>

    <script>
        // 画像選択時のプレビュー表示
        document.getElementById('profile_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    const imagePlaceholder = document.getElementById('imagePlaceholder');
                    
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    
                    if (imagePlaceholder) {
                        imagePlaceholder.style.display = 'none';
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
