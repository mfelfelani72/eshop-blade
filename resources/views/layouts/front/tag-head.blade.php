    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

     {{-- for set ltr or rtl style --}}
    @if (in_array(Session::get('locale'), Config::get('config-app.rtl-langs')))
        <link rel="stylesheet" href="{{ asset('front/css/rtl-style.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('front/css/ltr-style.css') }}">
    @endif
    {{-- for set ltr or rtl style --}}


    {{-- <link rel="stylesheet" href="{{ asset('front/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('front/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
