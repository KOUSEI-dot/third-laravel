<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    public function store(Request $request)
    {
        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->category = $request->input('category');
        $product->condition = $request->input('product-condition');
        $product->price = $request->input('product_price');

        // 商品画像のアップロード処理
        if ($request->hasFile('product_image')) {
            $path = $request->file('product_image')->store('products', 'public');
            $product->image_path = $path;
        }

        $product = Product::create([
        'name' => $request->product_name,
        'description' => $request->product_description,
        'price' => $request->product_price,
        ]);

        $categoryIds = Category::whereIn('name', explode(',', $request->category))->pluck('id');
        $product->categories()->attach($categoryIds);

    }
}

