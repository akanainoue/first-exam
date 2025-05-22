@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header')
<div class="header">
    <h1 class=site-title>FashionablyLate</h1>
    <a class="register-link" href="/register">register</a>
</div>
@endsection

@section('content')
<div class="login-main">
    <h2 class="form-title">Login</h2>
    <div class="login-form-container">
        <form class="login-form" action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" />
                <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech1106" />
                <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
                </div>
            </div>
            <button type="submit" class="submit-button">ログイン</button>
        </form>
    </div>
</div>
@endsection
