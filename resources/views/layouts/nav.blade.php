<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    {{--<a class="navbar-brand" href="/">Home</a>--}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>

            @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                </li>
            @endif

        </ul>

        <ul class="navbar-nav ml-auto">

            @if (auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.destroy') }}">{{ auth()->user()->name }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.create') }}">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register.create') }}">Registration</a>
                </li>
            @endif

        </ul>

    </div>
</nav>