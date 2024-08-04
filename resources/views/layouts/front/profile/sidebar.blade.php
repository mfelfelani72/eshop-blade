@php
    $backUrl = app('router')->getRoutes()->match(app('request'))->getName();

    // dd($backUrl);

@endphp
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            @php
                $list = [];
                $list[$backUrl] = 'active';

            @endphp

            @if (array_key_exists('user-information', $list))
                <li class="mm-active">
                @else
                <li>
            @endif

            <a class="" href="{{ route('user-information') }}" aria-expanded="false">

                <i class="fa fa-id-card" aria-hidden="true"></i>
                <span class="nav-text">{{ __('dashboard.information') }}</span>
            </a>

            </li>
             @if (array_key_exists('user-address', $list))
                <li class="mm-active">
                @else
                <li>
            @endif

                <a class="" href="{{ route('user-address') }}" aria-expanded="false">

                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span class="nav-text">{{ __('dashboard.address') }}</span>
                </a>

            </li>
             @if (array_key_exists('user-settings', $list))
                <li class="mm-active">
                @else
                <li>
            @endif

                <a class="" href="{{ route('user-settings') }}" aria-expanded="false">

                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="nav-text">{{ __('dashboard.settings') }}</span>
                </a>

            </li>



        </ul>

        <div class="copyright">
            <p><strong>{{ __('dashboard.Cloner team admin') }}</p>
            <p class="fs-12">{{ __('dashboard.Made with') }}<span
                    class="heart"></span>{{ __('dashboard.by Cloner team') }}</p>
            <p></strong> © {{ __('dashboard.all rights reserved 2024') }} </p>
        </div>
    </div>
</div>
