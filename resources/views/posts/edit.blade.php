@extends('main')

@section('title', ' | Edit Post')

    {{-- WYSIWYG Editor --}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            menubar: false
        });
    </script>

@section('content')
    @include('layouts.errors')

    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $post->name }}" required>
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
                </div>

                <div class="from-group">
                    <label for="image">
                        Image: <img src="{{ /*secure_*/asset('images/' . $post->image) }}" class="rounded" alt="..." width="140" height="140">
                    </label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Publish</button>

            </form>
        </div>
    </div><!--/row-->

@endsection