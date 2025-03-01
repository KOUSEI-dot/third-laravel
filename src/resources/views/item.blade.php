@extends('layouts.app')

@section('title', $product->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
    <style>
        body {
            background-color: #fff;
        }
        .header {
            margin-bottom: 120px;
            background-color: black;
            padding: 10px 20px;
        }
        .header__container {
            display: flex;
            align-items: center;
            height: 60px;
        }
        .header__logo {
            width: 300px;
            height: 120px;
        }
        .header__search-bar {
            flex-grow: 1;
            max-width: 40vw;
            margin-right: 200px;
            margin-left: 250px;
            height: 30px;
            font-size: 14px;
            padding: 5px 10px;
            text-align: center;
        }
        .header__buttons {
            display: flex;
            gap: 10px;
        }
        .header__buttons button {
            padding: 8px 15px;
            font-size: 14px;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .header_button_logout {
            margin-left: 200px;
            margin-right: 15px;
        }
        .header_button_mypage {
            margin-right: 15px;
        }
        .header_button_listing {
            margin-right: 15px;
        }
        .header__buttons button:hover {
            background-color: #777;
        }
    </style>
@endsection


@section('content')
    <div class="product-container">
        <img class="product-image" src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">

        <div class="product-info">
            <h2>{{ $product->name }}</h2>
            <p>価格: {{ number_format($product->price) }}円（税込）</p>

            <!-- お気に入りボタン -->
            <form action="{{ route('products.favorite', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="favorite-button">
                    {{ auth()->user()->hasFavorited($product) ? '★' : '☆' }} お気に入り
                </button>
                <span id="favorite-count">{{ $product->favorites_count }}</span>
            </form>

            <form action="{{ route('products.purchase', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="buy-button">購入手続きへ</button>
            </form>

            <h3>商品説明</h3>
            <p>カテゴリー: {{ $product->category }}</p>
            <p>{{ $product->description }}</p>

            <h3>コメント (<span id="comment-count">({{ optional($product->comments)->count() }})</span>)</h3>

            <!-- コメント一覧 -->
            <div class="comments">
                @foreach ($product->comments()->latest()->get() as $comment)
                    <div class="comment">
                        <strong>{{ $comment->user->name }}</strong>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>

            <!-- コメント投稿フォーム -->
            <form action="{{ route('products.comment', $product->id) }}" method="POST" id="comment-form">
                @csrf
                <textarea name="content" placeholder="コメントを入力"></textarea>
                <button type="submit">コメントを送信する</button>
            </form>

            <a href="/products">← 商品一覧に戻る</a>
        </div>
    </div>

    <script>
    document.getElementById('comment-form').addEventListener('submit', function(event) {
        event.preventDefault(); // 通常のフォーム送信を防ぐ
        this.submit(); // フォームを通常送信し、ページをリロード
    });
</script>

@endsection
