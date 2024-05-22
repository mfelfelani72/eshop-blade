<div class="slider">
    <div class="container">
        <div class="wrapper">
            <div class="myslider swiper">
                <div class="swiper-wrapper">
                    @foreach ($primarySliders as $item)
                        <div class="swiper-slide">
                            @if ($item->title !== 'empty')
                                <div class="item-title">
                                @else
                                    <div class="item">
                            @endif

                            <div class="image object-cover">
                                <img src={{ asset('front/img/slider/' . $item->img) }} alt={{ $item->description }}>
                            </div>
                            <div class="text-content flexcol">
                                @if ($item->title !== 'empty')
                                    <h4>{{ $item->title }}</h4>
                                    <h2><span>{{ $item->slogan }}</span><br><span>
                                            {{ $item->category }}
                                        </span></h2>
                                    <a href={{ $item->link }} class="primary-button">{{ $item->link_title }}</a>
                                @endif
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
