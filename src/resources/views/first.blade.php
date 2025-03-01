@extends('layouts.app')

@section('title', '初回ログイン')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/first.css') }}">
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
  <form class="form-container" action="/register" method="POST" enctype="multipart/form-data">
  @csrf
      <main>
        <div class="register-form__content">
          <div class="register-form__heading">プロフィール設定</div>

          <!-- プロフィール画像 -->
          <div class="profile-image">
            <label for="profile_image">
              <img class="profile-image__preview" src="/storage/default-profile.png" alt="プロフィール画像のプレビュー">
            </label>
            <input id="profile_image" type="file" name="profile_image" class="profile-image__input" accept="image/*" />
            <div class="profile-image__button">画像を選択する</div>
          </div>

          <script>
    const profileImageInput = document.getElementById('profile_image');
    const profileImagePreview = document.querySelector('.profile-image__preview');
    const profileImageButton = document.querySelector('.profile-image__button');

    // 画像を選択したときのプレビュー表示
    profileImageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // ボタンをクリックしてファイル選択をトリガー
    profileImageButton.addEventListener('click', function() {
        profileImageInput.click();
    });

    // TODO: サーバーへのアップロード処理を追加する
    // サーバーへのアップロード処理を追加したい場合は以下のように fetch を利用できます。
    // profileImageInput.addEventListener('change', function() {
    //     const file = profileImageInput.files[0];
    //     const formData = new FormData();
    //     formData.append('profile_image', file);

    //     fetch('/profile/upload', { // Laravelのルートに合わせて変更
    //         method: 'POST',
    //         body: formData,
    //         headers: {
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //         }
    //     }).then(response => response.json())
    //       .then(data => console.log('アップロード成功:', data))
    //       .catch(error => console.error('アップロードエラー:', error));
    // });
</script>


          <!-- 名前入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="name" class="form__label--item">ユーザー名</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="text" name="name" placeholder="名前を入力" value="{{ old('name') }}" required />
              </div>
              <div class="form__error">
                @error('name') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- 郵便番号入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="email" class="form__label--item">郵便番号</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="email" name="email" placeholder="郵便番号を入力" value="{{ old('email') }}" required />
              </div>
              <div class="form__error">
                @error('email') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- 住所を入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="address" class="form__label--item">住所</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="address" name="address" placeholder="住所を入力" required />
              </div>
              <div class="form__error">
                @error('address') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- 建物名入力 -->
          <div class="form__group">
            <div class="form__group-title">
              <label for="building" class="form__label--item">建物名</label>
            </div>
            <div class="form__group-content">
              <div class="form__input--text">
                <input type="building" name="building" placeholder="建物名を入力" required />
              </div>
              <div class="form__error">
                @error('building') <span>{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          <!-- 更新するボタン -->
          <div class="form__button">
            <button class="form__button-submit" type="submit">更新する</button>
          </div>
        </div>
      </main>
    </form>

@endsection