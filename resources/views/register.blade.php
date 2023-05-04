@extends('components.layout')

@section('content')
    <h1 class="mb-5">Регистрация</h1>
    <form enctype="multipart/form-data" method="post" action="{{ route('signup') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
    </form>
@endsection
