@extends('main')

@section('title', ' | View Post')

@section('content')
    @include('layouts.errors')

    <div class="row">
        <div class="col-lg-8">
            <h2>{{ $post->name }}</h2>
            {{-- display body after WYSIWYG --}}
            <p>{!! replaceOutputText($post->body) !!}</p>
            <h6>{{ $post->owner->name }} at {{ $post->created_at->toFormattedDateString() }}</h6>

            @if (auth()->check())

                @can('update', $post)
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="btn btn-primary btn-block" href="{{ route('posts.edit', $post->id) }}" role="button">Edit &raquo;</a>
                        </div>

                    @can('delete', $post)
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">

                                {{ csrf_field() }}

                                <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-block">
                            </form>
                        </div>
                    @endcan
                    </div>
                @endcan

                @cannot('view', $post)
                    <hr>

                    <div class="row">
                        @if ($post->isLiked())

                            @if ($post->isFirstLiked())
                                <div class="col-sm-6">
                                    <a class="btn btn-primary btn-block" href="{{ route('posts.edit', $post->id) }}" role="button">Edit &raquo;</a>
                                </div>
                            @endif

                            <div class="col-sm-6">
                                <form method="POST" action="/posts/{{ $post->id }}/unlike">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger">Dislike</button>
                                </form>
                            </div>
                        @else
                            <div class="col-sm-6">
                                <form method="POST" action="/posts/{{ $post->id }}/like">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-primary">Like</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endcannot

            @endif

        </div>

        <div class="col-lg-4">
            <img src="{{ /*secure_*/asset('images/' . $post->image) }}" class="rounded float-right" alt="..." width="340" height="340">
        </div><!--/span-->
    </div><!--/row-->

@endsection