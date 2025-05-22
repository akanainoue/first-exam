@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
<div class="header">
    <h1>FashionablyLate</h1>
    <a class="login-link" href="/login">login</a>
</div>
@endsection

@section('content')
<h2 class="register-title">Register</h2>

<div class="container">
    <div class="register-box">
        <form action="/register" method="post">
            @csrf
            <label for="name">お名前</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田 太郎" />
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>

            <label for="email">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com"/>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>

            <label for="password">パスワード</label>
            <input type="password" name="password" placeholder="例: coachtech1106" />
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>

            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection
