@extends('main')

@section('title', ' | Create Post')

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
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Title:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" id="body" class="form-control" rows="5"></textarea>
                </div>

                <div class="from-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Publish</button>

            </form>
        </div>

    </div><!--/row-->
    
@endsection    