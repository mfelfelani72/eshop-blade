<div class="banners">
    <div class="container">
        <div class="wrapper">
            <div class="column">
                <div class="banner flexwrap">

                    @foreach ($primaryBanners as $item)
                        <div class="row">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('front/img/banner/banner1.jpg') }}" alt="">
                                </div>
                                <div class="text-content flexcol">
                                    <h4>{{ $item->title }}</h4>
                                    <h3><span>{{ $item->slogan }}</span><br>{{ $item->category }}</h3>
                                    <a href="{{ $item->link }}" class="primary-button">{{ $item->link_title }}</a>
                                </div>
                                <a href="{{ $item->link_title }}" class="over-link"></a>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="product-categories flexwrap">
                        <div class="row">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('front/img/banner/procat1.jpg') }}" alt="">
                                </div>
                                <div class="content mini-links">
                                    <h4>Beauty</h4>
                                    <ul class="flexcol pl-0">
                                        <li><a href="#">Makeup</a></li>
                                        <li><a href="#">Skin Care</a></li>
                                        <li><a href="#">Hair Care</a></li>
                                        <li><a href="#">Fragrance</a></li>
                                        <li><a href="#">Foot $ Hand Care</a></li>
                                    </ul>
                                    <div class="second-links">
                                        <a href="#" class="view-all">View all<i
                                                class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('front/img/banner/procat2.jpg') }}" alt="">
                                </div>
                                <div class="content mini-links">
                                    <h4>Gatdets</h4>
                                    <ul class="flexcol pl-0">
                                        <li><a href="#">Camera</a></li>
                                        <li><a href="#">Cell Phones</a></li>
                                        <li><a href="#">Computers</a></li>
                                        <li><a href="#">GPS & Navigation</a></li>
                                        <li><a href="#">Hedphones</a></li>
                                    </ul>
                                    <div class="second-links">
                                        <a href="#" class="view-all">View all<i
                                                class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('front/img/banner/procat3.jpg') }}" alt="">
                                </div>
                                <div class="content mini-links">
                                    <h4>Home Decor</h4>
                                    <ul class="flexcol pl-0">
                                        <li><a href="#">Kitchen</a></li>
                                        <li><a href="#">Dining Room</a></li>
                                        <li><a href="#">Pantry</a></li>
                                        <li><a href="#">Great Room</a></li>
                                        <li><a href="#">Breakfast Nook</a></li>
                                    </ul>
                                    <div class="second-links">
                                        <a href="#" class="view-all">View all<i
                                                class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
