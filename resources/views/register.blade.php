@extends('layout')

@section('title')
Регистрация
@endsection


@section('content')
<div class="container">
    <h2 class="text-center">Регистрация</h2>
    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif
       
        <form id="registerForm" class="postcard" method="POST"> 
            @csrf
                <div class="form-row">
                <label for="name">ФИО*:</label>
                <input type="text" id="name" name="name" required>
                <span class="error" id="nameError"></span>
                </div>
                <div class="form-row">
                <label for="tel">Номер телефона*</label>
                <input type="tel" id="tel" name="tel" required >
                <span class="error" id="telError"></span>
                </div>
                <div class="form-row">
                <label for="email">Email*:</label>
                <input type="email" id="email" name="email" required>
                <span class="error" id="emailError"></span>
                </div>
                <div class="form-row">
                <label for="surname">Логин*:</label>
                <input type="text" id="login" name="login" required minlength="6">
                <span class="error" id="loginError"></span>
                </div>
                <div class="form-row">
                <label for="password">Пароль*:</label>
                <input type="password" id="password" name="password" required minlength="6">
                <span class="error" id="passwordError"></span>
                </div>
                <div class="form-row">
                <label for="password_confirmation">Повторите пароль*:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required minlength="6">
                <span class="error" id="passwordRepeatError"></span>
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>

                <p>Уже есть аккаунт? <a href="/login">Войти</a></p>

    </form>
    
</div>
@endsection