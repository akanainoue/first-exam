<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
<header>
    <div class="site-header">
        <h1 class="site-title">FashionablyLate</h1>
        @if (Auth::check())
        <form class="form" action="/logout" method="post">
            @csrf
            <button class="logout-link">logout</button>
        </form>
        @endif
    </div>
</header>

<main>
    <h2>Admin</h2>
<div class="search-form">
    <form class="search-form__submit" action="/contacts/search" method="get">
        <div class="filters">
            <input class=search-form__item-input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
            <select class=search-form__item-select name="gender">
                <option value="">性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>

            </select>
            <select class=search-form__item-select" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{$category['id']}}">{{$category['content']}}</option>
                @endforeach
            </select>
            <label for="date">年/月/日</label>
            <input class="search-form__item-select" type="date" name="created_at">
            <button class="search-form__button" type="submit">検索</button>
            <button class="search-form__button" type="reset">リセット</button>
        </div>
    </form>

    <button class="export">エクスポート</button>

    <table>
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->getFullname()}}</td>
                <td>{{$contact->gender}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->category->content}}</td>
                <td>
                    <!-- 詳細ボタン（data-idで識別） -->
                    <button class="detail" data-id="{{ $contact->id }}">詳細</button>
                </td>
            </tr>

                    <!-- モーダル -->
                <div class="modal" id="modal-{{ $contact->id }}">
                    <div class="modal-content">
                        <span class="close" data-id="{{ $contact->id }}">&times;</span>
                        <p><strong>お名前：</strong>{{ $contact->getFullname() }}</p>
                        <p><strong>性別：</strong>{{ $contact->gender }}</p>
                        <p><strong>メールアドレス：</strong>{{ $contact->email }}</p>
                        <p><strong>電話番号：</strong>{{ $contact->tel }}</p>
                        <p><strong>住所：</strong>{{ $contact->address }}</p>
                        <p><strong>建物名：</strong>{{ $contact->building }}</p>
                        <p><strong>お問い合わせの種類：</strong>{{ $contact->category->content }}</p>
                        <p><strong>お問い合わせ内容：</strong>{{ $contact->detail }}</p>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
    {{$contacts->links()}}
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const detailButtons = document.querySelectorAll('.detail');
    const closeButtons = document.querySelectorAll('.close');

    detailButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('modal-' + id).style.display = 'block';
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('modal-' + id).style.display = 'none';
        });
    });

    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) {
            e.target.style.display = 'none';
        }
    });
});
</script>

</main>
</body>
</html>