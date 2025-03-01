@extends('layouts.app')

@section('title', '管理一覧')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
    <!-- 切り替えボタン -->
    <div class="buttons">
        <button id="recomend_button" class="active">おすすめ</button>
        <button id="mylist_button">マイリスト</button>
    </div>

    <div class="border"></div>

    <!-- 切り替え画面 -->
    <div id="recomend_screen" class="screen active">
        <div class="product-list">
        @foreach ($products as $product)
            <div class="product-item">
                <a href="{{ route('products.item', $product->id) }}">
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="width: 300px; height: auto;">
                </a>
                <p>{{ $product->name }}</p>
                <!-- マイリストに追加ボタン -->
                <form method="POST" action="{{ route('favorites.store') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="favorite-button" data-product-id="{{ $product->id }}">マイリストに追加</button>

                </form>
                <!-- マイリストから削除ボタン -->
                <form method="POST" action="{{ route('favorites.destroy', $product->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="unfavorite-button" data-product-id="{{ $product->id }}">マイリストから削除</button>
                </form>
            </div>
        @endforeach
        </div>

        <!-- ページネーションリンク -->
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>

    <div id="mylist_screen" class="screen">
        <div class="product-list">
        @foreach ($mylist as $product)
            <div class="product-item">
                <a href="{{ route('products.item', $product->id) }}">
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="width: 300px; height: auto;">
                </a>
                <p>{{ $product->name }}</p>
            </div>
                <form method="POST" action="{{ route('favorites.store', $product->id) }}">
                @csrf
                <button type="submit">マイリストに追加</button>
                </form>
                <form method="POST" action="{{ route('favorites.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">マイリストから削除</button>
                </form>
        </div>
        @endforeach
        <!-- ページネーション -->
        <div class="pagination">
            {{ $mylist->links() }}
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        const recomendButton = document.getElementById('recomend_button');
        const mylistButton = document.getElementById('mylist_button');
        const recomendScreen = document.getElementById('recomend_screen');
        const mylistScreen = document.getElementById('mylist_screen');

        recomendButton.addEventListener('click', () => {
            recomendButton.classList.add('active');
            mylistButton.classList.remove('active');
            recomendScreen.classList.add('active');
            mylistScreen.classList.remove('active');
        });

        mylistButton.addEventListener('click', () => {
            mylistButton.classList.add('active');
            recomendButton.classList.remove('active');
            mylistScreen.classList.add('active');
            recomendScreen.classList.remove('active');
        });
    </script>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // お気に入り追加
            $(".favorite-button").click(function(e) {
                e.preventDefault();
                let button = $(this);
                let productId = button.data("product-id");

                $.ajax({
                    url: "{{ route('favorites.store') }}",
                    method: "POST",
                    data: {
                        product_id: productId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        updateMyList();
                    },
                    error: function() {
                        alert("エラーが発生しました。");
                    }
                });
            });

            // お気に入り削除
            $(".unfavorite-button").click(function(e) {
                e.preventDefault();
                let button = $(this);
                let productId = button.data("product-id");

                $.ajax({
                    url: "/favorites/" + productId,
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function(response) {
                        alert(response.message);
                        updateMyList();
                    },
                    error: function() {
                        alert("エラーが発生しました。");
                    }
                });
            });

            // マイリストを更新
            function updateMyList() {
                $.get("{{ route('products.item', ['id' => Auth::id()]) }}", function(data) {
                    $("#mylist_screen .product-list").html($(data).find("#mylist_screen .product-list").html());
                });
            }
        });
    </script>
@endsection

