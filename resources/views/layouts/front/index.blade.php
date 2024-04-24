<!DOCTYPE html>
<html lang="en">

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

    </div>


    @yield('tag-script')
</body>

</html>
