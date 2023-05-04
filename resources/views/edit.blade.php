@extends('components.layout')

@section('content')
    <h1 class="mb-5">Обновить</h1>
    <form enctype="multipart/form-data" method="post" action="{{ route('update', ['id' => $schedule->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="shift" class="form-label">Смена</label>
            <input name="shift" type="text" class="form-control" id="shift" value="{{ $schedule->shift }}">
        </div>
        <div class="mb-3">
            <label for="day" class="form-label">День</label>
            <input name="day" type="text" class="form-control" id="day" value="{{ $schedule->day }}">
        </div>
        <img height="250" src={{ asset("storage/$schedule->path") }} alt="">
        <div class="mb-3">
            <label for="file" class="form-label">Фото</label>
            <input name="file" type="file" class="form-control" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection
