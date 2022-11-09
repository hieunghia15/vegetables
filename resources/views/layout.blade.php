<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.layout.head', ['title' => __($title ?? 'Vươn tầm nông sản Việt Nam')])
</head>

<body>
    <div class="theme-layout">
        <header class="">
            @if (Auth::check())
                @include('guest.layout.header-menu')
            @else
                @include('guest.layout.header')
            @endif

            @include('guest.layout.header-bottom')

            @include('guest.layout.sidebar')

            @yield('main')

            @include('guest.layout.footer')
    </div>
    <script src="socimo/js/main.min.js"></script>
    <script src="socimo/js/script.js"></script>
    
</body>

</html>
