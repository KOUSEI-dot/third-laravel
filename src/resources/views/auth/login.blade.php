<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ログイン</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>
  <header class="header">
    <img class="header_logo" src="/storage/logo.svg" alt="coachtechのロゴ">
  </header>
  <form class="form" action="/login" method="post">
  @csrf
      <main>
        <div class="register-form__content">
          <div class="register-form__heading">ログイン</div>

          <!-- 名前入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="name" class="form__label--item">ユーザー名/メールアドレス</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input  type="text" name="name" placeholder="名前を入力" value="{{ old('name') }}" required />
              </div>
              <div class="form__error">
                @error('name') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- パスワード入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="password" class="form__label--item">パスワード</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="password" name="password" placeholder="パスワードを入力 (8文字以上)" required />
              </div>
              <div class="form__error">
                @error('password') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- 次に進むボタン -->
          <form action="/index" method="post">
            @csrf
            <button class="form__button-submit" type="submit">ログインする</button>
          </form>
        </div>
      </main>
    </form>

    <!-- 会員登録リンク -->
    <div class="register-form">
    <form action="/register" method="post">
      @csrf
      <a href="/register">会員登録はこちら</a>
    </form>
    </div>
</body>

</html>
