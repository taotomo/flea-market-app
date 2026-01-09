@extends('layouts.app-auth')

@section('title', '住所の変更')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/address-edit.css') }}?v={{ time() }}">
@endsection

@section('content')
    <div class="address-edit-container">
        <h1 class="page-title">住所の変更</h1>
        
        <form action="{{ route('address.update', $item->id) }}" method="POST" novalidate>
            @csrf
            
            <div class="form-group">
                <label for="postal_code">郵便番号</label>
                <input 
                    type="text" 
                    id="postal_code" 
                    name="postal_code" 
                    placeholder="000-0000"
                    value="{{ old('postal_code', $address['postal_code']) }}"
                >
                @error('postal_code')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="address">住所</label>
                <input 
                    type="text" 
                    id="address" 
                    name="address"
                    value="{{ old('address', $address['address']) }}"
                >
                @error('address')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="building">建物名</label>
                <input 
                    type="text" 
                    id="building" 
                    name="building"
                    value="{{ old('building', $address['building']) }}"
                >
                @error('building')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="update-button">更新する</button>
        </form>
    </div>
@endsection
