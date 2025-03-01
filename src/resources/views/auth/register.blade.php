<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>会員登録</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
  <header class="header">
    <img class="header_logo" src="/storage/logo.svg" alt="coachtechのロゴ">
  </header>

  <form class="form-container" action="/register" method="POST">
    @csrf
      <main>
        <div class="register-form__content">
          <div class="register-form__heading">会員登録</div>

          <!-- 名前入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="name" class="form__label--item">ユーザー名</label>
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

          <!-- メールアドレス入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="email" class="form__label--item">メールアドレス</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" required />
              </div>
              <div class="form__error">
                @error('email') <span>{{ $message }}</span> @enderror
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

          <!-- 確認パスワード入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="password" class="form__label--item">確認用パスワード</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="password" name="password_confirmation" placeholder="パスワードを入力 (8文字以上)" required />
              </div>
              <div class="form__error">
                @error('password') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- 次に進むボタン -->
          <form action="/edit">
            @csrf
            <button class="form__button-submit" name="" type="submit">登録する</button>
          </form>
      </main>
    </form>

    <!-- ログインリンク -->
    <div class="login-form">
    <form action="/login">
      @csrf
      <a href="/login" class="login-form">ログインはこちら</a>
    </form>
    </div>
</body>

</html>