@extends('components.layout')

@section('content')
    <h1 class="mb-5">Авторизация</h1>
    <form enctype="multipart/form-data" method="post" action="{{ route('signin') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection
