@extends('layouts.app')

@section('title', '購入確認')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
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
      <div class="purchase-container">
        <div class="purchase-left">
            <!-- ① 商品画像 + 商品情報 -->
            <div class="product-area">
                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="product-image">
                <div class="product-info">
                    <p class="product-name">{{ $product->name }}</p>
                    <p class="product-price">価格: {{ number_format($product->price) }}円（税込）</p>
                </div>
            </div>

            <div class="separator"></div> <!-- 画像の下の灰色の境界線 -->

            <!-- ② 支払い方法 -->
            <div class="payment-method">
                <label for="payment_method">支払い方法:</label>
                <select id="payment_method" name="payment_method" onchange="updatePaymentMethod()">
                    <option value="クレジットカード">クレジットカード</option>
                    <option value="コンビニ払い">コンビニ払い</option>
                    <option value="銀行振込">銀行振込</option>
                </select>
            </div>

            <div class="separator"></div> <!-- 支払い方法の下の灰色の境界線 -->

            <!-- ③ 配送先 + 変更ボタン -->
            <div class="address-area">
                <p class="delivery-address">配送先: {{ Auth::user()->address }}</p>
                <a href="{{ route('change_address') }}" class="change-address-button">変更する</a>
            </div>

            <div class="separator"></div> <!-- 配送先の下の灰色の境界線 -->
        </div>

        <!-- ⑤ 購入確定エリア（枠線を独立させる） -->
        <div class="purchase-right-container">
            <div class="purchase-right">
                <p>商品代: ￥{{ number_format($product->price) }}</p>
                <div class="separator"></div> <!-- 商品代と支払い方法の間に枠線 -->
                <p>支払い方法: <span id="selected_payment_method">クレジットカード</span></p>
            </div>
            <form action="/complete_purchase" method="POST">
                @csrf
                <button type="submit" class="confirm-button">購入を確定する</button>
            </form>
        </div>
    </div>

    <script>
        function updatePaymentMethod() {
            let selectedMethod = document.getElementById('payment_method').value;
            document.getElementById('selected_payment_method').innerText = selectedMethod;
        }
    </script>
@endsection