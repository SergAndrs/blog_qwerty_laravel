@extends('main')

@section('title', ' | View Post')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <h2>{{ $post->name }}</h2>
            {{-- display body after WYSIWYG --}}
            <p>{!! $post->body !!}</p>
            <h6>{{ $post->author }} at {{ $post->created_at->toFormattedDateString() }}</h6>
            <form method="POST" action="/posts/destroy/{{ $post->id }}">

                {{ csrf_field() }}

                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>

        <div class="col-lg-4">
            <img src="{{ asset('images/' . $post->image) }}" class="rounded float-right" alt="..." width="340" height="340">
        </div><!--/span-->
    </div><!--/row-->

@endsection