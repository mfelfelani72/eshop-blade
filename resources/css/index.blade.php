<!DOCTYPE html>
<html lang="en">

<head>
    @yield('tag-head')
</head>

<body >

    @yield('preloader')

    <!--**********************************
        Main wrapper start
    ***********************************-->

    <div id="main-wrapper">

        @yield('navheader')

        @yield('chat')

        @yield('header')

        @yield('sidebar')

        @yield('content')

        @yield('footer')

    </div>

    <!--**********************************
        Main wrapper end
    ***********************************-->

    @yield('tag-script')

    <script>
        function destroyItem(event, $id) {

            event.preventDefault();
            document.querySelector('#itemDelete-' + $id).submit();
        }
    </script>

</body>

</html>
