<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    // Stripe Checkoutセッション作成
    public function createCheckoutSession(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        
        // 既に売却済みの場合はエラー
        if ($item->purchase) {
            return redirect()->route('items.show', $id)->with('error', 'この商品は既に売却済みです');
        }
        
        // Stripe APIキーを設定
        Stripe::setApiKey(config('services.stripe.secret'));
        
        // セッションに支払い方法と住所を保存
        session([
            'purchase_item_id' => $item->id,
            'purchase_payment_method' => $request->payment_method
        ]);
        
        // 住所情報を取得
        $address = session('purchase_address', [
            'postal_code' => Auth::user()->postal_code,
            'address' => Auth::user()->address,
            'building' => Auth::user()->building
        ]);
        
        session(['purchase_address' => $address]);
        
        try {
            // Stripe Checkoutセッションを作成
            $checkoutSession = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $item->name,
                            'description' => $item->description,
                        ],
                        'unit_amount' => $item->price,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('items.purchase', $item->id),
            ]);
            
            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            return redirect()->route('items.purchase', $item->id)->with('error', '決済処理中にエラーが発生しました: ' . $e->getMessage());
        }
    }
    
    // 決済成功後の処理
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        
        if (!$sessionId) {
            return redirect()->route('items.index')->with('error', '不正なアクセスです');
        }
        
        Stripe::setApiKey(config('services.stripe.secret'));
        
        try {
            // Stripeセッションを取得して決済状況を確認
            $session = Session::retrieve($sessionId);
            
            if ($session->payment_status === 'paid') {
                // セッションから情報を取得
                $itemId = session('purchase_item_id');
                $paymentMethod = session('purchase_payment_method');
                $address = session('purchase_address');
                
                $item = Item::findOrFail($itemId);
                
                // 二重購入防止
                if (!$item->purchase) {
                    // 購入履歴を作成
                    $item->purchase()->create([
                        'buyer_id' => Auth::id(),
                        'payment_method' => $paymentMethod,
                        'postal_code' => $address['postal_code'],
                        'address' => $address['address'],
                        'building' => $address['building'] ?? null,
                    ]);
                }
                
                // セッションをクリア
                session()->forget(['purchase_item_id', 'purchase_payment_method', 'purchase_address']);
                
                return redirect()->route('items.index')->with('success', '商品を購入しました');
            }
            
            return redirect()->route('items.index')->with('error', '決済が完了していません');
        } catch (\Exception $e) {
            return redirect()->route('items.index')->with('error', '決済の確認中にエラーが発生しました');
        }
    }
}
