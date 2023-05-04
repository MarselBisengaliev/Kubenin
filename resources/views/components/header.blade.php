<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Расписание</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('create') }}">Создать</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('signout') }}">Выйти</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Логин</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Регистрация</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
