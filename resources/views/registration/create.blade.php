@extends('main')

@section('title', ' | Registration')

@section('content')
    @include('layouts.errors')

    <div class="row">
        <div class="col-lg-8">
            <h1>Register</h1>

            <form method="POST" action="/register">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

            </form>
        </div>
    </div><!--/row-->

@endsection