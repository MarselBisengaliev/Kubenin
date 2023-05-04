<div class="container">
    @if (count($errors))
        <div class="alert alert-danger mt-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('failure'))
        <div class="alert alert-danger mt-5" role="alert">
            <p>{{ session('failure') }}</p>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

</div>
