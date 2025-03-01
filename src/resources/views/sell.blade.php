@extends('layouts.app')

@section('title', '商品の出品')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
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
<form action="/sell" method="POST">
    @csrf
    <div class="sell-form">商品の出品</div>
    <div class="sell-form__content">
        <div class="sell-form__heading">商品画像</div>
        <div class="product-image">
            <label for="product_image">
                <img class="product-image__preview" src="/storage/default-product.png" alt="商品画像のプレビュー">
            </label>
            <input type="file" id="product_image" name="product_image" class="product-image__input" accept="image/*" />
            <div class="product-image__button">画像を選択する</div>
        </div>
    </div>
    <div class="product-upload-container">
        <div class="form-group">
            <h2>商品の詳細</h2>
            <label for="product-categories">カテゴリー</label>
            <div class="categories" id="category-buttons">
                @foreach(['アパレル', '家具', 'レディース', 'メンズ', 'コスメ', '本', 'ゲーム', 'スポーツ', 'キッチン', 'ハンドメイド', 'アクセサリー', 'おもちゃ', 'ベビー・キッズ'] as $category)
                    <button type="button" class="category-button" data-value="{{ $category }}">{{ $category }}</button>
                @endforeach
            </div>
            <input type="hidden" name="category" id="selected-categories">
        </div>
        <div class="form-group">
            <label for="product-condition">商品の状態</label>
            <select name="product-condition">
                <option value="1">良好</option>
                <option value="2">目立った汚れなし</option>
                <option value="3">やや傷や汚れあり</option>
                <option value="4">状態が悪い</option>
            </select>
        </div>
        <div class="form-group">
            <h2>商品名と説明</h2>
            <label for="product-name">商品名</label>
            <input type="text" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="product-description">商品の説明</label>
            <textarea name="product_description"></textarea>
        </div>
        <div class="form-group">
            <label for="product-price">販売価格</label>
            <input type="number" name="product_price" required>
        </div>
        <button type="submit" class="submit-btn">出品する</button>
    </div>
</form>
@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const productImageInput = document.getElementById('product_image');
            const productImagePreview = document.querySelector('.product-image__preview');
            const productImageButton = document.querySelector('.product-image__button');
            productImageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        productImagePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
            productImageButton.addEventListener('click', function() {
                productImageInput.click();
            });

            // カテゴリ選択ボタンの処理
            const categoryButtons = document.querySelectorAll('.category-button');
            const selectedCategoriesInput = document.getElementById('selected-categories');
            let selectedCategories = [];

            categoryButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const value = this.getAttribute('data-value');
                    if (selectedCategories.includes(value)) {
                        selectedCategories = selectedCategories.filter(cat => cat !== value);
                        this.classList.remove('selected');
                    } else {
                        selectedCategories.push(value);
                        this.classList.add('selected');
                    }
                    selectedCategoriesInput.value = selectedCategories.join(',');
                });
            });
        });
    </script>
@endsection
