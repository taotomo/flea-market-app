@extends('layouts.app-auth')

@section('title', 'プロフィール設定')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile-edit.css') }}">
@endsection

@section('content')
    <div class="profile-edit-container">
        <h1 class="profile-title">プロフィール設定</h1>
        
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="profile-image-section">
                <div class="profile-image-preview">
                    <img id="imagePreview" src="" alt="プロフィール画像">
                </div>
                <label for="profile_image" class="image-upload-button">画像を選択する</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" style="display: none;">
            </div>
            
            <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="postal_code">郵便番号</label>
                <input type="text" id="postal_code" name="postal_code" placeholder="000-0000">
            </div>
            
            <div class="form-group">
                <label for="address">住所</label>
                <input type="text" id="address" name="address">
            </div>
            
            <div class="form-group">
                <label for="building">建物名</label>
                <input type="text" id="building" name="building">
            </div>
            
            <button type="submit" class="update-button">更新する</button>
        </form>
    </div>
@endsection
