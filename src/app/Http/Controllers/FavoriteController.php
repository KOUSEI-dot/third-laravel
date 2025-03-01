<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{

    public function store(Request $request)
    {
        $user = auth()->user();
        $product = Product::findOrFail($request->product_id);

        if (!$user->hasFavorited($product)) {
            $user->favorites()->attach($product->id);
        }

        if ($request->ajax()) {
            return response()->json([
                'message' => 'お気に入りに追加しました',
                'product' => $product
            ]);
        }

        return back();
    }

    public function destroy(Product $product, Request $request)
    {
        $user = auth()->user();

        if ($user->hasFavorited($product)) {
            $user->favorites()->detach($product->id);
        }

        if ($request->ajax()) {
            return response()->json([
                'message' => 'お気に入りから削除しました',
                'product' => $product
            ]);
        }

        return back();
    }

    public function favorite(Product $product)
    {
        $user = Auth::user();
        if ($user->hasFavorited($product)) {
        $user->favorites()->detach($product->id);
        return response()->json(['message' => 'お気に入り解除しました']);
        } else {
        $user->favorites()->attach($product->id);
        return response()->json(['message' => 'お気に入りに追加しました']);
    }
        return back();
    }

}
