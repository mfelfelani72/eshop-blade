<div class="trending">
    <div class="container">
        <div class="wrapper">
            <div class="sectop flexitem">
                <h2><span class="circle"></span><span>Trending Products</span></h2>
            </div>
            <div class="column">
                <div class="flexwrap">
                    <div class="row products big">
                        <div class="item">
                            <div class="offer">
                                <p>Offer ends at</p>
                                <ul class="flexcenter pl-0">
                                    <li>1</li>
                                    <li>15</li>
                                    <li>27</li>
                                    <li>60</li>
                                </ul>
                            </div>
                            <div class="media">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{ asset('front/img/products/apparel4.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="hoverable">
                                    <ul>
                                        <li class="active"><a href=""><i class="ri-heart-line"></i></a></li>
                                        <li><a href=""><i class="ri-eye-line"></i></a></li>
                                        <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="discount circle flexcenter"><span>31%</span></div>
                            </div>
                            <div class="content">
                                <div class="rating">
                                    <div class="stars"></div>
                                    <span class="mini-text">(2,548)</span>
                                </div>
                                <h3 class="mini-links"><a href="#">Happy Sailed Womens Summer Boho
                                        floral</a></h3>
                                <div class="price">
                                    <span class="current">$129.99</span>
                                    <span class="normal mini-text">$189.98</span>
                                </div>
                                <div class="stock mini-text">
                                    <div class="qty">
                                        <span>Stock: <strong class="qty-available">107</strong></span>
                                        <span>Solid: <strong class="qty-sold">3,459</strong></span>
                                    </div>
                                    <div class="bar">
                                        <div class="available"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $count = 0;
                    @endphp
                    @while ($count <= 7)
                        @if ($count == 0 || $count == 4)
                            <div class="row products mini">
                        @endif
                        <div class="item">
                            <div class="media">
                                <div class="thumbnail object-cover">
                                    <a href="#">
                                        <img src="{{ asset('front/img/products/' . $productTrends[$count]->product->coverImage->img) }}"
                                            alt="{{ $productTrends[$count]->product->description }}">
                                    </a>
                                </div>
                                <div class="hoverable">
                                    <ul>
                                        <li class="active"><a href=""><i class="ri-heart-line"></i></a></li>
                                        <li><a href=""><i class="ri-eye-line"></i></a></li>
                                        <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                    </ul>
                                </div>
                                <div class="discount circle flexcenter">
                                    <span>
                                        {{ round((1 - $productTrends[$count]->product->price_off / $productTrends[$count]->product->price) * 100, 0) }}%</span>
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="mini-links"><a
                                        href="#">{{ $productTrends[$count]->product->title }}</a></h3>
                                <div class="rating">
                                    <div class="stars"></div>
                                    <span class="mini-text">(2,548)</span>
                                </div>
                                <div class="price">
                                    <span class="current">${{ $productTrends[$count]->product->price_off }}</span>
                                    <span class="normal mini-text">${{ $productTrends[$count]->product->price }}</span>
                                </div>
                                <div class="mini-text">
                                    <p>2975 solid</p>
                                    <p>Free Shipping</p>
                                </div>
                            </div>
                        </div>
                        @if ($count == 3 || $count == 7)
                </div>
                @endif
                @php
                    $count++;
                @endphp
                @endwhile
            </div>
        </div>
    </div>
</div>
</div>
