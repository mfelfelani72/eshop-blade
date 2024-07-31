<header>

    <div class="header-top mobile-hide">
        <div class="container">
            <div class="wrapper flexitem">
                <div class="left">
                    <ul class="flexitem main-links">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Featured Products</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
                <div class="right">
                    <ul class="flexitem main-links">
                        @guest

                            @if (Route::has('login'))
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endif

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @else
                            <li>
                                <a href="#">{{ Auth::user()->name }} <span class="icon-small"><i
                                            class="ri-arrow-down-s-line"></i></span>
                                </a>
                                <ul>

                                    <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                            href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                            Logout </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if (Auth::user()->role == 'admin')
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif
                                    <li><a href="#">My Account</a></li>
                                    <li class="w-110"><a href="#">Order Tracking</a></li>
                                </ul>
                            </li>
                        @endguest

                        @if (false)
                            <li>
                                <a href="#">USD <span class="icon-small"><i
                                            class="ri-arrow-down-s-line"></i></span>
                                </a>
                                <ul>
                                    <li class="current"><a href="#">USD</a></li>
                                    <li><a href="#">EURO</a></li>
                                    <li><a href="#">GBP</a></li>
                                    <li><a href="#">IDR</a></li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="#">Language <span class="icon-small"><i class="ri-arrow-down-s-line"></i></a>
                            <ul>
                                <li><a href="{{ route('lang', 'en') }}">en</a></li>
                                <li><a href="{{ route('lang', 'fa') }}">fa</a></li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-nav">
        <div class="container">
            <div class="wrapper flexitem">
                <a href="#" class="trigger desktop-hide"><span class="i ri-menu-2-line"></span></a>
                <div class="left flexitem">
                    <div class="logo"><a href="/"><span class="circle">.ClonerStore</span></a></div>
                    <nav class="mobile-hide">
                        <ul class="flexitem second-links">

                            @foreach ($headerMenu as $item)
                                @if ($item->child)
                                    <li class="has-child">

                                        <a href="#" class="capitalize">{{ __('front.' . $item->code) }}
                                            <div class="icon-small"><i class="ri-arrow-down-s-line"></i></div>
                                        </a>

                                        <div class="mega">
                                            <div class="container">
                                                <div class="wrapper">
                                                    @foreach ($item->childs as $row)
                                                        <div class="flexcol">
                                                            <div class="row">
                                                                <h4>{{ $row->title }}</h4>
                                                                <ul>
                                                                    @foreach ($row->grandChilds as $row2)
                                                                        <li>
                                                                            <a
                                                                                href="{{ $row2->link }}">{{ $row2->title }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @if (true)
                                                        <div class="flexcol products">
                                                            <div class="row">
                                                                <div class="media">
                                                                    <div class="thumbnail object-cover">
                                                                        @if ($item->coverImage)
                                                                            <a href="#">
                                                                                <img src="{{ asset('front/img/header-menu/' . $item->coverImage->image) }}"
                                                                                    alt="">
                                                                            </a>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                @if (false)
                                                                    <div class="text-content">
                                                                        <h4>most wanted!</h4>
                                                                        <a href="#" class="primary-button">order
                                                                            now</a>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                @else
                                    <li>
                                        <a class="capitalize"
                                            href="{{ $item->link }}">{{ __('front.' . $item->code) }}
                                            @if ($item->lable !== 'empty')
                                                <div class="fly-item"><span
                                                        class="capitalize">{{ $item->lable }}</span>
                                                </div>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            @if (false)
                                <li><a href="#">{{ __('front.home') }}</a></li>
                                <li><a href="#">{{ __('front.shop') }}</a></li>
                                <li class="has-child">
                                    <a href="#">{{ __('front.stock_place') }}
                                        <div class="icon-small"><i class="ri-arrow-down-s-line"></i></div>
                                    </a>
                                    <div class="mega">
                                        <div class="container">
                                            <div class="wrapper">
                                                <div class="flexcol">
                                                    <div class="row">
                                                        <h4>{{ __('front.laptop') }}</h4>
                                                        <ul>
                                                            <li><a href="#">{{ __('front.asus') }}</a></li>
                                                            <li><a href="#">{{ __('front.lenovo') }}</a></li>
                                                            <li><a href="#">Toshiba</a></li>
                                                            <li><a href="#">Pants & Capris</a></li>
                                                            <li><a href="#">Sweaters</a></li>
                                                            <li><a href="#">Costumes</a></li>
                                                            <li><a href="#">Hoodies & Sweatshirts</a></li>
                                                            <li><a href="#">Pajamas & Robes</a></li>
                                                            <li><a href="#">Shorts</a></li>
                                                            <li><a href="#">Swimwear</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flexcol">
                                                    <div class="row">
                                                        <h4>jewelry</h4>
                                                        <ul>
                                                            <li><a href="#">accessories</a></li>
                                                            <li><a href="#">bags & purses</a></li>
                                                            <li><a href="#">necklaces</a></li>
                                                            <li><a href="#">rings</a></li>
                                                            <li><a href="#">earrings</a></li>
                                                            <li><a href="#">bracelets</a></li>
                                                            <li><a href="#">body jewelry</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flexcol">
                                                    <div class="row">
                                                        <h4>beauty</h4>
                                                        <ul>
                                                            <li><a href="#">bath accessories</a></li>
                                                            <li><a href="#">makeuo & cosmetics</a></li>
                                                            <li><a href="#">skin care</a></li>
                                                            <li><a href="#">hair care</a></li>
                                                            <li><a href="#">essentials oils</a></li>
                                                            <li><a href="#">fragrences</a></li>
                                                            <li><a href="#">soap & bath bombs</a></li>
                                                            <li><a href="#">face masks & coverings</a></li>
                                                            <li><a href="#">spa kits & gifts</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="flexcol">
                                                    <div class="row">
                                                        <h4>top brands</h4>
                                                        <ul class="women-brands">
                                                            <li><a href="#">nike</a></li>
                                                            <li><a href="#">louis vuitton</a></li>
                                                            <li><a href="#">hermes</a></li>
                                                            <li><a href="#">gucci</a></li>
                                                            <li><a href="#">zalando</a></li>
                                                            <li><a href="#">tiffany & co.</a></li>
                                                            <li><a href="#">zara</a></li>
                                                            <li><a href="#">h&m</a></li>
                                                            <li><a href="#">cartier</a></li>
                                                            <li><a href="#">chanel</a></li>
                                                            <li><a href="#">hurley</a></li>
                                                        </ul>
                                                        <a href="#" class="view-all"> View all brands <i
                                                                class="ri-arrow-right-line"></i></a>
                                                    </div>
                                                </div>
                                                <div class="flexcol products">
                                                    <div class="row">
                                                        <div class="media">
                                                            <div class="thumbnail object-cover">
                                                                <a href="#">
                                                                    <img src="{{ asset('front/img/products/apparel4.jpg') }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="text-content">
                                                            <h4>most wanted!</h4>
                                                            <a href="#" class="primary-button">order now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Sports
                                        <div class="fly-item"><span>New!</span></div>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </nav>
                </div>
                <div class="right">
                    <ul class="flexitem second-links">
                        <li class="mobile-hide"><a href="#">
                                <div class="icon-large"><i class="ri-heart-line"></i></div>
                                <div class="fly-item"><span class="item-number">0</span></div>
                            </a></li>
                        <li class="iscart"><a href="#">
                                <div class="icon-large">
                                    <i class="ri-shopping-cart-line"></i>
                                    <div class="fly-item"><span class="item-number">5</span></div>
                                </div>
                                <div class="icon-text">
                                    <div class="mini-text">Total</div>
                                    <div class="cart-total">$1.622</div>
                                </div>
                            </a>

                            <div class="mini-cart">
                                <div class="content">
                                    <div class="cart-head">
                                        5 items in cart
                                    </div>
                                    <div class="cart-body">
                                        <ul class="pl-0 m-0 products mini">
                                            <li class="item">
                                                <div class="thumbnail object-cover">
                                                    <a href="#"><img
                                                            src="{{ asset('front/img/products/home2.jpg') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="item-content">
                                                    <p><a href="#">Dimmable Ceiling Light Modern</a></p>
                                                    <span class="price">
                                                        <span>$279.99</span>
                                                        <span class="fly-item"><span>2x</span></span>
                                                    </span>
                                                </div>
                                                <a href="" class="item-remove"><i
                                                        class="ri-close-line"></i></a>
                                            </li>
                                            <li class="item">
                                                <div class="thumbnail object-cover">
                                                    <a href="#"><img
                                                            src="{{ asset('front/img/products/home3.jpg') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="item-content">
                                                    <p><a href="#">Modern Storage Cabinet with door & 3
                                                            Drawers</a></p>
                                                    <span class="price">
                                                        <span>$129.99</span>
                                                        <span class="fly-item"><span>1x</span></span>
                                                    </span>
                                                </div>
                                                <a href="" class="item-remove"><i
                                                        class="ri-close-line"></i></a>
                                            </li>
                                            <li class="item">
                                                <div class="thumbnail object-cover">
                                                    <a href="#"><img
                                                            src="{{ asset('front/img/products/home4.jpg') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="item-content">
                                                    <p><a href="#">Vonanda Valvet Sofa Couch</a></p>
                                                    <span class="price">
                                                        <span>$362.99</span>
                                                        <span class="fly-item"><span>2x</span></span>
                                                    </span>
                                                </div>
                                                <a href="" class="item-remove"><i
                                                        class="ri-close-line"></i></a>
                                            </li>
                                            <li class="item">
                                                <div class="thumbnail object-cover">
                                                    <a href="#"><img
                                                            src="{{ asset('front/img/products/home5.jpg') }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="item-content">
                                                    <p><a href="#">Awesome Bed for a Couole</a></p>
                                                    <span class="price">
                                                        <span>$279.99</span>
                                                        <span class="fly-item"><span>2x</span></span>
                                                    </span>
                                                </div>
                                                <a href="" class="item-remove"><i
                                                        class="ri-close-line"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-footer">
                                        <div class="subtotal">
                                            <p class="m-0">Subtotal</p>
                                            <p class="m-0"><strong>$1,622.95</strong></p>
                                        </div>
                                        <div class="actions">
                                            <a href="/cart.html" class="primary-button">Checkout</a>
                                            <a href="/checkout.html" class="secondary-button">View Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-main mobile-hide">
        <div class="container">
            <div class="wrapper flexitem">
                <div class="left">
                    <div class="dpt-cat">
                        <div class="dpt-head">
                            <div class="main-text">All Departments</div>
                            <div class="mini-text mobile-hide">Total 1059 Products</div>
                            <a href="#" class="dpt-trigger mobile-hide">
                                <i class="ri-menu-3-line ri-xl"></i>
                                <i class="ri-close-line ri-xl"></i>
                            </a>
                        </div>
                        <div class="dpt-menu">
                            <ul class="second-links pl-0 m-0">
                                @if (false)
                                    {
                                    <li class="has-child electric">
                                        <a href="">
                                            <div class="icon-large"><i class="ri-bluetooth-connect-line"></i></div>
                                            Electric
                                            <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                        </a>
                                        <ul>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Cell Phones</a></li>
                                            <li><a href="#">Computers</a></li>
                                            <li><a href="#">GPS & Navigation</a></li>
                                            <li><a href="#">Hedphones</a></li>
                                            <li><a href="#">Home Audio</a></li>
                                            <li><a href="#">Television</a></li>
                                            <li><a href="#">Video Projectors</a></li>
                                            <li><a href="#">Wearable Technology</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-child fashion">
                                        <a href="">
                                            <div class="icon-large"><i class="ri-t-shirt-air-line"></i></div>
                                            Women's Fashion
                                            <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                        </a>
                                        <ul>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Jewelry</a></li>
                                            <li><a href="#">Watches</a></li>
                                            <li><a href="#">Handbags</a></li>
                                            <li><a href="#">Accessories</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-large"><i class="ri-t-shirt-line"></i></div>
                                            Men's Fashion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-large"><i class="ri-user-5-line"></i></div>
                                            Girl's Fashion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-large"><i class="ri-user-6-line"></i></div>
                                            Boy's Fashion
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-large"><i class="ri-heart-pulse-line"></i></div>
                                            Health & Household
                                        </a>
                                    </li>
                                    <li class="has-child homekit">
                                        <a href="">
                                            <div class="icon-large"><i class="ri-home-8-line"></i></div>
                                            Home & Kitchen
                                            <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                        </a>
                                        <div class="mega">
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4><a href="#">Kitchen & Dining</a></h4>
                                                    <ul>
                                                        <li><a href="#">Kitchen</a></li>
                                                        <li><a href="#">Dining Room</a></li>
                                                        <li><a href="#">Pantry</a></li>
                                                        <li><a href="#">Great Room</a></li>
                                                        <li><a href="#">Breakfast Nook</a></li>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <h4><a href="#">Living</a></h4>
                                                    <ul>
                                                        <li><a href="#">Living Room</a></li>
                                                        <li><a href="#">Family Room</a></li>
                                                        <li><a href="#">Sunroom</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4><a href="#">Bed & Bath</a></h4>
                                                    <ul>
                                                        <li><a href="#">Bathroom</a></li>
                                                        <li><a href="#">Powder room</a></li>
                                                        <li><a href="#">Bedroom</a></li>
                                                        <li><a href="#">Storage & Closet</a></li>
                                                        <li><a href="#">Baby & kids</a></li>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <h4><a href="#">Utility</a></h4>
                                                    <ul>
                                                        <li><a href="#">Laundry</a></li>
                                                        <li><a href="#">Garage</a></li>
                                                        <li><a href="#">Mudroom</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4><a href="#">Outdoor</a></h4>
                                                    <ul>
                                                        <li><a href="#">Landscape</a></li>
                                                        <li><a href="#">Patio</a></li>
                                                        <li><a href="#">Deck</a></li>
                                                        <li><a href="#">Pool</a></li>
                                                        <li><a href="#">Backyard</a></li>
                                                        <li><a href="#">Porch</a></li>
                                                        <li><a href="#">Exterior</a></li>
                                                        <li><a href="#">Outdoor Kitchen</a></li>
                                                        <li><a href="#">Front Yard</a></li>
                                                        <li><a href="#">Driveway</a></li>
                                                        <li><a href="#">Poolhouse</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="">
                                            <div class="icon-large"><i class="ri-android-line"></i></div>
                                            Pet Supplies
                                        </a>
                                    </li>
                                    }
                                @endif

                                @foreach ($assideMenu as $item)
                                    @php
                                        $child = '';
                                        $link = '';
                                        if ($item->childs) {
                                            $child = 'has-child';
                                        } else {
                                            $link = $item->link;
                                        }
                                    @endphp
                                    <li class="{{ $child }}">
                                        <a href="{{ $link }}">
                                            <div class="icon-large"><i class="{{ $item->icon }}"></i></div>
                                            {{ $item->title }}
                                            <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                        </a>

                                        @if ($item->childs)
                                            <ul
                                                style="background-image: url({{ asset('front/img/asside-menu/' . $item->image) }})">
                                                @foreach ($item->childs as $row)
                                                    <li><a href="{{ $row->link }}">{{ $row->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="serach-box">
                        <form action="" class="search">
                            <span class="icon-large"><i class="ri-search-line"></i></span>
                            <input type="search" placeholder="Search for products">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
