<x-layout>
    <!--product-starts-->
    <div class="product">
        <div class="container">
            <h2 style="margin-left: 12px; padding-bottom: 20px;">Products from category: {{ $category->title }}</h2>
            <div class="product-top">
                <div class="product-one">
                    <!-- show product products -->
                    @foreach ($products as $product)
                        <div class="col-md-3 product-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="/products/{{ $product->alias }}" class="mask"><img
                                        class="img-responsive zoom-img" src="/images/{{ $product->img }}"
                                        alt="" /></a>
                                <div class="product-bottom">
                                    <h3>{{ $product->title }}</h3>
                                    <p>Explore Now</p>
                                    <h4><a class="js-add-to-cart-link" data-id="{{ $product->id }}"
                                            href="/cart/add?id={{ $product->id }}"><i></i></a>
                                        <span class=" item_price">{{ $curr->symbol_left }}
                                            {{ $product->price * $curr->value }}</span>
                                        @if ($product->old_price)
                                            <small><del>${{ $product->old_price * $curr->value }}</del></small>
                                        @endif
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>
                                        @php
                                            // calculate discount percentage
                                            $discount = 0;
                                            if ($product->old_price) {
                                                $discount = 100 - round(($product->price / $product->old_price) * 100);
                                            }
                                        @endphp

                                        -{{ $discount }}%
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="text-center">
            {{ $products->links() }}
        </div>
    </div>


    <!--product-end-->
</x-layout>
