<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate - Contact</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
<header class="site-header">
  <h1 class="site-title">FashionablyLate</h1>
</header>

<main>
  <div class="container">
    <h2>Contact</h2>
    @if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
    <form action="/" method="post">
      @csrf
      <div class="form-group">
        <label>お名前 <span class="required">※</span></label>
        <div class="name-fields">
          <input type="text" name="last_name" placeholder="例: 山田" value="{{old('last_name', $form['last_name'] ?? '')}}" />
            <div class="form__error">
              @error('last_name')
              {{ $message }}
              @enderror
            </div>
          <input type="text" name="first_name" placeholder="例: 太郎" value="{{old('first_name', $form['first_name'] ?? '')}}"/>
            <div class="form__error">
              @error('first_name')
              {{ $message }}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group">
        <label>性別 <span class="required">※</span></label>
        <div class="gender-group">
          <label><input type="radio" name="gender" value="1" checked {{ old('gender', $form['gender'] ?? '') == 1 ? 'checked' : '' }}> 男性</label>
          <label><input type="radio" name="gender" value="2" {{ old('gender', $form['gender'] ?? '') == 2 ? 'checked' : '' }}> 女性</label>
          <label><input type="radio" name="gender" value="3" {{ old('gender', $form['gender'] ?? '') == 3 ? 'checked' : '' }}> その他</label>
        </div>
      </div>

      <div class="form-group">
        <label>メールアドレス <span class="required">※</span></label>
        <input type="email" name="email" placeholder="例: test@example.com" value="{{old('email', $form['email'] ?? '')}}">
          <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
      </div>

      <div class="form-group">
        <label>電話番号<span class="required">※</span></label>
        <div class="phone-fields">
          <input type="text" name="tel1" maxlength="4" placeholder="080" value="{{ old('tel1', $form['tel1'] ?? '') }}">
          <input type="text" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2', $form['tel2'] ?? '') }}">
          <input type="text" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3', $form['tel3'] ?? '') }}">
            <div class="form__error">
              @error('tel')
              {{ $message }}
              @enderror
            </div>
        </div>
      </div>

      <div class="form-group">
        <label>住所 <span class="required">※</span></label>
        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address', $form['address'] ?? '')}}"/>
          <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
          </div>
      </div>

      <div class="form-group">
        <label>建物名</label>
        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{old('building', $form['building'] ?? '')}}"/>
      </div>

      <div class="form-group">
        <label>お問い合わせの種類 <span class="required">※</span></label>
        <select name="category_id" >
          <option value="">選択してください</option>
          @foreach($categories as $category)
            <option value="{{$category['id']}}" {{ old('category_id', $form['category_id'] ?? '') == $category['id'] ? 'selected' : '' }}>{{$category['content']}}</option>
          @endforeach
        </select>
          <div class="form__error">
              @error('content')
              {{ $message }}
              @enderror
          </div>
      </div>

      <div class="form-group">
        <label>お問い合わせ内容 <span class="required">※</span></label>
        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{old('detail', $form['detail'] ?? '')}}</textarea>
          <div class="form__error">
              @error('detail')
              {{ $message }}
              @enderror
          </div>
      </div>

      <div class="form-group">
        <button type="submit" class="confirm-button">確認画面</button>
      </div>
    </form>
  </div>
</main>
</body>
</html>
