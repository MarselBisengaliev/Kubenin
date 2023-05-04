@extends('components.layout')

@section('content')
    <h1 class="mb-5">Создать</h1>
    <form enctype="multipart/form-data" method="post" action="{{ route('store') }}">
        @csrf
        <div class="mb-3">
            <label for="shift" class="form-label">Смена</label>
            <input type="text" class="form-control" name="shift" id="shift">
        </div>
        <div class="mb-3">
            <label for="day" class="form-label">День</label>
            <input type="text" class="form-control" name="day" id="day">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Фото</label>
            <input type="file" class="form-control" name="file" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
