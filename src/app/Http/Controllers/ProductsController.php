<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProductsController extends Controller
{

        public function index()
        {
            $products = Product::paginate(4); // おすすめ商品の取得
            $user = Auth::user();
            $mylist = $user ? $user->favorites()->paginate(4) : collect(); // マイリストを取得（ログインしていない場合は空のコレクション）

        return view('index', compact('products', 'mylist'));
        }

        public function item($id)
        {
        // 該当する商品の取得 (IDで検索)
            $product = Product::findOrFail($id);

        // 詳細ページのビューを返す
        return view('item', compact('product'));
        }

        public function comment(Request $request, Product $product)
        {
            $request->validate([
                'content' => 'required|max:255',
            ]);

            $comment = new Comment();
            $comment->user_id = auth()->id();
            $comment->product_id = $product->id;
            $comment->content = $request->content;
            $comment->save();

            return response()->json([
                'success' => true,
                'user' => auth()->user()->name,
                'content' => $comment->content,
                'comment_count' => $product->comments()->count(),
            ]);
        }
        public function purchase($id)
        {
            $product = Product::findOrFail($id);
            return view('purchase', compact('product'));
        }
        public function changeAddress()
        {
            return view('change_address'); // 住所変更用のビューを返す
        }
        public function updateAddress(Request $request)
        {
            $request->validate([
            'new_address' => 'required|string|max:255',
            ]);
            $user = Auth::user();
            $user->address = $request->new_address;
            $user->save();
            return redirect()->route('purchase')->with('success', '住所が更新されました！');
        }

}
