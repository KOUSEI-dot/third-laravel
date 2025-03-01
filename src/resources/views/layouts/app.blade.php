<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'デフォルトタイトル')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('styles')  {{-- ページごとの追加CSSを挿入 --}}
</head>
<body>
    <header class="header">
        <div class="header__container">
            <img class="header__logo" src="/storage/logo.svg" alt="coachtechのロゴ">
            <input type="text" class="header__search-bar" placeholder="何をお探しですか？" />
            <form class="header__buttons" action="/logout" method="POST">
                @csrf
                <button class="header_button_logout" type="submit">ログアウト</button>
            </form>
            <form class="header_button_mypage" action="/mypage" method="POST">
                @csrf
                <button class="header_button_mypage" type="submit">マイページ</button>
            </form>
            <form class="header_button_listing" action="/sell" method="POST">
                @csrf
                <button class="header_button_listing" type="submit">出品</button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')  {{-- 各ページのコンテンツがここに挿入される --}}
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')  {{-- ページごとの追加JavaScriptを挿入 --}}
</body>
</html>
