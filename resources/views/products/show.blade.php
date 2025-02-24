<x-layout>

    <x-breadcrumbs categoryId="{{ $category->id }}" title="{{ $product->title }}" />
    
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="/images/{{ $product->img }}">
                                        <div class="thumb-image"> <img src="/images/{{ $product->img }}"
                                                data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                    </li>
                                    @if ($gallery)
                                        @foreach ($gallery as $img)
                                            <li data-thumb="/images/{{ $img }}">
                                                <div class="thumb-image"> <img src="/images/{{ $img }}"
                                                        data-imagezoom="true" class="img-responsive" alt="" />
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- FlexSlider -->
                            <script src="/js/imagezoom.js"></script>
                            <script defer src="/js/jquery.flexslider.js"></script>
                            <link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />

                            <script>
                                // Can also be used with $(document).ready()
                                $(window).load(function() {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        controlNav: "thumbnails"
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{ $product->title }}</h2>
                                <div class="star-on">
                                    <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#"> 1 customer review </a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <h5 class="item_price">{{ $curr->symbol_left }}
                                    <span class="js-base-price"
                                        data-base-price="{{ showPrice($product->price * $curr->value) }}">{{ showPrice($product->price * $curr->value) }}</span>
                                </h5>
                                <p>{{ $product->content }}</p>
                                @unless ($mods->isEmpty())
                                    <div class="available">
                                        <ul>
                                            <li>Color
                                                <select>
                                                    <option value="">Choose color</option>
                                                    @foreach ($mods as $item)
                                                        <option data-title="{{ $item->title }}"
                                                            data-price="{{ showPrice($item->price * $curr->value) }}"
                                                            value="{{ $item->id }}">{{ $item->title }} -
                                                            {{ $curr->symbol_left }}
                                                            {{ showPrice($item->price * $curr->value) }}</option>
                                                    @endforeach
                                                </select>
                                            </li>

                                            <div class="clearfix"> </div>
                                        </ul>
                                    </div>
                                @endunless

                                <ul class="tag-men">
                                    <li><span>Category</span>
                                        <span class="women1">: <a
                                                href="/category/{{ $category->alias }}">{{ $category->title }}</a></span>
                                    </li>
                                    <li><span>SKU</span>
                                        <span class="women1">: CK09</span>
                                    </li>
                                </ul>
                                <div class="quantity">
                                    <input value="1" type="number" name="quantity" id="" size="4"
                                        min="1" step="1">
                                </div>
                                <a id="productAdd" href="cart/add?id={{ $product->id }}"
                                    class="add-cart item_add js-add-to-cart-link" data-id="{{ $product->id }}">ADD TO
                                    CART</a>

                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tabs">
                        <ul class="menu_drop">
                            <li class="item1"><a href="#"><img src="/images/arrow.png"
                                        alt="">Description</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
                                            exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit
                                            in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                                            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam
                                            nunc putamus parum claram, anteposuerit litterarum formas humanitatis per
                                            seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis
                                            videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item2"><a href="#"><img src="/images/arrow.png" alt="">Additional
                                    information</a>
                                <ul>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit
                                            in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                                            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam
                                            nunc putamus parum claram, anteposuerit litterarum formas humanitatis per
                                            seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis
                                            videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item3"><a href="#"><img src="/images/arrow.png" alt="">Reviews
                                    (10)</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
                                            exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit
                                            in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                                            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam
                                            nunc putamus parum claram, anteposuerit litterarum formas humanitatis per
                                            seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis
                                            videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item4"><a href="#"><img src="/images/arrow.png" alt="">Helpful
                                    Links</a>
                                <ul>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit
                                            in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                                            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam
                                            nunc putamus parum claram, anteposuerit litterarum formas humanitatis per
                                            seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis
                                            videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item5"><a href="#"><img src="/images/arrow.png" alt="">Make A
                                    Gift</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud
                                            exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in
                                            hendrerit
                                            in vulputate velit esse molestie consequat, vel illum dolore eu feugiat
                                            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                                            praesent luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam
                                            nunc putamus parum claram, anteposuerit litterarum formas humanitatis per
                                            seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis
                                            videntur parum clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="latestproducts">
                        <h3>З цим товаром часто купують:</h3>
                        <div class="product-one">

                            @foreach ($related as $item)
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="/products/{{ $item->alias }}" class="mask"><img
                                                class="img-responsive zoom-img" src="/images/{{ $item->img }}"
                                                alt="" /></a>
                                        <div class="product-bottom">
                                            <h3>{{ $item->title }}</h3>
                                            <p>Explore Now</p>
                                            <h4><a class="item_add js-add-to-cart-link" data-id="{{ $item->id }}"
                                                    href="#"><i></i></a> <span
                                                    class=" item_price">{{ $curr->symbol_left }}
                                                    {{ showPrice($item->price * $curr->value) }}
                                                </span></h4>
                                        </div>
                                        <div class="srch">
                                            <span>-50%</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <div class="clearfix"></div>
                        </div>
                    </div>
                    @if ($recently)
                        <div class="latestproducts">
                            <h3>Переглянуті товари:</h3>
                            <div class="product-one">

                                @foreach ($recently as $item)
                                    <div class="col-md-4 product-left p-left">
                                        <div class="product-main simpleCart_shelfItem">
                                            <a href="/products/{{ $item->alias }}" class="mask"><img
                                                    class="img-responsive zoom-img" src="/images/{{ $item->img }}"
                                                    alt="" /></a>
                                            <div class="product-bottom">
                                                <h3>{{ $item->title }}</h3>
                                                <p>Explore Now</p>
                                                <h4><a class="item_add js-add-to-cart-link"
                                                        data-id="{{ $item->id }}" href="#"><i></i></a>
                                                    <span class=" item_price">{{ $curr->symbol_left }}
                                                        {{ showPrice($item->price * $curr->value) }}
                                                    </span></h4>
                                            </div>
                                            <div class="srch">
                                                <span>-50%</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endif

                </div>
                
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--end-single-->

    <script type="text/javascript">
        $(function() {

            var menu_ul = $('.menu_drop > li > ul'),
                menu_a = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function(e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

        });
    </script>
</x-layout>
