<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 商品一覧画面表示
    public function index()
    {
        return view('item-list');
    }

    // 商品詳細画面表示
    public function show($id)
    {
        return view('item-detail');
    }

    // 商品購入画面表示
    public function purchase($id)
    {
        return view('purchase');
    }

    // 商品出品画面表示
    public function create()
    {
        return view('sell');
    }
}
