@extends('layouts.app-auth')

@section('title', '住所の変更')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/address-edit.css') }}">
@endsection

@section('content')
    <div class="address-edit-container">
        <h1 class="page-title">住所の変更</h1>
        
        <form action="" method="POST">
            @csrf
            
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
