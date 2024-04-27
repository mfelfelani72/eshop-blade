<!DOCTYPE html>
{{-- <html lang="en"> --}}
<html>

<head>
    @yield('tag-head')
</head>

<body>
    <div id="page" class="site page-home">

        @yield('asside')

        @yield('header')

        <main>

            @yield('slider')

            @yield('brands')

            @yield('trending')

            @yield('features')

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
