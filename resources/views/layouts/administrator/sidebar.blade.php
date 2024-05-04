<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="nav-text">Shop</span>
                </a>
                <ul aria-expanded="false">

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Products</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product.index') }}">index</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product.create') }}">create</a></li>
                        </ul>
                    </li>




                </ul>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-cogs"></i>
                    <span class="nav-text">Settings</span>
                </a>
                <ul aria-expanded="false">
                    {{-- Panel Admin --}}

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Panel Admin</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">Change Logo</a></li>
                        </ul>
                    </li>

                    {{-- Panel Admin --}}

                    {{-- Public Front --}}

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Public Front</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('primary-slider.index') }}">Slider</a></li>
                            <li><a href="{{ route('primary-banner.index') }}">Banner</a></li>
                        </ul>
                    </li>

                    {{-- Public Front --}}

                </ul>
            </li>


        </ul>

        <div class="copyright">
            <p><strong>Fillow Saas Admin</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignLabs</p>
        </div>
    </div>
</div>
