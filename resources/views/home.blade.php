@extends('components.layout')

@section('content')
    @auth()
        <a href="{{ route('create') }}" class="btn btn-success mb-5 mx-auto w-100">Создать <b>&plus;</b></a>
    @endauth

    <div class="row">
        @if (count($schedules) > 0)
            @foreach ($schedules as $s)
                <div class="col mt-3">
                    <div class="card" style="width: 18rem;">
                        <a href="{{ asset("storage/$s->path") }}">
                            <img src={{ asset("storage/$s->path") }} class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h2>{{ $s->day }}</h2>
                            <h4>{{ $s->shift }} смена</h4>
                        </div>

                        @auth
                            <div class="card-footer">
                                <a href="{{ route('edit', ['id' => $s->id]) }}" class="btn btn-info">Обновить</b></a>
                                <a href="{{ route('delete', ['id' => $s->id]) }}" class="btn btn-danger">Удалить</b></a>
                            </div>
                        @endauth
                    </div>
                </div>
            @endforeach

            @else
            <h1>Расписание еще не добавили</h1>
            <hr>
            <h3>Можешь отдыхать...</h3>
        @endif
    </div>
@endsection
