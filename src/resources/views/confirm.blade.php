<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - Confirm</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/confirm.css">
</head>
<body>
<header class="site-header">
    <h1 class="site-title">FashionablyLate</h1>
</header>

<main class="confirm-container">
    <h2>Confirm</h2>
<form class="confirm-submit" action="/contacts" method="post">
    @csrf
    <table class="confirm-table">
        <tr>
            <th>お名前</th>
            <td>
                <input type="text" name="last_name" value="{{$form['last_name']}}" readonly/>
                <input type="text" name="first_name" value="{{$form['first_name']}}" readonly/>
            </td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                <input type="text" name="gender" value="{{$form['gender']}}" readonly/>
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                <input type="email" name="email" value="{{$form['email']}}" readonly/>
            </td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>
                <input type="tel" name="tel" value="{{$form['tel']}}" readonly/>
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                <input type="text" name="address" value="{{$form['address']}}" readonly/>
            </td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>
                <input type="text" name="building" value="{{$form['building']}}" readonly/>
            </td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>
                <input type="hidden" name="category_id" value="{{ $form['category_id'] }}">
                <input type="text" value="{{ $form['category']->content }}" readonly>
            </td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>
                <textarea name="detail" readonly>{{ $form['detail'] }}</textarea>
            </td>
        </tr>
    </table>
    <div class="confirm-buttons__submit">
        <button class="submit-button">送信</button>
    </div>
</form>
<form class="confirm-back" action="/contacts/edit" method="get">
    <div class="confirm-buttons__back">
        <button class="back-button">修正</button>
    </div>
</form>
</main>

</body>
</html>
