<div class="features">
    <div class="container">
        <div class="wrapper">
            <div class="sectop flexitem">
                <h2><span class="circle"></span><span>Featured Products</span></h2>
                <div class="second-links">
                    <a href="#" class="view-all">View all<i class="ri-arrow-right-line"></i></a>
                </div>
            </div>
            <div class="column">
                <div class="products main flexwrap">
                    @foreach ($productFeatured as $item )
                         <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="#">
                                    <img src="{{ asset('front/img/products/' . $item->product->coverImage->img) }}" 
                                    alt="{{ $item->product->description }}">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href=""><i class="ri-heart-line"></i></a></li>
                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="discount circle flexcenter"><span>
                                {{ round((1 - $item->product->price_off / $item->product->price) * 100, 0) }}%</span></div>
                        </div>
                        <div class="content">
                            <div class="rating">
                                <div class="stars"></div>
                                <span class="mini-text">(2,548)</span>
                            </div>
                            <h3 class="mini-links"><a href="#">{{ $item->product->title }}</a></h3>
                            <div class="price">
                                <span class="current">${{ $item->product->price_off }}</span>
                                <span class="normal mini-text">${{ $item->product->price }}</span>
                            </div>
                            <div class="footer">
                                <ul class="mini-text">
                                    @foreach ($item->product->getInformations() as $key => $row )
                                        <li>{{ $key }},{{ $row }}</li>
                                    @endforeach
                                    
                                    <li>Free Shipping</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
