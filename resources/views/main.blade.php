<!doctype html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body> 
        @include('partials._nav')
        <div class="container">
            @include('partials._messages')
            {{-- {{ Auth::check() ? 'Log in' : 'Log out' }} --}}
            @yield('content')
            @include('partials._footer')
        </div>
        @include('partials._javascript')    
        @yield('scripts')
    </body>
</html>