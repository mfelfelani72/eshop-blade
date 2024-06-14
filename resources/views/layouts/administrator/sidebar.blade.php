<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="nav-text">{{ __('dashboard.shop') }}</span>
                </a>
                <ul aria-expanded="false">

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('dashboard.products') }}</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product.index') }}">{{ __('dashboard.index') }}</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product.create') }}">{{ __('dashboard.create') }}</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('dashboard.category') }}</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('category.index') }}">{{ __('dashboard.index') }}</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('category.create') }}">{{ __('dashboard.create') }}</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="{{ route('trend.index') }}" aria-expanded="false">{{ __('dashboard.product trend') }}</a>
                    </li>
                    <li><a class="" href="{{ route('featured.index') }}" aria-expanded="false">{{ __('dashboard.product futured') }}</a>
                    </li>




                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-text">{{ __('dashboard.settings') }}</span>
                </a>
                <ul aria-expanded="false">
                    {{-- Panel Admin --}}

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('dashboard.pannel admin') }}</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">{{ __('dashboard.change logo') }}</a></li>
                        </ul>
                    </li>

                    {{-- Panel Admin --}}

                    {{-- Public Front --}}

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">{{ __('dashboard.public front') }}</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('primary-slider.index') }}">{{ __('dashboard.slider') }}</a></li>
                            <li><a href="{{ route('primary-banner.index') }}">{{ __('dashboard.banner') }}</a></li>
                        </ul>
                    </li>

                    {{-- Public Front --}}

                </ul>
            </li>


        </ul>

        <div class="copyright">
            <p><strong>{{ __('dashboard.Cloner team admin') }}</p>
            <p class="fs-12">{{ __('dashboard.Made with') }}<span class="heart"></span>{{ __('dashboard.by Cloner team') }}</p>
            <p></strong> © {{ __('dashboard.all rights reserved 2024') }} </p>
        </div>
    </div>
</div>
