<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
    <html>

<head>
    @yield('tag-head')
</head>

<body>
    <div id="page" class="site page-home">

       

        @yield('header')

        <main>

            @yield('content')
           
            @yield('brands')

            @yield('trending')

            @yield('banners')

        </main>

        @yield('footer')

        @yield('mobile-menu-bottom')

        @yield('mobile-search-bottom')

        <div class="backtotop">
            <a href="#" class="flexcol">
                <i class="ri-arrow-up-line"></i>
                <span>Top</span>
            </a>
        </div>

        <div class="overlay"></div>

    </div>

    @yield('tag-script')
</body>

</html>
