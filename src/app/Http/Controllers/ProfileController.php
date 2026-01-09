<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // マイページ画面表示
    public function mypage()
    {
        $user = Auth::user();
        
        // 出品した商品一覧（自分が出品した商品）
        $listedItems = $user->items()->orderBy('created_at', 'desc')->get();
        
        // 購入した商品一覧（自分が購入した商品）
        $purchasedItems = \App\Models\Item::whereHas('purchase', function($query) use ($user) {
            $query->where('buyer_id', $user->id);
        })->with('purchase')->orderBy('created_at', 'desc')->get();
        
        return view('mypage', compact('user', 'listedItems', 'purchasedItems'));
    }

    // プロフィール編集画面表示
    public function edit()
    {
        $user = Auth::user();
        return view('profile-edit', compact('user'));
    }

    // プロフィール更新処理
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        
        // プロフィール画像の処理
        if ($request->hasFile('profile_image')) {
            // 古い画像を削除
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            // 新しい画像を保存
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // ユーザー情報を更新
        $user->name = $request->name;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->save();

        return redirect()->route('items.index');
    }

    // 住所変更画面表示
    public function editAddress($item_id)
    {
        $item = \App\Models\Item::findOrFail($item_id);
        $user = Auth::user();
        
        // セッションに保存された住所があればそれを、なければユーザーのデフォルト住所を使用
        $address = session('purchase_address', [
            'postal_code' => $user->postal_code,
            'address' => $user->address,
            'building' => $user->building
        ]);
        
        return view('address-edit', compact('item', 'address'));
    }

    // 住所更新処理
    public function updateAddress(\App\Http\Requests\AddressRequest $request, $item_id)
    {
        // セッションに住所を保存
        session([
            'purchase_address' => [
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'building' => $request->building
            ]
        ]);
        
        return redirect()->route('items.purchase', $item_id);
    }
}
