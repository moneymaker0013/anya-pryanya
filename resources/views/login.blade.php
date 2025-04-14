@extends('layout')

@section('title')
Авторизация
@endsection

@section('content')
<div class="container">
    <h2 class="text-center">Авторизация</h2>
    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif
            <form id="registerForm" class="postcard"  method="POST">
                @csrf
                <div class="form-row">
                <label for="surname">Логин*:</label>
                <input type="text" id="login" name="login" required minlength="6">
                </div>
                <div class="form-row">
                <label for="password">Пароль*:</label>
                <input type="password" id="password" name="password" required minlength="6">
                </div>
                <button type="submit" class="btn btn-primary">Авторизоваться</button>
            </form>
</div>
@endsection