<!DOCTYPE html>
<html lang="en">
    @include('partials._head')
    <body>
        <div class="wrapper">

            @include('partials._nav')      

            @yield('content')

            @include('partials.footer')

            @include('partials.js')
        </div>

    </body>
</html>
