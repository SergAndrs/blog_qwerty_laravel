<!doctype html>
<html lang="en">

    <head>

        @include('layouts.header')

    </head>

    <body>

        @include('layouts.nav')

        <main role="main" class="container">

            @yield('content')

        </main><!--/.container-->

        @include('layouts.footer')

        @include('layouts.scripts')

    </body>
</html>