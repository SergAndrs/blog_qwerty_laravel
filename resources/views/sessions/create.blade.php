@extends('main')

@section('title', ' | Sign In')

@section('content')
    @include('layouts.errors')

    <div class="row">
        <div class="col-sm-8">
            <h1>Sign In</h1>

            <form method="POST" action="{{ route('login.store') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>

            </form>
        </div>
    </div>

@endsection