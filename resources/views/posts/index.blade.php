@extends('main')

@section('title', ' | Homepage')

@section('content')

    @if($flash = session('message'))

        <div id="flash-message" class="alert alert-success" role="alert">
            {{ $flash }}
        </div>

    @endif

    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-12 col-md-9">
            <div class="jumbotron">
                <h1>Hello, world!</h1>
                <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
            </div>

            <hr>

            @foreach($posts as $post)

            <div class="row">
                <div class="col-6 col-lg-8">
                    <h2>{{ $post->name }}</h2>
                    <p>{{ substr(strip_tags($post->body), 0 ,250) }}{{ strlen(strip_tags($post->body)) > 50 ? '...' : '' }}</p>
                    <p><a class="btn btn-primary" href="/posts/{{ $post->id }}" role="button">More &raquo;</a> <a class="btn btn-secondary" href="/posts/{{ $post->id }}/edit" role="button">Edit &raquo;</a></p>
                </div>

                <div class="col-6 col-lg-4">
                    <img src="{{ asset('images/' . $post->image) }}" class="rounded float-right" alt="..." width="140" height="140">
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            @endforeach

        </div><!--/span-->
    </div><!--/row-->

@endsection