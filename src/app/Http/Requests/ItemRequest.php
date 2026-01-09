<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'condition_id' => 'required|exists:conditions,id',
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer|min:1|max:9999999'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '商品画像を選択してください',
            'image.image' => '商品画像は画像ファイルである必要があります',
            'image.mimes' => '商品画像はjpeg、png、jpg、gif形式である必要があります',
            'image.max' => '商品画像のサイズは2MB以下である必要があります',
            'categories.required' => 'カテゴリを選択してください',
            'categories.min' => 'カテゴリを少なくとも1つ選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'name.required' => '商品名を入力してください',
            'name.max' => '商品名は255文字以内で入力してください',
            'brand.max' => 'ブランド名は255文字以内で入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明は1000文字以内で入力してください',
            'price.required' => '販売価格を入力してください',
            'price.integer' => '販売価格は整数で入力してください',
            'price.min' => '販売価格は1円以上で入力してください',
            'price.max' => '販売価格は9999999円以下で入力してください'
        ];
    }
}
