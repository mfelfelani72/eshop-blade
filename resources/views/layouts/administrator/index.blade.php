<!DOCTYPE html>

@if (in_array(Session::get('locale'), Config::get('config-app.rtl-langs')))
    <html lang={{ str_replace('_', '-', app()->getLocale()) }} dir="rtl">
@else
    <html lang={{ str_replace('_', '-', app()->getLocale()) }} dir="ltr">
@endif


<head>
    @yield('tag-head')
</head>
@if (in_array(Session::get('locale'), Config::get('config-app.rtl-langs')))

    <body direction="rtl">
    @else

        <body direction="ltr">
@endif



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
