<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // 商品一覧画面表示
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'all'); // デフォルトは全商品
        $search = $request->query('search', ''); // 検索キーワード
        
        if ($tab === 'mylist') {
            // マイリスト（いいねした商品）
            if (Auth::check()) {
                $query = Auth::user()->favoriteItems()->with('purchase');
                
                // 検索キーワードがあれば絞り込み
                if ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                }
                
                $items = $query->get();
            } else {
                $items = collect(); // 未認証の場合は空のコレクション
            }
        } else {
            // 全商品（自分が出品した商品は除外）
            if (Auth::check()) {
                $query = Item::where('user_id', '!=', Auth::id())->with('purchase');
            } else {
                // 未認証の場合は全商品を表示
                $query = Item::with('purchase');
            }
            
            // 検索キーワードがあれば絞り込み
            if ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            }
            
            $items = $query->get();
        }
        
        return view('item-list', compact('items', 'tab', 'search'));
    }

    // 商品詳細画面表示
    public function show($id)
    {
        $item = Item::with(['categories', 'condition', 'user', 'comments.user', 'favorites', 'purchase'])
            ->findOrFail($id);
        
        // いいね数とコメント数を取得
        $favoriteCount = $item->favorites()->count();
        $commentCount = $item->comments()->count();
        
        // ログインユーザーがいいねしているかチェック
        $isFavorited = false;
        if (Auth::check()) {
            $isFavorited = $item->favorites()->where('user_id', Auth::id())->exists();
        }
        
        return view('item-detail', compact('item', 'favoriteCount', 'commentCount', 'isFavorited'));
    }

    // いいね機能
    public function toggleFavorite(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();
        
        // 既にいいねしているかチェック
        $favorite = $item->favorites()->where('user_id', $user->id)->first();
        
        if ($favorite) {
            // いいね済みなら削除
            $favorite->delete();
            $isFavorited = false;
        } else {
            // いいねしていなければ追加
            $item->favorites()->create(['user_id' => $user->id]);
            $isFavorited = true;
        }
        
        $favoriteCount = $item->favorites()->count();
        
        return response()->json([
            'favoriteCount' => $favoriteCount,
            'isFavorited' => $isFavorited
        ]);
    }

    // コメント投稿
    public function storeComment(\App\Http\Requests\CommentRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        
        $item->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);
        
        return redirect()->route('items.show', $id)->with('success', 'コメントを投稿しました');
    }

    // 商品購入画面表示
    public function purchase($id)
    {
        $item = Item::with(['categories', 'condition', 'user'])->findOrFail($id);
        $user = Auth::user();
        
        // セッションに保存された住所を取得、なければユーザーのデフォルト住所を使用
        $address = session('purchase_address', [
            'postal_code' => $user->postal_code,
            'address' => $user->address,
            'building' => $user->building
        ]);
        
        return view('purchase', compact('item', 'address'));
    }

    // 商品購入処理
    public function storePurchase(\App\Http\Requests\PurchaseRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        
        // 既に売却済みの場合はエラー
        if ($item->purchase) {
            return redirect()->route('items.show', $id)->with('error', 'この商品は既に売却済みです');
        }
        
        // セッションから住所を取得、なければリクエストから取得
        $address = session('purchase_address', [
            'postal_code' => Auth::user()->postal_code,
            'address' => Auth::user()->address,
            'building' => Auth::user()->building
        ]);
        
        // 購入履歴を作成
        $item->purchase()->create([
            'buyer_id' => Auth::id(),
            'payment_method' => $request->payment_method,
            'postal_code' => $address['postal_code'],
            'address' => $address['address'],
            'building' => $address['building']
        ]);
        
        // セッションをクリア
        session()->forget('purchase_address');
        
        return redirect()->route('items.index')->with('success', '商品を購入しました');
    }

    // 商品出品画面表示
    public function create()
    {
        $categories = \App\Models\Category::all();
        $conditions = \App\Models\Condition::all();
        return view('sell', compact('categories', 'conditions'));
    }

    // 商品出品処理
    public function store(\App\Http\Requests\ItemRequest $request)
    {
        // 商品画像を保存
        $imagePath = $request->file('image')->store('item_images', 'public');
        
        // 商品を作成
        $item = Item::create([
            'user_id' => Auth::id(),
            'condition_id' => $request->condition_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);
        
        // カテゴリを紐付け（多対多リレーション）
        $item->categories()->attach($request->categories);
        
        return redirect()->route('items.index')->with('success', '商品を出品しました');
    }
}
