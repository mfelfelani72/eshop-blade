<div class="slider">
    <div class="container">
        <div class="wrapper">
            <div class="myslider swiper">
                <div class="swiper-wrapper">
                    @foreach ($primarySliders as $item)
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="image object-cover">
                                    <img src={{ asset('front/img/' . $item->img) }} alt={{ $item->des }}>
                                </div>
                                <div class="text-content flexcol">
                                    <h4>{{ $item->title }}</h4>
                                    <h2><span>{{ $item->slogan }}</span><br><span>
                                            {{ $item->category }}
                                        </span></h2>
                                    <a href={{ $item->link }} class="primary-button">{{ $item->link_title }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
