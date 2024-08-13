<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="single-product">
    <div class="container">
        <div class="wrapper">
            <div class="breadcrumb">
                <ul class="flexitem">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li>{{ $product->title }}</li>
                </ul>
            </div>
            <div class="column">
                <div class="products one">
                    <div class="flexwrap">
                        <div class="row">
                            <div class="item is_sticky">
                                <div class="price">
                                    <span class="discount">32% <br> OFF</span>
                                </div>
                                <div class="big-image">
                                    <div class="big-image-wrapper swiper-wrapper">
                                        @foreach ($product->productImages as $item)
                                            <div class="image-show swiper-slide">
                                                <a data-fslightbox
                                                    href={{ asset('front/img/products/' . $item->img) }}><img
                                                        src={{ asset('front/img/products/' . $item->img) }}
                                                        alt=""></a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>

                                <div thumbSlider="" class="small-image">
                                    <ul class="small-image-wrapper flexitem swiper-wrapper">
                                        @foreach ($product->productImages as $item)
                                            <li class="thumbnail-show swiper-slide">
                                                <img src={{ asset('front/img/products/' . $item->img) }} alt="">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="item">
                                <h1>{{ $product->title }}</h1>
                                <div class="content">
                                    <div class="rating">
                                        <div class="stars"></div>
                                        <a href="#" class="mini-text">2,251 reviews</a>
                                        <a href="#" class="add-review mini-text">Add Your Review</a>
                                    </div>
                                    <div class="stock-sku">
                                        @if ($product->stock)
                                            @if ($product->stock->count > 0)
                                                <span class="available">In Stock : {{ $product->stock->count }} </span>
                                            @endif
                                        @else
                                            <span class="not-available">Not Available </span>
                                        @endif
                                        <span class="sku mini-text">{{ $product->code }}</span>
                                    </div>
                                    <div class="price">
                                        <span class="current">{{ $product->price_off }} $</span>
                                        <span class="normal">{{ $product->price }}</span>
                                    </div>
                                    @if (false)
                                        <div class="color">
                                            <p>Color</p>
                                            <div class="variant">
                                                <form action="">
                                                    <P>
                                                        <input type="radio" name="color" id="cogrey">
                                                        <label for="cogrey" class="circle"></label>
                                                    </P>
                                                    <P>
                                                        <input type="radio" name="color" id="coblue">
                                                        <label for="coblue" class="circle"></label>
                                                    </P>
                                                    <P>
                                                        <input type="radio" name="color" id="cogreen">
                                                        <label for="cogreen" class="circle"></label>
                                                    </P>

                                                </form>
                                            </div>
                                        </div>
                                        <div class="sizes">
                                            <p>Size</p>
                                            <div class="variant">
                                                <form action="">
                                                    <P>
                                                        <input type="radio" name="size" id="size-40">
                                                        <label for="size-40" class="circle"><span>40</span></label>
                                                    </P>
                                                    <P>
                                                        <input type="radio" name="size" id="size-41">
                                                        <label for="size-41" class="circle"><span>41</span></label>
                                                    </P>
                                                    <P>
                                                        <input type="radio" name="size" id="size-42">
                                                        <label for="size-42" class="circle"><span>42</span></label>
                                                    </P>
                                                    <P>
                                                        <input type="radio" name="size" id="size-43">
                                                        <label for="size-43" class="circle"><span>43</span></label>
                                                    </P>

                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="actions">
                                        <div class="qty-control flexitem">
                                            <button class="minus circle">-</button>
                                            <input type="text" value="1" id="count">
                                            <button class="plus circle">+</button>
                                        </div>
                                        <div class="button-cart">
                                            @if ($product->stock)
                                                <form action="{{ route('add-to-cart') }}" class="chat"
                                                    id="ajax-form">
                                                    @csrf

                                                    <input type="hidden" name="message" value="{{ $product->id }}" />
                                                    {{-- <button onclick="addToCart(event,{{ $product->id }})"
                                                        class="primary-button" id="add-to-cart">Add
                                                        to cart</button> --}}
                                                    <button class="primary-button btn-submit">Add
                                                        to cart</button>
                                                </form>
                                            @else
                                                <button class="secondary-button disable">let me know</button>
                                            @endif


                                        </div>
                                        <div class="wish-share">
                                            <ul class="flexitem second-links pl-0">
                                                <li>
                                                    <a href="#">
                                                        <span class="icon-large"><i class="ri-heart-line"></i></span>
                                                        <span>wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="icon-large"><i class="ri-share-line"></i></span>
                                                        <span>Share</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="description collapse">
                                        <ul class="pl-0">
                                            <li class="has-child expand">
                                                <a href="#0" class="icon-small">Information</a>
                                                <div class="content">
                                                    @php
                                                        $informations = $product->informations;
                                                        $informations = html_entity_decode($informations);
                                                        $informations = json_decode($informations, true);
                                                    @endphp
                                                    <ul class="pl-0">
                                                        @foreach ($informations as $key => $row)
                                                            <li><span>{{ $key }}</span><span>{{ $row }}</span>
                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                </div>
                                            </li>
                                            <li class="has-child">
                                                <a href="#0" class="icon-small">Details</a>
                                                <div class="content pl-0">
                                                    <p>{{ $product->details }}
                                                    </p>
                                                </div>
                                            </li>
                                            @if (false)
                                                <li class="has-child">
                                                    <a href="#0" class="icon-small">Custom</a>
                                                    <div class="content">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Size</th>
                                                                    <th>Bust <span class="mini-text pl-0">(cm)</span>
                                                                    </th>
                                                                    <th>Waist <span class="mini-text pl-0">(cm)</span>
                                                                    </th>
                                                                    <th>Hip <span class="mini-text pl-0">(cm)</span>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>XS</td>
                                                                    <td>82.5</td>
                                                                    <td>62</td>
                                                                    <td>87,5</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>S</td>
                                                                    <td>85</td>
                                                                    <td>63,5</td>
                                                                    <td>89</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>M</td>
                                                                    <td>87,5</td>
                                                                    <td>67,5</td>
                                                                    <td>93</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>L</td>
                                                                    <td>90</td>
                                                                    <td>72,5</td>
                                                                    <td>98</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>XL</td>
                                                                    <td>93</td>
                                                                    <td>77,5</td>
                                                                    <td>103</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </li>
                                                <li class="has-child expand">
                                                    <a href="#0" class="icon-small">Reviews<span
                                                            class="mini-text pl-0">2.2K</span></a>
                                                    <div class="content">
                                                        <div class="reviews">
                                                            <h4>Customers Reviews</h4>
                                                            <div class="review-block">
                                                                <div class="review-block-head">
                                                                    <div class="flexitem">
                                                                        <span class="rate-sum">4.9</span>
                                                                        <span>2,251 Reviews</span>
                                                                    </div>
                                                                    <a href="#review-form"
                                                                        class="secondary-button">Write
                                                                        review</a>
                                                                </div>
                                                                <div class="review-block-body">
                                                                    <ul class="pl-0">
                                                                        <li class="item">
                                                                            <div class="review-form">
                                                                                <p class="person">Review by
                                                                                    sarah</p>
                                                                                <p class="mini-text pl-0">On
                                                                                    7/7/22</p>
                                                                            </div>
                                                                            <div class="review-rating rating">
                                                                                <div class="stars"></div>
                                                                            </div>
                                                                            <div class="review-title">
                                                                                <p>Awesome product</p>
                                                                            </div>
                                                                            <div class="review-text">
                                                                                <p>Lorem ipsum dolor sit, amet
                                                                                    consectetur adipisicing
                                                                                    elit. Veniam perferendis nam
                                                                                    rem nulla vel vero error
                                                                                    facilis, similique
                                                                                    exercitationem aspernatur.
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        <li class="item">
                                                                            <div class="review-form">
                                                                                <p class="person">Review by
                                                                                    Faizal</p>
                                                                                <p class="mini-text pl-0">On
                                                                                    1/7/22</p>
                                                                            </div>
                                                                            <div class="review-rating rating">
                                                                                <div class="stars"></div>
                                                                            </div>
                                                                            <div class="review-title">
                                                                                <p>Awesome product</p>
                                                                            </div>
                                                                            <div class="review-text">
                                                                                <p>Lorem ipsum dolor sit, amet
                                                                                    consectetur adipisicing
                                                                                    elit. Veniam perferendis nam
                                                                                    rem nulla vel vero error
                                                                                    facilis, similique
                                                                                    exercitationem aspernatur.
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="second-links">
                                                                        <a href="#" class="view-all">
                                                                            View all reviews <i
                                                                                class="ri-arrow-right-line"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div id="review-rorm" class="review-form">
                                                                    <h4>Write a review</h4>
                                                                    <div class="rating">
                                                                        <p>Are you satisfied enough?</p>
                                                                        <div class="rate-this">
                                                                            <input type="radio" name="rating"
                                                                                id="star5">
                                                                            <label for="star5"><i
                                                                                    class="ri-star-fill"></i></label>

                                                                            <input type="radio" name="rating"
                                                                                id="star4">
                                                                            <label for="star4"><i
                                                                                    class="ri-star-fill"></i></label>

                                                                            <input type="radio" name="rating"
                                                                                id="star3">
                                                                            <label for="star3"><i
                                                                                    class="ri-star-fill"></i></label>

                                                                            <input type="radio" name="rating"
                                                                                id="star2">
                                                                            <label for="star2"><i
                                                                                    class="ri-star-fill"></i></label>

                                                                            <input type="radio" name="rating"
                                                                                id="star1">
                                                                            <label for="star1"><i
                                                                                    class="ri-star-fill"></i></label>
                                                                        </div>
                                                                    </div>
                                                                    <form action="">
                                                                        <p>
                                                                            <label>Name</label>
                                                                            <input type="text">
                                                                        </p>
                                                                        <p>
                                                                            <label>Summary</label>
                                                                            <input type="text">
                                                                        </p>
                                                                        <p>
                                                                            <label>Review</label>
                                                                            <textarea cols="30" rows="10"></textarea>
                                                                        </p>
                                                                        <p><a href="#"
                                                                                class="primary-button">Submit
                                                                                Review</a></p>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $('#ajax-form').submit(function(e) {
        e.preventDefault();

        var url = $(this).attr("action");
        var data = $("#ajax-form").serializeArray();

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            // data: {
            //     'fullName': "mohammad"
            // },
            success: (response) => {
                // alert('Form submitted successfully');

            },
            error: function(response) {
               
            }
        });

    });
</script>
